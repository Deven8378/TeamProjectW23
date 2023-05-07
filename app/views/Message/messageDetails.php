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
		margin-top: 50px;
		width: 50%;
	}
</style>



<div class="centeringPage">
	<div class="wrapping" style="margin: 25px;">
		<?php if($data->receiver == $_SESSION['user_id']) {?>
			<a class="btn-general" href='/Message/delete/<?= htmlentities($message->message_id) ?>'>
				<i class="bi bi-x"></i>
				<?= _('Delete') ?>
			</a>
		<?php } ?>

		<p style="font-weight: bold;">From: <?= $data->sender_full_name ?></p>	
		<p style="font-weight: bold;">To: <?= $data->receiver_full_name ?></p>
		<p style="font-size: 12px;"><?= $data->timestamp ?></p>
		<p style="word-wrap: break-word;"><?= $data->message ?></p>

	</div>
</div>

<?php $this->view('shared/footer') ?>