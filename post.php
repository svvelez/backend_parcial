<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonGasto = json_decode(file_get_contents("php://input"));
if (!$jsonGasto) {
    exit("No hay datos");
}
$bd = include_once "bd.php";
$sentencia = $bd->prepare("insert into centro_medico_hemo_hearth_diabetes (nombre, apellido, cedula, eps, sintomas, diagnostico) values (?,?,?,?,?,?)");
$resultado = $sentencia->execute([$jsonGasto->nombre, $jsonGasto->apellido, $jsonGasto->cedula, $jsonGasto->eps, $jsonGasto->sintomas, $jsonGasto->diagnostico]);
echo json_encode([
    "resultado" => $resultado,
]);
?>