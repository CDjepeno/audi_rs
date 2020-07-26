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
		<link rel="stylesheet" href="assets/css/base.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/dashbord.css">
	</head>
	<body>
		<!---------- HEADER ---------->
		<header class="header_dashboard">
			<section class="nav">
					<section class="member">
						<a href="index.php?class=users&action=logout">
							<h2>Deconnexion</h2>					
						</a>
						<a href="index.php">
							<img src="assets/img/logo.jpg" alt="logo">
						</a>
					</section>	
				<nav>
					<?php $categorydashbord = Category::list(); ?>
					<?php foreach($categorydashbord as $cat): ?>  
						<a href="index.php?class=product&action=getbycategory&id=<?= $cat->getId() ?>"><?= $cat->getName()?></a>
					<?php endforeach ?>
				</nav>	
			</section>

		</header>
		