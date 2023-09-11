<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "bd.php";
$sentencia = $bd->query("select id, nombre, apellido, cedula, eps, sintomas, nivel from centro_medico_hemo_hearth_diabetes");
$centro = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($centro);
?>