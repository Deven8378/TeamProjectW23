<?php $this->view('shared/header', $data[0]->name . " Details"); ?>
<?php $this->view('shared/navigation/nav'); ?>

<style type="text/css">

</style>


<div id="foodDetailsDiv">
  <div class="btn-marginleft">
    <a href="/Product/index" class="btn-general" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>
  </div>

  <div class="row-details" align="center">

      <div class="foodIMG-box">
        <img id="foodIMG" src="/productImages/<?= $data[0]->picture ?>">
      </div>

      <div class="foodDetails-box">
        <div id="foodDetails">
<!-- ----------------------------------------------------------------- -->
          <div class="grid-details">

            <div class="grid-box-1">
              <h1 id="foodName"><?= htmlentities($data[0]->name) ?></h1>
            </div>

            <div class="grid-box-3">
              <?php if ($data[3] == true) { ?>
                <div class="btn-group dropend">
                  <button type="button" class="btn-more" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>More</button>
                  <div class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="/Product/edit/<?= $data[0]->product_id ?>">
                          <?= _('Edit') ?>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" 
                        href="#popupProduct">
                          <?= _('Delete') ?>
                        </a>
                      </li>
                  </div>
                </div>
              <?php } ?>

            </div>

            <label class="grid-box-4"><?= _('Description') ?>:</label>
            <p class="grid-box-5"><?= htmlentities($data[0]->description) ?></p>
            <label class="grid-box-7"><?= _('Quantity') ?>:</label>
            <p class="grid-box-8"><?= htmlentities($data[1]->fullQuantity) ?></p>
            
            <?php if($data[3] == true) { ?>
              <a class="btn-general grid-box-9" style="" href="/Product/addQuantity/<?= $data[0]->product_id ?>">
                <?= _('Add Quantity') ?>
              </a>
            <?php } ?>

          </div>
<!-- ----------------------------------------------------------------- -->
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
                  <td><?= $quantity->produced_date ?></td>
                  <td><?= $quantity->expired_date ?></td>
                  <td><?= $quantity->price ?></td>
                  <td><?= $quantity->daysLeft ?></td>
                  <td>
                    <div class="btn-group dropend">
                      <button type="button" class="btn-more" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>More</button>
                      <div class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="/Product/editQuantity/<?= $quantity->pq_id ?>">
                              <?= _('Edit') ?>
                            </a>
                          </li>
                        <?php if ($data[3] == true) { ?>
                          
                          <li>
                            <a class="dropdown-item" href="#popupQuantity" id="<?= $quantity->pq_id ?>" onclick="deleteIngredientLinkID(this.id)">
                              <?= _('Delete') ?>
                            </a>
                          </li>
                        <?php } ?>

                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

  </div>
</div>

<!-- CONFIMATION MESSAGE TO DELETE PRODUCT -->
<div class="overlay" id="popupProduct">
  <div class="wrapper">
      <h2><?= _('Confirmation') ?></h2><a class="close" href="/Product/productDetails/<?= $data[0]->product_id ?>">&times;</a>
      <div class="content">
          <div class="container">
              <form  method="post" action="">
                    <label>Are you certain you want to delete the following Product?</label>
                    <div align="center">
                      <a href="/Product/productDetails/<?= $data[0]->product_id ?>" class="btn-general"><?=_('cancel')?></a>
                      
                      <a href="/Product/delete/<?= $data[0]->product_id ?>" class="btn-general"><?=_('delete')?></a>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- CONFIMATION MESSAGE TO DELETE PRODUCT QUANTITY ROW -->
<div class="overlay" id="popupQuantity">
  <div class="wrapper">
      <h2><?= _('Confirmation') ?></h2><a class="close" href="/Product/productDetails/<?= $data[0]->product_id ?>">&times;</a>
      <div class="content">
          <div class="container">
              <form  method="post" action="">
                    <label>Do you want to delete the entire Quantity row</label>
                    <div align="center">
                      <a href="/Product/productDetails/<?= $data[0]->product_id ?>" class="btn-general"><?=_('Cancel')?></a>
                      <!-- getting href from deleteLinkID javascript function -->
                      <a id="deleteQuantity" href="" class="btn-general"><?=_('Confirm')?></a>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  
  function deleteIngredientLinkID(linkID){
    // var selectLink = document.getElementById(linkID);
    var setLinkInDelete = document.getElementById('deleteQuantity');
    setLinkInDelete.href = "/Product/deleteQuantity/" + linkID;
  }

</script>