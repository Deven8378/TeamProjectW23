<link rel="stylesheet" type="text/css" href="/css/card.css">

<?php
foreach ($data as $ingredient) { ?>
    <div class="col">
      <a href="/Ingredient/ingredientDetails/<?= $ingredient->ingredient_id ?>">
        <div class="card">
          <div id="ingredientIMG" ma>
            <div class="image">
                <img style="width: 172px; height: 199.6px;" src="/ingredientImages/<?= $ingredient->picture ?>">
            </div>
          </div>
          <span class="title"><?= htmlentities($ingredient->name) ?></span>
        </div>
      </a>
    </div>
<?php } ?>
