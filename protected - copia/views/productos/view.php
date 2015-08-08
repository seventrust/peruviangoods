
<?php
/* @var $this ProductosController */
/* @var $model Productos */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Productos', 'url'=>array('index')),
	array('label'=>'Create Productos', 'url'=>array('create')),
	array('label'=>'Update Productos', 'url'=>array('update', 'id'=>$model->Id)),
//	array('label'=>'Desactivar Productos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('enable','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Productos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->Descripcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'Id',
		'CodProducto',
		'Descripcion',
		'UniMedida',
		'CanExistencia',
		'PreCompra',
		'PreVenta',
		'Foto',
		'CodCategoria',
		'Estatus',
	),
)); ?>

