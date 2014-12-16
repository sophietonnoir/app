<?php Session_start()?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Forum</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		
<?php include ("header.php");?>

	</head>
	<?php $sql = $bdd->query('SELECT id, titre, , DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM topics ORDER BY date_creation DESC LIMIT 0, 5');
	while ($donnees = $sql->fetch())
	{
	?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
	<?php } ?>
	</body>
<?php include ("footer.php")?>

</html>