<?php



	$bdd = new PDO('mysql:host=localhost;dbname=keydb','root', '');
	unset($auth);
	$sql = $bdd->prepare('SELECT * FROM users WHERE mail= :mail AND password= :pass');
			
		if(isset($_SESSION['mail']) and isset($_SESSION['password']))
			{
			$sql->execute(array(
			'mail'=> $_SESSION['mail'],
			'pass'=> $_SESSION['password']));
			$auth=$sql->fetch();
			}
	


		if(!isset($_SESSION['id']) and !isset($auth))
			{
echo "<p>La page demande d'être authentifié pour continuer</p>
		<a href=connexion.php>Connectez-vous</a> ou bien <a href =inscription.php>inscrivez-vous</a> pour continuer.";
}


?>