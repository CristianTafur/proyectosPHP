<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
include './funciones.php';
$conex= crearConexion('almacen');
$p=$_GET["editar"];
$rs=consultaSelect($conex, "".$_GET['tabla']."", "where documento='$p'");
$p= mysqli_fetch_array($rs); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form class="form" action="editarUsuario.php" method="POST">
            documento<br>
            <input class="texto_input" type="text" name="0" value="<?php echo $p["documento"];?>" /><br>
            nombre<br>
            <input class="texto_input" type="text" name="1" value="<?php echo $p["nombres"];?>" /><br>
             <!-- contraseña<br>
            <input  class="texto_input" type="text" name="2" value="" /><br><br>-->
             rol<br>
             <input readonly  class="texto_input" type="text" name="3" value="<?php echo $p["rol"];?>" /><br><br>
            <input class="boton" type="submit" value="Actualizar" />
            <br><br>
            <input class="boton" type="submit" value="Cancelar" />
        </form>
        <?php
        if ($_POST){
            if (!isset($_POST["Cancelar"])){
            $i=0;
           while   ($i<4) {
                 $array[] =$_POST["$i"];
                 $i++;
                 
            }   
            verificarUser($conex,$_POST["3"],$array);
           } 
            header('location:menuPrincipal.php?form=3'); 
           }
           
           function verificarUser($conex,$tabla,$informacion ) {
               consultaUpdate($conex, $tabla, $informacion, "where documento='$informacion[0]'");
              header('location:menuPrincipal.php?form=3');         
            }
           
        ?>
       
    </body>
</html>
