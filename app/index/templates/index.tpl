<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="{$lang}">
	<meta name="description" content="{$description}" />
	<meta name="author" content="Mato Kolesar" />
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
	
	<title>Pension Barbora | {$page_title}</title>
</head>

<body>
<div class="bar1">
	<div class="page-body">
		<div class="head">
			<div class="logo">
				<img src="/img/logo.png" alt="Pension Barbora | {$page_title}" title="Pension Barbora | {$page_title}" />
			</div>
			<div class="banner">
				<img src="/img/banner_photo_1.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_2.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_3.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_4.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_5.png" alt="Photo of Prague city" />
				<img src="/img/banner_photo_5.png" alt="Photo of Prague city" />
			</div>
			<div class="langbox">
			{call_app app='menu' method='generate_language_menu' param="lang=$lang,id=$select_id"}
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<table class="page-content" border="0">
		<tr>
			<td valign="top" class="menu">
				{call_app app='menu' method='generate_menu' param="lang=$lang,id=$select_id"}
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
					{call_app app='book' method='quick_book_form' param="lang=$lang"}	
				</div>
				<div class="w-contact">
					{call_app app='contact' method='quick_contact' param="lang=$lang"}
				</div>
			</td>
		</tr>
		<tr>
			<td class="empty">
				<!-- Nothing is here. -->
			</td>
			<td valign="top" class="content vtop">
                                {get_message id='index_error'}
				{call_app app=$app method=$method param="$param,lang=$lang"}
				<div class="footer">
					<img src="/img/line.png" alt="Horizontal line" />
					<center>
					<b>Copyright &copy; 2012 Pension Barbora, All rights reserved.</b><br />
					Web Design and Web Development by Petr Babicka & Martin Kolesar | <a href="/project_info.html" target="_blank"><b>more info</b></a>
					<center>
				</div>
			</td>
			<td valign="top" class="widgets">
				<!-- weather and exchange widget -->			
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
{debug_info}
</div>
</body>
</html>
