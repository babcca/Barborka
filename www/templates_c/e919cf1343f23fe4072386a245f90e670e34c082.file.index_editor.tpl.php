<?php /* Smarty version Smarty-3.0.7, created on 2011-08-16 01:53:24
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/index/templates\index_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293994e49b174b6f8e3-99761552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e919cf1343f23fe4072386a245f90e670e34c082' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/index/templates\\index_editor.tpl',
      1 => 1313451705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293994e49b174b6f8e3-99761552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'H:\Mago\WebPages\Pension_Barbora\web\lib\smarty\plugins\function.html_options.php';
?><style>
	label {
		width: 200px;
		display: inline-block;
	}
</style>
<div>
	<h1>Nastaveni optimalizace SEO</h1>
	<p>Vetsina prohlizecu ignuruje keywords v hlavicce dokumentu,
	ale nastesti se obcas dava duraz na text v description u
	jednotlivych stranek (vetsinou se zobrazuje pri odkazu), 
	na titulek u jednotlivych stranek a na adresu jednotlivych stranek.
	A vsechny tyto udaje si muzete menit.</p>
	<label>Vyberte prosim stranku:</label>
	<select id="page_selector">
	<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->getVariable('pages')->value),$_smarty_tpl);?>

	</select>
	<hr />
	<?php echo smarty_function_get_message(array('id'=>"index_editor",'timeout'=>5000),$_smarty_tpl);?>

	<form action="" method="post">
	<label>Titulek stranky (v liste): </label> <input type="text" name="page_title" value="" /><br />
	<label>Adresa uri stranky: </label> <input type="text" name="uri" value="" /><br />
	<label>Popis stranky (max 150 znaku)</label><br />
	<textarea name="description" cols="37" rows="8"></textarea>
	<div style="text-align: right">
		<input type="hidden" name="app" value="index" />
		<input type="hidden" name="method" value="index_update_data" />
		<input type="hidden" name="id" value="" />
		<input type="submit" value="Aktualizuj data" />
	</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		get_data();
	} );
	
	$("#page_selector").change(function () {
		get_data();
	} );
	function get_data() {
		var data = { app:'index', method:'get_data', 'page_id': $("#page_selector :selected").val() } ;
		$.post('/ajax.php', data, function (result) {
			for (var name in result) {
				$("[name="+name+"]").val(result[name]);
			}
		} ,'json');
	}
</script>