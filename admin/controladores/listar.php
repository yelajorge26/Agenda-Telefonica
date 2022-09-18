<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/tabla.css" type="text/css" />
 <script src="/Practica04-Mi-Agenda-Telefonica/admin/vista/JS/ventana_admin.js"></script>
 <title>Gestión de usuarios</title>
</head>
<body id="main-container">
<?php
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
        }
    ?>

 <table >
    <tr>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Correo</th>
        <th>Tipo de Usuario</th>
    </tr>
    <?php
    include '../../config/conexioBD.php';
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row["usu_cedula"] . "</td>";
            echo " <td>" . $row['usu_nombres'] ."</td>";
            echo " <td>" . $row['usu_apellidos'] . "</td>";
            echo " <td>" . $row['usu_direccion'] . "</td>";
            echo " <td>" . $row['usu_correo'] . "</td>";
            echo " <td>" . $row['usu_tipo_usuario'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";
    }
    $conn->close();
    ?>
 </table>
 <input type="submit" id="boton" name="agregarA" value="Aceptar" onclick="redirigirPrincipal()"/>
</body>
</html>