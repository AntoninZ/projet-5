<?php
/* Smarty version 3.1.33, created on 2018-11-28 13:54:11
  from 'D:\wamp64\www\projet-5\templates\User\UserHome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfe9e031c1333_76906880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31a30175d6bcbc3394244152b8f2ab9e1948e63e' => 
    array (
      0 => 'D:\\wamp64\\www\\projet-5\\templates\\User\\UserHome.tpl',
      1 => 1543413249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfe9e031c1333_76906880 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="UserHome">
    <article>
	<form>
	    <div>
		<label for="username">Pseudo :</label>
		<input type="text" id="username" value="<?php echo $_SESSION['username'];?>
">
	    </div>
	    <div>
		<label for="password">Modifier votre mot de passe :</label>
		<input type="password" id="password">
	    </div>
	    <div>
		<label for="passwordCheck">Confirmation mot de passe :</label>
		<input type="password" id="passwordCheck">
	    </div>
	    <button type="submit" id="btnUpdateUser">Sauvegarder changement</button>
	</form>
    </article>
</section><?php }
}
