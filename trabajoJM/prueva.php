<?php
include './funciones.php';
$conex= conexionbd("hospital");
$rs= consultaSelect($conex, "cita", "");
echo consultaCount($conex, "cita", "")["num"];
echo "<br>------cita------<br>";
while($cita= mysqli_fetch_array($rs)){
    echo $cita["paciente"]."<br>";
    echo $cita["medico"]."<br>";
    echo $cita["fecha"]."<br>";
    echo "<br>------caragar medico y paciente de la cita------<br>";
    $p= consultaSelect($conex, "paciente", "where documento='".$cita["paciente"]."'");
    $p= mysqli_fetch_array($p);
    echo $p["nombres"]."<br>";
    $m= consultaSelect($conex, "medico", "where documento='".$cita["medico"]."'");
    $m= mysqli_fetch_array($m);
    echo $m["nombres"]."<br>";
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

