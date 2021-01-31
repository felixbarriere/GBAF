<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

//Do not show protected data, redirect to login...
if (!$_SESSION['username'])
header('Location: connexion.php');

?>

<header>
					<div id="titre_principal">
						<div id="logo">
							<a href="sommaire.php"><img src="images/logo.png" alt="Logo GBAF" /></a>
							<!--<h1>GBAF</h1> -->   
						</div>                  
					</div>
					
					<nav>
						<ul>
							<li> <a href='profil.php'>
													
								<?php

								echo $_SESSION['username'];
								?>
								 
								</a></li>
							<li><a href="deconnexion.php">Déconnexion</a></li>
							
						</ul>
					</nav>
</header>