<?php
/* @var $this AjusteinventarioController */
/* @var $model Ajusteinventario */

$this->breadcrumbs=array(
	'Ajusteinventarios'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Ajusteinventario', 'url'=>array('index')),
	array('label'=>'Create Ajusteinventario', 'url'=>array('create')),
	array('label'=>'Update Ajusteinventario', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Ajusteinventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ajusteinventario', 'url'=>array('admin')),
);
?>

<h1>View Ajusteinventario #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Fecha',
		'Descripcion',
		'Tipo',
		'CodBodega',
//		'campo2',
//		'campo3',
	),
)); ?>
