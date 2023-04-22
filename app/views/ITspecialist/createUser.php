<?php $this->view('shared/header','Create User'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	<p class="sign" align="center"><?=_('Welcome Sweemory Team!')?></p>
	<p class="loginH" align="center"><?=_('Create a new user')?></p>
	<form method="post" action="" class="form1">
		<input class="username" type="text" align="center" placeholder="<?=_('Username')?>" name="username">
		<input class="password" type="password" align="center" placeholder="<?=_('Password')?>" name="password">
		<br>

		<div align="center">
			<select name="user_type" id="user_type" >
				<option selected disabled>--<?=_('Select a User Type')?>--</option>
				<option value="admin" name="admin">Admin</option>
				<option value="employee" name="employee">Employee</option>
			</select>
		</div>
		<br>

		<input type="submit" id="submitLink" name="action" class="submit" align="center" value="<?= _('Create User')?>">
		<a href="/ITspecialist/index">Back</a>
	</form>
</div>




<?php $this->view('shared/footer'); ?>