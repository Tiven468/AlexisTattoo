<?php
include 'conexion.php';

$nom_usuario = $_POST['username'];
$password = $_POST['password'];
//comprobar si se llenaron los campos
    if(empty($nom_usuario) and empty($password)){
        echo " <script> alert('llene todo bro'); </script> ";
        }else{
        $consulta="SELECT * FROM  usuarios where nombre_usuario ='$nom_usuario'and contraseña='$password' ";
        $resultado = mysqli_query($conexion,$consulta);

        $count = mysqli_num_rows($resultado); //hay filas?
        if($count > 0) {

        $arraylogin= mysqli_fetch_object($resultado);
 
        $_SESSION['login_user'] = $arraylogin -> nombre_usuario;
//COMPROBAMOS A QUE INTERFAZ SE DEBE REDIRIGIR
        if($arraylogin -> perfil == "admin"){
            header("location: ../Home.html");
        }else if($arraylogin -> perfil == "usuario"){
            header("location: ../Agendar_citas.html");
        }
        }else{
            $mensaje = "usuario y/o contraseña incontrarrecta.";
            echo " <script> alert('$mensaje'); </script> ";
            echo " <script> window.location.href = '../index.html'; </script> ";
        }
    }
$conexion->close();
?>