<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
$bd = include_once "bd.php";
$sentencia = $bd->prepare("select id, nombre, apellido, cedula, eps, sintomas, nivel from centro_medico_hemo_hearth_diabetes where id = ?");
$sentencia->execute([$id]);
$centro = $sentencia->fetchObject();
echo json_encode($centro);
?>