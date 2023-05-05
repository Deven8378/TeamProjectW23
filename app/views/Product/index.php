<?php $this->view('shared/header', "Products"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<?php $this->view('shared/navigation/switchToProducts'); ?>

<style type="text/css">
.vl {
  border-left: 1px solid #d9d9d9;
  height: 800px;
}
</style>


<div class="container">
	<div class="row">
		<div class="col-sm-2">
			<a class="btn" href="/Product/createProduct" role="button" style="background-color: #e8c8e7;"><?= _('Add Product') ?></a> <br> <br>
			<a class="btn" style="background-color: #e8c8e7;" href="/Treshold/index">view categories</a>
			<hr style="height:1px; border-width:0 ;color: #d9d9d9; background-color:gray">
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
			<div class="btn-group">
			  <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
			    <?= _('Availabilities') ?>
			  </button>
			  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
			    <li>
			    	<button class="dropdown-item" type="button">
			    		<?= _('Available') ?>
			    	</button>
			    </li>
			    <li>
			    	<button class="dropdown-item" type="button">
			    		<?= _('Low on Stock') ?>
			    	</button>
			    </li>
			    <li>
			    	<button class="dropdown-item" type="button">
			    		<?= _('About to Expire') ?>
			    	</button>
			    </li>
			    <li>
			    	<button class="dropdown-item" type="button">
			    		<?= _('Expired') ?>
			    	</button>
			    </li>
			  </ul>
			</div>
		</div>
		<div class="col-sm-1"> 
			<div class="vl"></div>
		</div>
		<div class="col offset-sm-1">
			<div class="row">
			  <?php $this->view('Product/productsCard', $data[0]); ?>
			</div>
		</div>
	</div>
</div>



<?php $this->view('shared/footer'); ?>
