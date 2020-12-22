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
				<h2>Le Groupement Banquaire Assurance Francais </h2>						
				</div>    

				<h1 id="titre_centre">Inscription</h1>													
				<section>
												
				<form action="inscription_data.php" method="post">
			
					<p>
						<label for="nom"> Nom </label> :  <input type="text" name="nom" id="nom"/><br />
						
						<label for="prénom"> Prénom </label> :  <input type="text" name="prénom" id="prénom"/></label><br />	
						
						<label for="username"> UserName </label> :  <input type="text" name="username" id="username"/></label><br />	

						<label for="password"> Password </label> :  <input type="password" name="password" id="password"/><br />
						
						<label for="question_secrète"> Question secrète </label> :  <input type="text" name="question_secrète" id="question_secrète"/></label><br />	
						
						<label for="réponse_question_secrète"> réponse à votre question secrète </label> :  <input type="text" name="réponse_question_secrète" id="réponse_question_secrète"/></label><br />
						
						<input type="submit" value="envoyer" />
					</p>
				</form>	

				</section>
				
			</div>		
    </body>
	<?php include("footer.php");?>
</html>
