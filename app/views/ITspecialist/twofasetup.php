<?php $this->view('shared/header','2 Factor Authentication'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>
<?php
$user = new \app\models\User();
$user = $user->getSecretKey();
$checkKey = $user->secret_key;
?>

<style> 
#qr {
 	display: block;
  	margin-left: auto;
  	margin-right: auto;
  	width: 30%;
}

#verify {
	margin-top: 20px;
	text-align: center; 
}
</style>
		<div class="main">
			<?php if (empty($checkKey)) { ?>
				<br>
		<img id="qr" src="/User/makeQRCode?data=<?=$data?>"/> <br>
			Please scan the QR-code with an authenticator app, such as Google Authenticator.<br>
	<?php } ?>
	<br>
			 <br> Please enter the code you have received on your autenticator app.
		<form method="post" action="">
			<label>Current code:<input type="text" name="currentCode"/>
	</label>
		<div id="verify">
			<input class="btn-general" type="submit" name="action" value="Verify code" />
		</div>
	</form>
</div>

