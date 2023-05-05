<?php $this->view('shared/header', "Ingredients"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<?php $this->view('shared/navigation/switchToIngredients'); ?>
<style type="text/css">
	.vl {
	  border-right: 1px solid #d9d9d9;
	  height: 100%;
	}
	.rowing{
		display: grid;
	}
</style>


<div class="container">
	<div class="row">
		<div class="col-sm-2" style="padding-right: 10px;">
			<div class="rowing" style="width: 200px; display: flex;  width: 100%; justify-content: center;">
				<div>
					<a class="btn" href="/Ingredient/createIngredient" role="button" style="background-color: #e8c8e7; width: 150px;">
						<?= _('Add Ingredient') ?>
					</a>
				</div>
			</div>
			<br>
			<div class="rowing" style="width: 200px; display: flex;  width: 100%; justify-content: center;">
				<div>
					<a href="/Category/index"  class="btn" style="background-color:#e8c8e8; width: 150px;">
						<?= _('View categories') ?>
					</a>
				</div>
			</div>

			<hr style="height:1px; border-width:0 ;color: #d9d9d9; background-color:gray">


			<div class="rowing" style="width: 200px; display: flex;  width: 100%; justify-content: center;">
				<div>
					<div class="btn-group">
					  <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
					    <?= _('Categories') ?>
					  </button>
					  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
					  	<?php 
					  		foreach ($data[1] as $category) { ?>
					  			<li>
							    	<button class="dropdown-item" type="button">
							    		<?= $category->category_name ?>
							    	</button>
							    </li>
					  		<?php }
					  	?>
					  </ul>
					</div>
				</div>
			</div>
			<div class="rowing" style="width: 200px; display: flex;  width: 100%; justify-content: center;">
				<div>
					<div class="btn-group">
					  <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
					    <?= _('Availabilities') ?>
					  </button>
					  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
					    <li><button class="dropdown-item" type="button"><?= _('Available') ?></button></li>
					    <li><button class="dropdown-item" type="button"><?= _('Low on Stock') ?></button></li>
					    <li><button class="dropdown-item" type="button"><?= _('About to Expire') ?></button></li>
					    <li><button class="dropdown-item" type="button"><?= _('Expired') ?></button></li>
					  </ul>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-sm-1"> 
			<div class="vl"></div>
		</div>
		<div class="col offset-sm-1">
			<div class="rowing" style="width: 200px; display: flex;  width: 100%; justify-content: center;">
				<div>
					<div class="row">
					  <?php $this->view('Ingredient/ingredientsCard', $data[0]); ?>
					</div>
				</div>
			</div>



		</div>
	</div>
</div>



<?php $this->view('shared/footer'); ?>
