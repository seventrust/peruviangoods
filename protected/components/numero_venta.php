<?php


//Conectamos a la base de datos

// Funcion general para la conexion a la base de datos
function conexion() {
    $link = mysqli_connect('localhost', 'root', '', 'peruvianprueba');
    return $link;
    
}
function getOrden() {

    $sql = "SELECT count(*)+1 as Id from compra";

    $resultado = mysqli_query(conexion(), $sql);
    
    while($row = mysqli_fetch_array($resultado)){
        
        $orden = $row['Id'];
    }

    echo (int) $orden;
}




