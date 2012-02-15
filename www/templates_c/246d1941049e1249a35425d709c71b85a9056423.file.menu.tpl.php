<?php /* Smarty version Smarty-3.0.7, created on 2011-08-16 01:52:22
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/menu/templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:260474e49b13621b1f9-20444274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '246d1941049e1249a35425d709c71b85a9056423' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/menu/templates\\menu.tpl',
      1 => 1313451705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260474e49b13621b1f9-20444274',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="menu">
	<ol id="cufon-menu">
		<?php  $_smarty_tpl->tpl_vars['menu_item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['menu_item']->key => $_smarty_tpl->tpl_vars['menu_item']->value){
?>
			<li><a href="/<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['lang'];?>
/<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['uri'];?>
/"><?php echo $_smarty_tpl->tpl_vars['menu_item']->value['menu_title'];?>
</a></li>
		<?php }} ?>
	</ol>
</div>