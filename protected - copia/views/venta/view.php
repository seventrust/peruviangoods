<?php
/* @var $this VentaController */
/* @var $model Venta */
$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->NumVenta,
);
$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'Update Venta', 'url'=>array('update', 'id'=>$model->NumVenta)),
	array('label'=>'Delete Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NumVenta),'confirm'=>'Estas seguro de eliminar este registro')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<h1>Detalle de Venta No. #<?php echo $model->NumVenta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NumVenta',
		'CodCliente',
		'CodBodega',
		'Fecha',
		'Vencimiento',
		'ForPago',
		'TotExento',
		'TotDescuento',
		'TotNeto',
		'TotIva',
		'TotImpuesto',
		'TotRetencion',
		'Total',
	),
)); ?>