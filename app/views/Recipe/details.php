<?php $this->view('shared/header', $data->name . _(' Details')); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="recipes-details-container">
  
  <div class="btn-marginleft">
    <a href="/Recipe/index"class="btn-general"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
  </div>

  <div class="recipe-container text-center">
    
    <div class="left-recipe-detail">
      <div>
        <img class="b-5" id="foodIMG" src="/productImages/<?= htmlentities($data->picture) ?>">
        
        <?php if ($_SESSION['user_type']=="admin") { ?>
          <div class="btn-recipe-box">
            <a class="btn-general recipes-detail-btn" href="/Recipe/edit/<?= htmlentities($data->recipe_id) ?>" role="button">
              <?= _('Edit') ?>
            </a>
            <a class="btn-general recipes-detail-btn" href="#popupRecipes" role="button">
              <?= _('Delete') ?>
            </a>
          </div>
        <?php } ?>

      </div>
    </div>
    
    <div class="right-recipe-detail">
      <div class="description-box">

        <h1 id="foodName"><?= htmlentities($data->title) ?></h1>


        <div class="">
          <div class="col-description-header"><?= _('Description') ?>: </div >
          <div class="col-description"><p><?= htmlentities($data->description) ?></p></div>
        </div>

      </div>
    </div>

  </div>
</div>

<div class="overlay" id="popupRecipes">
  <div class="wrapper">
      
      <div class="wrapper-confirmation"><?= _('Confirmation') ?></div>
      
      <a class="close" href="/Recipe/details/<?= htmlentities($data->recipe_id) ?>">&times;</a>
      
      <div class="container">
          <form  method="post" action="">
                <label class="wrapper-message"><?=_('Are you certain you want to delete the following Recipe?')?></label>
                <div align="center">
                  <a href="/Recipe/details/<?= htmlentities($data->recipe_id) ?>" class="btn-general"><?=_('Cancel')?></a>
                  
                  <a href="/Recipe/delete/<?= htmlentities($data->recipe_id) ?>" class="btn-general"><?=_('Delete')?></a>
            </div>
          </form>
      </div>

  </div>
</div>