<?php
include 'conexion.php';

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$id_usuario = $_POST['id_usuario'];
$nombres = $_POST ['nombre'];
$apellidos = $_POST ['apellido'];
$correo = $_POST ['correo'];
$celular = $_POST ['celular'];
$fec_nac = $_POST ['fec_nac'];
$username = $_POST ["username"];
$password = $_POST ["password"];

$sql = "INSERT INTO usuarios VALUES ('$id_usuario','$nombres','$apellidos','$correo','$celular','$fec_nac','$username','$password','activo','usuario')";

    if($conexion -> query($sql) === true){
        $mensaje = "Registro exitoso";
            echo " <script> alert('$mensaje'); </script> ";
            echo " <script> window.location.href = '../index.html'; </script> ";
    }else{ 
        echo "Errrrrrror" . $sql . '' .$conexion -> connect_error;
    }

$conexion -> close();
?>