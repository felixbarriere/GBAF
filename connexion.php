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
			
			<?php include("menu2.php");?>
							
						<div id="header_connexion">
							<img class="logo_connexion" src="images/logo.png" alt="Logo GBAF" />
								<h2>Le Groupement Banquaire Assurance Francais	</h2>						
						</div>                  																	
						<h1 id="titre_centre">Connectez-vous</h1>
				
				
				
					<form action="connexion.php" method="POST">
																				
						<label for="username"> username: </label>   <input type="text" name="username" id="username"/><br />
						
						<label for="password"> password: </label>   <input type="password" name="password" id="password"/><br />											
						<input  id="bouton" type="submit"  value="envoyer" name="envoyer"/>
					</form>
						
				
				<?php
					if (isset ($_POST['password']))
					{         
						  $username = htmlspecialchars($_POST['username']);
						  $password = htmlspecialchars($_POST['password']);
					  // connection a la table "informations"
						  try
							  {
								   $bdd = new PDO(
								   'mysql:host=localhost;dbname=gbaf','root','');
							  }
					 
						  catch(Exception $e)
							  {
								die('Erreur : '.$e->getMessage());
							  }
							  
						// On récupère tout le contenu de la table "informations"
						$req = $bdd->prepare('SELECT id, password FROM informations WHERE username = :username');
						$req->execute(array(
							'username' => $username));
						$resultat = $req->fetch();
						
						
						// Comparaison du pass envoyé via le formulaire avec la base
						$isPasswordCorrect = password_verify($password, $resultat['password']);

						if (!$isPasswordCorrect AND !empty($_POST['username']) AND !empty($_POST['password']))
						{
							echo '<p class="error_message"> Mauvais identifiant ou mot de passe !</p>';
							
						}
						else
						{
							if ($isPasswordCorrect AND !empty($_POST['username']) AND !empty($_POST['password'])){
								session_start();
								$_SESSION['id'] = $resultat['id'];
								$_SESSION['username'] = $username;
								header('Location: sommaire.php');	
								
							}
							else {
								echo '<p class="error_message"> Merci de rentrer un identifiant ou mot de passe ! </p>';
								
							}
						} 
					}
?>
				<br><br>
				<a href="question_secrete.php" > J'ai oublié mon mot de passe </a> 
				<br><br>
			</div>	
		<?php include("footer.php");?>			
    </body>
</html>
