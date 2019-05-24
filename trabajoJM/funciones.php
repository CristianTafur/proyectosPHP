<?php
   
   /*  public class baseD{
         var $nombreBD;
        function __construct($nombreBD, $user,$contra) {
            $this->nombreBD=$nombreBD;
            
        }
        function conexionbd()
        {
        $conex=mysqli_connect($this->nombreBD,"root","",$bd);
        
            if($conex)
            {
                //echo "conexión exitosa";
                mysqli_set_charset($conex,"utf8");
                return $conex;
            }
            else{
                echo "No se pudo Establecer la conexión con la Base de Datos";
                return false;
            }
        }
     }*/
    function obtenerFechaYHora(){
       
        if((intval(date("h"))+7)>9)
        { 
            if((intval(date("h"))+7)>12)
            {
            $horas="01";
            }else{
                $horas=intval(date("h"))+7;
            }
        }else{
            $horas="0".(intval(date("h"))+7);
        }
        
         return date("Y-m-d")."T".$horas.(date(":i"));
    }
    function conexionbd($bd)
    {       $conex=mysqli_connect("localhost","root","",$bd);
       
        if($conex)
        {
            //echo "conexión exitosa";
            mysqli_set_charset($conex,"utf8");
            return $conex;
        }
        else{
            echo "No se pudo Establecer la conexión con la Base de Datos";
            return false;
        }
    }

    function crearcombo($conex,$consulta,$codigo,$nombre,$nombrecombo,$vrxdefecto)
    {
        $rs=mysqli_query($conex,$consulta);
        echo '<select name="' . $nombrecombo .'">';
        echo '<option value="..."></option>';
        
        while($fila=  mysqli_fetch_array($rs))
        {
            if($fila[$codigo]!=$vrxdefecto)
                echo "<option value=\"" . $fila[$codigo]  .      "\">" .   $fila[$nombre]. "</option>";
            else
                echo "<option value=\"" . $fila[$codigo]  .      "\" selected>" .   $fila[$nombre]. "</option>";
        };
        echo '</select>';
    }

    function mostrar_datos_tabla($conex,$consu,$titulos,$campos)
    {
          
        $result=mysqli_query($conex,$consu);
        
        echo "<br>";
        echo '<table border="2">';
        echo "<tr>";
        foreach($titulos as $valor)
        {
            echo "<th>".$valor."</th>";
        }
        echo "</tr>";
    
        while($registro=mysqli_fetch_array($result))
        {
          echo "<tr>";
            
            foreach($campos as $valor)
            {
                echo "<td>" .$registro[$valor] . "</td>";
            }
         echo "</tr>";
        }
        echo '</table>';  
    }
    function consultaSelect($conex,$NombreTabla,$condicion) {
     //echo"select * from $NombreTabla $condicion";
       return mysqli_query($conex, "select * from $NombreTabla $condicion"); 
    }
     function consultaCount($conex,$nombreTabla,$condicion) { 
       //echo "select count(*) as num from $nombreTabla $condicion";
       return mysqli_fetch_array(mysqli_query($conex,"select count(*) as num from $nombreTabla $condicion") ) ;
    }
    function consultaDelete($conex,$nombreTabla,$condicion){
        //echo "delete from $nombreTabla $condicion";
        return mysqli_query($conex,"delete from $nombreTabla $condicion");
    }
    function insert($conex,$nombreTabla,$porpiedades,$datos) {
        $consu="insert into $nombreTabla $porpiedades value ('";
                
         for (  $i=0; $i  < count($datos);$i ++) { 
            if(($i+1)<count($datos)){
            $consu=$consu. $datos[$i]."','";
            }else{
                $consu=$consu. $datos[$i]."')";
            }
            
        }
     /*  echo$consu; 
        echo $datos[0]."<br>";  
        echo $datos[1]."<br>";  
        echo $datos[2]."<br>";  */
        return mysqli_query($conex,$consu);
         
    }
    function consultaUpdate($conex,$nombreTabla,$informacion,$condicion){
        return mysqli_query($conex,"update $nombreTabla set documento='$informacion[0]',nombres='$informacion[1]',rol='$informacion[3]' $condicion");
    }
