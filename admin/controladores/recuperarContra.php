<?php
    //incluir conexión a la base de datos
    
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
        }
    
    include '../../config/conexioBD.php';

    $cedula =  isset($_POST["restablecerCedula"]) ? trim($_POST["restablecerCedula"]) : null;
    $contrasena =  isset($_POST["restablecerContrasena"]) ? trim($_POST["restablecerContrasena"]) : null;

    $sql = "UPDATE usuario SET usu_contrasena=MD5('$contrasena') WHERE usu_cedula LIKE '%" .$cedula. "%'";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Usuario Editado Exitosamente"); window.location.href="../../admin/vista/html/ventana_admin.php"</script>';
    } else {
        echo '<script language="javascript">alert("Usuario no encontrado o Cedula Incorrecta"); window.location.href="../../admin/vista/html/ventana_admin.php"</script>';
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
    $conn->close();

?>