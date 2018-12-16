<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__). '/../../Clases/ConectorBD.php';
require_once dirname(__FILE__). '/../../Clases/Evento.php';
$datos= Evento::getDatosEnObjetos(null, 'idevento');
//print_r($registros);//print_r examinar arreglos.
$lista='';
$numero=1;
for ($i = 0; $i < count($datos); $i++) {
    $objeto=$datos[$i];
    
    $lista.='<tr id="filas">';
    $lista.="<td>$numero</td>";
    $lista.="<td>{$objeto->getNombre()}</td><td>{$objeto->getDescripcion()}</td>";
    $lista.="<td id='forularioContenido'><img src='{$objeto->getFoto()}' width='80' height='70' ></td>";
    $lista.="<td><a href='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Eventos/formularioevento.php&idevento={$objeto->getIdevento()}&accion=Modificar'><img src='Presentacion/imagenes/Modificar.png' title='Modificar'></a> <img src='Presentacion/imagenes/Eliminar.png' title='Eliminar' onclick='Eliminar({$objeto->getIdevento()})'></td>";
    $lista.='</tr>';
    $numero+=1;
}
?>
<style>
    h2.alert-primary{
        padding: 10px;
        font-family:TeawViwer;
    }
    </style>
<div class="container"><br>
    <h2  class="alert-primary text-center" > EVENTOS </h2>
<table  class="table">
    
    <thead class="table-dark"><th>NUMERO</th><th>NOMBRE</th><th>DESCRIPCION</th><th>FOTO</th>
        <th><a href="PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Eventos/formularioevento.php&accion=Adicionar"><img src="Presentacion/imagenes/Adicionar.png" title="Adicionar"></a></th></tr>
    
</thead>
    <?=$lista?>
</table>
</div>

<script type="text/javascript">
function Eliminar(id){
    if (confirm("Confirmar Eliminación")) 
    
        location='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Eventos/actualizarevento.php&accion=Eliminar&idevento='+id;

}

</script>