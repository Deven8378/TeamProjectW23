<?php $this->view('shared/header', $data->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<?php 
$user = new \app\models\User();
$user = $user->getByUserId($_SESSION['user_id']);
$type = $user->user_type;
$isAdmin = False;
if ($type == "admin")
  $isAdmin = True;
?>
<link rel="stylesheet" type="text/css" href="/css/foodDetails.css">

<div id="foodDetailsDiv">
  <div class="btn-marginleft">
    <a href="/Recipe/index"class="btn-general" id="backLink" ><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
  </div>
  <div class="recipe-container text-center" style="">
    <!-- <div class="row align-items-start"> -->
      <div class="left-recipe-detail">
        <div>
          <img class="b-5" id="foodIMG" src="/productImages/<?= htmlentities($data->picture) ?>">
          <?php if ($isAdmin) { ?>
          <!-- <div class="spacer" style="height: 500px; flex-shrink: 0; margin: 0; padding: 0;"></div> -->
          <div style="display: flex; gap: 20px; justify-content: center;">
            <a class="btn-general recipes-detail-btn" href="/Recipe/edit/<?= htmlentities($data->recipe_id) ?>" role="button" style="">
              <?= _('Edit') ?>
            </a>
            <a class="btn-general recipes-detail-btn" href="/Recipe/delete/<?= htmlentities($data->recipe_id) ?>" role="button" style="">
              <?= _('Delete') ?>
            </a>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="right-recipe-detail">
        <div class="description-box">

          <h1 id="foodName"><?= htmlentities($data->title) ?></h1>

          <!-- <div class="recipe-container" id="ingredientContent"> -->

            <div class="row align-items-start">

              <h4 class="col"><?= _('Description') ?>: </h4>
              <div class="col"><p><?= htmlentities($data->description) ?></p></div>
            </div>

          </div>
        </div>
      </div>
    <!-- </div> -->
  </div>
</div>