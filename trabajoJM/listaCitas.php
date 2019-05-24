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
        <?php 
                     
                    echo '<center><table  width="700" ">';
                 
                    echo '<tr style="background-color: dodgerblue; color:white;">';
                    echo '<th>FECHA</th>';
                    ///echo '<th>DOCUMENTO</th>';
                    echo '<th>MEDICO</th>';
                    echo '<th>Paciente</th>';
                    echo '<th colspan="2">Configuarar</th>';
                    echo '</tr>';
                    $rs= consultaSelect($conex, "cita","");
                    while($cita=mysqli_fetch_array($rs)){  
                     $medico=consultaSelect($conex,"medico","where documento='".$cita["medico"]."'");
                     $medico=mysqli_fetch_array($medico);
                     $paciente= consultaSelect($conex, "paciente", "where documento='".$cita["paciente"]."'");
                     $paciente=mysqli_fetch_array($paciente);
                    // echo "select * from medico where documento='".$cita["medico"]."'";
                   
                     echo '<tr>';
                     //echo '<td> <input type="datetime-local" mane="fecha">'. "</td>";
                     echo '<td>' .$cita["fecha"] . "</td>";
                     echo  '<td>'.$medico["nombres"] . "</td>";
                     echo  '<td>'.$paciente["nombres"] . "</td>";

                    /* echo '<td><a href="pacientesesion.php?paciente='. $cita["paciente"]  .'
                         &medico='.$medico["documento"].'&fecha='.$cita["fecha"].'">Editar cita</a></td>';*/
                     echo '<td><a href="listaCitas.php?paciente='. $cita["paciente"]  .'
                         &medico='.$medico["documento"].'&fecha='.$cita["fecha"].'&eliminar=0">Cancelar cita</a></td>';
                     echo '</tr>';
          
                    

                  }
                  echo "</table></center>";
                //  echo "kha ".$cita["fecha"];
             if (isset($_GET["eliminar"])){
               //consultaDelete($conex, "cita", "where paciente='".$_GET["paciente"]."' and medico='".$_GET["documento"]."'");
               consultaDelete($conex, "cita", "where fecha='".$_GET["fecha"]."'");
               
                 header("location:menuPrincipal.php?form=6");
                 
             }
        ?>
    </body>
</html>
