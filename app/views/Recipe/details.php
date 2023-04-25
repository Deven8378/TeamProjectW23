<?php $this->view('shared/header', _("Recipes")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<?= "<h2 class='recipeTitle'> $data->title </h2>" ?>
<?= "<img class='recipeDetailsImage' src='/productImages/$data->picture'>" ?>
<?= "<p class='recipeText'> $data->description </p>" ?>

<?= "<a href='/Recipe/delete/$data->recipe_id'> Delete Recipe </a>" ?> <br>

<?= "<a href='/Recipe/edit/$data->recipe_id'> Edit Recipe </a>" ?> <br>


<a href='/Recipe/index/'> Back </a>