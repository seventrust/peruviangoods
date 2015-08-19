<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Conectamos a la base de datos

// Funcion general para la conexion a la base de datos
function conexion() {
    $link = mysqli_connect('localhost', 'root', '', 'peruvianprueba');
    return $link;
    
}
function getOrden() {

    //mysqli_select_db('pruebas', $link);
//    $sql = "SELECT Id,NumCompra from compra ORDER by Id ASC";
//    $sql = "SELECT Id,NumCompra from compra ORDER by Id ASC";
//    $resultado = mysqli_query(conexion(), $sql);
//    //$resultado = mysql_query($sql) or die( "error en $sql, " . mysql_error() );
//    
//    while($row = mysqli_fetch_array($resultado)){
//        
//        $orden = $row['Id'];
//    }
//    switch ($orden){
//        case $orden = '':
//            $orden = 1;
//        case $orden =! 0:
//            $orden+=1;
//    }
//    echo (int) $orden+=1;
     $sql = "SELECT count(*)+1 as Id from compra";

    $resultado = mysqli_query(conexion(), $sql);
    
    while($row = mysqli_fetch_array($resultado)){
        
        $orden = $row['Id'];
    }

    echo (int) $orden;
}
