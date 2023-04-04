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

<?php $this->view('shared/footer'); ?>