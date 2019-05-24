<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include 'funciones.php';
$conex=conexionbd("hospital");  
  /*$doc=$_GET["user"];  */
 
  
  $date =obtenerFechaYHora();
 //ECHO $date;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body> 
        
        <?php   
        
        if (!isset($_GET["medico"])){
               // if (consultaCount($conex, "cita", "where paciente='$doc'")["num"]==0){
               $rs= consultaSelect($conex, "medico",""); 
                echo ' <center><table width="700" >';
                     echo '<tr  style="background-color: dodgerblue; color:white;">';
                     //echo '<th>FECHA</th>';
                     ///echo '<th>DOCUMENTO</th>';
                     echo '<th>NOMBRES</th>';
                     echo '<th colspan="2">Configuarar</th>';
                     echo '</tr>';

                while($medico=mysqli_fetch_array($rs)){  
                      /*  $rscita= consultaSelect($conex, "cita","where medico='".$medico["documento"]."'"); 
                        $cita=mysqli_fetch_array($rscita);*/
                     if(consultaCount
                       ($conex, "cita", "where medico='".$medico["documento"]."' and fecha='$date'")
                       ["num"]==0){
                         echo '<tr>';
                         //echo '<td> <input type="datetime-local" mane="fecha">'. "</td>";
                         //echo '<td>' .$medico["documento"] . "</td>";
                         echo  '<td>'.$medico["nombres"] . "</td>";
                         echo '<td><a href="pacientesesion.php?medico='.$medico["documento"].'&fecha='.$date.'">gestoinar cita</a></td>';
                        /* echo '<td><a href="pacientesesion.php?user='. $doc  .'
                             &medico='.$medico["documento"].'&fecha='.$date.'">gestoinar cita</a></td>';*/
                         //echo '<td><a href="pacienteSesion.php?eliminar=' . $cita["documento"] . '">cancelar</a></td>';
                         echo '</tr>';
                         // break;    
                        }  
                }
               /*  echo "</table></center>";
               if (consultaCount($conex, "cita", "where paciente='$doc'")["num"]>0){
                    echo ' <br><center><table border="2" width="700" style="background-color:cyan">';
                    echo '<tr>';
                    echo '<th colspan="4">Citas</th>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>FECHA</th>';
                    ///echo '<th>DOCUMENTO</th>';
                    echo '<th>MEDICO</th>';
                    echo '<th colspan="2">Configuarar</th>';
                    echo '</tr>';
                    $rs= consultaSelect($conex, "cita","where paciente='$doc'");
                    while($cita=mysqli_fetch_array($rs)){  
                     $medico=consultaSelect($conex,"medico","where documento='".$cita["medico"]."'");
                    // echo "select * from medico where documento='".$cita["medico"]."'";
                     $medico=mysqli_fetch_array($medico);
                     echo '<tr>';
                     //echo '<td> <input type="datetime-local" mane="fecha">'. "</td>";
                     echo '<td>' .$cita["fecha"] . "</td>";
                     echo  '<td>'.$medico["nombres"] . "</td>";

                     echo '<td><a href="pacientesesion.php?paciente='. $cita["paciente"]  .'
                         &medico='.$medico["documento"].'&fecha='.$cita["fecha"].'">Editar cita</a></td>';
                     echo '<td><a href="pacientesesion.php?paciente='. $cita["paciente"]  .'
                         &medico='.$medico["documento"].'&fecha='.$cita["fecha"].'&eliminar=0">Cancelar cita</a></td>';
                     echo '</tr>';
          
                    

                  }
                  echo "</table></center>";

               // echo $doc ;
                }
            /* }else{

                 echo $doc. " tiene cita";
                 }  */
            

        } 
        if (isset($_GET["eliminar"])) {
            echo "where paciente='".$_GET["paciente"]."' and medico='".$_GET["medico"]."'
            and fecha='".$_GET["fecha"]."'";
        consultaDelete($conex,"cita","where paciente='".$_GET["paciente"]."' and medico='".$_GET["medico"]."'
        and fecha='".$_GET["fecha"]."'");
        header('location:pacienteSesion.php?paciente='.$_GET["paciente"].'');
          }else{
             
              if(isset($_GET["medico"])){
               header('location:menuprincipal.php?form=5&medico='.$_GET["medico"].'');
              //  include 'crearCita.php';
              }
          }
          
        
        /*  ini_set("date.timezone", "America/Bogota");
        echo date("y-m-d h:i:s", time());*/
       
        ?>
    </body>
</html>
