<?php
/* @var $this BodegaController */
/* @var $model Bodega */

$this->breadcrumbs=array(
	'Bodegas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bodega', 'url'=>array('index')),
	array('label'=>'Manage Bodega', 'url'=>array('admin')),
);
?>

<h1 align="center"> Bodega</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>