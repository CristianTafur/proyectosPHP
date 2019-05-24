<?php
include 'funciones.php';
$conex=conexionbd("hospital");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <LINK href="css/index.css" rel="stylesheet">
    </head>
    <body>
        <form class="form" action="adminSesion.php" method="POST">
            documento<br>
            <input class="texto_input" type="text" name="0" value="" /><br>
             nombre<br>
            <input class="texto_input" type="text" name="1" value="" /><br>
              contraseña<br>
            <input  class="texto_input" type="text" name="2" value="" /><br><br>
            
            <select class="select" name="3">
                <option value="paciente">paciente</option>
                <option value="medico">medico</option>
               
                <option value="admin">administrador</option>
            </select><br><br>
            <input class="boton" type="submit" value="registrar" />
        </form>
        <?php
        if ($_POST){
             
                
            $i=0;
           while   ($i<4) {
                 $array[] =$_POST["$i"];
                 $i++;
                 
            }   
            verificarUser($conex,$_POST["3"],$array);
          
           
           } 
           function verificarUser($conex,$tabla,$informacion ) {
               
               if (consultaCount($conex, $tabla, "where documento='".$informacion[0]."'")["num"]<1) {
                   $i="";
                   if ($informacion[3]=="medico"){
                      $i="(documento,nombres,clave,rol)";
                   }
                   insert($conex, $tabla, $i, $informacion);
                   header('location:menuPrincipal.php?form=3'); 
               }else{
                    echo "<script >alert('error usuario ya existe');</script>"; 
               }  
            }
           
        ?>
    </body>
</html>
