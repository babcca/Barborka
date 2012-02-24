<?php
	require_once 'coupon.php';
	require_once dirname(__file__).'./../../lib/controller.php';

	Presenter::view("coupon", array(
                        		"class"=>"coupon",
					"method"=>"coupon_editor",
					"login"=>true));
	
	//model
	Presenter::method("coupon", array(
                			"class"=>"coupon_model",
					"method"=>"coupon_create",
					"login"=>true,
					"params"=>array('valied_from'=>'%all', 'valit_to'=>"%all", 'value'=>"%([0-9]+)")));
