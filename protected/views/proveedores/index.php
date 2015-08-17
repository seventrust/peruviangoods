<?php

$columnsArray = array('Código', 'Descripcion', 'Direccion', 'Estatus');
$rowsArray = $datos;
 
//$this->widget('ext.htmlTableUi.htmlTableUi',array(
//    'collapsed'=>true,
//    'enableSort'=>true,
//    'title'=>'Bodegas',
//    'subtitle'=>'Rev 1.3.3',
//    'columns'=>$columnsArray,
//    'rows'=>$rowsArray,
//    'footer'=>'Total rows: '.count($rowsArray).' By: José Rullán'
//));


$this->widget('ext.htmltableui.htmlTableUi',array(
    'ajaxUrl'=>'site/handleHtmlTable',
    'arProvider'=>'',    
    'collapsed'=>true,
    'columns'=>$columnsArray,
    'cssFile'=>'',
    'editable'=>true,
    'enableSort'=>true,
    'exportUrl'=>'site/exportTable',
    'extra'=>'Additional Information',
    'footer'=>'Total rows: '.count($rowsArray),
    'formTitle'=>'Bodegas',
    'rows'=>$rowsArray,
    'sortColumn'=>1,
    'sortOrder'=>'desc',
    'subtitle'=>'',
    'title'=>'Proveedores',
));


?>