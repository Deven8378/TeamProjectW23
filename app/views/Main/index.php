<?php $this->view('shared/header','Home Feed'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="split-screen">
    <!-- Left content -->
    <div class="left_side">
    	<img src="/resources/sweemory1.png" height="563px" width="500px">
    </div>

    <!-- Right content -->
    <div class="right_side">
    	<h2 id="home_header"><?= _('Welcome back Sweemory Team!') ?></h2><br><br>
    </div>
</div>

<br>
<h1><?= _('What would you like to do today?') ?></h1>
<br>


<div class="home_links">
	<div class="container text-center">
	  <div class="row align-items-start">
	    <div class="col">
	      <a class="btn" id="home_links" href="/Message/index" role="button" style="background-color: #e8c8e7;"><?= _('Messages') ?></a>
	    </div>
	    <div class="col">
	      <a class="btn" id="home_links" href="/Inventory/index" role="button" style="background-color: #e8c8e7;"><?= _('Inventory') ?></a>
	    </div>
	    <div class="col">
	      <a class="btn" id="home_links" href="Recipes/index" role="button" style="background-color: #e8c8e7;"><?= _('Recipes') ?></a>
	    </div>
	  </div>
	</div>
</div>


<?php $this->view('shared/footer'); ?>
