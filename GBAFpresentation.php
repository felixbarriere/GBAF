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
			<div id="bloc_page">
				
				<?php include("menu1.php");?>

				<section>
					<article>
						<h1>présentation du groupe</h1>
						<p>Le Groupement Banque Assurance Français (GBAF) est une fédération
	représentant les 6 grands groupes français :

							<li><a>BNP Paribas</a></li>
							<li><a>BPCE</a></li>
							<li><a>Crédit Agricole</a></li>
							<li><a>Crédit Mutuel-CIC</a></li>
							<li><a>Société Générale</a></li>
							<li><a>La Banque Postale</a></li></br>
							
	Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
	de la même façon pour gérer près de 80 millions de comptes sur le territoire
	national.
	Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
	les axes de la réglementation financière française. Sa mission est de promouvoir
	l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
	pouvoirs publics.</p>
						
							
						<img class="defense" src="images/defense.jfif" alt="defense" />
						
						
						
							<div id="partenaires">
							
								<h1> Présentation des acteurs </h1>
								
								<div class="partenaire1"> 
								
									<img class="formation_picture" src="images/formation_co.png" alt="formation" />
								
									<div class="formation_text">
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
								</div> <br>
 
								<div class="partenaire2">
									<img class="protect_picture" src="images/protectpeople.png" alt="protect" />
									<div class="formation_text"> 
								
				<?php									
					try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
						}
					catch (Exception $e)
						{							
							die('Erreur : ' . $e->getMessage());
						}
										
					$reponse = $bdd->query('SELECT description FROM partenaires WHERE nom=\'partenaire2\' ');

					while ($donnees = $reponse->fetch())
					{
						echo  htmlspecialchars($donnees['description']);
					}		
					
					$reponse->closeCursor();
				?>												
									</div>
								</div> <br>
									 
								<div class="partenaire3">
									<img class="Dsa_picture" src="images/Dsa_france.png" alt="Dsa" />
									<div class="formation_text"> 
				<?php									
					try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
						}
					catch (Exception $e)
						{							
							die('Erreur : ' . $e->getMessage());
						}
										
					$reponse = $bdd->query('SELECT description FROM partenaires WHERE nom=\'partenaire3\' ');

					while ($donnees = $reponse->fetch())
					{
						echo  htmlspecialchars($donnees['description']);
					}		
					
					$reponse->closeCursor();
				?>
									</div> 
								</div><br>								 
								 								 
								 <div class="partenaire4">
									<img class="CDE_picture" src="images/CDE.png" alt="CDE" />
									<div class="formation_text"> 
				<?php									
					try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
						}
					catch (Exception $e)
						{							
							die('Erreur : ' . $e->getMessage());
						}
										
					$reponse = $bdd->query('SELECT description FROM partenaires WHERE nom=\'partenaire4\' ');

					while ($donnees = $reponse->fetch())
					{
						echo  htmlspecialchars($donnees['description']);
					}		
					
					$reponse->closeCursor();
				?>				
									</div> 
								</div><br>
							</div>
						
					</article>
				</section>
				
			</div>		
    </body>
	<?php include("footer.php");?>
</html>
