<?php
    //incluir conexión a la base de datos

    
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
        }
    
    include '../../config/conexioBD.php';


    $codigo =  isset($_POST["codigoEditar"]) ? trim($_POST["codigoEditar"]) : null;
    $cedula =  isset($_POST["cedulaEditar"]) ? trim($_POST["cedulaEditar"]) : null;
    $nombres =  isset($_POST["nombresEditar"]) ? trim($_POST["nombresEditar"]) : null;
    $apellidos =  isset($_POST["apellidosEditar"]) ? trim($_POST["apellidosEditar"]) : null;
    $direccion =  isset($_POST["direccionEditar"]) ? trim($_POST["direccionEditar"]) : null;
    $correo =  isset($_POST["correoEditar"]) ? trim($_POST["correoEditar"]) : null;

    $sql = "UPDATE usuario SET usu_cedula='$cedula' ,usu_nombres='$nombres' ,usu_apellidos='$apellidos' ,usu_direccion='$direccion' ,usu_correo='$correo' WHERE usu_codigo='$codigo'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Usuario Editado Exitosamente"); window.location.href="../../admin/vista/html/ventana_admin.php"</script>';
    } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
    $conn->close();

?>