
<?php session_start();
class usersmanag
{	

	public function update()
	{
		include ('update.php');
	}
	public function inscription()
	{
		include ('inscription.php');
	}
	public function delete()
	{
		include ('delete.php');
	}
	public function adminmanag()
	{
		include ('updatea.php');
	}
	public function adminajout()
	{
		include ('ajoutprofil.php');
	}
}
$url=$_GET['page']; 
$poo = new usersmanag();
switch($url)
{
case ("inscription"):
$poo->inscription();
break;

case ("update"):
$poo->update();
break;

case ("delete"):
$poo->delete();
break;

case ("updatea"):
$poo->adminmanag();
break;

case ("profilajout"):
$poo->adminajout();
break;
}
