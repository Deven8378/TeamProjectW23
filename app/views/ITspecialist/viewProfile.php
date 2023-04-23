<?php $this->view('shared/header','Create Profile'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="main">
	
	<div class="p-2">

			<dl>
				<dt>First Name</dt>
				<dd><?=$data->first_name?></dd>

				<dt>Last Name</dt>
				<dd><?=$data->last_name?></dd>

				<dt>Middle Name</dt>
				<dd><?=$data->middle_name?></dd>

			</dl>
		</div>
	
</div>




<?php $this->view('shared/footer'); ?>