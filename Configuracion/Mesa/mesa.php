<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__). '/../../Clases/ConectorBD.php';
require_once dirname(__FILE__).'/../../Clases/Mesa.php';


$cadenaSQL="select idmesa,area,color,mesainicial,piso from comanda,mesa where idmesa=mesa and estado<>'' group by idmesa  ";
$datos1= ConectorBD::ejecutarQuery($cadenaSQL, null);
//print_r($datos1[1][3]."-");




$cadena="SELECT * FROM mesa WHERE mesainicial NOT IN (";
$coma=",";
for ($p = 0; $p < count($datos1); $p++) {
   // print_r($datos1[$p][3]);
    $cadena.=" {$datos1[$p][3]}$coma";
   
// $datos2= ConectorBD::ejecutarQuery($cadenaSQL, null); 
}
$cadena.="0)";
print_r($cadena);

    
//    for ($k = 0; $k < count($datos2); $k++) {
//        //echo 'mesas totales   ';
//        // print_r($datos2[$k][0]);
//        for ($j = 0; $j < count($datos1); $j++) {
//            if ($datos1[$j][3]==$datos2[$k][0]){
//                print_r($datos1[$j][3]);
//        
//                //ocupadas
//            } 
//            }
//                 
//                //print_r($datos1[$j][4]."--");
//      //  echo 'mesas ocupadas   ';
//      //  print_r($datos1[$j][4]);
//            
//        }
        







$datos=Mesa::getDatosEnObjeto(null, 'idmesa');
$listadoMesa='';
for ($i=0; $i< count($datos);$i++){
    $datosMesa=$datos[$i];
    $listadoMesa.='<tr>';
    $listadoMesa.="<td>{$datosMesa->getArea()}</td>";
    $listadoMesa.="<td><input type='color' value='{$datosMesa->getColor()}' disabled></td>";
    $listadoMesa.="<td>{$datosMesa->getMesainicial()}</td>";
    $listadoMesa.="<td>{$datosMesa->getPiso()}</td>";
    $listadoMesa.="<td><a href='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Mesa/formularioMesa.php&idmesa={$datosMesa->getIdmesa()}&accion=Modificar'>"
    . "<img src='Presentacion/imagenes/Modificar.png' title='Modificar'></a><img src='Presentacion/imagenes/Eliminar.png' title='Eliminar' onclick='Eliminar({$datosMesa->getIdmesa()})'></td>";
    $listadoMesa.='</tr>';
    
}
?>
<table border="2">
    
     
   
</table>

<div class="container">
    <br>
<H2 class="alert-primary text-center">Gestionar Mesas</H2>
<br>

<table class="tabla container">
    <thead  class="table-dark">
            <th>AREA</th><th>COLOR</th><th>MESA INICIAL</th><tH>PISO</tH>
         
            <th><a href="PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Mesa/formularioMesa.php&accion=Adicionar"><img src="Presentacion/imagenes/Adicionar.png" title="Adicionar"></a></th></thead>
        <?=$listadoMesa?>
    </table>

<script type="text/javascript">
    function Eliminar(id){
        if(confirm("Confirmar Eliminacion"))
            location='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Mesa/mesaActualizar.php&accion=Eliminar&idmesa='+id;
    }

</script>