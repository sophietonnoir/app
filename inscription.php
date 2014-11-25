<?php session_start()?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="K2K.css" />
		<title>Key To Key - le nom de ma pagecoucuco</title>
		<link rel="icon" type="image/gif" href="Img/icone.gif" />
	</head>
	
	
	<body>
		<?php include("header.php"); ?>
	<form method="post" action="inscription.php">
				<p></p>
			<input type="text" name="id" />
				<p></p>
			<input type="password" name="password" />
				<p></p>
			<input type="submit" name="valider" />
		</form>
		
		<?php echo $_SESSION['nmaison'];
		echo $_SESSION['admin'];?>
		
		
		
		<?php include("footer.php"); ?>
	</body>