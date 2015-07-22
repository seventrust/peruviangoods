<?php

function updateDatos($cadena, $orden){
    $link = mysqli_connect('localhost', 'root', 'fin4639802', 'sistema_pruebas');
    $sql = "INSERT INTO venta (NumVenta, CodCliente, CodBodega, Fecha, Vencimiento, ForPago, TotExento, TotDescuento, TotNeto, TotIva, TotImpuesto, TotRetencion, Total) VALUES "; 
    foreach ($cadena as $value) {
            $sql.= sprintf("('$orden', '%s'),", $value);
    }
    $sql=rtrim($sql,',');
    $result = mysqli_query($link, $sql) or die( "error en $sql " . mysqli_error() );
}

if(isset($_POST['cadena'], $_POST['orden'])) {
  echo updateDatos($_POST['cadena'], $_POST['orden']);
}