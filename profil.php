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
				<?php include("menu1.php");?>
				<?php
				
				// En arrivant sur la page, les champs sont préremplis par les valeurs déjà existantes dans la table.
		
				
					// Connexion à la base de données
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root','');
					}
					catch(Exception $e)
					{
							die('Erreur : '.$e->getMessage());
					}				

					$username=$_SESSION['username'];


					// Affichage des informations à l'aide d'une requête préparée
				
					$req = $bdd->prepare('SELECT nom, prenom, username, question_secrete, reponse_question_secrete FROM informations WHERE username = :username');
					$req->execute(array(
					'username' => $username));
					$resultat = $req->fetch();	
																
				?>


	<h1>Paramètres du compte</h1>
						
	<h2> Modifier vos informations  </h2>
	
		<section>			
																				
			
				<form action="profil.php" method="POST"> 
				<label for="nom"> Nom:</label>   <input type="text" name="nom" id="nom" value= '<?php echo $resultat['nom']?>'/><br />
							
				<label for="prenom"> Prenom: </label>  <input type="text" name="prenom" id="prenom" value= '<?php echo $resultat['prenom']?>'/><br />	
							
				<label for="username"> UserName: </label>   <input type="text" name="username" id="username" value= '<?php echo $resultat['username']?>'/><br />	

				<label for="password"> Password: </label>   <input type="password" name="password" id="password"/><br />
							
				<label for="question_secrete"> Question secrète: </label>   <input type="text" name="question_secrete" id="question_secrete" value= '<?php echo $resultat['question_secrete']?>'/><br />	
							
				<label for="reponse_question_secrete"> Réponse à votre question secrète: </label>   <textarea name="reponse_question_secrete" id="reponse_question_secrete"></textarea><br />
							
				<input  id="bouton" type="submit" value="valider les modifications" name="envoyer" />
			</form>										
		
			


		<?php
		//L'utilisateur modifie ce qu'il souhaite (UPDATE).
		
		
		if(isset ($_POST['envoyer']))			
		{
			if (!empty ($_POST['nom']) AND !empty ($_POST['prenom']) AND !empty ($_POST['username']) AND !empty ($_POST['password']) AND !empty ($_POST['question_secrete']) AND !empty ($_POST['reponse_question_secrete']))
			{			
			
			
			// Hachage du mot de passe
				$pass_hache = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);		
				$actualusername = $_SESSION['username'];
				
				$nom = htmlspecialchars($_POST['nom']);
				$prenom = htmlspecialchars($_POST['prenom']);
				$username = htmlspecialchars($_POST['username']);
				$question_secrete = htmlspecialchars($_POST['question_secrete']);
				$reponse_question_secrete = htmlspecialchars($_POST['reponse_question_secrete']);	
			
				$verify_username = $bdd->prepare('SELECT username FROM informations WHERE username=?');
				$verify_username->execute(array($username));
				$user = $verify_username->rowCount();	
				if (($user >=1) AND ($resultat['username'] != $username))
				{
					echo '<p class="error_message"> pseudo existant! </p>';
				}
				else{				
					$req = $bdd->prepare('UPDATE informations SET nom = ?, prenom= ?, username= ?, password= ?,question_secrete= ?, reponse_question_secrete = ? WHERE username = ?');									
					$req->execute(array($nom, $prenom, $username, $pass_hache, $question_secrete, $reponse_question_secrete, $actualusername  ));	
			
					header('Location: connexion.php');
					echo 'Vos informations ont bien été modifiées !';			
					} 
			}
			else 
				{
					echo '<p class="error_message">  Veuillez remplir tous les champs !</p>';
				}
		}
		?>




			
		<br>
	<p> Retourner sur la <a href="sommaire.php"> présentation de nos partenaires </a>.</p>
					
	</section>
				
			</div>		
		<?php include("footer.php");?>
	</body>
	
</html>
