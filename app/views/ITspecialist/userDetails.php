<?php $this->view('shared/header', _('User Profile')); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="userDetails">
    
    <div class="alert" style="background-color: rgb(216,212,212);">
  		<h3><?= _('Profile Page:') ?> <?= $data->username ?> <?= $data->user_id ?></h3>
    </div>

    <dl class="dl-viewUserDetails">
		
		<!-- Left side -->
    	<div style="flex: 30%;" >

    		<div class="col-4">
	        	<a href="/ITspecialist/index" type="submit" class="btn-general"><?=_('Back')?></a>
		  	</div>
			
			<div style="border-radius: 100%; height: 230px;" align="center">
				<?php
					if($data->user_type == 'admin'){
						echo "<img src='/images/adminImage.png' style='height: 230px;'>";
					}else{
						echo "<img src='/images/employeeImage.png' style='height: 230px;'>";
					}
				?>
			</div>

			<div >
				<div>
	        		<dt class="dt-label"><?=_('ID')?></dt>
	        		<dd class="dd-left"><?= $data->user_id ?></dd>
	        	</div>
	        	<div >
	        		<dt class="dt-label"><?=_('Username')?></dt>
	        		<dd class="dd-left"><?= $data->username?></dd>
	        	</div>
	        	<div >
	        		<dt  class="dt-label"><?=_('Password')?></dt>
	        		<dd  class="dd-left"><?= $data->password_hash ?></dd>
	        	</div>
	        </div>
			
			
          	

		</div>
	    <!-- Right side -->      	
      	<div style="flex: 70%; " >

	            	<dt class="dt-label"> <?= _('First Name')?> </dt>
	            	<dd class="dd-right"><?= $data->first_name ?></dd>

	            	<dt class="dt-label"><?=_('Middle Name')?></dt>
	            	<dd class="dd-right"><?= $data->middle_name ?></dd>

	            	<dt class="dt-label"><?=_('Last Name')?></dt>
	            	<dd class="dd-right"><?= $data->last_name ?></dd>

	            	<dt class="dt-label"><?=_('Email')?></dt>
	            	<dd class="dd-right"><?= $data->email?></dd>

	            	<dt class="dt-label"><?=_('Phone Number')?></dt>
	            	<dd class="dd-right"><?= $data->phone_number ?></dd>

	            	<dt  class="dt-label"><?=_('Status')?></dt>
	            	<dd  class="dd-right"><?= $data->status ?></dd>

        	<div class="">
            	<a class="btn-general" href="/ITspecialist/edit/<?= $data->user_id ?>" ><?=_('Edit')?></a>
	            <a class="btn-general" href="#popup" role="button"><?= _('Delete') ?></a>
          	</div>
		</div>
    </dl>

	</div>
	<div class="overlay" id="popup">
	  <div class="wrapper">
	      <h2><?= _('Confirmation') ?></h2><a class="close" href="/ITspecialist/userDetails/<?=$data->user_id?>">&times;</a>
	      <div class="content">
	          <div class="container">
	              <form  method="post" action="">
	                  	<label>Are you certain you want to delete this user?</label>
	                  	<div align="center">
	                  		<a href="/ITspecialist/userDetails/<?=$data->user_id?>" class="btn" style="background-color: #e8c8e7;" ><?=_('Cancel')?></a>
	            			<a href="/ITspecialist/delete/<?= $data->user_id ?>" class="btn" style="background-color: #e8c8e7;" ><?=_('Delete')?></a>
            			</div>
	              </form>
	          </div>
	      </div>
	  </div>
	</div>

<?php $this->view('shared/footer'); ?>