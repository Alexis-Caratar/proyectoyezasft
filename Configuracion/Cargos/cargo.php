<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__). '/../../Clases/ConectorBD.php';
require_once dirname(__FILE__). '/../../Clases/Cargo.php';

$datos= Cargo::getDatosObjetos(null, 'idcargo');
$listaCargos='';
$numero=1;
for ($i = 0; $i < count($datos); $i++) {
    $datocargo= $datos[$i];
    
    $listaCargos.='<tr>';
    $listaCargos.="<td>$numero</td>";
    $listaCargos.="<td>{$datocargo->getNombre()}</td>";
    $listaCargos.="<td> $ {$datocargo->getSueldo()} Pesos</td>";
    $listaCargos.="<td><a href='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Cargos/formulariocargo.php&idcargo={$datocargo->getIdcargo()}&accion=Modificar'><img src='Presentacion/imagenes/Modificar.png' title='Modificar'></a> <img src='Presentacion/imagenes/Eliminar.png' title='Eliminar' onclick='Eliminar({$datocargo->getIdcargo()})'></td>";
    $listaCargos.='</tr>';
    $numero+=1;
}
?>
<style>
    h2.alert-primary{
        padding: 10px;
        font-family:font-family;

    }
</style>
<div class="container">
    <br>
    <H2 class="alert-primary text-center" >Gestionar Cargos</H2>
    <table class="tabla container ">
        
        <thead class="table-dark"><th>NUMERO</th><th>NOMBRE</th><th>SUELDO</th>
        <th><a href="PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Cargos/formulariocargo.php&accion=Adicionar"><img src="Presentacion/imagenes/Adicionar.png" title="Adicionar"></a></th>
    </thead>
 
    
    <?= $listaCargos?>
</table>
    </div>

<script type="text/javascript">
function Eliminar(id){
    if (confirm("Confirmar Eliminación")) 
    
        location='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Cargos/actualizarcargo.php&accion=Eliminar&idcargo='+id;

}

</script>