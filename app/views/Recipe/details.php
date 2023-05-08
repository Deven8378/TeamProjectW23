<?php $this->view('shared/header', $data->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<?php 
  $isAdmin = $_SESSION['user_type']=="admin";
?>
<link rel="stylesheet" type="text/css" href="/css/foodDetails.css">

<div id="" class="recipes-details-container">
  
  <div class="btn-marginleft">
    <a href="/Recipe/index"class="btn-general"  ><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
  </div>

  <div class="recipe-container text-center" style="">
    
    <div class="left-recipe-detail">
      <div>
        <img class="b-5" id="foodIMG" src="/productImages/<?= htmlentities($data->picture) ?>">
        
        <?php if ($isAdmin) { ?>
          <div class="btn-recipe-box" style="">
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


        <div class="">
          <div class="col-description-header" style=" "><?= _('Description') ?>: </div >
          <div class="col-description" style=" "><p><?= htmlentities($data->description) ?></p></div>
        </div>

      </div>
    </div>

  </div>
</div>

<div class="overlay" id="popupRecipes">
  <div class="wrapper">
      
      <div class="wrapper-confirmation" style=""><?= _('Confirmation') ?></div>
      
      <a class="close" href="/Recipe/details/<?= htmlentities($data->recipe_id) ?>">&times;</a>
      
      <div class="container">
          <form  method="post" action="">
                <label class="wrapper-message" style=""><?=_('Are you certain you want to delete the following Recipe?')?></label>
                <div align="center">
                  <a href="/Recipe/details/<?= htmlentities($data->recipe_id) ?>" class="btn-general" style=><?=_('Cancel')?></a>
                  
                  <a href="/Recipe/delete/<?= htmlentities($data->recipe_id) ?>" class="btn-general"><?=_('Delete')?></a>
            </div>
          </form>
      </div>

  </div>
</div>