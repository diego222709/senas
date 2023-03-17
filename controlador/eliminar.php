<?php
include_once("../modelo/conedit.php");
$Id_Aprendiz = $_POST['id'];

$sentencia = $bd->prepare("DELETE FROM aprendiz WHERE Id_Aprendiz=:id;");
$sentencia->bindParam(':id',$Id_Aprendiz);

if($sentencia->execute()){
    echo"<script> alert('Edicion Exitoso')
    location.href = '../index.php';</script>";

}
else{
    return"Error";
}
?>