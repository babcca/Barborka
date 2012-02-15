<?php 
	
	require_once dirname(__file__).'/../lib/controller.php';
	require_once dirname(__file__).'/../lib/application_manager.php';
	require_once dirname(__file__).'/../lib/render.php';
	require_once dirname(__file__).'/../lib/dibi/dibi.php';
	define("DEBUG_MODE", 1);

	require_once dirname(__file__).'/../lib/aobject.php';
	class Timer extends AObject {
		private $b;
		public function __construct() {
			parent::__construct(__CLASS__);
		}
		public function start() {
			$this->b = microtime(null);
		}
		public function stop() {
			$this->debug(microtime() - $this->b);
		}
	}
	dibi::connect(array(
		'driver'=>'mysql',
		'username'=> 'w6811_barbora',
		'password'=>'Kverty246',
		'host'=>(preg_match('/(www.)?apartments-barbora.com/', $_SERVER['SERVER_NAME']) == true ? 'wm8.wedos.net' : 'localhost'),
		'database'=>'d6811_barborka',
		'charset'=>'utf8'
	));
	/*
	 * %string|%sql|%html
	 * retezec|sql_retezec|upravene_html
	 * %num|%pnum|%nnum 
	 * cislo|kladne_cislo|zaporne_cislo
	 */
	/*
	function check_param($param, $pattern) {
			if (preg_match("&^%\{((\w+)((, ?\w+)*))\}&", $pattern, $enum)) {
				return array_search($param, explode(",", $enum[1])) !== false;
			} else if (preg_match("&^%<(.*)>&", $pattern, $fn)) {
				return $fn[1]($param) == true;
			} else if (preg_match("&^%\((.*)\)&", $pattern, $regexp)) {
				return preg_match("&^{$regexp[1]}$&", $param) == true;
			} else return false;
	}
	$url = "app=basic_page/method=clanek/id=%([a-z-]{2})/order=%{asc,desc}[asc]";
	$url = explode('/', $url);
	$ret = array();
	foreach ($url as $u) {
		$out = explode('=', $u);
		$ret[$out[0]] = $out[1];
	}
	echo $_GET['page'];
	$uri = explode('/', $_GET['page']);
	$pattern = array_keys($ret);
	for ($i = 0; $i < count($uri); ++$i) {
		echo check_param($uri[$i], $pattern[$i]);
	}
	
	$param = array("%<replace>", "%([[:alnum:]])", "%{cz,sk,ru}");
	$url = array("ahojky","12", "sk");
	*/
	function replace($str) { return "ahoj"; }

	/**
	 * Apply function on pairs of two arrays
	 * @param $array1 first array
	 * @param $array2 second array
	 * @param $fn zip function
	 * @return array of returned function
	 */
	function array_zip_with(array $array1, array $array2, $fn) {
		$size = count($array1); //min(length($array1), length($array2));
		$out = array();
		for ($i = 0; $i < $size; ++$i) {
			$out[] = $fn($array1[$i], $array2[$i]);
		}
		return $out;
	}

	function check($pattern, $param) {
		// get function
		preg_match("#^%<(.*)>#", $pattern, $fn);
		$ret = $fn[1]($param);
		if ($ret) {	return $ret; }
		else { return "not match"; }

	}
	//$pairs = array_zip_with($param, $url, create_function('$a, $b', 'return check($a, $b);'));
	//var_dump($pairs);
	function parse($pattern) {
		preg_match('#\[(\w+)\]$#', $pattern, $default);
		preg_match("#^%\{((\w+)((, ?\w+)*))\}#", $pattern, $enum);
		preg_match("#^%<(.*)>#", $pattern, $fn);
		preg_match("#^%\((.*)\)#", $pattern, $regexp);
		var_dump($fn);var_dump($enum);var_dump($regexp);var_dump($default);
	}
	session_start();
	$app_manager = ApplicationManager::instance();
	$app_manager->register(new Application("index", array(new Application("auth"), new Application("gallery"), new Application("page"), new Application("contact"), new Application("menu"), new Application("book"))));

	$controller = new Controller();
	Presenter::$controller = $controller;
	$controller->run();
	BQueue::dump('utf-8');
?>