<div class="media">
    
<?php
       $columnsArray = array('Código', 'Descripcion', 'Direccion', 'Estatus');
        $rowsArray = $datos;

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
            'title'=>'Bodega',
 	));


//$this->widget('zii.widgets.grid.CGridView', array(
//        'id'=>'my-gridview',                  // IMPORTANT
//        'dataProvider'=> $datos,
//        'filter'=>$datos,
//        'columns'=>array(
//            array('class'=>'CCheckBoxColumn'),  // ADD A CCheckBoxColumn
//            'Descripcion',
//            'Direccion',
//        ),
//    ));
?>