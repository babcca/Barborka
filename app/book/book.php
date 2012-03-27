<?php

require_once dirname(__file__) . '/../../lib/aobject.php';

class book extends AObject {

    public function __construct() {
        parent::__construct(__CLASS__);
    }

    public function book_form($lang, $text_id) {
        // datat struct = array(LANG, OD, DO, HOSTU)
        if (($data = $this->get_data('book/book_form')) != null) {
            $this->assign('default', $data[1]);
        } else {
            $this->assign('default', array("$lang", '', '', '0'));
        }
        $text = dibi::query('select * from [page_content] where [id] = %i', $text_id)->fetch();
        $this->get_translate($lang);
        $this->assign("lang", $lang);
        return $this->parse("book.tpl", $text);
    }

    public function quick_book_form($lang) {
        $this->get_translate($lang);
        return $this->parse("quick_book.tpl", array('lang' => $lang));
    }

    public function book_editor() {
        include "price_list.php";
        return $this->parse("book_editor.tpl", $price_list);
    }

    public function book_prices($text_id) {
        $this->assign('text', dibi::query("select * from [page_content] where [id]=%i", $text_id)->fetch());
        include "price_list.php";
        return $this->parse("book_prices.tpl", $price_list);
    }

}

class book_model extends AObject {

    public function __construct() {
        parent::__construct('book');
    }

    public function redirect($lang, $from, $to, $guests) {
        $args = func_get_args();
        $uri = dibi::fetchSingle('select uri from [presenter] where [lang] = %s and [method] = %s', $lang, 'book_form');
        $this->send_data('book/book_form', $args, __class__);
        // add url maker
        header("Location: /$lang/$uri/#book_form");
        exit(1);
    }

    public function calculate_price($form_data) {
        $this->push(json_encode($this->_calculate_price($form_data)));
    }

    public function price_update($data) {
        file_put_contents(dirname(__file__) . '/price_list.php', $this->parse('price_list_template.tpl', $data));
        $this->set_message('Data byla aktualizovana', 'book_editor');
    }

    private function getCoupon($coupon_id) {
        if ($coupon_id != "") {
            $now = time();
            $coupon = dibi::query("select * from book_coupons where code=%s and used = 0 and valid_from <= %t and valid_to >= %t limit 1", $coupon_id, $now, $now)->fetchAll();
            if (count($coupon) == 1) {
                return $coupon[0];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    private function processCoupon($coupon_id) {
        $coupon = $this->getCoupon($coupon_id);
        if ($coupon != null) {
            dibi::query('update book_coupons set used=%t where id = %i', $now, $coupon["id"]);
        } 
        return $coupon;
    }
    
    public function _calculate_price($form_data) {
        include "price_list.php";
        $guests_count = 0;
        $services_price = 0; // celkova cena za sluzby (parkovani, snidane, ...)
        $accomm_price = 0; // celkova cena jenom za ubytovani, bez priplatkovych sluzeb
        $days = strtotime($form_data["date_to"]) - strtotime($form_data["date_from"]);
        $days = $days / 86400; //24*60*60
        
        
        
        foreach ($form_data['rooms'] as $room) {
            if ($room['guests'] == 0)
                continue;
            $guests_count += $room['guests'];
            // get right table index
            $day_index = min($days, 2) - 1;
            $guest_index = min($room["guests"], 4) - 1; // >= 4 stejan cena
            // person_per_day * person_count * spending_nights
            $accomm_price += $price_list["day_tax"][$day_index][$guest_index] * $room["guests"] * $days;
            if ($room['parking'] != 'false')
                $services_price += $price_list["parking"] * $days; // price for parking
        }
        if ($form_data['breakfast'] != 'false') {
            if ($guests_count >= 4) {
                $services_price += $guests_count * $price_list["breakfast"] * $days;
            } // price for breakfast
            else {
                $this->set_message('Breakfast not calculated, less then 4 persons', 'book_price_calculator');
            }
        }

        if ($form_data['transfer'] != 'false') {
            $services_price += ceil($guests_count / 4) * $price_list["transport"];
        }// price for transport 

        // Get sale 
        $coupon = $this->getCoupon($form_data["coupon"]);
        $is_coupon_used = $coupon != null ? true : false;
        $sale = $is_coupon_used ? $coupon['value'] : 0;
        $price_sale = ((100 - $sale) / 100);
        
        // Output data
        $return['messages'] = $this->parse('book_price_calculator.tpl');
        $return['accomm_price'] = ceil($accomm_price / $price_list["euro"]);
        $return['services_price'] = ceil($services_price / $price_list["euro"]);
        $return['sale'] = $sale;
        $return['result_price'] = ceil(($services_price + $accomm_price) / $price_list["euro"]) * $price_sale;
        return $return;
    }

    public function get_order($order_id) {
        return dibi::query('select * from [book_customer] bc 
			 inner join [book_order] bo on bc.customer_id = bo.customer_id AND bo.order_id = %i 
			 inner join [book_rooms] br on br.order_id = bo.order_id', $order_id)->fetchAll();
    }

    private function insertOrder($form_data, $coupon) {
        $customer = array_slice($form_data, 7, 3, true);
        dibi::query('insert into [book_customer] ', $customer);
        $order = array_slice($form_data, 0, 6, true);
        $order['customer_id'] = dibi::insertId();
        $order['arrival_time'] = strtotime($order['arrival_time']);
        $is_coupon_used = $coupon != null ? true : false;
        if ($is_coupon_used)
            $order['coupon'] = $coupon["id"];
        
        $order["visited"] = $form_data["visited"];
        dibi::query('insert into [book_order] ', $order);
        $order_id = dibi::insertId();
        return $order_id;
    }
    
    private function insertRooms($form_data, $order_id){
        $rooms = array_slice($form_data, 6, 1, true);
        foreach ($rooms['rooms'] as $room) {
            if ($room['guests'] == 0)
                continue;
            $room['order_id'] = $order_id;
            dibi::query('insert into [book_rooms] ', $room);
        }
    }
    
    public function book_order($form_data) {
        $subject = "Apartmany Vila Barbora - požadavek na rezervaci";
        $to = "kolesar.martin@gmail.com";
        $headers = "From: Apartmany Vila Barbora <info@apartments-barbora.com>\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $calculated_price =  $this->_calculate_price($form_data);
        // ma side effekty, znepplatni zadany kup, 
        // tedy cena se musi spocitat driv
        $coupon = $this->processCoupon($form_data["coupon"]);
        $order_id = $this->insertOrder($form_data, $coupon);
        $this->insertRooms($form_data, $order_id);
        
        $this->assign('full_coupon', $coupon);
        $this->assign('order_id', $order_id);
        $this->assign('calculated_price', $calculated_price);
        $this->get_translate($form_data['lang']);
        $mail_body = $this->parse('book_order_email_'.$form_data['lang'].'.tpl', $form_data);
   
        if (mail($to, $subject, $mail_body, $headers)) {
            if (mail($form_data['email'], $mail_body, $headers)) {
                $this->set_message("Prebooking complete, please check your email", "book_order");
            } else {
                $this->set_message("Prebook error, we can't send you email", "book_order");
            }
        } else {
            $this->set_message("Internal system error", "book_order");
        }
        
        echo '{"result":"ok"}';
    }

}

?>
