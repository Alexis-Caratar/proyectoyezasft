<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__).'/../Clases/Empleado.php';
require_once dirname(__FILE__).'/../Clases/ConectorBD.php';


$datos= Empleado::getDatosEnObjeto(null, null);
$lista='';
$numero=1;
for ($i = 0; $i < count($datos); $i++) {
    $empleado=$datos[$i];
    
    $lista.="<tr>";
    $lista.="<td> $numero</td>";
    $lista.="<td> {$empleado->getIdentificacion()}</td>";
    $lista.="<td> {$empleado->getNombres()} "."{$empleado->getApellidos()}</td>";
    $lista.="<td> {$empleado->getGenero()}</td>";
    $lista.="<td> {$empleado->getTelefono()}</td>";
    $lista.="<td> {$empleado->getFechanacimiento()}</td>";
    $lista.="<td> {$empleado->getEmail()}</td>";
    $lista.="<td> {$empleado->getFechaingreso()}</td>";
    $lista.="<td> {$empleado->getFechafin()}</td>";
    $lista.="<td> {$empleado->getNombrecargo()->getNombre()}</td>";
   // $lista.="<td> {$empleado->getNombrecargo()->getNombre()}</td>";
    $lista.="<td>";
    $lista.="<a href='PrincipalAdmin.php?CONTENIDOADMIN=Personal/formulariopersonal.php&accion=Modificar&identificacion={$empleado->getIdentificacion()}'><img src='Presentacion/imagenes/Modificar.png' title='Modificar'></a>";
    $lista.="<img src='Presentacion/imagenes/Eliminar.png' onClick=eliminar('{$empleado->getIdentificacion()}') title='Eliminar'> ";
    $lista.="<a href='PrincipalAdmin.php?CONTENIDOADMIN=Personal/Adelanto/adelanto.php&identificacion={$empleado->getIdentificacion()}&nombres={$empleado->getNombres()}&apellidos={$empleado->getApellidos()}&telefono={$empleado->getTelefono()}&email={$empleado->getEmail()}' ><img src='Presentacion/imagenes/Adelanto.png' title='Adelanto'></a>";
    $lista.="<a href='PrincipalAdmin.php?CONTENIDOADMIN=Personal/Prestamo/prestamo.php&identificacion={$empleado->getIdentificacion()}&nombres={$empleado->getNombres()}&apellidos={$empleado->getApellidos()}&telefono={$empleado->getTelefono()}&email={$empleado->getEmail()}'><img src='Presentacion/imagenes/Prestamo.png' title='Prestamo'></a>";
    $lista.="<a href='PrincipalAdmin.php?CONTENIDOADMIN=Personal/Pago/pago.php&identificacion={$empleado->getIdentificacion()}&nombres={$empleado->getNombres()}&apellidos={$empleado->getApellidos()}&telefono={$empleado->getTelefono()}&email={$empleado->getEmail()}&cargo={$empleado->getCargo()}'><img src='Presentacion/imagenes/Pago.png' title='Pago'></a>";  
    $lista.="</td>";
    $lista.="</tr>";
    
    $numero+=1;
    
}



?>
<style>
    h2.alert-primary{
        padding: 10px;
       font-family:  TeamViewer; 
    }
</style>

<div class=" display-5"><br>
    <h2 class="text-center alert-primary">LISTA DE PERSONAL</h2>
 <table class="table   badge" >
     <thead class="thead-dark">
     <th>No</th> <th>Identificacion</th><th>Nombres Completos</th> <th>Genero</th><th>Telefono</th>
        <th>Fecha de nacimiento</th><th>Email</th><th> Ingreso</th><th> salida</th><th>Cargo</th>
        <th><a href="PrincipalAdmin.php?CONTENIDOADMIN=Personal/formulariopersonal.php&accion=Adicionar"> <img src="Presentacion/imagenes/Adicionar.png" title='Adicionar'></a></th>
    </thead>
    <?=$lista?>
</table>

</div>

<script>
    function  eliminar(identificacion){
       if(confirm("Desea Eliminar Este registro "+identificacion))
        location="PrincipalAdmin.php?CONTENIDOADMIN=Personal/actualizarpersonal.php&accion=Eliminar&identificacion="+identificacion;
        
        
    }
</script>