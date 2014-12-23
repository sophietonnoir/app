<?php
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



$poo = new usersmanag();
$poo->update();?>
