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

				$req = $bdd->prepare('INSERT INTO commentaires_partenaire1 (username, message) VALUES(?, ?)');
				$req->execute(array($_POST['username'], $_POST['message']));

				echo 'Votre message a bien été ajouté !';
				
				header('Location: GBAFpartenaire1.php');
			?>
			
    </body>

</html>