<?php
/* @var $this TipoclienteController */
/* @var $model Tipocliente */

$this->breadcrumbs=array(
	'Tipoclientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipocliente', 'url'=>array('index')),
	array('label'=>'Manage Tipocliente', 'url'=>array('admin')),
);
?>

<h1 align='center'>Tipo de Cliente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>