<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    exit("Solo acepto peticiones PUT");
}
$jsonGasto = json_decode(file_get_contents("php://input"));
if (!$jsonGasto) {
    exit("No hay datos");
}
$bd = include_once "bd.php";
$sentencia = $bd->prepare("UPDATE gastoenergico SET peso = ?, estatura = ?, edad = ?, genero = ? , actividad = ? WHERE id = ?");
$resultado = $sentencia->execute([$jsonGasto->peso, $jsonGasto->estatura, $jsonGasto->edad , $jsonGasto->genero, $jsonGasto->actividad , $jsonGasto->id]);
echo json_encode($resultado);
?>
