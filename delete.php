<?php
include("Bdd.php");

$sql1 = $bdd->prepare('DELETE FROM keydb.users WHERE pseudo= :pseudo');
$sql1->execute(array(
	'pseudo'=> $_POST['pseudo']));
echo('fait');

