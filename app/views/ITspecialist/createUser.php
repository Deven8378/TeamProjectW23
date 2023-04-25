<?php $this->view('shared/header','Create User'); ?>
<?php $this->view('shared/navigation/itnav'); ?>

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
			<a class="btn" href="/ITspecialist/index"><?=_('Back')?></a>
		</form>
	</div>
<!-- </div> -->


<?php $this->view('shared/footer'); ?>