<?php

class RolForm extends CFormModel
{
    public static $types=array("operacion","tarea","rol");
    public $nombre;
    public $descripcion;
    public $tipo=2;
    
    public function rules() {
        return array(
            array("nombre,tipo","required"),
            array("descripcion","safe"),
        );
    }
}

