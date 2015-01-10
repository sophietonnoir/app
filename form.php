<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Ajouter un logement</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />

	</head>


	<body>
		<?php include("header.php");
                if ($_SESSION == NULL):



                    echo "<article><br/><br/><br/><br/><h2>Merci de vous connecter !</h2></article>";
              else:

                  $adress=$_GET['add'];
              ?>


		<fieldset class="fieldset2">
                    <legend> Ajouter un logement: </legend>
                        
                    <div> <h3 >Ajouter des photos de votre logement </h3></div>

                        <form enctype="multipart/form-data" action="upload.php?ad=<?php echo $adress;?>" method="post"/>
                        
                        <input  type="file" name="monfichier" id="monfichier"/>

                        <input type="file" name="monfichier1" id="monfichier1"/>

                        <input type="file" name="monfichier2" id="monfichier1"/>


                        <br/><br>

                        <input type="submit" value="Suivant" class="submit"/>


</fieldset>




		<?php
                endif;

                include("footer.php"); ?>
	</body>
</html>