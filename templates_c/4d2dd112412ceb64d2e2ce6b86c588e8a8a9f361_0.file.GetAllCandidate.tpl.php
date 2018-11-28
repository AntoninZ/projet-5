<?php
/* Smarty version 3.1.33, created on 2018-11-28 13:42:26
  from 'D:\wamp64\www\projet-5\templates\Candidate\GetAllCandidate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfe9b42554c37_85260936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d2dd112412ceb64d2e2ce6b86c588e8a8a9f361' => 
    array (
      0 => 'D:\\wamp64\\www\\projet-5\\templates\\Candidate\\GetAllCandidate.tpl',
      1 => 1543412470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfe9b42554c37_85260936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\wamp64\\www\\projet-5\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<table class="dataTable">
    <thead>
	<tr>
	    <th>N°</th>
	    <th>Nom</th>
	    <th>Prénom</th>
	    <th>Date de naissance</th>
	    <th>Accéder</th>
	</tr>
    </thead>
    <tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['candidates']->value, 'candidate');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['candidate']->value) {
?>
	    <tr>
		<td></td>
		<td><?php echo $_smarty_tpl->tpl_vars['candidate']->value->getLastname();?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['candidate']->value->getFirstname();?>
</td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['candidate']->value->GetBirthDate(),"%d/%m/%Y");?>
</td>
		<td><a href="?page=candidates&amp;idCandidate=<?php echo $_smarty_tpl->tpl_vars['candidate']->value->GetIdCandidate();?>
"><i class="fas fa-external-link-alt"></i></a></td>
	    </tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
