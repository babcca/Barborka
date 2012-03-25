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
               "params_array"=>true,
					"params"=>array('valid_from'=>'%([0-9]{2}-[0-9]{2}-[0-9]{4})', 'valid_to'=>"%([0-9]{2}-[0-9]{2}-[0-9]{4})", 'value'=>"%([0-9]+)", 'code'=>'%([A-Za-z0-9]+)')));
        Presenter::method("coupon", array(
               "class"=>"coupon_model",
					"method"=>"coupon_generate",
					"login"=>true
					));
