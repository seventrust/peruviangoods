<?php

    $cadena = $_POST['cadena'];
    $orden = $_POST['orden'];
    $link = mysqli_connect('localhost', 'root', '1234567', 'sistema_pruebas');
    $sql = "INSERT INTO venta (NumVenta, CodCliente, CodBodega, Fecha, Vencimiento, ForPago, TotExento, TotDescuento, TotNeto, TotIva, TotImpuesto, TotRetencion, Total) VALUES "; 
    foreach ($cadena as $value) {
            $sql.= sprintf("('$orden', '%s'),", $value);
    }
    $sql=rtrim($sql,',');
    $result = mysqli_query($link, $sql) or die( "error en $sql " . mysqli_error() );
