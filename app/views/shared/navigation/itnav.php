<nav class="navbar fixed-top" style="background-color: #e8c8e7;">
  <div class="container-fluid">
    <a class="btn btn-primary" href="/User/logout">Log Out</a>

    <a class="navbar-brand" href="/ITspecialist/index"><img src="/resources/logo.png" alt="Cliquebait Logo" class="d-inline-block align-text-top" style="width: 25px; height: 25px;"> Sweemory</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <a href="/ITspecialist/createUser" style="text-decoration: none; color: black"><i class="bi bi-person-add"><?=_(' Add User')?></i></a>
    </button>
</nav>
<?php $this->view('shared/errorAndSuccessMessages'); ?>