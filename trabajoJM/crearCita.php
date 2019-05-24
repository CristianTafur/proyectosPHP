<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
      
include './funciones.php';

$conex= conexionbd("hospital");
      $m=$_GET["medico"];ini_set("date.timezone", "America/Bogota");
       /*
        
      
       $p=$_GET["paciente"];
       
      // $date =date("Y-m-d")."T".(date("h")).(date(":i"));
      $date =$_GET["fecha"];
       echo $date;*/ 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form class="form" action="crearCita.php" method="POST">
            fecha<br>
            <input class="texto_input" type="datetime-local" value="<?php  echo date("Y-m-d\TH:i",time()); ?>" 
                   id="fecha" name="fecha"><br>
            doctor:<br>
            <input  class="texto_input" type="text" readonly value ="<?php echo $m; ?>" name="medico"> <br>
            paciente<br><!--readonly  value ="<?php/* echo $p;*/?>" required maxlength="3">--> 
            <input  class="texto_input" type="text" name="paciente" >  <br> <br>
            <input class="boton" type="submit" value="pedir cita" name="pedir" /><br> <br>
            <input class="boton" type="submit" value="cancelar" name="cancelar" />      
        </form>
       <?php
        if($_POST){
         if (isset($_POST["pedir"])){
            if (consultaCount($conex, "paciente", "where documento='".$_POST["paciente"]."'")["num"]>0)
                    {
                    insert($conex, "cita", "",array($_POST["paciente"],$_POST["medico"],$_POST["fecha"]));
                    
                    } else {
                        echo "<script>cargar_crear_cita('".$_GET["medico"]."');</script>";
                    }
           header('location:menuPrincipal.php?form=6');
         }   if(isset($_POST["cancelar"]))header('location:menuPrincipal.php?form=7'); 
         
         }
        ?>
    </body>
</html>
