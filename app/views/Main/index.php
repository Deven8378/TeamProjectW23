<?php $this->view('shared/header','Home Feed'); ?>
<?php $this->view('shared/navigation/nav'); ?>

<div class="split-screen">
    <!-- Left content -->
    <div class="split-screen__half">
    	<img src="/resources/sweemory1.png" width="100%">
    </div>

    <!-- Right content -->
    <div class="split-screen__half">
    	<h2>Employee and admin landing page</h2>
 		User: <?= $data->user_type ?>
    </div>
</div>

<?php $this->view('shared/footer'); ?>
