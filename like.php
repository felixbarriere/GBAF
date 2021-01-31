<?php include("menu1.php");?>
<?php									
	
	/* On récupère le nombre de clics de l'utilisateur.
	   Si le nombre de like/dislike = 0, on passe à 1.
	   Si le nombre de like/dislike = 1:  - on passe à 0 (si on clique sur le meme t)
										  - on passe à 0 et on augmente l'autre t à 1 (si on clique sur l'autre t) */
	
	
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
	
	if(isset($_GET['t'], $_GET['id']) AND !empty ($_GET['t']) AND !empty($_GET['id']))
		{
			$getid = (int) $_GET['id'];
			$gett = (int) $_GET['t'];
			$id_membre = $_SESSION['id'];
			
			
			$check = $bdd->prepare('SELECT ID FROM partenaires WHERE ID=?');
			$check->execute(array($getid));
			
			
			
			if($check->rowCount() == 1){
				if($gett == 1) {
					$check_like = $bdd->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
					$check_like->execute(array($getid, $id_membre));
					
					$delete = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
					$delete->execute(array($getid, $id_membre));
					
					if($check_like->rowCount() == 1) {
					$delete = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
					$delete->execute(array($getid, $id_membre));
					} else {					
					$ins = $bdd->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
					$ins->execute(array($getid, $id_membre));
					}	
					
				} elseif ($gett == 2) {
					$check_dislike = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
					$check_dislike->execute(array($getid, $id_membre));
					
					$delete = $bdd->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
					$delete->execute(array($getid, $id_membre));
					
					if($check_dislike->rowCount() == 1) {
					$delete = $bdd->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
					$delete->execute(array($getid, $id_membre));
					} else {
						$ins = $bdd->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
						$ins->execute(array($getid, $id_membre));
					}
				}
					
					
				
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				
			} else{
				echo('erreur');
			}
		} else {
			echo ('erreur!');
		}	
?>