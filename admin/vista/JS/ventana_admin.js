

function myFunction(nombre) {
    
    if(nombre == 'margenCF1'){
        document.getElementById("margenCF1").style.display='block';
        eliminar();
        document.getElementById("margenCF2").style.display ="none"; 
        document.getElementById("margenCF3").style.display ="none"; 
        document.getElementById("margenCF4").style.display ="none"; 
        document.getElementById("margenCF5").style.display ="none"; 
        document.getElementById("margenCF6").style.display ="none"; 
        document.getElementById("margenCF7").style.display ="none"; 
    }else if(nombre == 'margenCF2'){
        document.getElementById("margenCF2").style.display='block';
        eliminar();
        document.getElementById("margenCF1").style.display ="none"; 
        document.getElementById("margenCF3").style.display ="none"; 
        document.getElementById("margenCF4").style.display ="none"; 
        document.getElementById("margenCF5").style.display ="none"; 
        document.getElementById("margenCF6").style.display ="none"; 
        document.getElementById("margenCF7").style.display ="none"; 
    }else if(nombre == 'margenCF3'){
        document.getElementById("margenCF3").style.display='block';
        eliminar();
        document.getElementById("margenCF1").style.display ="none"; 
        document.getElementById("margenCF2").style.display ="none"; 
        document.getElementById("margenCF4").style.display ="none"; 
        document.getElementById("margenCF5").style.display ="none"; 
        document.getElementById("margenCF6").style.display ="none"; 
        document.getElementById("margenCF7").style.display ="none"; 
    }else if(nombre == 'margenCF4'){
        document.getElementById("margenCF4").style.display='block';
        eliminar();
        document.getElementById("margenCF1").style.display ="none"; 
        document.getElementById("margenCF2").style.display ="none"; 
        document.getElementById("margenCF3").style.display ="none"; 
        document.getElementById("margenCF5").style.display ="none"; 
        document.getElementById("margenCF6").style.display ="none"; 
        document.getElementById("margenCF7").style.display ="none"; 
    }else if(nombre == 'margenCF5'){
        document.getElementById("margenCF5").style.display='block';
        eliminar();
        document.getElementById("margenCF1").style.display ="none"; 
        document.getElementById("margenCF2").style.display ="none"; 
        document.getElementById("margenCF3").style.display ="none"; 
        document.getElementById("margenCF4").style.display ="none"; 
        document.getElementById("margenCF6").style.display ="none"; 
        document.getElementById("margenCF7").style.display ="none"; 
    }else if(nombre == 'margenCF6'){
        window.location.href="/Practica04-Mi-Agenda-Telefonica/admin/controladores/listar.php";
        eliminar();
        document.getElementById("margenCF6").style.display='block';
        document.getElementById("margenCF1").style.display ="none"; 
        document.getElementById("margenCF2").style.display ="none"; 
        document.getElementById("margenCF3").style.display ="none"; 
        document.getElementById("margenCF4").style.display ="none"; 
        document.getElementById("margenCF5").style.display ="none"; 
        document.getElementById("margenCF7").style.display ="none"; 
    }else if(nombre == 'margenCF7'){
        document.getElementById("margenCF7").style.display='block';
        document.getElementById("margenCF1").style.display ="none"; 
        document.getElementById("margenCF2").style.display ="none"; 
        document.getElementById("margenCF3").style.display ="none"; 
        document.getElementById("margenCF4").style.display ="none"; 
        document.getElementById("margenCF5").style.display ="none"; 
        document.getElementById("margenCF6").style.display ="none"; 
        
        
    }


    
} 

var eliminar=function(){
    document.getElementById("margenCF7").style.display ="none";
}

var redirigirPrincipal=function(){
    window.location.href="/Practica04-Mi-Agenda-Telefonica/admin/vista/html/ventana_admin.php";
}
