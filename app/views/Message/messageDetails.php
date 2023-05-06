<?php $this->view('shared/header', "Read your Message"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">
	.griding {
	  display: inline-grid;
	  grid-template-columns: auto auto;
	  padding: 50px;
	  column-gap: 50px;
	  row-gap: 50px;
	}

	.griding-item {
	  font-size: 30px;
	  text-align: center;
	}

	.centeringPage {
		border: 2px solid gainsboro;
		background-color: ghostwhite;
		border-radius: 10px;
		margin: auto;
		margin-top: 50px;
		width: 50%;
	}
</style>



<div class="centeringPage">
	<div style="margin: 25px;">
		<p style="font-weight: bold;">From: <?= $data->sender_full_name ?></p>	
		<p style="font-weight: bold;">To: <?= $data->receiver_full_name ?></p>
		<p style="font-size: 12px;"><?= $data->timestamp ?></p>
		<p><?= $data->message ?></p>
	</div>
</div>

<?php $this->view('shared/footer') ?>