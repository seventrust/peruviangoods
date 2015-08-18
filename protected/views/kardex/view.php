<?php
$this->breadcrumbs=array(
	'Kardex'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
	array('label'=>'Update Kardex','url'=>array('update','id'=>$model->Id)),
	array('label'=>'Delete Kardex','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kardex','url'=>array('admin')),
        array('label'=>'Export to excel', 'url'=>array('excel')),

);
?>

<h1> Kardex #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Fecha',
		'NumDocumento',
		'CodProducto',
		'TipoMovimiento',
		'Cantidad',
		'SaldoAnterior',
		'SaldoActual',
		'Precio',
		'Subtotal',
		'Usuario',
	),
)); ?>
