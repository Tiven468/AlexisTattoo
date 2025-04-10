<?php
include 'conexion.php';

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$nombre = $_POST ['nombre_completo'];
$celular = $_POST ['celular'];
$mensaje = $_POST ['mensaje'];
$correo = $_POST ['correo'];

$sql = "INSERT INTO contactanos VALUES (,'$nombre','$celular','$mensaje','$correo')";

    if($conexion -> query($sql) === true){
        $mensaje = "Se registro el contactanos exitosamente";
            echo " <script> alert('$mensaje'); </script> ";
            echo " <script> window.location.href = '../index.html'; </script> ";
    }else{ 
        echo "Errrrrrror" . $sql . '' .$conexion -> connect_error;
    }

$conexion -> close();
?>