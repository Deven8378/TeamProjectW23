<?php $this->view('shared/header', "Recipes"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="container">
	<div class="sign recipe-sign" style="" align="center">Recipes Page</div>
	<div class="row-recipe">
		<div class="col-recipe">
			<a class="btn-general recipe-btn" href="/Recipe/create" role="button" style=""><?= _('Add Recipe') ?></a>
			<hr class="btn-recipe-divider" style="">	
		</div>
		<div class="col-recipe-divider"> 
			<div class="recipe-divider"></div>
		</div>
		<div class="card-ml" style="">
			<div class="card-content" align="center">
			  <?php $this->view('Recipe/recipeCard', $data); ?>
			</div>
		</div>
	</div>
</div>


<?php $this->view('shared/footer'); ?>
