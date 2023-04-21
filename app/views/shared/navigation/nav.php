<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">
    <?php $this->view('shared/navigation/sidebars/leftSidebar') ?>
    <a class="navbar-brand" href="Main/index">Sweemory</a>

    <?php $this->view('shared/navigation/sidebars/rightSidebar') ?>
</nav>
<?php $this->view('shared/errorAndSuccessMessages'); ?>