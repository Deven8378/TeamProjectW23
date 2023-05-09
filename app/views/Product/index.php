<?php $this->view('shared/header', _('Products')); ?>
<?php $this->view('shared/navigation/nav'); ?>
<?php $this->view('shared/navigation/switchToProducts'); ?>

<div class="container">
	<div class="row-index">
		<div>
			<div class="col-index">
				<?php if($data[3] == true) { ?>

						<div>
							<a class="btn-general" href="/Product/createProduct" role="button" style="width: 150px;">
								<?= _('Add Product') ?>
							</a>
						</div>

						<div>
							<a href="/Category/index"  class="btn-general" style="background-color:#e8c8e8; width: 150px;">
								<?= _('View categories') ?>
							</a>
						</div>

						<hr class="col-dividor">
				<?php } ?>

				<a href="/Product/index">
					<button style="width: 150px;" class="btn-general" type="button">
		  				<?= _('Reset') ?>
		  			</button>
		  		</a>

				<div class="btn-group" style="display: grid;">

				  	<button style="width: 150px;" type="button" class="btn dropdown-toggle btn-general" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
			    		<?= _('Categories') ?>
			    	</button>

				  	<ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">

				  	<?php 
				  		foreach ($data[1] as $category) { ?>
				  			<li>
				  				<form action="/Product/filterByCategory/<?= $category->category_id ?>" method="post">
									<input class="dropdown-item" style=" width: 100%;" type="submit" name="" value="<?= $category->category_name ?>">
								</form>
						    </li>
				  		<?php }
				  	?>
				  	</ul>
				</div>
			</div>
		</div>

		<div class="row-dividor"> <div class="vl"></div></div>
<!-- ------------------------------------------------ -->
		<div class="col-content">
			<div class="col-content-header">

				<p class="search-result"><?= $data[2]->num_results ?> <?= _('Results') ?></p>

				<div class="search-div">

					<form action="/Product/search" class="search-form">

						<button class="search-btn"><i class="bi bi-search" style="color: #ACABAB;"></i></button>

						<input type="search" name="search" class="search-input" placeholder="<?=_('Search')?>">

					</form>
				</div>
			</div>
		
			<div class="card-content" align="center">
				 <?php $this->view('Product/ProductsCard', $data[0]); ?>
			</div>

		</div>

	</div>
</div>


<?php $this->view('shared/footer'); ?>
