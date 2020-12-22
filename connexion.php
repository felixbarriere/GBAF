<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="GBAFpresentation.css" />
        <title>GBAF</title>
    </head>
    <body>
			<div id="bloc_page_utilisateur">
							
						<div id="header_connexion">
							<img class="logo_connexion" src="images/logo.png" alt="Logo GBAF" />
								<h2>Le Groupement Banquaire Assurance Francais	</h2>						
						</div>                  					
					
				
			

						
						
						<h1 id="titre_centre">Connectez-vous</h1>
						
						<p id="titre_centre"> nom d'utilisateur: </p>
				
				<section>
				
					<form action="profil.php" method="POST">
						
						
						<label for="nom"> Nom </label> :  <input type="text" name="nom" id="nom"/><br />
						<label for="prénom"> Prénom </label> :  <input type="text" name="prénom" id="prénom"/><br />
						<label for="username"> username </label> :  <input type="text" name="username" id="username"/><br />
						<label for="password"> password </label> :  <input type="text" name="password" id="password"/><br />
						
						<label for="question_secrète"> Question secrète </label> :  <input type="text" name="pseudo" id="pseudo"/><br />
						
						
						

						
						
						
						
						<p><input type="submit" /></p>
					</form>

				</section>
				
			</div>		
    </body>
	<?php include("footer.php");?>
</html>
