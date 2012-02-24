<?php
	require_once dirname(__file__).'./../../lib/aobject.php';
	
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
		public function create_coupon($form_data) {
                
                }
                public function get_used_coupon() {
                    return dibi::query("select * from book_coupons where used != %t", 0)->fetchAll();
                }
                public function get_nonused_coupon() {
                    
                    return dibi::query("select * from book_coupons where used = %t", 0)->fetchAll();
                }
	}
?>