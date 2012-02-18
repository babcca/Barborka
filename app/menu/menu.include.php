<?php
	require_once 'menu.php';
	require_once dirname(__file__).'/../../lib/controller.php';

	Presenter::view("menu", array(
								"class"=>"menu",
								"method"=>"generate_menu",
								"params"=>array("lang"=>"%([a-z]{2})")));
	Presenter::view("menu", array(
								"class"=>"menu",
								"method"=>"generate_language_menu",
								"params"=>array("id"=>"%(.*)")));
?>
