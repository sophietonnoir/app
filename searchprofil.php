
<?php
include("modelsearchprof.php");
	
	
if (!isset($auth['id']))
{
echo ("<article><h2>ce pseudo n'existe pas</h2></article>");
}
else
{
include("vueactionprofil.php");
}
?>