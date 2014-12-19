<?php Session_start();
include("Bdd.php");
$sql=$bdd->query("SELECT * FROM keydb.criterelogement");
$sql2=$bdd->query("SELECT * FROM keydb.criterelinklog");
$sql=$sql->fetch();
$sql2=$sql2->fetch();



