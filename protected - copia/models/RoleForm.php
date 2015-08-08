<?php

class RoleForm extends CFormModel
{
    
//    public static $types=array("operacion","tarea","rol");
//    public $nombre;
//    public $descripcion;
//    public $tipo=2;
    
//    public function rules() {
//        return array(
//            array("nombre,tipo","required"),
//            array("descripcion","safe"),
//        );
//    }
   public static $types=array("operation","task","role");
    public $name;
    public $description;
    public $type=2;
    
    public function rules() {
        return array(
            array("name,type","required"),
            array("description","safe"),
        );
    }
}

