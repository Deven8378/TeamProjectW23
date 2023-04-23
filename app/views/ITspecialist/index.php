<?php $this->view('shared/header','IT Home Page'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="p-4 mt-5 border d-flex">

	<div class="border">
		<a href="/ITspecialist/createUser"><?=_('Add User')?></a>
		
	</div>
	<div class="spacer" style="width: 8px; flex-shrink: 0; margin: 0; padding: 0;"></div>

	<div class="border">
		
		<h2><?=_('List of Employee and Admin')?></h2>

		<table class="table table-striped table-bordered">
            <thead>
                <tr>
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
            <tbody>
            	<?php foreach ($data as $user) { ?>
	                <tr>
	                    <th scope="row"><?=$user->status?></th>
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

	</div>


	
</div>
<?php $this->view('shared/footer'); ?>