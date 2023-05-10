<?php $this->view('shared/header', _('2-Factor Authentication')); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

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
<div class="main" style="  text-align: center;">
	<div class="" style="padding-top:  100px;">
		<?php if (empty($data[1])) { ?>
			<img id="qr" src="/User/makeQRCode?data=<?=$data[0]?>"/>
			<p><?= _('Please scan the QR-code with an authenticator app, such as Google Authenticator.') ?></p>
		<?php } ?>

		<p><?= _('Please enter the code you have received on your autenticator app.') ?></p>
	</div>
	<div class="">
		<form method="post" action="">
			<label>
				<?= _('Current code:') ?><input type="text" name="currentCode"/>
			</label>
			<div id="verify">
				<input class="btn-general" type="submit" name="action" value="<?= _('Verify code') ?>" />
			</div>
		</form>
	</div>
</div>

