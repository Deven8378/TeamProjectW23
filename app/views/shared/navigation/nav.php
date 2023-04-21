<nav class="navbar fixed-top navbar-expand-lg" style="background-color: #F3EBF6;">
  <div class="container-fluid">
    <?php $this->view('shared/navigation/sidebars/leftSidebar') ?>
    <a class="navbar-brand" href="Main/index">Sweemory</a>

    <?php $this->view('shared/navigation/sidebars/rightSidebar') ?>
</nav>
<?php $this->view('shared/errorAndSuccessMessages'); ?>