<?php
/* @var $this TipoclienteController */
/* @var $model Tipocliente */

$this->breadcrumbs=array(
	'Tipoclientes'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Tipocliente', 'url'=>array('index')),
	array('label'=>'Create Tipocliente', 'url'=>array('create')),
	array('label'=>'Update Tipocliente', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Tipocliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipocliente', 'url'=>array('admin')),
);
?>

<h1>View Tipocliente #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Descripcion',
		'Estatus',
	),
)); ?>
