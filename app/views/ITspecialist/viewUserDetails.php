<?php $this->view('shared/header','User Profile'); ?>
<?php $this->view('shared/errorAndSuccessMessages'); ?>

<div class="container bootstrap snippets bootdey">
    
    <h1 class=""><?=$data->first_name?>'s Profile</h1>
  	<hr>
    <div class="row">

      
  		<!-- edit form column -->
  		<div class="col">
	        <div class="alert" style="background-color: rgb(243, 214, 243);">
          		<h3><?php $data->username?> (AD86456)</h3>
	        </div>

	        <form class="d-flex flex-column">

	          	<!-- Left side -->
	          	<div>
	          		<div class="row">
	          			<div class="col-6">
			            	<label class="form-label"> <?= _('First Name')?> </label>
			            	<label class="form-control"><?=$data->first_name?></label>
		          		</div>
		          	</div>

		          	<div class="row">
		          		<div class="col-6" style="">
			            	<label class="form-label">Middle Name</label>
			            	<label class="form-control"><?=$data->middle_name?></label>

		          	</div>

		          	<div class="row">
		          		<div class="col-6">
			            	<label class="form-label">Last Name</label>
			            	<label class="form-control"><?=$data->last_name?></label>
		            	</div>
	          		</div>
			          <!--  -->

		          	<div class="row">
	          			<div class="col-6">
			            	<label class="form-label">Email</label>
			            	<label class="form-control"><?=$data->email?></label>
		            	</div>
		          	</div>

		          	<div class="row">
		          		<div class="col-6">
			            	<label class="form-label">Phone Number</label>
			            	<label class="form-control"><?=$data->phone_number?></label>
			            </div>
		          	</div>

		          	<div class="row">
		          		<div class="col-6">
			            	<label  class="form-label">Status</label>
			            	<label  class="form-control"><?= $data->status?></label>
			            </div>
		          	</div>

				</div>
				<!-- Right side -->
				
	        </form>
	        <form class="d-flex flex-column">
	        	<div class="">
					<div class="row">
	          			<div class="col-6">
			            	<label class="form-label">ID</label>
			            	<label class="form-control"><?=$data->user_id?></label>
		            	</div>
		          	</div>

		          	<div class="row">
		          		<div class="col-6">
			            	<label class="form-label">Username</label>
			            	<label class="form-control"><?=$data->username?></label>
			            </div>
		          	</div>

		          	<div class="row">
		          		<div class="col-6">
			            	<label  class="form-label">Password</label>
			            	<label  class="form-control"><?= $data->password_hash?></label>
			            </div>
		          	</div>

	        	</div>
	        </form>

	        <div class="col-4">
	            <a href="/itMainPage.html" type="submit" class="btn btn-success">Back</a>
          	</div>

          	<div class="col-4">
	            <button type="submit" class="btn btn-outline-warning">Edit</button>
	            <button type="submit" class="btn btn-outline-danger">Delete</button>
          	</div>
	       
      	</div>
    </div>
</div>




<?php $this->view('shared/footer'); ?>