
<?php

    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
    }
    //incluir conexión a la base de datos
    include '../../config/conexioBD.php'; 
    $cedula =  isset($_POST["Acedula"]) ? trim($_POST["Acedula"]) : null;
    $nombres = isset($_POST["Anombre"]) ? mb_strtoupper(trim($_POST["Anombre"]), 'UTF-8') : null;
    $apellidos = isset($_POST["Aapellido"]) ? mb_strtoupper(trim($_POST["Aapellido"]), 'UTF-8') : null;
    $direccion = isset($_POST["Adireccion"]) ? mb_strtoupper(trim($_POST["Adireccion"]), 'UTF-8') : null;
    $correo = isset($_POST["Acorreo"]) ? trim($_POST["Acorreo"]): null;
    $contrasena = isset($_POST["Apsw"]) ? trim($_POST["Apsw"]) : null;

    $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion',
    '$correo', MD5('$contrasena'), 'A')"; 

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
    echo '<script language="javascript">alert("Administrador Creado Exitosamente"); window.location.href="../../admin/vista/html/ventana_admin.php"</script>';
?>
