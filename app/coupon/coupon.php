<?php

require_once dirname(__file__) . './../../lib/aobject.php';

class coupon extends AObject {

    private $coupon_model;

    public function __construct() {
        parent::__construct(__CLASS__);
        $this->coupon_model = new coupon_model();
    }

    public function coupon_editor() {
        $data["used"] = $this->coupon_model->get_used_coupon();
        $data["nonused"] = $this->coupon_model->get_nonused_coupon();
        return $this->parse('coupon_editor.tpl', $data);
    }

}

class coupon_model extends AObject {

    public function __construct() {
        parent::__construct('coupon');
    }

    public function coupon_generate() {
        $count = 0;
        do {
            $code = $this->generate(6);
            $count = dibi::query("select count(*) from  book_coupons where code = %s", $code)->fetchSingle();
        } while ($count != 0);
        echo '{"code":"' . $code . '"}';
    }

    public function get_used_coupon() {
        return dibi::query("select * from book_coupons where used != 0")->fetchAll();
    }

    public function get_nonused_coupon() {
        return dibi::query("select * from book_coupons where used = 0")->fetchAll();
    }

    public function coupon_create($form_data) {
        $count = dibi::query("select count(*) from  book_coupons where code = %s", $form_data["code"])->fetchSingle();
        if ($count == 0) {
            dibi::query("insert into book_coupons (valid_from, valid_to, code, value) values (%t, %t, %s, %i)", strtotime($form_data["valid_from"]), strtotime($form_data["valid_to"]), $form_data["code"], $form_data["value"]);
            $this->set_message("Kupon byl vytvoren. Kod: " . $form_data["code"], "coupon_info");
        } else {
            $this->set_message("Kupon jiz existuje", "coupon_info");
        }
    }

    private function generate($length) {
        $possible = "23456789bcdefghjkmnopqrstuvwxyzBCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = "";
        for ($i = 0; $i < $length; ++$i) {
            $code .= $possible[rand(0, strlen($possible) - 1)];
        }
        return $code;
    }

}

?>