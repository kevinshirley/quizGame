<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quiz avec AdFab - Test Back</title>
    <meta name="author" content="">
	<meta name="description" content="">
    <meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="ui/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="ui/font-awesome/css/font-awesome.min.css">
    <!-- <script src="ux/modernizr.js"></script> -->
    <!-- <link rel="stylesheet" href="ui/animate.css"> -->
    <link rel="stylesheet" type="text/css" href="ui/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="ui/style.css"> -->
    <script src="ux/main.js"></script>
</head>
<body>
<div class="fullcontainer">

	<nav class="headNav">
		<div class="logo">
			<a href="index.php"><img src="http://kevinshirley.com/jvmesgray/img/kevinshirley.png" alt="logo"></a>
		</div>
		<div class="mainNav">
			<div class="nav">
				<?php if (empty($_SESSION["user"])) { ?>
				<a href="index.php?action=apropos">À propos</a>
				<a href="http://kevinshirley.com" target="_blank">Contact</a>
				<?php } else { ?>
					<span>Bonjour <?php echo $_SESSION["user"] . ' ' ?></span>
					<a href="index.php?action=logout">Logout</a>
				<?php } ?>
			</div>

			<div class="button_container" id="toggle">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>

			<div class="overlay" id="overlay">
				<nav class="overlay-menu">
					<ul>
						<?php if (empty($_SESSION["user"])) { ?>
						<li><a href="index.php?action=apropos">À propos</a></li>
						<?php } else { ?>
						<li class="session-li"><p>Bonjour <?php echo $_SESSION["user"] . ' ' ?></p></li>
						<li><a href="index.php?action=logout">Logout</a></li>
						<?php } ?>
						<li><a href="http://kevinshirley.com" target="_blank">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</nav>

	<!-- <div id="searchOverlay" class="searchOverlayOff"></div> -->

    <?php echo $contenu; ?>

	<footer class="footer">
		
		<div class="foot-2" style="padding-top: 50px;">
			<p>&copy; <?php echo date("Y"); ?> Kevin Shirley, Tous droits réservés.</p>
		</div>
	</footer>
</div>

</body>