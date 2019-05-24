<?php
 

       $consu="select * from paciente where documento='".$_GET['paciente']."'";
       $m=$_GET["user"];
       $rs=mysqli_query($conex,$consu);
       $fila=mysqli_fetch_array($rs);
       $codigo=$fila["documento"]; 
       mysqli_free_result($rs);
        
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editoriales</title>
</head>
<body>
  <form action="" method="post">
      <label for="lblcodigo">Documento</label> <br>
      <input type="text" readonly value ="<?php echo $codigo; ?>" name="Ecodigo" required maxlength="3">  <br>
    <label for="lblnombre">Nombre del paciente</label> <br>
    <input type="text" readonly value="<?php echo $fila["nombres"]; ?>" name="Enombre" required maxlength="50" size="50"><br> 
    <textarea name="historia"  value="<?php $fila["historia"];?>" rows="4" cols="20">
    </textarea>
    <input type="submit" name="actualizar" value="actualizar">
  </form>
 
       
</body>
</html>
<?php

     if (isset($_POST['actualizar'])){
        $consu="update paciente set nombres='".$_POST['Enombre']."',historia='".$_POST['historia']."' where documento='$codigo'";  
        $rs=mysqli_query($conex,$consu);   
       if ($rs) {
            echo $consu;
            header('location:medicoSesion.php?user='.$m.'');    
        }else{
            echo '<script>alert("error consulta");</script>';
        }  
    } 