<?php 
$db = new PDO('mysql:host=localhost;dbname=keydb','root', '');
class usersmanag
{
private $_db;

public function __construct($db);
{
		$this->setDb($db);
}	
		
public function setDb($db);
{
$this->_db=$db;
}
public function inscription();
{
include ('inscription.php');
}
}
?>