<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once dirname(__FILE__). '/../../Clases/ConectorBD.php';
require_once dirname(__FILE__). '/../../Clases/Menu.php';

foreach ($_GET as $variable=> $valor) ${$variable}=$valor;

if ($accion=='Modificar') $menu=new Menu('idmenu',$idmenu );
else  $menu=new Menu(null, null);


?>

<style>
    div.container-fluid{
       margin: 5% 35%;
        width: 80%;
    }
    input.btn-primary{
        margin: 2% 8%;
    }
</style>
<div class="container-fluid">
<h2><?= strtoupper($accion)?> MENU </h2>
<form  name="formulariomenu" method="POST" action="PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Menu/actualizarmenu.php">
    
    
    <table  >
        <div class="form-group ">
            <tr><th>Nombre</th><th><input type="text" class="form-control input-lg" name="nombre" value="<?=$menu->getNombre()?>"placeholder="ingrese nombre"  autofocus required maxlength="80"></th></tr>
            </div> 
    <input    type="hidden" name="idmenu" value="<?=$menu->getIdmenu()?>">
    </table>
    <input class="btn btn-primary " type="submit"  name="accion"value="<?=$accion?>">

</form>
</div>
