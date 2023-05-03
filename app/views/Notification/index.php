<?php $this->view('shared/header', "Read your Notifications"); ?>

<?php var_dump($data) ?>
<div>
	<form action='' method='post' enctype="multipart/form-data">

		<input class="submitUser" type="submit" align="" placeholder="<?=_('Get Notifications')?>" name="action">
	 
	</form>

	<table class="table table-hover">
	  	<thead>
	    	<tr>
	      	<th scope="col">ID</th>
	      	<th scope="col">Notify Type</th>
	      	<th scope="col">Time</th>
	    	</tr>
	  	</thead>

	  	<tbody>
			<?php 
				foreach ($data as $notifiation) {
					echo 
					"<tr>
			      		<td>$notifiation->notify_id</td>
			      		<td>$notifiation->notify_type</td>
			      		<td>$notifiation->timestamp</td>
			    	</tr><br>";
				}
			?>
		</tbody>
	</table>
</div>


<?php $this->view('shared/footer'); ?>
