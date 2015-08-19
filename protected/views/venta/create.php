<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar ', 'url'=>array('index')),
	array('label'=>'Administrar ', 'url'=>array('admin')),
);
?>

<!--<h1>Nota de Venta</h1>-->
<?php echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers, 'cliente' => $cliente));?>