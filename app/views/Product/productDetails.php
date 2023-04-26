<?php $this->view('shared/header', $data->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>
<link rel="stylesheet" type="text/css" href="/css/foodDetails.css">

<div id="foodDetailsDiv">
  <a href="/Product/index" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>

  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col">
        <div id="img">
          <img id="foodIMG" src="/productImages/<?= htmlentities($data->picture) ?>">
        </div>
      </div>
      <div class="col">
        <div id="foodDetails">
          <h1 id="foodName"><?= htmlentities($data->name) ?></h1>

          <div class="container text-center">
            <div class="row align-items-start">
              <div class="col">
                <?= _('Description') ?>: 
              </div>
              <div class="col">
                <p>
                  <?= htmlentities($data->description) ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>