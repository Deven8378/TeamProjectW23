<nav class="navbar fixed-top" style="background-color: #e8c8e7;">
  <div class="container-fluid">
    <!-- Navigation Sidebar -->
    <?php $this->view('shared/navigation/sidebars/leftSidebar') ?>

    <a class="navbar-brand" href="/Main/index"><img src="/resources/logo.png" alt="Cliquebait Logo" class="d-inline-block align-text-top" style="width: 25px; height: 25px;">Sweemory</a>

    <!-- Notification Sidebar -->
    <?php $this->view('shared/navigation/sidebars/rightSidebar') ?>
</nav>
<?php $this->view('shared/errorAndSuccessMessages'); ?>