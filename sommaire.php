

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
					
						<h1>présentation du groupe</h1>
						
						<p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français : </p>
						<ul>
							<li><a>BNP Paribas</a></li>
							<li><a>BPCE</a></li>
							<li><a>Crédit Agricole</a></li>
							<li><a>Crédit Mutuel-CIC</a></li>
							<li><a>Société Générale</a></li>
							<li><a>La Banque Postale</a></li>							
						</ul>
						<br>
	<p> Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
	de la même façon pour gérer près de 80 millions de comptes sur le territoire
	national.
	Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
	les axes de la réglementation financière française. Sa mission est de promouvoir
	l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
	pouvoirs publics. </p>
						
							
			<img class="defense" src="images/defense.jfif" alt="defense" />						
								
				<h2> Présentation des acteurs </h2>
					<div id="partenaires">																										
									
				<?php									
					//aperçu des différents partenaires: on affiche les descriptions contenues dans la table "Partenaires".
					try
						{
							$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
						}
					catch (Exception $e)
						{							
							die('Erreur : ' . $e->getMessage());
						}
															
					$reponse = $bdd->query('SELECT nom, description, logo, ID FROM partenaires ORDER BY ID ASC LIMIT 0, 4 ');

				
				
					while ($donnees = $reponse->fetch())
					{
						$description = $donnees['description'];
						
						echo '<div class="partenaire3"> <br><img alt="logo" class="logo_partenaire" src = "'. ($donnees['logo']). '"/><h3>' . ($donnees['nom']) . '</h3> <p class="partenaire2">' . substr($description, 0, 106) .'...</p>';
						
						?><div class="afficher"><em><a class="afficher_button" href="presentation.php?id_billet=<?php echo $donnees['ID']; ?>">afficher plus</a></em></div><br>  </div>  <?php
					}					
				
					$reponse->closeCursor();
				?>								 								 									
			
					</div>
						
					
				</section>
				
			</div>	
		<?php include("footer.php");?>
    </body>	
</html>
