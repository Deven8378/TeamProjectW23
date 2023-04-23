<?php $this->view('shared/header','Create User'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<!-- <div class="createUser" style="border:1px solid black;">
	
	<p class="sign" align="center"><?=_('Create a new user')?></p>
	<form method="post" action="" class="form1">
		<input class="createUsername" type="text" align="center" placeholder="<?=_('Username')?>" name="username">
		<input class="createUsername" type="password" align="center" placeholder="<?=_('Password')?>" name="password">
		<br>

		<div align="center">
			<select name="user_type" id="user_type"  class="form-select " style="">
				<option selected disabled>--<?=_('Select a User Type')?>--</option>
				<option value="admin" name="admin">Admin</option>
				<option value="employee" name="employee">Employee</option>
			</select>
		</div>
		<br>

		<input type="submit" id="submitLink" name="action" class="submit" align="center" value="<?= _('Create User')?>">
		<a href="/ITspecialist/index">Back</a>
	</form>
</div> -->

<!-- <div class="container" style=""> -->
	<div class="createUser" align="center">

		<p class="sign" align="center"><?=_('Create a new user')?></p>
		<form method="post" action="" class="form1" style="" >

			<!-- <label>Username:</label> -->
			<input class="createInput" type="text" align="" placeholder="<?=_('Username')?>" name="username">

			<!-- <label>Password:</label> -->
			<input class="createInput" type="password" align="center" placeholder="<?=_('Password')?>" name="password">

			<!-- <div align="center" style="align-items: center;"> -->
				<select name="user_type" id="user_type"  class="dropdownUserType" style="">
					<option selected disabled>--<?=_('Select a User Type')?>--</option>
					<option value="admin" name="admin">Admin</option>
					<option value="employee" name="employee">Employee</option>
				</select>
			<!-- </div> -->
			

			<input type="submit" id="submitLink" name="action" class="submitUser" align="" value="<?= _('Create User')?>">
			<br>
			<a href="/ITspecialist/index">Back</a>
		</form>
	</div>
<!-- </div> -->


<?php $this->view('shared/footer'); ?>