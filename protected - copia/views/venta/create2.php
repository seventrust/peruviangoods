<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<h1>Nota de Venta</h1>
<?php echo $this->renderPartial('form_2', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers, 'cliente' => $cliente));?>