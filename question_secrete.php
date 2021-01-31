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
	<?php
	
	/* Les messages s'affichent au fur et à mesure des réponses de l'utilisateur.
	   On demande d'abord le Username. */
	
	if (!isset($_POST['envoyer']) AND !isset($_POST['envoyer2'])) 
	{ 	
	?>	
	
	<p>Répondez à votre question secrète afin de récupérer votre mot de passe:</p>
		
		
		<form action="question_secrete.php" method="POST">						
												
			<label for="username"> username: </label>   <input type="text" name="username" id="username" /><br>																														
			<p> <input id="bouton" type="submit"  value="envoyer" name="envoyer"/></p>
		</form>
		
	<?php } 	
			//Si le USername existe, on affiche la question secrète associée. 
		
		if (isset ($_POST['envoyer']))
		{			
			if (isset ($_POST['username']) )
			{         
			$username = htmlspecialchars($_POST['username']);
				  
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
				$req = $bdd->prepare('SELECT * FROM informations WHERE username = :username');
				$req->execute(array(
					'username' => $username));
				$resultat = $req->fetch();		

				if ((!$resultat) AND !empty($username))
				{
					
					echo '<p class="error_message">Mauvais identifiant <br> <a href="question_secrete.php"> Réessayer </a> </p>';					
				}				
			}
		if (empty($username))
			{
				echo '<p class="error_message"> Merci de rentrer votre identifiant <br> <a href="question_secrete.php"> Retour </a> </p>';
			}		
		
		//On demande la réponse à la question secrète.
		
		if ($resultat AND !empty($username)){?>
		
		<p> Pseudo: <?php echo $resultat['username']; ?>  </p>
		
		<p> Votre question: <?php echo $resultat['question_secrete']; ?></p>
				
				
					<form action="question_secrete.php" method="POST">
																											
						
						<label for="reponse_question_secrete"> Réponse: </label>   <textarea  name="reponse_question_secrete" id="reponse_question_secrete"/></textarea>
						<br />											
						<p> <input id="bouton" type="submit"  value="envoyer" name="envoyer2"/></p>
					</form>
		<?php  }}	?>	
					
		<?php  
			//Si la réponse est juste, on autorise l'enregistrement d'un nouveau mot de passe. 
		
		if (isset ($_POST['envoyer2']))
		{		
				if (isset ($_POST['reponse_question_secrete']))
					{         
					 
					 
					$reponse_question_secrete = htmlspecialchars($_POST['reponse_question_secrete']);
								
					
					// On récupère tout le contenu de la table "informations"
					try
					  {
						   $bdd = new PDO(
						   'mysql:host=localhost;dbname=gbaf','root','');
					  }			 
				  catch(Exception $e)
					  {
						die('Erreur : '.$e->getMessage());
					  }
					$req = $bdd->prepare('SELECT * FROM informations WHERE reponse_question_secrete = :reponse_question_secrete');
					$req->execute(array('reponse_question_secrete' => $reponse_question_secrete));
					$resultat = $req->fetch();		 
					
					$isdataCorrect = $reponse_question_secrete == $resultat['reponse_question_secrete'];
					
					if ($isdataCorrect)
					{
						
					}
					else
						{
							echo '<p class="error_message">Mauvaise réponse <br> <a href="question_secrete.php"> Réessayer </a></p>';
						}					
					
					}
			if (empty($reponse_question_secrete))
				{
					echo '<p class="error_message">Merci de rentrer une réponse <br> <a href="question_secrete.php"> Retour </a> </p>';
				}
			

			//Enregistrement du nouveau mot de passe. 
			
			if ($resultat AND !empty($reponse_question_secrete))
			{?>
			
			<p>Réponse correcte! 
			<br><br>
						Vous pouvez désormais réenregistrer votre mot de passe</p>																																
				
				
				<p> Pseudo: <?php echo $resultat['username']; ?>  </p>
				
					<form method="POST" action="question_secrete.php" >					
					
					<input type="hidden" name="username" value="<?php echo $resultat['username']; ?>" id="username"/>
							
					<label for="nouveau_mot_de_passe"> Nouveau mot de passe:  </label>  <input type="password" name="nouveau_mot_de_passe" id="nouveau_mot_de_passe"/>
							<br>										
							
						<input id="bouton" type="submit"  value="envoyer" name="envoyer3"/></p>
					</form>
					
		<?php	
			}
		}							
											
		if (isset ($_POST['envoyer3']))			
		{	if (isset ($_POST['username']) AND isset ($_POST['nouveau_mot_de_passe']))			
			{				
				try
					  {
						   $bdd = new PDO(
						   'mysql:host=localhost;dbname=gbaf','root','');
					  }			 
				  catch(Exception $e)
					  {
						die('Erreur : '.$e->getMessage());
					  }
					  
				// Hachage du mot de passe
				$pass_hache = password_hash($_POST['nouveau_mot_de_passe'], PASSWORD_DEFAULT);						
				$username = $_POST['username'];
				
				try
				{
					$req = $bdd->prepare('UPDATE informations SET password = ? WHERE username = ?');										
					$req->execute(array($pass_hache, $username));

				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}
										
				header('Location: connexion.php');
				echo 'Vos informations ont bien été modifiées !';
							
			}	
			
			if (empty($_POST['nouveau_mot_de_passe']))
			{
				echo '<p class="error_message">Merci de rentrer une réponse </p>';
			}	
		}	
		?>												
						
		</div>		
		<?php include("footer.php");?>
	</body>	
</html>
