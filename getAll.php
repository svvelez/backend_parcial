<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "bd.php";
$sentencia = $bd->prepare("select id, nombre, apellido, cedula, eps, sintomas, nivel from centro_medico_hemo_hearth_diabetes");
$sentencia->execute([$id]);
$centro = $sentencia->fetchObject();
echo json_encode($centro);
?>