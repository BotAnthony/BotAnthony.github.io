<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 20:22:55
  from 'D:\public_html\TPs\TP4\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7f79f8f7ce5_51709153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05553cc4215ec233a41309ecd47d99e0d92f8320' => 
    array (
      0 => 'D:\\public_html\\TPs\\TP4\\templates\\index.tpl',
      1 => 1606932954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc7f79f8f7ce5_51709153 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>
   </head>
    <body>
        <h1>Route : index</h1>
        
        
        <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>         <p>Vous êtes en connecté en tant que <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</p>
        <a href="./profil">Mon profil</a>
        <a href="./logout">se déconnecter</a>
        <?php } else { ?>
        <a href="./register">s'enregistrer</a>
        <a href="./login">se connecter</a>
        <?php }?>

        

    
   </body>
</html><?php }
}
