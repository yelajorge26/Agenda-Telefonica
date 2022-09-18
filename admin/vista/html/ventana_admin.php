<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ventana_admin.css" type="text/css" />

    <link rel="stylesheet" href="/Practica04-Mi-Agenda-Telefonica/admin/vista/css/formulario.css" type="text/css">
    <script src="../JS/ventana_admin.js"></script>
    
    <title>Administrador</title>
</head>

<body id="contenedor"> 
    <?php
        session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica04-Mi-Agenda-Telefonica/public/vista/html/index.html");
        }
    ?>
    <section id="cabecera">
    <img id="fotoCabecera" src="/Practica04-Mi-Agenda-Telefonica/admin/vista/imagenes/banner_guia.png" alt="">
    <a id="salida" href="/Practica04-Mi-Agenda-Telefonica/admin/controladores/cerrarSesion.php">Cerrar Sesion</a>
    </section>
  
    <section id="menu">
        <div id="fotoAdmin">
        <img class="fotoAdmin" src="/Practica04-Mi-Agenda-Telefonica/admin/vista/imagenes/comp.png" alt="">
        </div>

        <div id="margen">
            <p>CUENTA ADMINISTRATIVA</p>
        </div>

        <div id="margen">
            <input type="submit" id="botones" name="agregarA" value="Agregar Administrador" onclick="myFunction('margenCF1')"/>
            <input type="submit" id="botones" name="agregarU" value="Agregar Usuario" onclick="myFunction('margenCF2')"/>
            <input type="submit" id="botones" name="eliminar" value="Eliminar Usuario/Admin" onclick="myFunction('margenCF3')"/>
            <input type="submit" id="botones" name="modificar" value="Modificar Usuario/Admin" onclick="myFunction('margenCF4')"/>
            <input type="submit" id="botones" name="buscar" value="Buscar Usuario" onclick="myFunction('margenCF5')"/>
            <input type="submit" id="botones" name="listar" value="Listar Usuarios" onclick="myFunction('margenCF6')"/>
            <input type="submit" id="botones" name="cambiarContrasena" value="Recuperar Contrasena" onclick="myFunction('margenCF7')"/>
        </div>

    </section>
  
    <section id="contenido">
        <!--AGREGAR USUARIO ADMINISTRADOR-->
        <div id="margenCF1">
            <form  class="formulario" name="formulario_registro1" method="POST" action = "/Practica04-Mi-Agenda-Telefonica/admin/controladores/crear_admin.php">
                <input class="controles" type="text" name="Acedula" id="n1" placeholder="Ingrese su Cedula" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
    
                <input class="controles" type="text" name="Anombre" id="n1" placeholder="Ingrese su Nombre" onkeyup="validarNombre()">
                <span id="mensajenombre" ></span><br>
    
                <input class="controles" type="text" name="Aapellido" id="n1" placeholder="Ingrese su Apellidos" onkeyup="validarApellido()">
                <span id="mensajeapellido" ></span><br>
    
                <input class="controles" type="text" name="Adireccion" id="n2" placeholder="Ingrese su Direccion" >
                <span id="m" ></span><br>

                <input class="controles" type="text" name="Acorreo" id="n1" placeholder="Ingrese su Correo" onkeyup="validarCorreo()">
                <span id="mensajecorreo" ></span><br>
    
                <input class="controles" type="password" name="Apsw" id="n1" placeholder="Ingrese su Contrasena" onkeyup="validarContrasena()">
                <span id="mensajepsw" ></span><br>
    
                <input class="botones" type="submit" value="Registrar" onclick="validarCampos()">
            </form>
        </div>
        <!--AGREGAR USUARIO NORMAL-->
        <div id="margenCF2" style="display: none;">
            <form class="formulario2" name="formulario_registro2" method="POST" action="/Practica04-Mi-Agenda-Telefonica/admin/controladores/cread_user.php">
                <input class="controles2" type="text" name="Ucedula" id="n11" placeholder="Ingrese# su Cedula" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
    
                <input class="controles2" type="text" name="Unombre" id="n12" placeholder="Ingrese su Nombre" onkeyup="validarNombre()">
                <span id="mensajenombre" ></span><br>
    
                <input class="controles2" type="text" name="Uapellido" id="n13" placeholder="Ingrese su Apellidos" onkeyup="validarApellido()">
                <span id="mensajeapellido" ></span><br>
    
                <input class="controles2" type="text" name="Udireccion" id="n24" placeholder="Ingrese su Direccion" >
                <span id="m" ></span><br>
    
                <input class="controles2" type="text" name="Ucorreo" id="n51" placeholder="Ingrese su Correo" onkeyup="validarCorreo()">
                <span id="mensajecorreo" ></span><br>
    
                <input class="controles2" type="password" name="Upsw" id="n167" placeholder="Ingrese su Contrasena" onkeyup="validarContrasena()">
                <span id="mensajepsw" ></span><br>
    
                <input class="botones2"  type="submit" value="Registrar" onclick="validarCampos()">
            </form>
        </div>

        <!--ELIMINAR USUARIO O ADMINISTRADOR-->
        <div id="margenCF3" style="display: none;">
            <form class="formulario3" name="formulario_registro3" method="POST" action="/Practica04-Mi-Agenda-Telefonica/admin/controladores/EliminarUsuarioAdmin.php">
                <input class="controles3" type="text" name="Ecedula" id="n172" placeholder="Ingrese# su Cedula" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
                <input class="botones3" type="submit" value="Eliminar" onclick="validarCampos()">
            </form>
        </div>

        <!--EDITAR USUARIOS-->
        <div id="margenCF4" style="display: none;">
            <form class="formulario4" name="formulario_registro4" method="POST" action="/Practica04-Mi-Agenda-Telefonica/admin/controladores/editarUser.php">
                <input class="controles4" type="text" name="editarCedula" id="n81" placeholder="Ingrese# su Cedula" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
                <input class="botones4" type="submit" value="Buscar" onclick="validarCampos()">
            </form>
        </div>

        <!--BUSCAR USUARIOS-->
        <div id="margenCF5" style="display: none;">
            <form class="formulario5" name="formulario_registro4" method="POST" action="/Practica04-Mi-Agenda-Telefonica/admin/controladores/buscarUsuario.php">
                <input class="controles5" type="text" name="BuscarCedula" id="n82" placeholder="Ingrese# su Cedula" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
                <input class="botones5" type="submit" value="Buscar" onclick="validarCampos()">
            </form>
        </div>

        <!--Recuperar-->
        <div id="margenCF7" style="display: none;">
            <form class="formulario7" name="formulario_registro7" method="POST" action="/Practica04-Mi-Agenda-Telefonica/admin/controladores/recuperarContra.php">
                <input class="controles7" type="text" name="restablecerCedula" id="n824" placeholder="Ingrese Numero de Cedula" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
                <input class="controles7" type="password" name="restablecerContrasena" id="n824" placeholder="Ingrese nueva Contrasena" onkeyup="validarCedula()">
                <span id="mensajeCedula" ></span><br>
                <input class="botones7" type="submit" value="Reestablecer" onclick="validarCampos()">
            </form>
        </div>

        

    </section>
  
    <footer id="pie">
        <P>PARTE DE PIE DE PAGINA</P>
    </footer>
    
    
</body>
</html>