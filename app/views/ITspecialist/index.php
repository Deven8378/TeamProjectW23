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
			<div style="margin-top: 20px; display: grid; ">
				<h5><b><?=_('Filters')?></b></h5>
				
				<label class="label-radio"><input class="input-radio" type="radio" name=""><?=_('Admins')?></label>

				<label class="label-radio"><input class="input-radio" type="radio" name=""><?=_('Employees')?></label>

			</div>

		</div>

		<div class="spacer" style="width: 30px; flex-shrink: 0; margin: 0; padding: 0;"></div>

		<div class="vu-content-right" style="">

			<div class="justify-content-between" style="display: flex; align-items: center; margin-bottom: 5px;">

				<div class="">
					<h2><?=_('List of Employee and Admin')?></h2>
				</div>

				<div class="search-div" style=" ">
					<form class="search-form" style="">
						<button class="search-btn" style=""><i class="bi bi-search" style="color: #ACABAB;"></i></button>
						<input class="search-input" type="search" placeholder="<?=_('Search')?>" style="">
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
				            			<a href='/Profile/userDetails/<?=$user->user_id?>'>AD <?= $user->user_id ?></a>
				            		<?php }else if ($user->user_type == "employee"){ ?>
				            			<a href='/Profile/userDetails/<?=$user->user_id?>'>EM <?= $user->user_id ?></a>
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

<!-- </div> -->
<?php $this->view('shared/footer'); ?>

