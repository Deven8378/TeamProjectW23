<?php $this->view('shared/header', _('Ingredients')); ?>
<?php $this->view('shared/navigation/nav'); ?>
<?php $this->view('shared/navigation/switchToIngredients'); ?>

<div class="container">
	<div class="row-index">
		<div>
			<div class="col-index">
			<?php if($data[3] == true) { ?>
					
				<div class="grid-btn-one">
					<a class="btn-general" href="/Ingredient/createIngredient" role="button" style="width: 150px;">
						<?= _('Add Ingredient') ?>
					</a>
				</div>

				<div class="grid-btn-two">
					<a href="/Category/index" class="btn-general" style="width: 150px;">
						<?= _('View categories') ?>
					</a>
				</div>

				<hr class="col-dividor">
			<?php } ?>

				<a href="/Ingredient/index" class="grid-btn-three">
					<button style="width: 150px;" class="btn-general" type="button">
		  				<?= _('Reset') ?>
		  			</button>
		  		</a>

				<div class="btn-group grid-btn-four" style="display: grid;" >

				  	<button style="width: 150px;" type="button" class="btn dropdown-toggle btn-general" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
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
				  	<?php } ?>
			  		</ul>
				</div>

			</div>
		</div>

		<div class="row-dividor"><div class="vl"></div></div>
<!-- ------------------------------------------------ -->
		<div class="col-content">
			<div class="col-content-header">

				<p class="search-result"><?= $data[2]->num_results ?> <?= _('Results') ?></p>

				<div class="search-div">

					<form action="/Ingredient/search" class="search-form">

						<button class="search-btn"><i class="bi bi-search" style="color: #ACABAB;"></i></button>

						<input type="search" name="search" class="search-input" placeholder="<?=_('Search')?>">

					</form>
				</div>
			</div>

			<div  class="card-content" align="center">
			  <?php $this->view('Ingredient/ingredientsCard', $data[0]); ?>
			</div>

		</div>

	</div>
</div>


<?php $this->view('shared/footer'); ?>
