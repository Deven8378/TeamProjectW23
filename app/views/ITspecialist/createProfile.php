<?php $this->view('shared/header','Create Profile'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	<!-- <h2>create profile for <?=$data->username?></h2> -->
	<p class="sign" align="center">Welcome Sweemory Team!</p>
	<p class="loginH" align="center">Create a profile for the <?=$data->username?></p>
	<form method="post" action="" class="form1">
		<input class="" type="text" align="center" placeholder="first_name" name="first_name">
		<input class="" type="text" align="center" placeholder="middle_name" name="middle_name">
		<input class="" type="text" align="center" placeholder="last_name" name="last_name">
		<input class="" type="text" align="center" placeholder="email" name="email">
		<input class="" type="text" align="center" placeholder="phone_number" name="phone_number">
		
		<br>
		<select name="status" id="status">
			<option selected disabled>--Select a User Status--</option>
			<option value="active" name="active">active</option>
			<option value="inactive" name="inactive">inactive</option>
		</select>

		<br>

		<input type="submit" id="submitLink" name="action" class="submit" align="center" value="Create Profile">
	</form>
</div>




<?php $this->view('shared/footer'); ?>