<?php $this->view('shared/header','User Profile'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="userDetails">
    
    <!-- <h1 class=""><?=$data->first_name?>'s Profile</h1>
  	<hr> -->


      
  		<!-- edit form column -->
  		<!-- <div class="" style=""> -->
  			<!-- rgb(243, 214, 243) -->
	        <div class="alert" style="background-color: rgb(216,212,212);">
          		<h3><?= $data->username?> (<?= $data->user_id?>)</h3>
	        </div>

	        <dl class="dl-viewUserDetails" style="">

	          	<!-- Left side -->
	          	<div class="" style="flex: 70%; " >
	          		<!-- col-sm-3 -->
	          		<!-- <div class=""> -->

			            	<dt class="dt-label"> <?= _('First Name')?> </dt>
			            	<dd class="dd-left"><?=$data->first_name?></dd>

		          	<!-- </div> -->

		          	<!-- <div class=""> -->

			            	<dt class="dt-label">Middle Name</dt>
			            	<dd class="dd-left"><?=$data->middle_name?></dd>

		          	<!-- </div> -->

		          	<!-- <div class=""> -->
			            	<dt class="dt-label">Last Name</dt>
			            	<dd class="dd-left"><?=$data->last_name?></dd>
	          		<!-- </div> -->
			          <!--  -->

		          	<!-- <div class=""> -->
			            	<dt class="dt-label">Email</dt>
			            	<dd class="dd-left"><?=$data->email?></dd>
		          	<!-- </div> -->

		          	<!-- <div class=""> -->
			            	<dt class="dt-label">Phone Number</dt>
			            	<dd class="dd-left"><?=$data->phone_number?></dd>
		          	<!-- </div> -->

		          	<!-- <div class=""> -->
			            	<dt  class="dt-label">Status</dt>
			            	<dd  class="dd-left"><?= $data->status?></dd>
		          	<!-- </div> -->
		          	<div class="col-4">
	            <a href="/ITspecialist/index" type="submit" class="">Back</a>
          	</div>

				</div>
				<!-- Right side -->
				<div class="" style="flex: 30%; border: 1px solid black;" >
					<!-- <div class=""> -->
						<div style=" height: 230px;">
							
						</div>
		            	<dt class="dt-label">ID</dt>
		            	<dd class="dd-right"><?=$data->user_id?></dd>
		          	<!-- </div> -->

		          	<!-- <div class=""> -->
			            	<dt class="dt-label">Username</dt>
			            	<dd class="dd-right"><?=$data->username?></dd>
		          	<!-- </div> -->

		          	<!-- <div class=""> -->
			            	<dt  class="dt-label">Password</dt>
			            	<dd  class="dd-right"><?= $data->password_hash?></dd>
		          	<!-- </div> -->
		          	<div class="col-4">
		            	<button type="submit" class="">Edit</button>
			            <button type="submit" class="">Delete</button>
		          	</div>
				</div>
				



				
	        </dl>


	        

          	
	       
      	<!-- </div> -->

</div>




<?php $this->view('shared/footer'); ?>