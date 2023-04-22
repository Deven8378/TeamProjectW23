<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="/javascript/main.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

	<style type="text/css">
		.split-screen {
		    display: flex;
		}

		.left_side {
		    flex: 1;
		}

		.messages_split {
			display: flex;
		}

		

		.messages_side {
			background-color: lightpink;
		}

		.right_side {
		    flex: 1;
		   	margin: auto;
		   	background-color: black;
		  	padding: 10px;
		  	width: 50%;
		  	color: white;
		  	height: 562px;
		  	line-height: 562px;
		}

		body{
			position: relative;
			top: 50px;
		}

		#home_links{
			width: 150px;
		}

		#home_header {
			line-height: 562px;
		}

		#inbox_side {
			background-color: grey;
			width: 100%;
		}
	</style>

	<title><?=htmlentities($data)?></title>
</head>

<body>