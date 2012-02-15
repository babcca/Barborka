<?php /* Smarty version Smarty-3.0.7, created on 2012-02-13 08:43:35
         compiled from "H:\Mago\WebPages\Pension_Barbora_CZ\web\lib/../app/gallery/templates\gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:242034f38bf27ea9e82-00999551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84647823937c380eb97c5792bf2cfcbd3253520d' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora_CZ\\web\\lib/../app/gallery/templates\\gallery.tpl',
      1 => 1313041271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242034f38bf27ea9e82-00999551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1><?php echo $_smarty_tpl->getVariable('images')->value[0]['title'];?>
</h1>
<p><?php echo $_smarty_tpl->getVariable('images')->value[0]['text'];?>
</p>
<div id="gallery" class="gallery" >
   <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
?>
   <a href="/<?php echo $_smarty_tpl->tpl_vars['photo']->value['big'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['photo']->value['desc'];?>
" rel="lightbox[roadtrip]">
      <img src="/<?php echo $_smarty_tpl->tpl_vars['photo']->value['small'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['photo']->value['desc'];?>
" />
   </a>
   <?php }} ?>
</div>
