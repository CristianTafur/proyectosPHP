<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include 'funciones.php';

$conex=conexionbd("hospital");

$m=$_GET["user"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         $rs= consultaSelect($conex, "cita","where medico='".$m."'"); 
                echo ' <center><table border="2" width="700" style="background-color:cyan">';
                     echo '<tr>';
                     echo '<th>FECHA</th>';
                     ///echo '<th>DOCUMENTO</th>';
                     echo '<th>Pacientes</th>';
                     echo '<th colspan="2">Configuarar</th>';
                     echo '</tr>';

                while($cita=mysqli_fetch_array($rs)){  
                         
                         $paciente=consultaSelect($conex, "paciente","where documento='".$cita["paciente"]."'");
                         $paciente=mysqli_fetch_array($paciente);
                         
                         echo '<tr>';
                         echo '<td> '.$cita["fecha"]. "</td>";
                         //echo '<td>' .$medico["documento"] . "</td>";
                         echo  '<td>'.$paciente["nombres"] . "</td>";

                         echo '<td><a href="medicoSesion.php?paciente='.$cita["paciente"].'&user='.$m.'">Editar Historial</a></td>';
                         //echo '<td><a href="pacienteSesion.php?eliminar=' . $cita["documento"] . '">cancelar</a></td>';
                         echo '</tr>';
                         // break;    
                       
                }
                 echo "</table></center>";

                    if (isset($_GET["paciente"])){
                        include 'editarPaciente.php';
                    }

                 ?>
       
    </body>
</html>
 