<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Compras'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<!--<h1>Compras</h1>-->
<?php // echo $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers));?>
<?php $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers, 'forma'=>$forma));?>