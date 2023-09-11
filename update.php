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
$sentencia = $bd->prepare("UPDATE centro_medico_hemo_hearth_diabetes SET nombre = ?, apellido = ?, cedula = ?, eps = ? , sintomas = ? , nivel = ? WHERE id = ?");
$resultado = $sentencia->execute([$jsonGasto->nombre, $jsonGasto->apellido, $jsonGasto->cedula , $jsonGasto->eps, $jsonGasto->sintomas , $jsonGasto->nivel , $jsonGasto->id]);
echo json_encode($resultado);
?>
