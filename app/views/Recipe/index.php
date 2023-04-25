<?php $this->view('shared/header', "Recipes"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="container" style="padding-top: 50px;">
	<a class="btn" href="/Recipe/create/" role="button" style="background-color: #e8c8e7;"><?= _('Add Recipe') ?></a>

	<h2 class=recipeTitle> All Recipes </h2>
		<?php foreach ($data as $recipe) { ?>

			<div class="recipeBox"> 
				<?= "<a href='/Recipe/details/$recipe->recipe_id'>" ?>
					<?=  "<img class='recipeImage' src='/productImages/$recipe->picture'>" ?>
					<?= "<figcaption> $recipe->title </figcaption>" ?> 
				</a>
			</div>


		<?php } ?>


</div>



<?php $this->view('shared/footer'); ?>
