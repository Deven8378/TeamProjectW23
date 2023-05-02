<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="bi bi-bell"></span>
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Notifications</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  
  <div class="offcanvas-body">
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary" style="width: 380px;">

      <?php foreach ($data as $notification) { ?>
        <div class="list-group list-group-flush border-bottom scrollarea">
          <a href="#" class="list-group-item list-group-item-action active py-3 lh-sm" aria-current="true">
            <div class="d-flex w-100 align-items-center justify-content-between">
              <strong class="mb-1">
                
              </strong>
              <small>
                
              </small>
            </div>
            <div class="col-10 mb-1 small">
              <?= $notification->notify_type ?>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>

    <form action='' method='post' enctype="multipart/form-data">
      <input class="submitIngredient" type="submit" align="" value="<?=_('Refresh')?>" name="action"> <br><br>
    </form>
  </div>
</div>