
<?php
include("modelsearchprof.php");
	
	
if (!isset($auth['id']))
{
echo ("ce pseudo n'existe pas");
}
else
{
include("vueactionprofil.php");
}
?>