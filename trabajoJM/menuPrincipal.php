<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <LINK href="css/index.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./javascript/menujquery.js"></script>
</head>
<body>
<div id="header">
        <a><img class="header" src="img/logoCS.png"></a>
    </div>
   <div id="interface">
     
       <div id="sidebar" class="sidebar">
    <!--<a href="#" class="boton-cerrar" onclick="ocultarmenu()">&times;</a>-->
      <h1><center>MENÚ</center></h1>
      <ul class="menu">
       <li ><a href="#" id="menu_usuarios">Registro de Usuarios</a></li>
       <li ><a href="#" id="lista_usuarios">Editar/Eliminar(Usuario)</a></li>
       <li ><a href="#" id="crear_cita">Crear cita</a></li>
       
       <li ><a href="#" id="ver_citas">Ver citas</a></li>
          <?php 
           //echo $_SESSION["xlogin_usuario"];
          ?>
          </a>
       </li> 
 
    </ul>
    </div>
    
    <div id="contenido">
       <!--<a id="abrir" class="abrir-cerrar" href="#" onclick="mostrarmenu()">Abrir Menú</a>
       <a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultarmenu()">Cerrar Menú</a>-->
       <div id="block">
           
       </div>
   </div>
   </div>
    
  <!--  <script src="logica.js"></script>-->
</body>
</html>
<?php
           

if(isset($_GET["form"])){
   //  echo "<script>alert('sikas ".$_GET["form"]."');</script>";
   /*switch ($_GET["sesion"]) {
         case 1:
            echo "<script>cargar_sesion_Admin();</script>";
           break;

       case 2:
            echo "<script>cargar_ingreso();</script>";
           break;
   }*/
    switch ($_GET["form"]){
        case 1:
       
        break;
        case 2:
           
           // echo "<script>cargar_usuarios_listado_menu();</script>";
            break;
        case 3:
             echo "<script> cargar_lista_Usuarios();</script>";
            //cargar_lista_Usuarios();
          break;
         case 4:
            echo "<script>cargar_editar_usuario('".$_GET["editar"]."','".$_GET["tabla"]."');</script>";
          break;
         case 5:
            echo "<script>cargar_crear_cita('".$_GET["medico"]."');</script>";
          break;
        case 6:
             echo "<script>cargar_lista_citas();</script>";
           break;
        case 7:
             echo "<script>cargar_lista_medicos();</script>";
           break;   
       }
}