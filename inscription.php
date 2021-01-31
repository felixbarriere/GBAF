<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="GBAFpresentation.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">		
		<title>GBAF</title>
    </head>
    <body>
			<div id="bloc_page_utilisateur">
							
				<div id="header_connexion">
					<img class="logo_connexion" src="images/logo.png" alt="Logo GBAF" />
				<h2>Le Groupement Banquaire Assurance Francais </h2>						
				</div>    

				<h1 id="titre_centre">Inscription</h1>													
																
				<form action="inscription.php" method="post">
			
					<p>
						<label for="nom"> Nom:</label>   <input type="text" name="nom" id="nom"/><br />
						
						<label for="prenom"> Prenom: </label>  <input type="text" name="prenom" id="prenom"/><br />	
						
						<label for="username"> UserName: </label>   <input type="text" name="username" id="username"/><br />	

						<label for="password"> Password: </label>   <input type="password" name="password" id="password"/><br />
						
						<label for="question_secrete"> Question secrète: </label>   <textarea name="question_secrete" id="question_secrete"></textarea><br />	
						
						<label for="reponse_question_secrete"> réponse à votre question secrète: </label>   <textarea name="reponse_question_secrete" id="reponse_question_secrete"></textarea><br />
						
						<input id="bouton" type="submit" name="envoyer" />
					</p>
				</form>	

	<?php
		if (isset($_POST["envoyer"]))			
		{				
			if (empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['question_secrete']) OR empty($_POST['reponse_question_secrete']))
			{
				echo '<p class="error_message"> Veuillez remplir tous les champs </p>';
			}					
			else{
				// Connexion à la base de données
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root','');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}

				$username = htmlspecialchars($_POST['username']);
				$verify_username = $bdd->prepare('SELECT username FROM informations WHERE username=?');
				$verify_username->execute(array($username));
				$user = $verify_username->rowCount();	
				if ($user >=1)
				{
					echo '<p class="error_message"> pseudo existant </p>';
				}
					else
					{				
					
					// Hachage du mot de passe					
					$pass_hache = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
													
					// Insertion des informations									
					
						$req = $bdd->prepare('INSERT INTO informations (nom, prenom, username, password,question_secrete, reponse_question_secrete) VALUES( :nom, :prenom, :username, :password, :question_secrete, :reponse_question_secrete)');					
						
						$req->execute(array(
						':nom' => $_POST['nom'],
						':prenom' => $_POST['prenom'],
						':username' => $_POST['username'],
						':password' => $pass_hache,
						':question_secrete' => $_POST['question_secrete'],
						':reponse_question_secrete' => $_POST['reponse_question_secrete']));	
					
					
						header ('Location: connexion.php');
					}	
			}
		}					
	?>				
				
			</div>	
		<?php include("footer.php");?>
    </body>	
</html>
