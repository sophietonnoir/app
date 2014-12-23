
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
}
$url=$_SERVER['REQUEST_URI']; 
echo '' .$url."<br />"; 
$poo = new usersmanag();
switch($url)
{
case ("/APPK2Kv2.1/inscription3.php/inscription"):
$poo->inscription();
break;

case ("/APPK2Kv2.1/inscription3.php/update"):
$poo->update();
break;
}