<?php
/* @var $this DetallecompraController */
/* @var $model Detallecompra */

$this->breadcrumbs=array(
	'Detallecompras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Detallecompra', 'url'=>array('index')),
	array('label'=>'Manage Detallecompra', 'url'=>array('admin')),
);
?>

<h1>Create Detallecompra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>