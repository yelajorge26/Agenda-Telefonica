<?php

    session_start();

    include '../../config/conexioBD.php';

    $usuario = isset($_POST["usuario69"]) ? trim($_POST["usuario69"]) : null;
    $contrasena = isset($_POST["contrasena69"]) ? trim($_POST["contrasena69"]) : null;
    $contra = md5($contrasena);
    echo $usuario;
    echo $contrasena;
    $sql = "SELECT * FROM usuario WHERE usu_correo LIKE '%" .$usuario. "%' AND usu_contrasena LIKE '%" .$contra. "%'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        while($row = $result->fetch_assoc()){

            $_SESSION['isLogged'] = TRUE;
            echo "<p>Muy Bien</p>";
            $mcodif = $row["usu_codigo"] ;
            echo $row["usu_cedula"] ;
            echo $row['usu_nombres'] ;
            echo $row['usu_apellidos'];
            echo $row['usu_direccion'] ;
            echo $row['usu_correo'];
            $tipouser=$row['usu_tipo_usuario'];
            if($tipouser === 'A'){
                $_SESSION['isLogged'] = TRUE;
                header("Location: ../../admin/vista/html/ventana_admin.php");
                
            }else{
                header("Location: ../../admin/vista/usuario/index.php/?codigo=$mcodif");
            }
        }
    } else {
        echo'<script type="text/javascript">
        alert("UsuarioIncorrecto");
        window.location.href="../../public/vista/html/index.html";
        </script>';

    }

    $conn->close();

?>