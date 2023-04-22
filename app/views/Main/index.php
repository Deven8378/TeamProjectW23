<?php $this->view('shared/header','Home Feed'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<br><br><br>
<h2>Employee and admin landing page</h2>
User: <?= $data->user_type ?>

<?php $this->view('shared/footer'); ?>
