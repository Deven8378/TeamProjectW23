<?php $this->view('shared/header','Welcome Sweemory Team!!'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	<p class="sign" align="center">Welcome Sweemory Team!</p>
	<p class="loginH" align="center">Please login to access your account</p>
	<form class="form1">
		<input class="username" type="text" align="center" placeholder="Username">
		<input class="password" type="password" align="center" placeholder="Password">
		<a id="submitLink" class="submit" align="center">Sign in</a>
	</form>
</div>

<?php $this->view('shared/footer'); ?>