<?php /* Smarty version Smarty-3.0.7, created on 2012-02-15 14:47:43
         compiled from "H:\Mago\WebPages\Pension_Barbora_CZ\web\lib/../app/index/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105504f3bb77f0a50e9-88011350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8c7307c1756344c04d2e22ccca461fd074cf69f' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora_CZ\\web\\lib/../app/index/templates\\index.tpl',
      1 => 1329313659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105504f3bb77f0a50e9-88011350',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="<?php echo $_smarty_tpl->getVariable('lang')->value;?>
">
	<meta name="description" content="<?php echo $_smarty_tpl->getVariable('description')->value;?>
" />
	<meta name="author" content="Petr Babicka,Martin Kolesar" />
	<link rel="shortcut icon" href="/img/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="/css/default.css" />
	<link rel="stylesheet" type="text/css" href="/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="/css/humanity/jquery-ui-1.8.17.custom.css" />
	<link rel="stylesheet" type="text/css" href="/css/gallery.css" />
	<link rel="stylesheet" type="text/css" href="/css/contact.css" />
	<link rel="stylesheet" type="text/css" href="/css/book.css" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/jquery.zweatherfeed.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/tipsy.css" media="screen" />
	
	<script src="/js/jquery.js" type="text/javascript"></script>
	<script src="/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/js/jquery.lightbox-0.5.js" type="text/javascript"></script>
	<script src="/js/jquery.zweatherfeed.js" type="text/javascript"></script>
	<script src="/js/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>	
	<script src="/js/cufon.js" type="text/javascript"></script>
	<script src="/js/font.js" type="text/javascript"></script>
	<script src="/js/init.js" type="text/javascript"></script>
	<script src="/js/slider.js" type="text/javascript"></script>
	<script src="/js/jquery.tipsy.js" type="text/javascript"></script>
	
	<title>Pension Barbora | <?php echo $_smarty_tpl->getVariable('page_title')->value;?>
</title>
</head>

<body>
<div class="bar1">
	<div class="page-body">
		<div class="head">
			<div class="logo">
				<img src="/img/logo.png" alt="Pension Barbora | <?php echo $_smarty_tpl->getVariable('page_title')->value;?>
" title="Pension Barbora | <?php echo $_smarty_tpl->getVariable('page_title')->value;?>
" />
			</div>
			<div class="banner">
				<img src="/img/banner_photo_1.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_2.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_3.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_4.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_5.png" alt="Photo of Prague city" />
			</div>
			<div class="langbox">
			<?php echo smarty_function_call_app(array('app'=>'menu','method'=>'generate_language_menu','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value).",id=".($_smarty_tpl->getVariable('select_id')->value)),$_smarty_tpl);?>

			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<table class="page-content" border="0">
		<tr>
			<td valign="top" class="menu">
				<?php echo smarty_function_call_app(array('app'=>'menu','method'=>'generate_menu','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value).",id=".($_smarty_tpl->getVariable('select_id')->value)),$_smarty_tpl);?>

			</td>
			<td valign="top" class="slideshow">
				<div class="slideshow-images">
					<div id="slider">
					   <ol id="sliderContent">
					      <li class="sliderImage">
					         <img src="/img/slider/01.jpg" alt="xxx"/>
					      </li>
					      <li class="sliderImage">
					         <img src="/img/slider/02.jpg" alt="xxx"/>
					      </li>
						  <li class="sliderImage">
					         <img src="/img/slider/03.jpg" alt="xxx"/>
					      </li>
						  <li class="sliderImage">
					         <img src="/img/slider/04.jpg" alt="xxx"/>
					      </li>
						  <li class="sliderImage">
					         <img src="/img/slider/05.jpg" alt="xxx"/>
					      </li>
					   </ol>
					</div>  
				</div>
			</td>
			<td valign="top" class="widgets">
				<div class="w-booking">
					<?php echo smarty_function_call_app(array('app'=>'book','method'=>'quick_book_form','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value)),$_smarty_tpl);?>
	
				</div>
				<div class="w-contact">
					<?php echo smarty_function_call_app(array('app'=>'contact','method'=>'quick_contact','param'=>"lang=".($_smarty_tpl->getVariable('lang')->value)),$_smarty_tpl);?>

				</div>
			</td>
		</tr>
		<tr>
			<td class="empty">
				<!-- Nothing is here -->
			</td>
			<td colspan="2" class="content vtop">
				<?php echo smarty_function_call_app(array('app'=>$_smarty_tpl->getVariable('app')->value,'method'=>$_smarty_tpl->getVariable('method')->value,'param'=>($_smarty_tpl->getVariable('param')->value).",lang=".($_smarty_tpl->getVariable('lang')->value)),$_smarty_tpl);?>

				<div class="footer">
					<img src="/img/line.png" alt="Horizontal line" />
					<center>
					<b>Copyright &copy; 2011 Pension Barbora, All rights reserved.</b><br />
					Web Design and Web Development by Petr Babicka & Martin Kolesar | <a href="/project_info.html" target="_blank"><b>more info</b></a>
					<center>
				</div>
			</td>			
		</tr>
	</table>
</div>

<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9724354-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<div class="debug_panel">
<?php echo smarty_function_debug_info(array(),$_smarty_tpl);?>

</div>
</body>
</html>