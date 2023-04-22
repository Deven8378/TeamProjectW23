<?php $this->view('shared/header','IT Home Page'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="p-4 mt-5 border d-flex">

	<div class="border">
		filters
		
	</div>
	<div class="spacer" style="width: 8px; flex-shrink: 0; margin: 0; padding: 0;"></div>

	<div class="border">
		
		<h2><?= $data->user_type ?> landing page</h2>

		list of Employees and admins

	</div>

	
</div>
<?php $this->view('shared/footer'); ?>
