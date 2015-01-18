<?php $sql1 = $bdd->prepare('SELECT * FROM users WHERE pseudo= :pseudo');
	$sql1->execute(array(
	'pseudo'=> $_POST['pseudo']));
	$auth=$sql1->fetch();
?>