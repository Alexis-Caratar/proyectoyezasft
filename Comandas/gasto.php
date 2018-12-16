<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . "./../Clases/ConectorBD.php";

$fecha= getdate();
$fecha=$fecha['year']."-".$fecha['mon'];


$cadena="select*from gasto where caja=$idcaja ";
$datos= ConectorBD::ejecutarQuery($cadena, null);
$lista="";
$numero=1;
$suma=0;
$valorgasto="";
if (count($datos)>0){
    for ($i = 0; $i < count($datos); $i++) {
    $lista.="<tr>";
    $lista.="<td>{$numero}</td>";
   // $lista.="<td>{$datos[$i][0]}</td>";
    $lista.="<td>{$datos[$i][1]}</td>";
    $lista.="<td>{$datos[$i][2]}</td>";

    $lista.="<td> $ {$datos[$i][1]}</td>";
    $lista.='<td><a href="PrincipalAdmin.php?CONTENIDOADMIN=Comandas/formulariogasto.php&accion=Modificar&idgasto='.$datos[$i][0].'&idcaja='.$idcaja.'"><img src="presentacion/imagenes/Modificar.png" title="Modificar"></a>'
            . ' <img src="presentacion/imagenes/Eliminar.png" title="Eliminar" onClick=eliminar('.$datos[$i][0].');>  </td>';
    $lista.="</tr>";
    $suma+=$datos[$i][1];
    $valorgasto="<br><h2 class='text-center'> TOTAL: $suma</h2>";
    
    $numero+=1;
    }
}else
    $lista.="<td>NO HAY GASTOS EN ESTA CAJA</td>";


?>
<br><br>
<h2 class="text-center">GASTOS CAJA</h2><br>
<table class="table  table-hover">
    <tr><td>Numero</td><td>VALOR</td><td>DETALLE DEL GASTO</td><td>VALOR</td><td><a href="PrincipalAdmin.php?CONTENIDOADMIN=Comandas/formulariogasto.php&accion=Adicionar&idcaja=<?=$idcaja?>"><img src="presentacion/imagenes/Adicionar.png" title="Adicionar"></a></td></tr>
<?=$lista?>

    
</table>
<?=$valorgasto?>

<script>
function  eliminar(id){
if(confirm("Eliminar este registro "+id))
    location="PrincipalAdmin.php?CONTENIDOADMIN=Comandas/actualizargasto.php&accion=Eliminar&idcaja=<?=$idcaja?>&idgastos="+id;
}
</script>