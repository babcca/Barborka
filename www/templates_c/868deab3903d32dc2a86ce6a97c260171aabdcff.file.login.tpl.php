<?php /* Smarty version Smarty-3.0.7, created on 2011-08-18 20:43:29
         compiled from "H:\Mago\WebPages\Pension_Barbora\web\lib/../app/auth/templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120074e4d5d51862850-01120361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '868deab3903d32dc2a86ce6a97c260171aabdcff' => 
    array (
      0 => 'H:\\Mago\\WebPages\\Pension_Barbora\\web\\lib/../app/auth/templates\\login.tpl',
      1 => 1313692900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120074e4d5d51862850-01120361',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<head>
<style>
	label {
		display:inline-block;
		width: 70px;
	}
	.login-form {
		width: 250px;
		margin-left:auto;
		margin-right:auto;
	}
</style>
</head>
<body>
<div class="login-form">
<?php echo smarty_function_get_message(array('id'=>'auth_info','timeout'=>5000),$_smarty_tpl);?>

<form action="" method="post">
<input type="hidden" name="app" value="auth" />
<input type="hidden" name="method" value="login" />
<label>E-mail</label><input type="text" name="email" /><br />
<label>Heslo</label><input type="password" name="password" /><br />
<div style="text-align: right"><input type="submit" value="Login" /></div>	
</form>
</div>
</body>
</html>