<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->NumCompra=>array('view','id'=>$model->NumCompra),
	'Update',
);

$this->menu=array(
	array('label'=>'List Compra', 'url'=>array('index')),
	array('label'=>'Create Compra', 'url'=>array('create')),
	array('label'=>'View Compra', 'url'=>array('view', 'id'=>$model->NumCompra)),
	array('label'=>'Manage Compra', 'url'=>array('admin')),
);
?>

<h1>Update Compra <?php echo $model->NumCompra; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>