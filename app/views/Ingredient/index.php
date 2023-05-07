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

	.centering {
		display: flex;  
		width: 100%; 
		justify-content: center;
	}
</style>


<div class="container">
	<div class="row">
		<div class="col-sm-2" style="padding-right: 10px;">
			<?php if($data[3] == true) { ?>
					<div class="centering">
						<div>
							<a class="btn" href="/Ingredient/createIngredient" role="button" style="background-color: #e8c8e7; width: 150px;">
								<?= _('Add Ingredient') ?>
							</a>
						</div>
					</div>
					<br>
					<div class="centering">
						<div>
							<a href="/Category/index"  class="btn" style="background-color:#e8c8e8; width: 150px;">
								<?= _('View categories') ?>
							</a>
						</div>
					</div>

					<hr style="height:1px; border-width:0 ;color: #d9d9d9; background-color:gray">
			<?php } ?>

			<div class="centering">
				<a style=" " href="/Ingredient/index">
					<button style="width: 150px;" class="btn-general" type="button">
		  				<?= _('Reset') ?>
		  			</button>
		  		</a>
			</div>
			<div class="centering">
				<div>
					<div class="btn-group">
					  <button style="width: 150px;" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
					    <?= _('Categories') ?>
					  </button>

					  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">

					  	<?php 
					  		foreach ($data[1] as $category) { ?>
					  			<li>
					  				<form action="/Ingredient/filterByCategory/<?= $category->category_id ?>" method="post">
										<input class="dropdown-item" style=" width: 100%;" type="submit" name="" value="<?= $category->category_name ?>">
									</form>
							    </li>
					  		<?php }
					  	?>
					  </ul>
					</div>
				</div>
			</div>
			<div class="centering">
				<div>
<!-- 					<div class="btn-group">
					  <button style="width: 150px;" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
					  </button>
					  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
					    <li><button class="dropdown-item" type="button"><?= _('Available') ?></button></li>
					    <li><button class="dropdown-item" type="button"><?= _('Low on Stock') ?></button></li>
					    <li><button class="dropdown-item" type="button"><?= _('About to Expire') ?></button></li>
					    <li><button class="dropdown-item" type="button"><?= _('Expired') ?></button></li>
					  </ul>
					</div> -->
				</div>
			</div>
		</div>

		<div class="col-sm-1"> 
			<div class="vl"></div>
		</div>

		<div class="col offset-sm-1">
			<div class="rowing" style="margin-bottom: 20px; margin-right: 10px">
				<div style="display: flex; justify-content: space-between;">

					<p style="font-weight: bold; font-size: 50"><?= $data[2]->num_results ?> <?= _('Results') ?></p>

					<div style="border: 3px solid #ACABAB; border-radius: 5px; background-color: #DFDFDF; padding: 6px;">

						<form action="/Ingredient/search" class="search-form" style="">

							<button class="search-btn" style=""><i class="bi bi-search" style="color: #ACABAB;"></i></button>

							<input type="search" name="search" class="search-input" placeholder="<?=_('Search')?>" style="">

						</form>
					</div>
				</div>
			</div>

			<div class="centering">
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
