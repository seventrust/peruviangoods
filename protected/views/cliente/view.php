<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Cliente','url'=>array('index')),
	array('label'=>'Create Cliente','url'=>array('create')),
	array('label'=>'Update Cliente','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Cliente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cliente','url'=>array('admin')),
);
?>

<h1>View Cliente #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'CodCliente',
		'Descripcion',
		'Fantasia',
		'Giro',
		'Direccion',
		'Telefono',
		'Fax',
		'Correo',
		'Contacto',
		'Observaciones',
		'IdTipo',
		'Estatus',
	),
)); ?>
