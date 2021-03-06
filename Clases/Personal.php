<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personal
 *
 * @author zuliban
 */
class Personal {
    //put your code here
  
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $genero;
    private $telefono;
    private $fechanacimiento;
    private $email;
    private $fechaingreso;
    private $fechafin;
    private $cargo;
    
    function __construct($campo, $valor) {
      if ($campo!=NULL) {//si campo no esta basio
            if (is_array($campo)) $this->cargarObjetoEnVector ($campo);//pregunta es arreglo por verdadero llama al cargar vector
            else {//por falso carga una consulta en la base de datos
                $cadenaSQL="select identificacion, nombres, apellidos, genero, telefono, fechanacimiento,email,fechaingreso, fechafin, cargo from empleado where $campo=$valor";
                $resultado= ConectorBD::ejecutarQuery($cadenaSQL, null);//llega como nulo por que estmos con la base de datos admin
                if(count($resultado)>0) $this->cargarObjetoEnVector ($resultado[0]);//debuelve el primero 
                //conut cuenta cuantas filas tiene el elemento
            }
            
        }
    }
    private function cargarObjetoEnVector($vector){
        $this->identificacion = $vector['identificacion'];
        $this->nombres = $vector['nombres'];
        $this->apellidos = $vector['apellidos'];
        $this->genero = $vector['genero'];
        $this->telefono = $vector['telefono'];
        $this->fechanacimiento = $vector['fechanacimiento'];
        $this->email = $vector['email'];
        $this->fechaingreso = $vector ['fechaingreso'];
        $this->fechafin = $vector ['fechafin'];
        $this->cargo = $vector['cargo'];
    } 
    
    function getNombres() {
        return $this->nombres;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }
                
    function getIdentificacion() {
        return $this->identificacion;
    }


    function getApellidos() {
        return $this->apellidos;
    }

    function getGenero() {
        return $this->genero;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    function getEmail() {
        return $this->email;
    }

    function getFechaingreso() {
        return $this->fechaingreso;
    }

    function getFechafin() {
        return $this->fechafin;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }



    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento = $fechanacimiento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFechaingreso($fechaingreso) {
        $this->fechaingreso = $fechaingreso;
    }

    function setFechafin($fechafin) {
        $this->fechafin = $fechafin;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    public function __toString() {
        return $this->nombres.' '.$this->apellidos;
    }

public function grabar(){
       $cadenaSQL="insert into empleado(identificacion, nombres, apellidos, genero, telefono, fechanacimiento,email, fechaingreso, fechafin, cargo) values"
               . "('{$this->identificacion}',{$this->nombre}','{$this->apellidos}','{$this->genero}','{$this->telefono}','{$this->fechanacimiento}','{$this->email}','$this->fechaingreso','$this->fechafin','$this->cargo')";
       ConectorBD::ejecutarQuery($cadenaSQL, null);
        
    }
   public function modificar(){
        $cadenaSQL="update empleado set  identificacion='{$this->identificacion},'nombres='{$this->nombre}',apellidos='{$this->apellidos}',genero={$this->genero},telefono='{$this->telefono}',fechanacimiento='{$this->fechanacimiento}' ,email='{$this->email}',fechaingraso='{$this->fechaingreso}',cargo='{$this->cargo}' where id={$this->identificacion}";
        ConectorBD::ejecutarQuery($cadenaSQL, null);
    }
   public function eliminar(){
       $cadenaSQL="delete from empleado where identificacion='{$this->identificacion}'";
       ConectorBD::ejecutarQuery($cadenaSQL, null);
        
    }
    public  static function  getDatos($filtro, $orden){
         $cadenaSQL="select identificacion, nombre, apellidos, genero, telefono, fechanacimiento,email, fechaingreso, fechafin, cargo from empleado ";
         if ($filtro!=NULL) $cadenaSQL.=" where $filtro";//si filtro no es basio hace la consulta el filtro
         if($orden!=NULL)$cadenaSQL.=" order by $orden";//si no llega basia en la cadena sql ordena
         return ConectorBD::ejecutarQuery($cadenaSQL, NULL) ;//llega nul la base dedatos y la coje el sistena adminsis
        
    }
    public static function getDatosEnObjeto($filtro, $orden){
         $datos= Personal::getDatos($filtro, $orden);
         $listaPersonal= array();//se crea una variable de arreglos o define arreglo=string [][]lista = 
         for ($i = 0; $i < count($datos); $i++) {//recorrer arreglos
             $personal=new si($datos[$i],NULL);    
             $listaPersonal[$i]=$personal;//es enviado a un vector de objeto
         }
         return $listaPersonal;
    }
    
}
