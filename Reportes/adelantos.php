<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . "./../Clases/ConectorBD.php";

$fecha= getdate();
$fecha=$fecha['year']."-".$fecha['mon'];


$cadena="SELECT *from adelanto,empleado,cargo WHERE idempleado=identificacion and cargo=idcargo AND fecha>=2018-$fecha-01 AND fecha<=now()";
$datos= ConectorBD::ejecutarQuery($cadena, null);
$lista="";
$numero=1;
if (count($datos)>0){
    for ($i = 0; $i < count($datos); $i++) {
    $lista.="<tr>";
    $lista.="<td>{$numero}</td>";
    $lista.="<td>{$datos[$i][2]}</td>";
    $lista.="<td>{$datos[$i][3]}</td>";
    $lista.="<td>{$datos[$i][5]}".""."{$datos[$i][6]}</td>";
    $lista.="<td>{$datos[$i][8]}</td>";
    $lista.="<td>{$datos[$i][11]}</td>";
    $lista.="<td>{$datos[$i][15]}</td>";
    $lista.="<td> $ {$datos[$i][1]}</td>";
    $lista.="</tr>";
    $numero+=1;
    }
}else
    $lista.="<td>NO HAY ADELANTOS PARA ESTE MES</td>";


?>
<br><br>
<h2 class="text-center">REPORTE DE LOS ADELANTOS  ULTIMO MES</h2><br><img src="presentacion/imagenes/word.png" width="50" height="50"><img src="presentacion/imagenes/pdf.png" width="50" height="50"> <img src="presentacion/imagenes/exel.png"width="50" height="50">
<table class="table table-hover">
    <tr><td>Numero</td><td>Fecha adelanto</td><td>Identificacion</td><td>Nombres completos</td><td>Telefono</td><td>Fecha ingreso</td><td>Cargo</td> <td>Valor Adelanto</td></tr>
<?=$lista?>
</table>