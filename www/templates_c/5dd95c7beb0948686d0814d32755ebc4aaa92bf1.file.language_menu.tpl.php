<?php /* Smarty version Smarty-3.0.7, created on 2012-02-14 23:06:10
         compiled from "H:\Mago\WebPages\Pension_Barbora_CZ\web\lib/../app/menu/templates\language_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149554f3adad2744af0-41720419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dd95c7beb0948686d0814d32755ebc4aaa92bf1' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora_CZ\\web\\lib/../app/menu/templates\\language_menu.tpl',
      1 => 1329257163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149554f3adad2744af0-41720419',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="language-bar">
	<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lang_link')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
?>
		<a href="/<?php echo $_smarty_tpl->tpl_vars['link']->value['lang'];?>
/<?php echo $_smarty_tpl->tpl_vars['link']->value['uri'];?>
/"><img src="/img/<?php echo $_smarty_tpl->tpl_vars['link']->value['lang'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['link']->value['lang'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['lang'];?>
" /></a>
	<?php }} ?>
</div>