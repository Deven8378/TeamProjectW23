<nav class="navbar fixed-top" style="background-color: #e8c8e7;">
  <div class="container-fluid">

    <!-- Side Bar -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
          <img src="/resources/logo.png" alt="Cliquebait Logo" class="d-inline-block align-text-top" style="width: 50px; height: 50px;">
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/Main/index">
              <i class="bi bi-house-door"></i>
               <?= _('Home') ?>
             </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/Message/index">
              <i class="bi bi-envelope"></i> 
              <?= _('Messages') ?>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-card-list"></i>
              <?= _('Inventory') ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/Ingredient/index"><i class="bi bi-arrow-right"></i> <?= _('Ingredients') ?></a></li>
              <li><a class="dropdown-item" href="/Product/index"><i class="bi bi-arrow-right"></i> <?= _('Products') ?></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Recipe/index">
              <i class="bi bi-file-earmark-text"></i>
               <?= _('Recipes') ?>
             </a>
          </li>
        </ul>

        <div>
          <a style="margin-top:600px; display:inline-block;" class="btn-general" href="/User/logout"><?= _('Log Out') ?></a>
        </div>
      </div>
    </div>

    <!-- Logo and Name -->
    <a class="navbar-brand" href="/Main/index"><img src="/resources/logo.png" alt="Cliquebait Logo" class="d-inline-block align-text-top" style="width: 25px; height: 25px;">Sweemory</a>

    <div></div>
  </div>
</nav>
<?php $this->view('shared/errorAndSuccessMessages'); ?>