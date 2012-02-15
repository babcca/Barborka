<?php /* Smarty version Smarty-3.0.7, created on 2012-02-15 00:52:37
         compiled from "H:\Mago\WebPages\Pension_Barbora_CZ\web\lib/../app/menu/templates\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200534f3af3c5622f98-34454302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b176804fa5badd4e5536ad8319929945897f8944' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora_CZ\\web\\lib/../app/menu/templates\\menu.tpl',
      1 => 1329263531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200534f3af3c5622f98-34454302',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="cufon-menu">
	<?php  $_smarty_tpl->tpl_vars['menu_item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['menu_item']->key => $_smarty_tpl->tpl_vars['menu_item']->value){
?>
		<a href="/<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['lang'];?>
/<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['uri'];?>
/"><div class="menu-item"><?php echo $_smarty_tpl->tpl_vars['menu_item']->value['menu_title'];?>
</div></a>
	<?php }} ?>
</div>