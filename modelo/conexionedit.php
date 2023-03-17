<?php
$user = "root";
$clave = "";
$nombrebd = "senas";
try{
    $bd = new PDO('mysql:host=localhost;dbname='.$nombrebd,$clave,$nombrebd);

}catch(Exception $e){
    echo" <script> alert('Todos los campos son obligatorios ');</script>".$e->getMessage();
}
?>