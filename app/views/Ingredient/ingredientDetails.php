<?php $this->view('shared/header', $data->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<link rel="stylesheet" type="text/css" href="/css/foodDetails.css">

<div id="foodDetailsDiv">
  <a href="/Ingredient/index" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>

  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col-5">
        <div>
          <img id="foodIMG" src="/ingredientImages/<?= htmlentities($data->picture) ?>">
          <div class="spacer" style="height: 500px; flex-shrink: 0; margin: 0; padding: 0;"></div>
          <a class="btn" href="/Ingredient/edit/<?= htmlentities($data->ingredient_id) ?>" role="button" style="background-color: #e8c8e7;">
            <?= _('Edit') ?>
          </a>
          <a class="btn" href="/Ingredient/delete/<?= htmlentities($data->ingredient_id) ?>" role="button" style="background-color: #e8c8e7;">
            <?= _('Delete') ?>
          </a>
        </div>
      </div>
      <div class="col-7">
        <div id="foodDetails">
          <h1 id="foodName"><?= htmlentities($data->name) ?></h1>

          <div class="container" id="ingredientContent">
            <div class="row align-items-start">
              <div class="col">
                <?= _('Description') ?>: 
              </div>
              <div class="col">
                <p><?= htmlentities($data->description) ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


