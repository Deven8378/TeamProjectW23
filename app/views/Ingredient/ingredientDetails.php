<?php $this->view('shared/header', $data[0]->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">
#foodIMG {
  width: 100%; 
  max-width: 500px; 
  height: auto;
}

#backLink {
  padding: 50px;
  margin: ;
  color: black;
}

#foodDetailsDiv {
  margin: 50px;
  height: 75%;
}

#foodDetails {
  width: 100%;
  height: 500px;
  padding: 20px;
  background-color: #f5f5f5;
  text-align: left;
  border-radius: 5px;
}

#foodName {
  font-weight: bold;
}

#foodEverything {
  padding-top: 20px;
}
</style>


<div id="foodDetailsDiv">
  <a href="/Ingredient/index" class="btn-general" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>

  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col-5">
        <div>
          <img id="foodIMG" src="/ingredientImages/<?= $data[0]->picture ?>">
        </div>
      </div>
      <div class="col-7">
        <div id="foodDetails">
          <div class="row justify-content-between">
            <div class="col-4">
              <h1 id="foodName"><?= htmlentities($data[0]->name) ?></h1>
            </div>
            <div class="col-4">
              <?php if ($data[3] == true) { ?>
                <div class="btn-group dropend">
                  <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>More</button>
                  <div class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="/Ingredient/edit/<?= $data[0]->ingredient_id ?>">
                          <?= _('Edit') ?>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" 
                        href="#popupIngredient">
                          <?= _('Delete') ?>
                        </a>
                      </li>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
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
            </div>
          </div>
          <div id="myDIV">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Quantity</th>
                  <th scope="col">Arrival Date</th>
                  <th scope="col">Expired Date</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Days Left</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data[2] as $quantity) { ?>
                <tr>
                  <th scope="row"><?= $quantity->quantity ?></th>
                  <td><?= $quantity->arrival_date ?></td>
                  <td><?= $quantity->expired_date ?></td>
                  <td><?= $quantity->price ?></td>
                  <td><?= $quantity->daysLeft ?></td>
                  <td>
                    <div class="btn-group dropend">
                      <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>More</button>
                      <div class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="/Ingredient/editQuantity/<?= $quantity->iq_id ?>">
                              <?= _('Edit') ?>
                            </a>
                          </li>
                        <?php if ($data[3] == true) { ?>
                          
                          <li>
                            <a class="dropdown-item" href="#popupQuantity" id="<?= $quantity->iq_id ?>" onclick="deleteLinkID(this.id)">
                              <?= _('Delete') ?>
                            </a>
                          </li>
                        <?php } ?>
                          <!-- <li>
                            <a class="dropdown-item" href="#editQuantity">
                              <?= _('Edit Quantity') ?>
                            </a>
                          </li> -->
                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!-- <div class="overlay" id="editQuantity">
            <div class="wrapper">
                <h2><?= _('Edit Quantity') ?></h2><a class="close" href="/Ingredient/ingredientDetails/<?= $data[0]->ingredient_id ?>">&times;</a>
                <div class="content">
                    <div class="container">
                        <form  method="post" action="/Ingredient/quantityUpdate/<?= $data[0]->ingredient_id ?>">
                            <label><?= _('Quantity') ?></label><br>
                            <input id=demoInput type=number min="-10"><br><br>
                            <input class="btn" type="submit" name="action" value='<?= _('Send') ?>' style="background-color: #e8c8e7;" id="messageSubmit">
                        </form>
                    </div>
                </div>
            </div>
          </div> -->

        </div>
        <?php if($data[3] == true) { ?>
        <a class="btn-general" style="background-color: #e8c8e7; float: right; bottom: 0;" href="/Ingredient/addQuantity/<?= $data[0]->ingredient_id ?>">
            <?= _('Add Quantity') ?>
          </a>
        <?php } ?>  
      </div>
    </div>
  </div>
</div>
<!-- CONFIMATION MESSAGE TO DELETE INGREDIENT -->
<div class="overlay" id="popupIngredient">
  <div class="wrapper">
      <h2><?= _('Confirmation') ?></h2><a class="close" href="/Ingredient/ingredientDetails/<?= $data[0]->ingredient_id ?>">&times;</a>
      <div class="content">
          <div class="container">
              <form  method="post" action="">
                    <label>Are you certain you want to delete the following Ingredient?</label>
                    <div align="center">
                      <a href="/Ingredient/ingredientDetails/<?= $data[0]->ingredient_id ?>" class="btn-general"><?=_('cancel')?></a>
                      
                      <a href="/Ingredient/delete/<?= $data[0]->ingredient_id ?>" class="btn-general"><?=_('delete')?></a>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- CONFIMATION MESSAGE TO DELETE INGREDIENT QUANTITY ROW -->
<div class="overlay" id="popupQuantity">
  <div class="wrapper">
      <h2><?= _('Confirmation') ?></h2><a class="close" href="/Ingredient/ingredientDetails/<?= $data[0]->ingredient_id ?>">&times;</a>
      <div class="content">
          <div class="container">
              <form  method="post" action="">
                    <label>Do you want to delete the entire Quantity row</label>
                    <div align="center">
                      <a href="/Ingredient/ingredientDetails/<?= $data[0]->ingredient_id ?>" class="btn-general"><?=_('Cancel')?></a>
                      <!-- getting href from deleteLinkID javascript function -->
                      <a id="deleteQuantity" href="" class="btn-general"><?=_('Confirm')?></a>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  
  function deleteLinkID(linkID){
    // var selectLink = document.getElementById(linkID);
    var setLinkInDelete = document.getElementById('deleteQuantity');
    setLinkInDelete.href = "/Ingredient/deleteQuantity/" + linkID;
  }

</script>

