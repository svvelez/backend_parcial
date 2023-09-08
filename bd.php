<?php

$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "centro_medico";

try{
  return new PDO('mysql:host=localhost;dbname=' . $basededatos, $usuario, $password);
}catch(Exception $e){
  echo "Ocurrio algo con la base de datos: " . $e->getMessage();
}


?>