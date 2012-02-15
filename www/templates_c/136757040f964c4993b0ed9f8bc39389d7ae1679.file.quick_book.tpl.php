<?php /* Smarty version Smarty-3.0.7, created on 2012-02-15 02:25:28
         compiled from "H:\Mago\WebPages\Pension_Barbora_CZ\web\lib/../app/book/templates\quick_book.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158944f3b09885a8d14-17715148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '136757040f964c4993b0ed9f8bc39389d7ae1679' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora_CZ\\web\\lib/../app/book/templates\\quick_book.tpl',
      1 => 1329269125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158944f3b09885a8d14-17715148',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'H:\Mago\WebPages\Pension_Barbora_CZ\web\lib\smarty\plugins\function.html_options.php';
?><h1><?php echo $_smarty_tpl->getVariable('trans')->value['book_online'];?>
</h1>
<div style="">
<form class="quick-book-form" method="post" action="">
	<table border="0">
	<tr>
		<td colspan="2"><input readonly="readonly" class="text-input" type="text" id="date_from_quick" name="date_from_quick" value="check in" size="10" /></td>
	</tr>
	<tr>
		<td colspan="2"><input readonly="readonly" class="text-input" type="text" id="date_to_quick" name="date_to_quick" value="check out" size="10" /></td>
	</tr>
	<tr>
		<td>
			<label><?php echo $_smarty_tpl->getVariable('trans')->value['guests'];?>
</label>
		</td>
		<td>
			<?php echo smarty_function_html_options(array('values'=>array(1,2,3,4,5,0),'output'=>array(1,2,3,4,5,'more'),'name'=>'guests_quick'),$_smarty_tpl);?>

		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="book-button" value=""/>
		</td>
	</tr>
	</table>
	<input type="hidden" name="app" value="book" />
	<input type="hidden" name="method" value="redirect" />
	<input type="hidden" name="lang" value="<?php echo $_smarty_tpl->getVariable('lang')->value;?>
" />
</form>
</div>