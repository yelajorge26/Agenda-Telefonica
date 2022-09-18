<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USUARIO LOGEADO</title>
    <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/formulario.css">
    <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/tabla.css" type="text/css" />
</head>
<body>
    <header><a href="/Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html"><p>Cerrar Sesion</p></a></header>
    <table id="main-container">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Telefono</th>
        </tr>
        <?php

            include '../../../config/conexioBD.php';
            //include '/Practica04-Mi-Agenda-Telefonica/config/conexionBD.php';

            $v1 = $_GET['codigo'];
            
            $sql = "SELECT * FROM usuario, telefono WHERE usu_codigo='$v1' AND usuario.usu_codigo = telefono.tel_fk_usuario";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    $cedulavrg = $row["usu_cedula"];
                    echo "<tr>";
                    echo " <td>" .$row["usu_cedula"] . "</td>";
                    echo " <td>" .$row["usu_nombres"] . "</td>";
                    echo " <td>" .$row["usu_apellidos"] . "</td>";
                    echo " <td>" .$row["usu_direccion"] . "</td>";
                    echo " <td>" .$row["usu_correo"] . "</td>";
                    echo " <td>" .$row["tel_numero"] . "</td>";
                    echo " <td> <a href='/Practica04-Mi-Agenda-Telefonica/admin/vista/usuario/eliminar.php?codigo=" .$row['usu_codigo'] . "'>Eliminar</a> </td>";
                    echo " <td> <a href='/Practica04-Mi-Agenda-Telefonica/admin/vista/usuario/modificar.php?codigo=" .$row['usu_codigo'] . "'>Modificar</a> </td>";
                    echo " <td> <a href='/Practica04-Mi-Agenda-Telefonica/admin/vista/usuario/cambiarContrasena.php?codigo=" .$row['usu_codigo'] . "'>Cambiar Contraseña</a> </td>";
                    echo "</tr>";
                    //include '../../../public/controladores/agregar_numero.php';

                    ?>

                    <section class="registro" >
                        
                        <form  class="formulario" name="formulario_registro_telefono"  method="GET" action = "/Practica04-Mi-Agenda-Telefonica/public/controladores/agregar_numero.php">
                            
                            <input class="controles" type="text" name="cedula" id="cedula" value="<?php echo $row["usu_cedula"]; ?>" >
                            <span id="mensajeCedula" ></span><br>
                        
                            <input class="controles" type="text" name="numero" id="numero" placeholder="Ingrese su nuevo N.Telefonico" >
                            <span id="mensajeNumero" ></span><br>

                            <input class="controles" type="text" name="operadora" id="operadora" placeholder="Ingrese su Operadora" >
                            <span id="mensajeNuevo" ></span><br>

                            <input class="botones" type="submit" value="Registrar" >
                        </form>

                    </section>

                    <?php

                }

            } else {

                echo "<tr>";
                echo " <td colspan='7'>No existen usuarios registrados en el sistema </td>";
                echo "</tr>";

            }

            $conn->close();

        ?>
    </table>

</body>
</html>