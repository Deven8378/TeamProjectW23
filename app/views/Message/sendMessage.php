<?php $this->view('shared/header', _('Send a Message')); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div style="margin-left: 100px; margin-top: 50px;">
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