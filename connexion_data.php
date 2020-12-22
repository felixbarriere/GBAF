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
					$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
				}
				catch(Exception $e)
				{
						die('Erreur : '.$e->getMessage());
				}

				// Insertion du message à l'aide d'une requête préparée

				$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
				$req->execute(array($_POST['pseudo'], $_POST['message']));

				echo 'Votre message a bien été ajouté !';
				
				header('Location: minichat.php');
			?>
			
    </body>

</html>