<?php $this->view('shared/header','Create Profile'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="createProfile" align="center">

	<p class="sign" align="center"><?= _('Create a profile for ') ?> <?= $data->username ?></p>
	<form method="post" action="" class="form1">
		<input class="createInput" type="text" align="center" placeholder="first_name" name="first_name">
		<input class="createInput" type="text" align="center" placeholder="middle_name" name="middle_name">
		<input class="createInput" type="text" align="center" placeholder="last_name" name="last_name">
		<input class="createInput" type="email" align="center" placeholder="email" name="email">
		<input class="createInput" type="text" align="center" placeholder="phone_number" name="phone_number">
		
		<br>
		<select name="status" id="status" class="dropdownUserType">
			<option selected disabled><?= _('--Select a User Status--') ?></option>
			<option value="active" name="active"><?= _('Active') ?></option>
			<option value="inactive" name="inactive"><?= _('Inactive') ?></option>
		</select>

		<br>

		<input type="submit" id="submitLink" name="action" class="submitUser" align="center" value="Create Profile">
		<br>
		<a class="btn" href="/ITspecialist/index"><?= _('Back') ?></a>
	</form>
</div>




<?php $this->view('shared/footer'); ?>