<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Standard Meta -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<!-- Site Properities -->
		<title>TABAH 2.0 - JABAR</title>
	  <link rel="shortcut icon" href="/assets/img/favicon.ico" />

		<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/css/public.css">

		<?php if(isset($custom_css) && !empty($custom_css)){ ?>
		<link rel="stylesheet" href="<?=$custom_css?>">
		<?php } ?>

		<!-- Compiled and minified JavaScript -->
		<script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
		<script src="/assets/js/public.js"></script>
		
		<?php if(isset($custom_js) && !empty($custom_js)){ ?>
		<script src="<?=$custom_js?>"></script>
		<?php } ?>
	</head>
	<body class="blue-grey lighten-5">
