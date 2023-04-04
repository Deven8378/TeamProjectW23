<?php $this->view('shared/header','Home Feed'); ?>
<a class="btn btn-primary" href="/User/logout">Log Out</a>
<br><br>

<?php echo $data->user_type ?>

<?php 
	if($data->user_type == "admin"){ ?>
		<h1>Admin</h1>
	<?php } else if ($data->user_type == "itspecialist"){ ?>
		<h1>IT specialist</h1>
	<?php } else { ?>
		<h1>Employee</h1>
	<?php }
?>


<?php $this->view('shared/footer'); ?>
