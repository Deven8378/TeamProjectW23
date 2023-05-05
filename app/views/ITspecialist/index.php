<?php $this->view('shared/header','IT Home Page'); ?>
<?php $this->view('shared/navigation/itnav'); ?>

<!-- <div class="container" style=""> -->

	<div class="viewUsers">

		<div class="vu-content-left">
			<div class="spacer" style="height: 58px; flex-shrink: 0; margin: 0; padding: 0;"></div>

			<div class="btn-addUser" style="">
				<a href="/ITspecialist/createUser" style="text-decoration: none; color: #757575; ">
					<i class="bi bi-plus-square"> <?=_('Add User')?></i>
				</a>
			</div>

			<div class="filter-container" style="">
				<h5><b><?=_('Filters')?></b></h5>


				<!-- Filsters for easy search -->
				<a class="btn-it" style="background-color: #e8c8e7; width: 100%;" href="/ITspecialist/index"><?=_('view all')?></a>

				<form action="/ITspecialist/allAdmins" method="post">
					<input class="btn-it" style="background-color: #e8c8e7; width: 100%;" type="submit" name="" value="<?=_('Admin')?>">
				</form>
				<form action="/ITspecialist/allEmployees" method="post">
					<input class="btn-it" style="background-color: #e8c8e7; width: 100%;" type="submit" name="" value="<?=_('Employee')?>">
				</form>


			</div>

		</div>

		<div class="spacer" style="width: 30px; flex-shrink: 0; margin: 0; padding: 0;"></div>

		<div class="vu-content-right" style="">

			<div class="justify-content-between" style="display: flex; align-items: center; margin-bottom: 5px;">

				<div class="">
					<h3><?=_('List of Employee and Admin')?></h3>
				</div>



				<div class="search-div" style=" ">



					<!-- Search button -->
					<form action="/ITspecialist/search" class="search-form" style="">

						<button class="search-btn" style=""><i class="bi bi-search" style="color: #ACABAB;"></i></button>

						<input type="search" name="search" class="search-input" placeholder="<?=_('Search')?>" style="">

					</form>


				</div>
			</div>

			<!-- <div class="" style="border: 1px solid grey; border-radius: 10px;"> -->

				<table class="table " style="">
					<!-- table-striped table-bordered -->
		            <thead class="table-secondary">
		                <tr style="height: 50px;" align="center">
		                    <th scope="col" style="border-top-left-radius: 10px;"><?=_('Status')?></th>
		                    <th scope="col" style="width:7%;"><?=_('ID')?></th>
		                    <th scope="col"><?=_('Username')?></th>
		                    <th scope="col"><?=_('First Name')?></th>
		                    <th scope="col"><?=_('Middle Name')?></th>
		                    <th scope="col"><?=_('Last Name')?></th>
		                    <th scope="col" style="width:20%;"><?=_('email')?></th>
		                    <th scope="col" style="border-top-right-radius: 10px;"><?=_('Phone Number')?></th>

		                </tr>
		            </thead>
		            <tbody class="border">
		            	<?php foreach ($data as $user) { ?>
			                <tr class="" align="center">
			                    <th scope="row" style="display: flex; align-items: center; justify-content: center;">

				            	<?php
				            		if($user->status == "active") { ?>

				            			<div class='status-active' style=''>
				            				<?= $user->status ?>
				            			</div>

				            		<?php } else { ?>

				            			<div class='status-inactive' style=''>
				            				<?= $user->status ?>
				            			</div>
				            		<?php } 
				            	?>

		                    	</th>
			                    <td>
		                    	<?php
				            		if($user->user_type == "admin") { ?>
				            			<a href='/ITspecialist/userDetails/<?=$user->user_id?>'>AD<?= $user->user_id ?></a>
				            		<?php }else if ($user->user_type == "employee"){ ?>
				            			<a href='/ITspecialist/userDetails/<?=$user->user_id?>'>EM<?= $user->user_id ?></a>
				            		<?php }else{ 
				            			echo "ERROR";
				            		}
				            	?>

		                    	</td>
			                    <td align="" style="
/*			                    text-align: center;*/
/*			                    display: flex; */
/*			                    align-items: center; */
/*			                    justify-content: center;*/
			                    "><?= $user->username ?></td>
			                    <td><?= $user->first_name ?></td>
			                    <td><?= $user->middle_name ?></td>
			                    <td><?=$user->last_name ?></td>
			                    <td><?= $user->email ?></td>
			                    <td><?= $user->phone_number ?></td>
			                </tr>
		                <?php
							}
						?>
		            
		            </tbody>
		        </table>
		    <!-- </div> -->
		</div>
	
	</div>
	<script type="text/javascript">
		// document.querySelector(document).ready(function(){
			// document.querySelector('.input-radio').addEventListener('click',function(){
			// 	var radio_value = document.querySelector('.input-radio:checked').value;
			// 	alert(radio_value);
			// });
		// });
		
	</script>

<!-- </div> -->
<?php $this->view('shared/footer'); ?>

