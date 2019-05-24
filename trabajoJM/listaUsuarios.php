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
        
        <LINK href="css/index.css" rel="stylesheet">
    </head>
    <body>
        <?php
         $rs= consultaSelect($conex, "medico",""); 
                echo ' <center><table class="table"  width="700"  >';
                  
                     echo '<tr style="background-color: dodgerblue; color:white;">';
                  // echo '<th>FECHA</th>';
                     echo '<th>DOCUMENTO</th>';
                     echo '<th>NOMBRE</th>';
                     echo '<th>ROL</th>';
                     echo '<th colspan="2">Configuarar</th>';
                     echo '</tr>';
                   
                while($medico=mysqli_fetch_array($rs)){  
                     
                         
                         echo '<tr>';
                         echo '<td> '.$medico["documento"]. "</td>";
                         echo '<td>' .$medico["nombres"] . "</td>";
                         echo '<td>' .$medico["rol"] . "</td>";
                         echo '<td><a href="listaUsuarios.php?editar='.$medico["documento"].'&tabla=medico">Editar</a></td>';
                         echo '<td><a href="listaUsuarios.php?eliminar='.$medico["documento"].'&tabla=medico">Eliminar</a></td>';
                         echo '</tr>';
                         // break;    
                       
                }
                $rs=consultaSelect($conex, "paciente","");
                while($user=mysqli_fetch_array($rs)){  
                            
                         echo '<tr>';
                         echo '<td> '.$user["documento"]. "</td>";
                         echo '<td>' .$user["nombres"] . "</td>";
                         echo '<td>' .$user["rol"] . "</td>";
                         echo '<td><a href="listaUsuarios.php?editar='.$user["documento"].'&tabla=paciente">Editar</a></td>';
                         echo '<td><a href="ListaUsuarios.php?eliminar='.$user["documento"].'&tabla=paciente">Eliminar</a></td>';
                         echo '</tr>';
                         // break;    
                       
                }
                 echo "</table></center>";
                 if(isset($_GET["editar"])){
                   header('location:menuPrincipal.php?form=4&editar='.$_GET["editar"].'&tabla='.$_GET["tabla"].''); 
                 }else{
                    if(isset($_GET["eliminar"])){
                        consultaDelete($conex, $_GET["tabla"], "where documento='".$_GET["eliminar"]."'");
                        header('location:menuPrincipal.php?form=3'); 
                     } 
                 }
        ?>
    </body>
</html>
