<!DOCTYPE html>
<?php session_start()?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Forum </title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	
	<body>
<div>
	The Forum
</div>

<div>
Liste des messages
</div>   
<?php
include("header.php");
$bdd = 'keydb';

                                $host = "localhost" ;

                                $user = "root" ;

                              $mdp = "root" ;

                              $link = mysqli_connect($host, $user, $mdp) ;

                               mysqli_select_db($link, $bdd) or die("Erreur de connexion à la base de donnée" );
								
                                $query = mysqli_query($link,"SELECT * FROM keydb.forum ORDER BY date DESC" ) or die (mysqli_error($link));
                                
                                while($donnees = mysqli_fetch_array($query)) { 
                                    echo '<div id="message_forum"><ul><li><span class=\"info_logement_x\">pseudo : '.$donnees['pseudo'].'</span></li>';
                                    echo '<li><span class=\"info_logement_x\">message : '.$donnees['message'].'</span></li>';
                                    echo '<li><span class=\"info_logement_x\">date du post : '.$donnees['date'].'</span>'.'</li></ul></div></br>';
                                }

?>
<form method="post"action="register_message.php">
<div>
<labels>Rentrez votre pseudo :</label></br>
<input type="textbox" id="pseudo" name="pseudo", required>
</div>
<div class="h1">
<label>Rentrez votre message : </label></br>
<textarea rows="4" cols="50" id="message" name ="message", required>
</textarea>
</div>
<div>
<input type="submit" "Envoyer" />
</div> 
<?php echo "<input type='hidden' id='date' name='date' value='".date('Y-m-d H:i:s')."'/>"; ?>
</form>
		<?php include("footer.php"); ?>
	</body>