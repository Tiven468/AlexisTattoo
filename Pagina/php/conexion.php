<?php

$conexion = new mysqli('localhost','root','','alexis_tattoo');
//probar conexion
if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>