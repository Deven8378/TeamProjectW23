<?php $this->view('shared/header','Home Feed'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="split-screen">
    <!-- Left content -->
    <div class="left_side">
    	<img src="/resources/sweemory1.png" width="100%">
    </div>

    <!-- Right content -->
    <div class="right_side">
    	<h2>Welcome Back Sweemory Team!</h2>
 		User: <?= $data->user_type ?>
    </div>
</div>

<br>
<h1>What would you like to do today?</h1>
<br>


<div class="home_links">
	<div class="container text-center">
	  <div class="row align-items-start">
	    <div class="col">
	      <a class="btn" id="home_links" href="/Messages/index" role="button" style="background-color: #ebdefa;">Message</a>
	    </div>
	    <div class="col">
	      <a class="btn" id="home_links" href="/Inventory/index" role="button" style="background-color: #ebdefa;">Inventory</a>
	    </div>
	    <div class="col">
	      <a class="btn" id="home_links" href="Recipes/index" role="button" style="background-color: #ebdefa;">Recipes</a>
	    </div>
	  </div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php $this->view('shared/footer'); ?>
