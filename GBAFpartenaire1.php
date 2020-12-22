<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="GBAFpresentation.css" />
        <title>GBAF</title>
    </head>
    <body>
			<div id="bloc_page_partenaire">
				<?php include("menu1.php");?>


				<section>
					<article>
						<h1> Présentation des acteurs </h1>
							<h2>Formation & co</h2>
						
							<img class="defense" src="images/formation_co.png" alt="formation" />
						
							<div>
								<?php									
									try
										{
											$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
										}
									catch (Exception $e)
										{							
											die('Erreur : ' . $e->getMessage());
										}
														
									$reponse = $bdd->query('SELECT description FROM partenaires WHERE nom=\'partenaire1\' ');

									while ($donnees = $reponse->fetch())
									{
										echo  htmlspecialchars($donnees['description']);
									}		
									
									$reponse->closeCursor();
								?>
							 </div>
							<br/>	
							
							<form action="commentaires_partenaire1_data.php" method="post">
								
							<h2>Faites-nous part de vos retour!</h2>	
								
								<p>
									<label for="username"> Username </label> :  <input type="text" name="username" id="username"/><br />
									
									<label for="message"> Message </label> :  <input type="text" name="message" id=""message/></label><br />							
									<input type="submit" value="envoyer" />
								</p>
							</form>	
							
							<div>
								<h2>Commentaires</h2>
								
								<?php
									// Sous WAMP										
									try
										{
											// On se connecte à MySQL
											$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
										}
									catch (Exception $e)
										{
											// En cas d'erreur, on affiche un message et on arrête tout
											die('Erreur : ' . $e->getMessage());
										}
									
									// Si tout va bien, on peut continuer
									// On récupère tout le contenu de la table jeux_video
									$reponse = $bdd->query('SELECT username, message FROM commentaires_partenaire1 ORDER BY ID DESC LIMIT 0, 10');

									// On affiche chaque entrée une à une
									while ($donnees = $reponse->fetch())
									{
										echo '<p><strong>' . htmlspecialchars($donnees['username']) . '</strong> <br/>' . htmlspecialchars($donnees['message']) . '</p>';
									}							
									
									$reponse->closeCursor();
								?>
								
								
							</div>
					</article>
				</section>
				
			</div>		
    </body>
	<?php include("footer.php");?>
</html>
