<main class="main-content" id="main-page">
	<div class="mainOverlay">
		<header>
			<h1>Un Quiz avec AdFab</h1>
		</header>

		<?php if (empty($_SESSION['user'])) { ?>
		<div class="row">
			<form method="POST" action="" class="connection">
				<!-- success sign up -->
				<div class="success-signup" style="display: none">
					<div class="title"><h1>Compte Créé !</h1></div>
					<div class="image">
						<!-- <img src="" alt="Sign up success"> -->
					</div>
					<div class="text">
						<h3>Tu es maintenant prêt à débuter le quiz.</h3>
					</div>
					<a href="index.php?action=quiz-first-time"><span>Maintenant !</a>
				</div>
				<!-- end success sign up -->
				<!-- sign in -->
				<div id="signin">
					<div class="title">
						<h2>Se connecter !</h2>
						<h6>Connecte toi à ton compte pour commencer le quiz.</h6>
					</div>
					<div class="form-group">
						<input type="email" name="emailsignin" placeholder="ton@courriel.com" class="form-control" id="email-signin">
					</div>
					<div class="form-group">
						<input type="password" name="pwdsignin" placeholder="Mot de passe" class="form-control" id="pwd-signin">
					</div>
					<button id="signin-btn">Connexion</button>
					<div class="external">
						<a href="#" id="createacc" style="color: #fff;">Créé un compte</a>
					</div>
					<div class="login-results">
						
					</div>
				</div>
				<!-- end sign in -->
				<!-- sign up -->
				<div id="signup">
					<div class="title">
						<h2>S'inscrire !</h2>
						<h6>Crée toi un compte pour commencer le quiz.</h6>
					</div>
					<div class="form-group">
						<input type="text" name="namesignup" placeholder="Ton nom içi" class="form-control" id="name-signup">
					</div>
					<div class="form-group">
						<input type="email" name="emailsignup" placeholder="ton@courriel.com" class="form-control" id="email-signup">
					</div>
					<div class="form-group">
						<input type="password" name="pwdsignup" placeholder="Mot de passe" class="form-control" id="pwd-signup">
					</div>
					<div class="form-group">
						<input type="password" name="pwd2signup" placeholder="Confirme le mot de passe" class="form-control" id="pwd2-signup">
					</div>
					<button id="signup-btn">S'inscrire</button>
					<div class="external">
						<a href="#" id="already" style="color: #fff;">Déjà un compte ?</a>
					</div>
					<div class="login-results">
						
					</div>
				</div>
				<!-- end sign up -->
			</form>
		</div>
		<?php } else { ?>
		<div class="row home-connected">
			<h3>Hey <?php echo $_SESSION['user'] ?>, tu as accumulé <?php echo $_SESSION["score"] ?> point(s) jusqu'à ce jour. Es-tu prêt à débuter le quiz ?</h3>
			<a href="index.php?action=quiz">Commence</a>
		</div>
		<?php } ?>

	</div>
</main>