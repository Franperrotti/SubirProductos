<?php
require_once("clases/BaseMYSQL.php");
//Declaro mis variables
$host = "localhost";
$db = "image_upload";
$usuario = "root";
$password = "root";
$puerto = "8889";

$pdo = BaseMYSQL::conexion($host,$db,$usuario,$password,$puerto);



?>

