<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title> 
        <LINK href="css/index.css" rel="stylesheet">
    </head>
    <body>  
        <div>
            <form action="mediMax.php" method="POST">
                 <input class="boton" type="submit" value="INCIAR SESION" name="sesion" />
            </form> 
        </div> 
        <?php
        if($_POST) 
        header('location:menuPrincipal.php?form=2');
        ?>
    </body>
</html>
