<?php
    //incluir conexión a la base de datos
    
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
        }
    
    include '../../config/conexioBD.php'; 
    $cedula =  isset($_POST["Ucedula"]) ? trim($_POST["Ucedula"]) : null;
    $nombres = isset($_POST["Unombre"]) ? mb_strtoupper(trim($_POST["Unombre"]), 'UTF-8') : null;
    $apellidos = isset($_POST["Uapellido"]) ? mb_strtoupper(trim($_POST["Uapellido"]), 'UTF-8') : null;
    $direccion = isset($_POST["Udireccion"]) ? mb_strtoupper(trim($_POST["Udireccion"]), 'UTF-8') : null;
    $correo = isset($_POST["Ucorreo"]) ? trim($_POST["Ucorreo"]): null;
    $contrasena = isset($_POST["Upsw"]) ? trim($_POST["Upsw"]) : null;

    $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion',
    '$correo', MD5('$contrasena'), 'U')"; 

    if ($conn->query($sql) === TRUE) {
        //echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
    } else {
    if($conn->errno == 1062){
        //echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
    }else{
        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
   

    //Cerrar BD
    //cerrar la base de datos
    $conn->close();
    echo '<script language="javascript">alert("Usuario Creado Exitosamente"); window.location.href="../../admin/vista/html/ventana_admin.php"</script>';
?>