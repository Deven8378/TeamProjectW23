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
            <a class="btn-general recipes-detail-btn" href="#popupRecipes" role="button" style="">
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
            <!-- row-foodName -->
            <div class="">
              <!-- col -->
              <div class="col-description-header" style=" "><?= _('Description') ?>: </div >
              <div class="col-description" style=" "><p><?= htmlentities($data->description) ?></p></div>
            </div>

          </div>
        </div>
      </div>
    <!-- </div> -->
  </div>
</div>

<div class="overlay" id="popupRecipes">
  <div class="wrapper">
      <div style="font-size: clamp(0.9375rem, 0.6731rem + 1.1282vw, 1.625rem);"><?= _('Confirmation') ?></div><a class="close" href="/Recipe/details/<?= htmlentities($data->recipe_id) ?>">&times;</a>
      <!-- <div class="content"> -->
          <div class="container">
              <form  method="post" action="">
                    <label style="font-size: clamp(0.75rem, 0.6538rem + 0.4103vw, 1rem);"><?=_('Are you certain you want to delete the following Recipe?')?></label>
                    <div align="center">
                      <a href="/Recipe/details/<?= htmlentities($data->recipe_id) ?>" class="btn-general" style=><?=_('Cancel')?></a>
                      
                      <a href="/Recipe/delete/<?= htmlentities($data->recipe_id) ?>" class="btn-general"><?=_('Delete')?></a>
                </div>
              </form>
          </div>
      <!-- </div> -->
  </div>
</div>