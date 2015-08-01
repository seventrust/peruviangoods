<?php
/* @var $this BodegaController */
/* @var $model Bodega */

$this->breadcrumbs=array(
	'Bodegas'=>array('index'),
//	$model->CodBodega=>array('view','id'=>$model->CodBodega),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bodega', 'url'=>array('index')),
	array('label'=>'Create Bodega', 'url'=>array('create')),
	array('label'=>'View Bodega', 'url'=>array('view', 'id'=>$model->CodBodega)),
	array('label'=>'Manage Bodega', 'url'=>array('admin')),
);
?>

<h1>Bodega <?php echo $model->CodBodega; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>