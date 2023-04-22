<?php $this->view('shared/header','Create Profile'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	<h2>create profile</h2>
	<p class="sign" align="center">Welcome Sweemory Team!</p>
	<p class="loginH" align="center">Create a profile for the User</p>
	<form method="post" action="" class="form1">
		<input class="username" type="text" align="center" placeholder="Username" name="username">
		<input class="password" type="password" align="center" placeholder="Password" name="password">
		<br>


		<select name="user_type" id="user_type">
			<option selected disabled>--Select a User Type--</option>
			<option value="admin" name="admin">Admin</option>
			<option value="employee" name="employee">Employee</option>
			<option value="itspecialist" value="itspecialist">IT Specialist</option>
		</select>

		<br>

		<input type="submit" id="submitLink" name="action" class="submit" align="center" value="Register">
	</form>
</div>




<?php $this->view('shared/footer'); ?>