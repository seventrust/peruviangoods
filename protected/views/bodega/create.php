<?php
/* @var $this BodegaController */
/* @var $model Bodega */

$this->breadcrumbs=array(
	'Bodegas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<!--<h1 align="center"> Bodega</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>