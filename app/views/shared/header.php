<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="/javascript/main.js" ></script>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/IT.css">

	<title><?= $data ?></title>

	<style type="text/css">
		#loginDiv {
		  	background-color: white;
		  	text-align: center;
		  	border-radius: 25px;
		  	padding: 20px;
		  	width: 500px;
		  	height: 450px;
		}
		.split-screen {
		    display: flex;
		}

		.left_side {
		    flex: 1;
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
			background:#eee;
		}

		#home_links{
			width: 150px;
		}

		#home_header {
			line-height: 562px;
		}

		#inbox_side {
			margin-left: 20px;
		  	background-color: #e6e3e3;
		  	text-align: center;
		  	border-radius: 25px;
		  	padding: 20px;
		  	width: 100%;
		  	height: 825%;
		}

		#messages_side {
			margin-left: 20px;
			margin-right: 10px;
		  	background-color: #e6e3e3;
		  	text-align: center;
		  	border-radius: 25px;
		  	width: 100%;
		  	height: 825%;
		}

		#messagesDiv {
			width: 1000%;
		}

		
		.email {
		    padding: 20px 10px 15px 10px;
			font-size: 1em;
		}

		.email h2 {
			margin-top: 0;
			padding-bottom: 8px;
		}

		.email .nav.nav-pills > li > a > .fa {
			margin-right: 5px;
		}

		.email .nav.nav-pills > li.active > a {
			font-weight: 600;
		}

		.email .nav.nav-pills.nav-stacked > li > a {
			color: #666;
			border-top: 0;
			border-left: 3px solid transparent;
			border-radius: 0px;
		}

		.email .nav.nav-pills.nav-stacked > li.active > a,
		.email .nav.nav-pills.nav-stacked > li.active > a:hover {
			background-color: #f6f6f6;
			border-left-color: #3c8dbc;
			color: #444;
		}

		.email .nav.nav-pills.nav-stacked > li.header {
			color: #777;
			text-transform: uppercase;
			position: relative;
			padding: 0px 0 10px 0;
		}


		.email table {
			font-weight: 600;
		}

		.email table a {
			color: #666;
		}

		.grid {
		    position: relative;
		    width: 100%;
		    background: #fff;
		    color: #666666;
		    border-radius: 25px;
		    margin-bottom: 25px;
		    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
		}

		.grid .grid-body {
		    padding: 15px 20px 15px 20px;
		    font-size: 0.9em;
		    line-height: 1.9em;
		}

		.box {
			text-align: center;
		}
		.button {
			font-size: 1em;
			padding: 15px 35px;
			color: #fff;
			text-decoration: none;
			cursor: pointer;
			transition: all 0.3s ease-out;
			background: #403e3d;
			border-radius: 50px;
		}
		.overlay {
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background: rgba(0, 0, 0, 0.8);
			transition: opacity 500ms;
			visibility: hidden;
			opacity: 0;
		}
		.overlay:target {
			visibility: visible;
			opacity: 1;
		}
		.wrapper {
			margin: 70px auto;
			padding: 20px;
			background: #e7e7e7;
			border-radius: 5px;
			width: 30%;
			position: relative;
			transition: all 5s ease-in-out;
		}
		.wrapper h2 {
			margin-top: 0;
			color: #333;
		}
		.wrapper .close {
			position: absolute;
			top: 20px;
			right: 30px;
			transition: all 200ms;
			font-size: 30px;
			font-weight: bold;
			text-decoration: none;
			color: #333;
		}

		.wrapper .close:hover {
			color: #06D85F;
		}

		.wrapper .content {
			max-height: 30%;
			overflow: auto;
		}
		/*form*/

		.container {
			border-radius: 5px;
			padding: 20px 0;
		}
		form label {
			text-transform: uppercase;
			font-weight: 500;
			letter-spacing: 3px;
		}
		#messageInput {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-top: 6px;
			margin-bottom: 16px;
			resize: vertical;
		}
		#messageSubmit {
			background-color: #413b3b;
			color: #fff;
			padding: 15px 50px;
			border: none;
			border-radius: 50px;
			cursor: pointer;
			font-size: 15px;
			text-transform: uppercase;
			letter-spacing: 3px;
		}

	</style>

	<title><?=htmlentities($data)?></title>
</head>

<body>