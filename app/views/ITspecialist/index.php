<?php $this->view('shared/header','IT Home Page'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div>
	<br><br><br><br>
	<h2>IT landing page</h2>
	User: <?= $data->user_type ?>
</div>
<?php $this->view('shared/footer'); ?>
