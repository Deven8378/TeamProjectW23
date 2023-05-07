<?php $this->view('shared/header','2 Factor Authentication'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>
		<div class="main">
		<img src="/User/makeQRCode?data=<?=$data?>"/> <br>
			Please scan the QR-code on the screen with your favorite
			Authenticator software, such as Google Authenticator.<br> The
			authenticator software will generate codes that are valid for 30
			seconds only. <br> Enter such a code while and submit it while it is
			still valid to confirm that the 2-factor authentication can be
			applied to your account.
		<form method="post" action="">
			<label>Current code:<input type="text" name="currentCode"/>
	</label>
			<input type="submit" name="action" value="Verify code" />
	</form>
</div>

