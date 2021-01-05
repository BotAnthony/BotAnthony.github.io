<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 16:10:25
  from 'D:\public_html\TPs\TP4\templates\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7bc7149c957_20775860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69b38970001c8940ee750b2df4bf2a299996aa2e' => 
    array (
      0 => 'D:\\public_html\\TPs\\TP4\\templates\\profil.tpl',
      1 => 1606925419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc7bc7149c957_20775860 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
   </head>
    <body>
        <h1>Profil: <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</h1>
        <p>Votre mail est <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
        <a href="./">Accueil<a>


    
   </body>
</html><?php }
}
