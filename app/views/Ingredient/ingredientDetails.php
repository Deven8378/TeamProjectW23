<?php $this->view('shared/header', $data[0]->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<link rel="stylesheet" type="text/css" href="/css/foodDetails.css">

<div id="foodDetailsDiv">
  <a href="/Ingredient/index" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>

  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col-5">
        <div>
          <img id="foodIMG" src="/ingredientImages/<?= $data[0]->picture ?>">
          <div class="spacer" style="height: 500px; flex-shrink: 0; margin: 0; padding: 0;"></div>
          </a>
        </div>
      </div>
      <div class="col-7">
        <div id="foodDetails">
          <h1 id="foodName"><?= htmlentities($data[0]->name) ?></h1>
          <div class="container" id="ingredientContent">
            <div class="row align-items-start">
              <div class="col">
                <?= _('Description') ?>: 
                <br>
                <?= _('Quantity') ?>:
              </div>
              <div class="col">
                <p><?= htmlentities($data[0]->description) ?></p>
                <p><?= htmlentities($data[1]->fullQuantity) ?></p>
              </div>
              <div class="spacer" style="height: 200px; flex-shrink: 0; margin: 0; padding: 0;"></div>
              <div class="container">
                <div class="row justify-content-start">
                  <div class="col-2">
                    <a class="btn" href="/Ingredient/edit/<?= $data[0]->ingredient_id ?>" role="button" style="background-color: #e8c8e7;">
                      <?= _('Edit') ?>
                    </a>
                  </div>
                  <div class="col-2">
                    <a class="btn" href="/Ingredient/delete/<?= $data[0]->ingredient_id ?>" role="button" style="background-color: #e8c8e7;">
                      <?= _('Delete') ?>
                    </a>
                  </div>
                  <div class="col-3">
                    <a class="btn" href="/Ingredient/addQuantity/<?= $data[0]->ingredient_id ?>" role="button" style="background-color: #e8c8e7;">
                      <?= _('Add Quantity') ?>
                    </a>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


