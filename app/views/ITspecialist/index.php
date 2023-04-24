<?php $this->view('shared/header','IT Home Page'); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<div class="container" style="padding-top: 20px;">

	<div class="viewUsers">
		<div>

			<input class="input-radio" type="radio" name="">
			<label>Admins</label>

		</div>

		<div class="spacer" style="width: 8px; flex-shrink: 0; margin: 0; padding: 0;"></div>

		<div class="" style="">
			
			<h2><?=_('List of Employee and Admin')?></h2>

			<!-- <div class="" style="border: 1px solid grey; border-radius: 10px;"> -->

				<table class="table " style="">
					<!-- table-striped table-bordered -->
		            <thead class="table-secondary">
		                <tr >
		                    <th scope="col">Status</th>
		                    <th scope="col" style="width:7%;">ID</th>
		                    <th scope="col">Username</th>
		                    <th scope="col">First Name</th>
		                    <th scope="col">Middle Name</th>
		                    <th scope="col">Last Name</th>
		                    <th scope="col" style="width:20%;">email</th>
		                    <th scope="col">Phone Number</th>

		                </tr>
		            </thead>
		            <tbody class="">
		            	<?php foreach ($data as $user) { ?>
			                <tr>
			                    <th scope="row" style="display: flex; align-items: center; justify-content: center;">

				            	<?php
				            		if($user->status == "active") {
				            			echo "<div class='status-active' style=''>$user->status</div>";
				            		}else{
				            			echo "<div class='status-inactive' style=''>$user->status</div>";
				            		}

				            	?>

		                    	</th>
			                    <td>
		                    	<?php
				            		if($user->user_type == "admin") {
				            			echo "<a href='/ITspecialist/viewUserDetails/$user->user_id'>AD$user->user_id</a>";
				            		}else if ($user->user_type == "employee"){
				            			echo "<a href='/ITspecialist/viewUserDetails/$user->user_id'>EM$user->user_id</a>";
				            		}else{
				            			echo "ERROR";
				            		}

				            	?>
			                    	<!-- <a href="/ITspecialist/viewUserDetails/<?=$user->user_id?>">
			                    		<?=$user->user_id?>
			                    			
		                    		</a> -->
		                    	</td>
			                    <td align="" style="
/*			                    text-align: center;*/
/*			                    display: flex; */
/*			                    align-items: center; */
/*			                    justify-content: center;*/
			                    "><?=$user->username?></td>
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
	
	</div>

</div>
<?php $this->view('shared/footer'); ?>

