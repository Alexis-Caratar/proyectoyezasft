<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once dirname(__FILE__). '/../../Clases/ConectorBD.php';
require_once dirname(__FILE__). '/../../Clases/Menu.php';

$filtro="";
if (isset($_POST['nombre'])&&$_POST['nombre']!=NULL){
    $nombresmenu=$_POST['nombre'];
    $filtro="nombre like'%$nombresmenu%'"; 
            
}


$datos= Menu::getDatosObjetos($filtro, 'idmenu');
$listaMenus='';
$numero=1;
for ($i = 0; $i < count($datos); $i++) {
    $datomenu= $datos[$i];
    
    $listaMenus.='<tr>';
    $listaMenus.="<td>$numero</td>";
    $listaMenus.="<td>{$datomenu->getNombre()}</td>";
    $listaMenus.="<td><a href='PrincipalAdmin.php?CONTENIDOADMIN="
            . "Configuracion/Menu/formulariomenu.php&idmenu={$datomenu->getIdmenu()}&"
            . "accion=Modificar'><img src='Presentacion/imagenes/Modificar.png' "
                    . "title='Modificar'></a> <img src='Presentacion/imagenes/Eliminar.png'"
                    . " title='Eliminar' onclick='Eliminar({$datomenu->getIdmenu()})'></td>";
    $listaMenus.='</tr>';
    $numero+=1;   
}
?>
<div class="container-fluid" >
<div class="offset-8 col-4  "style="z-index: 100; position: absolute;background: #333333;">
    <form method="post" class="">


                     <table class="table table-dark table-hover " >
                               <tr> 
                                   <th> <img src="presentacion/imagenes/buscarpequeño.png"></span></th><td><input  class="form-control" type="text"  autofocus name="nombre" placeholder="Nombre menu" ></td>
                                   <td><input class="btn btn-primary"type="submit" value="BUSCAR"></td>
                                </tr>
                           </table>
 </form>
     
      
  
</div>
</div> 









<style>
    h2.alert-primary{
        padding: 10px;
        font-family: TeamViewer;
    }
</style>
<div class="container">
    <br>
<H2 class="alert-primary text-center">Gestionar Menu</H2>
<br>

<table class="tabla container">
    <thead  class="table-dark "><th>NUMERO</th><th>NOMBRE DE LA CATEGORIA</th>
    <th><a href="PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Menu/
           formulariomenu.php&accion=Adicionar">
            <img src="Presentacion/imagenes/Adicionar.png" title="Adicionar">
        </a></th>
</thead>
    <?= $listaMenus?>
</table>
    </div>

<script type="text/javascript">
function Eliminar(id){
    if (confirm("Confirmar Eliminación")) 
        location='PrincipalAdmin.php?CONTENIDOADMIN=Configuracion/Menu/actualizarmenu.php&accion=Eliminar&idmenu='+id;

}
</script>
