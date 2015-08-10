<?php
$this->breadcrumbs=array(
	'Productoses'=>array('index'),
	$model->CodProducto,
);

$this->menu=array(
	array('label'=>'List Productos','url'=>array('index')),
	array('label'=>'Create Productos','url'=>array('create')),
	array('label'=>'Update Productos','url'=>array('update','id'=>$model->CodProducto)),
	array('label'=>'Delete Productos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->CodProducto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Productos','url'=>array('admin')),
);
?>

<h1>View Productos #<?php echo $model->CodProducto; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'CodProducto',
		'Descripcion',
		'UniMedida',
		'CanExistencia',
		'PreCompra',
		'PreVenta',
		'PreVenta1',
		'Foto',
		'CodCategoria',
		'Estatus',
		'CodProveedor',
	),
)); ?>
