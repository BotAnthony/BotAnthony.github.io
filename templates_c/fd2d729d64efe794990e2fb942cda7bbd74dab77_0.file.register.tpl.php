<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 14:28:02
  from 'D:\public_html\TPs\TP4\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7a472d72ed5_61716116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd2d729d64efe794990e2fb942cda7bbd74dab77' => 
    array (
      0 => 'D:\\public_html\\TPs\\TP4\\templates\\register.tpl',
      1 => 1606919279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc7a472d72ed5_61716116 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
<p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<form action="register" method="post">
    <p> <label>Nom</label><input type="text" name="nom" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nom']->value)===null||$tmp==='' ? '' : $tmp);?>
"></p>
    <p><label>Email</label><input type="email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
"></p>
    <p><label>Mot de passe</label><input type="password" name="passe"></p>
    <p><input type="submit"></p>
</form><?php }
}
