<?php $this->view('shared/header','User Profile'); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="userDetails">
    
    <div class="alert" style="background-color: rgb(216,212,212);">
  		<h3><?= $data->username ?> <?= $data->user_id ?></h3>
    </div>

    <dl class="dl-viewUserDetails" style="">

	          	<!-- Left side -->
      	<div class="" style="flex: 70%; " >

	            	<dt class="dt-label"> <?= _('First Name')?> </dt>
	            	<dd class="dd-left"><?= $data->first_name ?></dd>

	            	<dt class="dt-label"><?=_('Middle Name')?></dt>
	            	<dd class="dd-left"><?= $data->middle_name ?></dd>

	            	<dt class="dt-label"><?=_('Last Name')?></dt>
	            	<dd class="dd-left"><?= $data->last_name ?></dd>

	            	<dt class="dt-label"><?=_('Email')?></dt>
	            	<dd class="dd-left"><?= $data->email?></dd>

	            	<dt class="dt-label"><?=_('Phone Number')?></dt>
	            	<dd class="dd-left"><?= $data->phone_number ?></dd>

	            	<dt  class="dt-label"><?=_('Status')?></dt>
	            	<dd  class="dd-left"><?= $data->status ?></dd>

          	<div class="col-4">
	        	<a href="/ITspecialist/index" type="submit" class="btn-userDetails"><?=_('Back')?></a>
		  	</div>

		</div>
		<!-- Right side -->
		<div class="" style="flex: 20%;" >
			
			<div style=" border-radius: 100%; height: 230px;" align="center">
				<?php
					if($data->user_type == 'admin'){
						echo "<img src='/images/adminImage.png' style='height: 230px;'>";
					}else{
						echo "<img src='/images/employeeImage.png' style='height: 230px;'>";
					}
				?>
			</div>

			<div style="" >
				<div style=" " >
	        		<dt class="dt-label " style=""><?=_('ID')?></dt>
	        		<dd class="dd-right" style=""><?= $data->user_id ?></dd>
	        	</div>
	        	<div >
	        		<dt class="dt-label"><?=_('Username')?></dt>
	        		<dd class="dd-right"><?= $data->username?></dd>
	        	</div>
	        	<div >
	        		<dt  class="dt-label"><?=_('Password')?></dt>
	        		<dd  class="dd-right"><?= $data->password_hash ?></dd>
	        	</div>
	        </div>

          	<div class="">
            	<!-- <a  onclick="openNav()" class="btn-userDetails"><?=_('Edit')?></a> -->
            	<a  href="/ITspecialist/edit/<?= $data->user_id ?>" class="btn-userDetails"><?=_('Edit')?></a>
	            <!-- <a href="#confirmation" class="btn-userDetails" style="margin-left: 20px;"><?=_('Delete')?></a> -->
	            <a style="" onclick="openNav()">delete</a>
          	</div>

		</div>
		
    </dl>


	<div id="myNav" class="overlay-userDetails">
	  <a href="javascript:void(0)" class="closebtn" style="margin-top: 10px" onclick="closeNav()">&times;</a>

	  <div class="wrapper-userDetails">
            <h2><?=_('Deleting User')?></h2>
            <div class="content-userDetails">
                <div class="container-userDetails">
                    <div class="">
                  
                        <label><?= _('Are you sure you want to delete this user?') ?></label> 
                        <div class="btn-container">
                        	<a href="javascript:void(0)" class="btn-container-option" onclick="closeNav()" ><?=_('cancel')?></a>
                        	<a href="/ITspecialist/delete/<?= $data->user_id ?>" class="btn-container-option"><?=_('delete')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

</div>


<script>
	function openNav() {
	  document.getElementById("myNav").style.height = "100%";
	}

	function closeNav() {
	  document.getElementById("myNav").style.height = "0%";
	}
</script>
     
<?php $this->view('shared/footer'); ?>