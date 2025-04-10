<?php
include 'conexion.php';

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$comentario = $_POST['comentario'];

$archivoNombre = $_FILES['archivo']['name'];
$archivoRutaTemporal = $_FILES['archivo']['tmp_name'];
$carpetaDestino = '../fotos_agendar'; // Carpeta donde se almacenarán las fotos
$archivoDestino = $carpetaDestino . $archivoNombre;

if (move_uploaded_file($archivoRutaTemporal, $archivoDestino)) {
    $sql = "INSERT INTO agendar_cita (nombres, apellidos, correo_electronico, celular, idea_foto, descripcion) 
            VALUES ('$nombres', '$apellidos', '$correo', '$telefono', '$archivoDestino', '$comentario')";

    if ($conexion->query($sql) === true) {
        $mensaje = "se registro la cita exitosamente.";
            echo " <script> alert('$mensaje'); </script> ";
            echo " <script> window.location.href = '../index.html'; </script> ";
    }else {
        echo "Error: " . $sql . " " . $conexion->error;
    }
} else {
    echo "Error al mover el archivo.";
}

$conexion->close();
?>
