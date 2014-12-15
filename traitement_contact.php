<?php session_start()?>

<?php

if(isset($_POST['prenom']) && isset($_POST['nom']) && isset ($_POST['objet']) && isset($_POST['email']) && isset($_POST['message'])){
	if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['message'])){
		//Exécution si le formulaire est posté et si les champs sont remplis

			$destinataire = "iza.ouahes@yahoo.fr";
			

			$nom = $_POST['nom'];
			$prenom =$_POST['prenom'];
			$email = $_POST['email'];
			$objet = $_POST['objet'];
			$message = $_POST['message'];
			$headers  = 'From: "$email"' . "\r\n" .
     		'Reply-To: webmaster@example.com' . "\r\n" .
     		'X-Mailer: PHP/' . phpversion();
			
			echo $message;
			ini_set("SMTP","hermes.isep.fr");
			ini_set("sendmail_from",$email);

			//'Reply-To: '$_POST['email']'."\r\n".;
			//'X-Mailer: PHP/'.phpversion();
			

		
			

			if (mail($destinataire,$objet,$message,$headers)){
				//Le mail a été expédié
				echo 'Message envoyé'; 
			}
			else {
				//Le mail n'a pas été expédié
			 	echo "Une erreur est survenue lors de l'envoi du formulaire par email";
			 }
 	}
}
?>


<!--
if (isset($_POST['prenom']))
{
// teste les valeurs.
$nom=trim(addslashes($_POST['nom']));
$mail=trim(addslashes($_POST['mail']));
$tableau=array();
$tableau=Explode("@",$mail,2);
// echo $tableau[0];
if ($nom=="" || $nom=="Nom")
{
echo "Veuillez rentrer un nom";
}elseif ($mail==""){
echo "Rentrez une adresse mail";
}elseif (!isset($tableau[1])) {
echo"Rentrez une adresse valide";
}else{
// entrée des valeurs dans la table MySQL, envoi des données à une adresse mail.

}
}



}
-->