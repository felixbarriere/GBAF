<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link/>
        <title></title>
    </head>
    <body>			
			<?php
				// Connexion à la base de données
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}

				// Insertion du message à l'aide d'une requête préparée

				$req = $bdd->prepare('INSERT INTO informations (nom, prénom, username, password,question_secrète, réponse_question_secrète) VALUES(?, ?, ?, ?, ?, ?)');
				$req->execute(array($_POST['nom'], $_POST['prénom'],$_POST['username'],$_POST['password'],$_POST['question_secrète'],$_POST['réponse_question_secrète']));

				echo 'Votre message a bien été ajouté !';
				
				header('Location: profil.php');
			?>
			
    </body>

</html>