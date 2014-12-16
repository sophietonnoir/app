<?php 
class Usersmanager
{
private $_db;

public function __construct($db);
{
			$this->setDb($db);
		}	
public function add(User $id,$nom,$prenom,$age,$nmaison,$admin)
{
		$_SESSION[$id] = new User($id,$nom,$prenom,$age,$nmaison,$admin);
		
		}
public function delete(User $user)
{
		
		
		}
}

$db = new PDO('mysql:host=localhost;dbname=keydb','root', '');
$manager = new Usersmanager($db);

class User
{
	private $_id;
	private $_nom;
	private $_prenom;
	private $_age;
	private $_nmaison;
	private $_admin;

	
	
public function __construct( $id,$nom,$prenom,$age,$nmaison,$admin)
{
	$this->setId($id);
	$this->setNom($nom);
	$this->setPrenom($prenom);
	$this->setAge($age);
	$this->setNmaison($nmaison);
	$this->setAdmin($admin);
	
	}
public function setId($id)
{
    
    $id = (int) $id;
    
    
    if ($id > 0)
    {
      $this->_id = $id;
    }
  }
public function setAdmin($admin)
{
$admin = (int) $admin;

if ($admin=0 or $admin=1)
	{
	$this->_admin = $admin;
	}
else
{
$this->_admin=0;
}
	}
public function setNmaison($nmaison)
{
$nmaison = int($nmaison);

if ($nmaison>0)
{
$this->_nmaison=$nmaison
}
}
public function setNom($nom)
{
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
	}
public function setPrenom($prenom)
{
    if (is_string($prenom))
    {
      $this->_prenom = $prenom;
	  }
	  }
public function setAge($age)
{  
    $age = (int) $age;
    
    
    if ($age > 0)
    {
      $this->_age = $age;
    }
  }
}
}
?>