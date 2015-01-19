<?php session_start();
if (!isset($_SESSION['id'])):
session_destroy();
include ('index.php');
elseif ($_SESSION['admin']!=1):
session_destroy();
include ('index.php');
elseif ($_SESSION['admin']=1):
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - Backoffice</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
		<link rel="stylesheet" href="connexion.css" />
	</head>

	<?php 
	include("Bdd.php");
		if (isset($_GET['page']))
		{
		$url=$_GET['page']; 
		
		
			switch($url)
			{
			//case ("edit"):
			//	if (isset($_POST['page']))
			//{
			//	$edit=$_POST['page'];
			//	include ("boeditvue.php");
			//	include ("boeditcontroleur.php");
			//	}
			//	else
			//	{
				//echo ("erreur 404 la page n\'existe pas");
			//	}
			//break;
			

			case ("profilsearch"):
				include("searchprofil.php");
				
			break;
                    case ("critere"):
				include("admincriteres.php");

			break;
                    case ("effacer"):
                                include("effacercritere.php");
                        break;
			}
		}
		else 
		{
		include("boindex.php");
		//include("bocontroleur.php");
		}
	
	endif;?>
	

