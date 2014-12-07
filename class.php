<?php class Usersmanager
{
		private $_db;
		
		
		public function __construct($db);
		{
			$this->setDb($db);
		}	

		public function add(User $user)
		{
		
		
		}
		
		public function delete(User $user)
		{
		
		
		}
		
		
		
		
		
		
	


}
$db = new PDO('mysql:host=localhost;dbname=keydb','root', 'root');
$manager = new Usersmanager($db);






class User
{
	private $_id;
	private $_nom;
	private $_prenom;
	private $_age;
	private $_nmaison;
	private $_admin;

	  public function setId($id)
  {
    
    $id = (int) $id;
    
    
    if ($id > 0)
    {
      $this->_id = $id;
    }
  }
  
  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
	
	public function setPrenom($prenom)
  {
    if (is_string($prenom))
    {
      $this->_prenom = $prenom;
	  
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