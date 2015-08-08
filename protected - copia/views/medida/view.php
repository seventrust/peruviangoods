<?php
$this->breadcrumbs=array(
	'Medidas'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Medida','url'=>array('index')),
	array('label'=>'Create Medida','url'=>array('create')),
	array('label'=>'Update Medida','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Medida','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Medida','url'=>array('admin')),
);
?>

<h1>View Medida #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Descripcion',
		'Estatus',
	),
)); ?>
