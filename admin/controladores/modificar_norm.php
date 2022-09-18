<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Datos Persona</title>
</head>
<body>
    <?php
        
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
        }
    

        include '../../config/conexioBD.php';

        $codigo = $_POST["codigo"];
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;

        $sql = "UPDATE usuario " .
            "SET usu_cedula = '$cedula',".
            "usu_nombres = '$nombres',".
            "usu_apellidos = '$apellidos',".
            "usu_direccion = '$direccion',".
            "usu_correo = '$correo'".
            "WHERE usu_codigo = $codigo";
        
        if($conn->query($sql) === TRUE) {
            echo "Se ha actualizado los datos personales correctamente !!!<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }

        echo "<a href='../../public/vista/html/index.html'>Regresar</a>";
        $conn->close();

    ?>

</body>
</html>