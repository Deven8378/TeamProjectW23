<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" >
  <i class="bi bi-list"></i>
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="/resources/logo.png" alt="Cliquebait Logo" class="d-inline-block align-text-top" style="width: 50px; height: 50px;"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/Main/index"><i class="bi bi-house-door"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-bell"></i> Notifications</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Message/index"><i class="bi bi-envelope"></i> Messages</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-card-list"></i>
          Inventory
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/Ingredient/index"><i class="bi bi-arrow-right"></i> Ingredients</a></li>
          <li><a class="dropdown-item" href="/Product/index"><i class="bi bi-arrow-right"></i> Products</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Recipe/index"><i class="bi bi-file-earmark-text"></i> Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
      </li>
    </ul>

    <a class="btn btn-primary" href="/User/logout">Log Out</a>
  </div>
</div>