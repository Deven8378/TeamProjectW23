<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Main/index">Sweemory</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body">

        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary" style="width: 380px;">

          <div class="list-group list-group-flush border-bottom scrollarea">

            <a href="#" class="list-group-item list-group-item-action active py-3 lh-sm" aria-current="true">
              <div class="d-flex w-100 align-items-center justify-content-between">
                <strong class="mb-1">About to Expire: Banana Ice Cream</strong>
                <small>Wed</small>
              </div>
              <div class="col-10 mb-1 small">Banana Ice Cream is about to expire on April 30th, 2023. To see more, click here.</div>
            </a>

            <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
              <div class="d-flex w-100 align-items-center justify-content-between">
                <strong class="mb-1">Low on Stock: Bananas</strong>
                <small class="text-body-secondary">Tues</small>
              </div>
              <div class="col-10 mb-1 small">Banana Ice Cream is low on stock. You have 7 more. To see more, click here.</div>
            </a>

          </div>

        </div>

        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

      </div>
    </div>
  </div>
</nav>