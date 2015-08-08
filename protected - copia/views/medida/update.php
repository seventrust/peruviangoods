<?php
$this->breadcrumbs=array(
	'Medidas'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Medida','url'=>array('index')),
	array('label'=>'Create Medida','url'=>array('create')),
	array('label'=>'View Medida','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Medida','url'=>array('admin')),
);
?>

<h1>Update Medida <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>