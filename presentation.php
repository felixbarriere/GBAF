<?php 

	if (isset($_GET['id_billet']))
{		
	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{							
	die('Erreur : ' . $e->getMessage());
	}														
	
	$ID = htmlspecialchars($_GET['id_billet']);
	
	$reponse = $bdd->prepare('SELECT ID FROM partenaires WHERE ID=?');
	$reponse->execute(array($ID));
	$donnees = $reponse->rowCount();	
				
		if ($donnees != 0 )
		{ ?>

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


	<section>
		<article>
			<h1> Présentation des acteurs </h1>
				
				
				<div>
				<?php 
																	
					//affichage de la description du partenaire. On récupère l'ID du partenaire via $_GET afin d'afficher la bonne description.
					
					$id_partenaire = $_GET['id_billet'];
					$reponse = $bdd->prepare('SELECT * FROM partenaires WHERE id = :id');
					$reponse->execute(array(
							'id' => $id_partenaire)); 
					$donnees = $reponse->fetch();
					
					?> <h2><?php echo $donnees['nom'] ?></h2> <?php

					
						echo '<div class="partenaire3"><img class="logo_partenaire2" alt="logo" src = "'. ($donnees['logo']). '"/> <br><br>';
					
						echo  $donnees['description'] . ' ';																
					$reponse->closeCursor();		
																				
					
					// Comptage du nombre de clics cumulés sur les boutons like/dislike 
					// envoi sur la page like.php
					
					$id = $donnees['ID'];
					
					$likes = $bdd->prepare('SELECT id FROM likes WHERE id_partenaire = ?');
					$likes->execute(array($id));
					$likes = $likes->rowCount();
					

					$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_partenaire = ?');
					$dislikes->execute(array($id));
					$dislikes = $dislikes->rowCount();
				?>
				
				<br> <br>
				<a href="like.php?t=1&id=<?= $id ?>&id=<?=$id_partenaire?>"> <img class="like" src="images/like.png" alt="like"/></a> (<?= $likes ?>) 
							
				<a href="like.php?t=2&id=<?= $id ?>"> <img class="dislike" src="images/dislike.png" alt="dislike"/></a> (<?= $dislikes ?>) <br>
				
				</div>
				</div>
				
			<br/>	
				 
				 <h3>Faites-nous part de vos retour!</h3>
				 	
				<form action="presentation.php?id_billet=<?php echo $donnees['ID']; ?>" method="post">								
									
				<label for="message"> Message: </label>   <textarea name="message" id="message" ></textarea> <br />							
				<input id="bouton" type="submit" value="envoyer" name="envoyer" />
								
				</form>	
				
				<?php
				//ecriture des commentaires dans la table "Commentaires".
				
					if (isset ($_POST["envoyer"]))
					{
						
					$_POST['message'] = trim($_POST['message']);
					
					$ID_user=$_SESSION['username'];
				
					$verify_user = $bdd->prepare('SELECT COUNT(*) AS "nombre_commentaire" FROM commentaires WHERE ID_user=? AND id_partenaire=?');
					$verify_user->execute(array($ID_user, $id));
																				
					$resultat = $verify_user->fetchAll();
																				
					$nombre_commentaire = $resultat[0]["nombre_commentaire"];
																					
						if (empty($_POST['message']))
						{
								echo '<p class="error_message"> Merci de remplir le champ</p>';
						}	
						elseif ($nombre_commentaire != 0)
							{
								echo '<p class="error_message"> Vous avez déjà posté un commentaire. </p>';
							}																		
						else
						{
					
					// Insertion du message à l'aide d'une requête préparée

					$req = $bdd->prepare('INSERT INTO commentaires (ID_user, message, id_partenaire) VALUES(?,?,?)');
					$req->execute(array($_SESSION['username'], htmlspecialchars($_POST['message']), $donnees['ID']));							
								
						echo '<div class="partenaire4">Votre message a bien été ajouté !</div>';
						}			
					}
				?>
								
															
			
			<div class="partenaire3">
				<h2>Commentaires</h2>
				
				
				<?php
				//affichage des commentaires										
									
				// On récupère tout le contenu de la table
				$reponse = $bdd->prepare('SELECT ID_user, message, date_message FROM commentaires WHERE id_partenaire = ?  ORDER BY ID DESC LIMIT 0, 15');
				$reponse->execute([$id]);
				
				// On affiche chaque entrée une à une
				while ($donnees = $reponse->fetch())
				{
				echo '<p><strong>' . $donnees['ID_user'] . ' </strong>le ' .$donnees['date_message'] . ' <br/>' . $donnees['message'] . '</p>';
				}							
									
				$reponse->closeCursor();
				?>
			
													
			</div>
		
		<br>
			 Retourner sur la <a href="sommaire.php"> présentation de nos partenaires </a>.
			</article>
		</section>
				
			</div>	
		<?php include("footer.php");?>
    </body>	
</html>
<?php }
		else
		{
			echo '<p class="error_message"> erreur </p>';
		}
	}
	else
	{
		echo '<p class="error_message"> erreur </p>';
	}
?>