<?php
/* @var $this AjusteinventarioController */
/* @var $model Ajusteinventario */

$this->breadcrumbs=array(
	'Ajusteinventarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ajusteinventario', 'url'=>array('index')),
	array('label'=>'Manage Ajusteinventario', 'url'=>array('admin')),
);
?>

<h1>Crear Ajuste de inventario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>