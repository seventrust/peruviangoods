<?php

//Conectamos a la base de datos

// Funcion general para la conexion a la base de datos
function conexion2() {
    $link = mysqli_connect('localhost', 'root', '1234567', 'peruvianprueba');
    return $link;
    
}
function getNumero() {

    $sql = "SELECT count(*)+1 as Id from compra";

    $resultado = mysqli_query(conexion2(), $sql);
    
    while($row = mysqli_fetch_array($resultado)){
        
        $orden = $row['Id'];
    }

    echo (int) $orden;
}