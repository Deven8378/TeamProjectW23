<?php $this->view('shared/header','IT Home Page'); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="viewUsers" style="">

	<!-- <div class="p-4 mt-5 border d-flex"> -->

		<div class="itContent-left">
			<h3>Filters</h3>
			<div class="" style="">
				<input class="" type="radio" name="" id="">
				<label class="" for="">Admin</label>
			</div>
			<div class="" style="">
				<input class="" type="radio" name="" id="" checked>
				<label class="" for="">Employee</label>
			</div>

		</div>

		<div class="spacer" style="width: 20px; flex-shrink: 0; margin: 0; padding: 0;"></div>

		<div class="itContent-right" style="">
			
			<h2><?=_('List of Employee and Admin')?></h2>

			<!-- <div class="" style=""> -->

				<table class="table table-bordered table-hover " style="">
					<!-- table-striped table-bordered -->
		            <thead class="table-secondary">
		                <tr class="">
		                    <th scope="col">Status</th>
		                    <th scope="col">ID</th>
		                    <th scope="col">Username</th>
		                    <th scope="col">First Name</th>
		                    <th scope="col">Middle Name</th>
		                    <th scope="col">Last Name</th>
		                    <th scope="col">email</th>
		                    <th scope="col">Phone Number</th>

		                </tr>
		            </thead>
		            <tbody class="table-light">
		            	<?php foreach ($data as $user) { ?>
			                <tr>
                    <th scope="row">
                    	<div style="
                    	border: 2px solid #8CC39E;
                    	border-radius: 10px; 
                    	background: #AFF4C6;
/*                    	align-content: center;*/
                    	display: flex;
                    	justify-content: center;
/*                    	text-align: center;*/
						align-items: center;
                    	height: 50px;
                    	width: 100px;
                    	">
                    		<?=$user->status?>
                    	</div>
                    </th>

			                    <td><a href="/ITspecialist/viewUserDetails/<?=$user->user_id?>"><?=$user->user_id?></a></td>
			                    <td><?=$user->username?></td>
			                    <td><?=$user->first_name?></td>
			                    <td><?=$user->middle_name?></td>
			                    <td><?=$user->last_name?></td>
			                    <td><?=$user->email?></td>
			                    <td><?=$user->phone_number?></td>
			                </tr>
		                <?php
							}
						?>
		            
		            </tbody>
		        </table>
		    <!-- </div> -->
		</div>
	
	<!-- </div> -->

</div>
<?php $this->view('shared/footer'); ?>

