<?php
  if(session_status() == PHP_SESSION_NONE){
	session_start();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Audi Sport</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- icon url -->
		<link rel="icon" type="image" href="assets/img/favicon.ico">
		<!-- CSS Vendor -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/flexslider.css">
		<!-- CSS Perso -->
		<link rel="stylesheet" href="assets/css/normalize.css">
		<link rel="stylesheet" href="assets/css/default.css">
	</head>
	<body>
		<!---------- HEADER ---------->
		<header class="header_visiteur">
			<section class="nav">
				<section class="member">
					<?php if(isset($_SESSION['user']['logged'])): ?>
						<a href="index.php?class=users&action=logout">
							<h2>Déconnexion </h2>
						</a>	
					<?php else: ?>
						<a href="index.php?class=users&action=login">
							<h2>Espace membre</h2>
						</a>
					<?php endif; ?>
					<a href="index.php">
						<img src="assets/img/logo.jpg" alt="logo">
					</a>
				</section>	
				<nav>
					<?php $categoryheader= Category::list();?>
					<?php   foreach($categoryheader as $cat): ?>  
						<a href="index.php?class=product&action=getbycategory&id=<?= $cat->getId() ?>"><?= $cat->getName()?></a>
					<?php endforeach ?>

					<?php if(isset($_SESSION['user']['logged'])): ?>
						<a href="index.php?class=order&action=ordercount">
							Mon espace
						</a>
					<?php endif; ?>
				</nav>	
			</section>
			<script
				src="https://code.jquery.com/jquery-3.4.1.min.js"
				integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
				crossorigin="anonymous">
			</script>
		</header>
	