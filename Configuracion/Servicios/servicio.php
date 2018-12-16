<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__). '/../../Clases/ConectorBD.php';
require_once dirname(__FILE__). '/../../Clases/Plato.php';

$datos= Plato::getDatosObjetos(" tipo='S' ", 'idplato');
$listaplatos='';
$numero=1;
for ($i = 0; $i < count($datos); $i++) {
    $datoplato= $datos[$i];
    
    $listaplatos.='<tr>';
    $listaplatos.="<td>$numero</td>";
    $listaplatos.="<td>{$datoplato->getNombre()}</td>";
    $listaplatos.="<td>{$datoplato->getValor()}</td>";
    $listaplatos.="<td>{$datoplato->getDescripcion()}</td>";
     $listaplatos.="<td><img src='{$datoplato->getFoto()}' width='50' height='50'></td>";
    $listaplatos.="<td><a href='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Servicios/formularioservicio.php&idplato={$datoplato->getIdplato()}&accion=Modificar'><img src='Presentacion/imagenes/Modificar.png' title='Modificar'></a> <img src='Presentacion/imagenes/Eliminar.png' title='Eliminar' onclick='Eliminar({$datoplato->getIdplato()})'></td>";
    $listaplatos.='</tr>';
    $numero+=1;
}



?>
<style>
    h2.alert-primary{
        padding: 10px;
        font-family:  TeamViewer;
    }
</style>
<div class="container"><br>
    <H2 class="alert-primary text-center">GESTIONAR SERVICIO</H2>

    <table class="table ">
        <thead class="table-dark "><th>Numero</th><th>Nombre</th><th>Valor</th> <th>Descripcion</th><th>Foto</th>
<th><a href="PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Servicios/formularioservicio.php&accion=Adicionar"><img src="Presentacion/imagenes/Adicionar.png" title="Adicionar"></a></th>
    </thead>
 
    
    <?= $listaplatos?>
</table>
   

</div>
<script type="text/javascript">
function Eliminar(id){
    if (confirm("Confirmar Eliminación")) 
    
        location='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Servicios/actualizarservicio.php&accion=Eliminar&idplato='+id;

}

</script>