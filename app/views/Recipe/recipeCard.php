<link rel="stylesheet" type="text/css" href="/css/card.css">

<?php
foreach ($data as $recipe) { ?>
    <div class="col">
      <a class="no-underline" href="/Recipe/details/<?= htmlentities($recipe->recipe_id) ?>">
      <div class="card card-glow">
        <div id="ingredientIMG" ma>
          <div class="image">
              <img style="width: 172px; height: 199.6px;" src="/productImages/<?= htmlentities($recipe->picture) ?>">
          </div>
        </div>
        <span class="title"><?= htmlentities($recipe->title) ?></span>
      </div>
    </a>
    </div>
<?php } ?>
