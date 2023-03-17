<?php
include_once("../modelo/conedit.php");
$Id_Aprendiz = $_POST['id'];
$Documento = $_POST['documento'];
$Nombres = $_POST['nombre'];
$Apellidos = $_POST['apellido'];
$Edad = $_POST['edad'];
$Idprograma = $_POST['programa'];

$sentencia = $bd->prepare("UPDATE aprendiz SET Documento= ?,Nombre= ?,Apellidos= ?,Edad= ?,Id_programa= ? WHERE Id_Aprendiz= ?;");
$resultado = $sentencia->execute([$Documento,$Nombres,$Apellidos,$Edad,$Idprograma,$Id_Aprendiz]);

if($resultado){
    echo "<script> alert('Edicion Exitoso')
    location.href = '../index.php';</script>";
}
else{
    return "Error";
}
?>