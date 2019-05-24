<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include 'funciones.php';
$conex=conexionbd("hospital");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form class="form" action="sesion.php" method="POST">
            documento<br>
            <input class="texto_input" type="text" name="doc" value="" /> <Br>
            contrasña<br>
            <input class="texto_input" type="text" name="con" value="" /><Br>
            rol<br>
            <select class="select" name="rol">
                <option value="admin">admin</option>
                <option value="medico">medico</option>
                <option value="paciente">paciente</option>
            </select><br><br>
            <input class="boton" type="submit" value="Ingresar" />
        </form>
        <?php
            if($_POST)
            {
               
                $doc=$_POST["doc"];
                $clave=$_POST["con"]; 
                $rol=$_POST["rol"];
                 switch ($rol) {
                     case 'admin':
                        $f=1;
                         break;
                    
                   case 'medico':
                         $f=2;
                          break;
                   case 'paciente':
                          $f=3;
                           break;
                 }
                  
                   if(consultaCount($conex,$rol, "where documento= '$doc' and clave= '$clave'")["num"]>0)
                   {
                       if ($rol=="paciente" || $rol=="medico")  
                          header('location:menuPrincipal.php?form='.$f.'&user='.$doc.'');
                         // header('location:'.$rol.'sesion.php?user='.$doc.'');
                       else
                       header('location:menuPrincipal.php?form='.$f.'');
                   }
                   else {
                        header('location:menuPrincipal.php?form=2');
                    //    echo "<script >alert('error usuario o conraseña incorresta');</script>";
                        }  
            }
                
             
        ?>
    </body>
</html>
