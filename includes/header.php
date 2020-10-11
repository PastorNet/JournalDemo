<!DOCTYPE html>
<html lang="en">
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
			<?php if ( 'home' === $currentPage )  { ?>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
					<script src="js/imageloaded.js"></script>
					<script src="js/common.js"></script>
		      <link rel="stylesheet" type="text/css" href="css/style.css">
				<?php } else{  ?>
					<link rel="stylesheet" type="text/css" href="css/article.css">
				<?php } ?>


			<title><?= $pageTitle; ?> - The Vimage Journal</title>
	</head>
	<body>
		<div class ="maingrid">
			<header class="pageHeader">

				<img  src="images/logo.png" width="360" alt="Vimage">
			</header>
			<nav class="pageNav">
				<ul class = "menu">
					<li <?php if ( 'home' === $currentPage ) echo 'class="active"'?>><a href="index.php">Главная</a></li>
					<li <?php if ( 'radio' === $currentPage ) echo 'class="active"'?>><a href="">Радио</a></li>
					<li <?php if ( 'articles' === $currentPage ) echo 'class="active"'?>><a href="">Статьи</a></li>
					<li <?php if ( 'about' === $currentPage ) echo 'class="active"'?>><a href="">О нас</a></li>
				</ul>
			</nav>
