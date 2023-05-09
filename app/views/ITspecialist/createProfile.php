<?php $this->view('shared/header', _('Create Profile')); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="createProfile" align="center">

	<p class="sign" align="center"><?= _('Create a profile for ') ?> <?= $data->username ?></p>
	<form method="post" action="" class="form1">
		<input class="createInput" type="text" align="center" placeholder="<?= _('First Name') ?>" name="first_name">
		<input class="createInput" type="text" align="center" placeholder="<?= _('Middle Name') ?>" name="middle_name">
		<input class="createInput" type="text" align="center" placeholder="<?= _('Last Name') ?>" name="last_name">
		<input class="createInput" type="email" align="center" placeholder="<?= _('Email') ?>" name="email">
		<input class="createInput" type="tel" pattern="[0-9]{10}" align="center" placeholder="<?= _('Phone Number') ?>" name="phone_number">
		
		<br>
		<select name="status" id="status" class="dropdownUserType">
			<option selected disabled><?= _('--Select a User Status--') ?></option>
			<option value="active" name="active"><?= _('Active') ?></option>
			<option value="inactive" name="inactive"><?= _('Inactive') ?></option>
		</select>

		<br>

		<input type="submit" id="submitLink" name="action" class="submitUser" align="center" value="<?= _('Create Profile') ?>">
		<br>
		<a class="btn" href="/ITspecialist/index"><?= _('Back') ?></a>
	</form>
</div>




<?php $this->view('shared/footer'); ?>