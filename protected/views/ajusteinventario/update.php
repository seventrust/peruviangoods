<?php
/* @var $this AjusteinventarioController */
/* @var $model Ajusteinventario */

$this->breadcrumbs=array(
	'Ajusteinventarios'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ajusteinventario', 'url'=>array('index')),
	array('label'=>'Create Ajusteinventario', 'url'=>array('create')),
	array('label'=>'View Ajusteinventario', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Ajusteinventario', 'url'=>array('admin')),
);
?>

<h1>Update Ajuste inventario <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>