<?php $this->view('shared/header', $data[0]->name . " Details"); ?>
<?php 
$user = new \app\models\User();
$user = $user->getByUserId($_SESSION['user_id']);
$type = $user->user_type;
$isAdmin = False;
if ($type == "admin")
  $isAdmin = True;
?>
<?php $this->view('shared/navigation/nav'); ?>
<link rel="stylesheet" type="text/css" href="/css/foodDetails.css">
<script type="text/javascript">
  function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>


<div id="foodDetailsDiv">
  <a href="/Product/index" id="backLink"><i class="bi bi-arrow-left"></i><?= _('Back') ?></a>

  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col-5">
        <div>
          <img id="foodIMG" src="/productImages/<?= $data[0]->picture ?>">
          <div class="spacer" style="height: 500px; flex-shrink: 0; margin: 0; padding: 0;"></div>
          </a>
        </div>
      </div>
      <div class="col-7">
        <div id="foodDetails">
          <div class="row justify-content-between">
            <div class="col-4">
              <h1 id="foodName"><?= htmlentities($data[0]->name) ?></h1>
            </div>
            <div class="col-4">
              <?php if ($isAdmin) { ?>
              <div class="btn-group dropend">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>More</button>
                <div class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="/Product/edit/<?= $data[0]->product_id ?>">
                        <?= _('Edit') ?>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/Product/delete/<?= $data[0]->product_id ?>">
                        <?= _('Delete') ?>
                      </a>
                    </li>
                </div>
              </div>
            <?php  }?>
            </div>
          </div>
          <div class="container" id="ingredientContent">
            <div class="row align-items-start">
              <div class="col">
                <?= _('Description') ?>: 
                <br>
                <button onclick="myFunction()"><?= _('Quantity') ?>:</button>
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
                  <th scope="col">Produced Date</th>
                  <th scope="col">Expired Date</th>
                  <th scope="col">Price</th>
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
                  <td>
                    <div class="btn-group dropend">
                      <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>More</button>
                      <div class="dropdown-menu">
                        <?php if ($isAdmin) { ?>
                          <li>
                            <a class="dropdown-item" href="/Product/editQuantity/<?= $quantity->pq_id ?>">
                              <?= _('Edit') ?>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="/Product/deleteQuantity/<?= $quantity->pq_id ?>">
                              <?= _('Delete') ?>
                            </a>
                            <li>
                            <?php } ?>
                              <a class="dropdown-item" href="/Product/editQuantityOnly/<?= $data['0']->product_id?>">
                              <?= _('Edit Quantity') ?>
                               </a>
                            </li>
                          </li>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <a class="btn" style="background-color: #e8c8e7" href="/Product/addQuantity/<?= $data[0]->product_id ?>">
              <?= _('Add Quantity') ?>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>