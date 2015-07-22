<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Conectamos a la base de datos

// Funcion general para la conexion a la base de datos
function conexion() {
    $link = mysqli_connect('localhost', 'root', '1234567', 'sistema_pruebas');
    return $link;
    
}
function getOrden() {

    //mysqli_select_db('pruebas', $link);
    
    $sql = "SELECT NumVenta from venta";
    $resultado = mysqli_query(conexion(), $sql);
    //$resultado = mysql_query($sql) or die( "error en $sql, " . mysql_error() );
    while($row = mysqli_fetch_array($resultado)){
        $orden = $row['NumVenta'];
    }
    settype($orden, "integer");

    $orden++;
    echo $orden;
}




