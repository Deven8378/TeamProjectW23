<?php
    if (isset($_GET['success']))
    {
    	echo '<div class="alert alert-success" role="alert" style="padding-top: 10px"><button type="button" class="btn-close" data-bs-dismiss="alert"></button> '.$_GET['success'].'</div>';
    }
    if (isset($_GET['error']))
    {
    	echo '<div class="alert alert-danger" role="alert" style="padding-top: 10px"><button type="button" class="btn-close" data-bs-dismiss="alert"></button> '.$_GET['error'].'</div>';
    }
?>