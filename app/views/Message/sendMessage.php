<?php $this->view('shared/header', "Read your Message"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">
	.centeringPage {
		flex-wrap: wrap;
		height: auto;
		border: 2px solid gainsboro;
		background-color: ghostwhite;
		border-radius: 10px;
		margin: auto;
		width: 50%;
	}
</style>

<div style="margin-left: 100px;margin-top: 50px;">
	<a href="/Message/index" class="btn-general" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
</div>

<div class="centeringPage">
	<div class="wrapping" style="margin: 25px;">
		<form  method="post" action="">
            <label><?= _('To') ?></label>
            <input placeholder="<?= _('Recipient') ?>" type="text" name="receiver" id="messageInput">
            <label><?= _('Message') ?></label> 
            <textarea placeholder="<?= _('Write something...') ?>" name="message" id="messageInput"></textarea>
            <input class="btn" type="submit" name="action" value='<?= _('Send') ?>' style="background-color: #e8c8e7;" id="messageSubmit">
        </form>
	</div>
</div>

<?php $this->view('shared/footer') ?>