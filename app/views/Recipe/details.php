<?php $this->view('shared/header', _("Recipes")); ?>
<?php $this->view('shared/navigation/nav'); ?>

<h2 class='recipeTitle'><?= htmlentities($data->title) ?></h2>
<img class='recipeDetailsImage' src='/productImages/<?= htmlentities($data->picture) ?>'>
<p class='recipeText'><?= htmlentities($data->description) ?></p>

<a href='/Recipe/delete/<?= htmlentities($data->recipe_id) ?>'><?= _('Delete Recipe') ?></a> <br>

<a href='/Recipe/edit/<?= htmlentities($data->recipe_id) ?>'><?= _('Edit Recipe') ?></a> <br>


<a href='/Recipe/index/'><?= _('Back') ?></a>