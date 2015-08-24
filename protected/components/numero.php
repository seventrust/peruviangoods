<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Conectamos a la base de datos

// Funcion general para la conexion a la base de datos
function conexion() {
//     $link = mysqli_connect('servidor', 'admin_prueba', '1234567', 'peruvianprueba');
    $link = mysqli_connect('servidor', 'admin_prueba', '1234567', 'peruvianprueba');
    return $link;
    
}
function getCompra() {

    $sql = "SELECT count(*)+1 as Id from compra";

    $resultado = mysqli_query(conexion(), $sql);
    
    while($row = mysqli_fetch_array($resultado)){
        
        $orden = $row['Id'];
    }

    echo (int) $orden;
}

function getVenta() {

    $sql = "SELECT count(*)+1 as Id from Venta";

    $resultado = mysqli_query(conexion(), $sql);
    
    while($row = mysqli_fetch_array($resultado)){
        
        $orden = $row['Id'];
    }

    echo (int) $orden;
}