<?php
/* @var $this BodegaController */
/* @var $model Bodega */

$this->breadcrumbs=array(
	'Bodegas'=>array('index'),
	$model->CodBodega,
);

$this->menu=array(
	array('label'=>'Listado de Bodega', 'url'=>array('index')),
	array('label'=>'Crear Bodega', 'url'=>array('create')),
	array('label'=>'Modificar Bodega', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Desactivar Bodega', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bodega', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->Descripcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array("class"=>"table table-striped"),
	'attributes'=>array(
		'CodBodega',
		'Descripcion',
		'Direccion',
		'Estatus',
	),
)); ?>
