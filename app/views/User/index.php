<?php $this->view('shared/header', _('Welcome Sweemory Team!')); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	<p class="sign" align="center"><?= _('Welcome Sweemory Team!') ?></p>
	<p class="loginH" align="center">
		<?= _('Please login to access your account') ?>
	</p>
	<form method="post" action="" class="form1">
		<input class="username" type="text" align="center" placeholder="<?= _('Username') ?>" name="username">
		<input class="password" type="password" align="center" placeholder="<?= _('Password') ?>" name="password">
		<input type="submit" id="submitLink" name="action" class="submit" align="center" value="<?= _('Sign in') ?>">
	</form>
</div>

<?php $this->view('shared/footer'); ?>