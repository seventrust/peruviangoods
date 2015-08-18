<?php
/* @var $this TipoclienteController */
/* @var $model Tipocliente */

$this->breadcrumbs=array(
	'Tipoclientes'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipocliente', 'url'=>array('index')),
	array('label'=>'Create Tipocliente', 'url'=>array('create')),
	array('label'=>'View Tipocliente', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Tipocliente', 'url'=>array('admin')),
);
?>

<h1>Update Tipocliente <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>