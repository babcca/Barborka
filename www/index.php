<?php 
	
	require_once dirname(__file__).'/../lib/controller.php';
	require_once dirname(__file__).'/../lib/application_manager.php';
	require_once dirname(__file__).'/../lib/render.php';
	require_once dirname(__file__).'/../lib/config_loader.php';
	require_once dirname(__file__).'/../lib/dibi/dibi.php';
	require_once dirname(__file__).'/../lib/aobject.php';
	session_start();

	$config = new ConfigLoader("../config.ini");
	
	dibi::connect(array(
		'driver'=>$config->mysql->driver,
		'username'=> $config->mysql->username,
		'password'=> $config->mysql->password,
		'host'=>(preg_match('/(www.)?apartments-barbora.com/', $_SERVER['SERVER_NAME']) == true ? 'wm8.wedos.net' : 'localhost'),
		'database'=> $config->mysql->database,
		'charset'=> $config->mysql->charset
	));
	
	$app_manager = ApplicationManager::instance();
	$app_manager->register(new Application("index", array(new Application("auth"), new Application("gallery"), new Application("page"), new Application("contact"), new Application("menu"), new Application("book"))));

	$controller = new Controller();
	Presenter::$controller = $controller;
	$controller->run();
	BQueue::dump('utf-8');
?>
