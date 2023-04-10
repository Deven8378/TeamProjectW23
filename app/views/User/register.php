<?php $this->view('shared/header','Welcome Sweemory Team!!'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	<p class="sign" align="center">Welcome Sweemory Team!</p>
	<p class="loginH" align="center">Register to access your account</p>
	<form method="post" action="" class="form1">
		<input class="username" type="text" align="center" placeholder="Username" name="username">
		<input class="password" type="password" align="center" placeholder="Password" name="password">
		<input type="submit" id="submitLink" name="action" class="submit" align="center" value="Sign in">
	</form>
</div>


<?php 
	// if($data->user_type == "admin"){ ?>
		<!-- <h1>Welcome Admin</h1> -->
	<?php } else if ($data->user_type == "itspecialist"){ ?>
		<!-- <h1>Welcome IT specialist</h1> -->
	<?php } else { ?>
		<!-- <h1>Welcome Employee</h1> -->
	<?php }
?>
<?php $this->view('shared/footer'); ?>