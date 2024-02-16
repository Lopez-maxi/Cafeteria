<?php 

$servidor="localhost";
$baseDeDatos="cafeteria";
$usuario="root";
$contraseña="";

try{

$conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario, $contraseña);
}catch(Exception $error){
    echo $error->getMessage();
}
?>