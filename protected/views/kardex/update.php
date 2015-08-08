<?php
$this->breadcrumbs=array(
	'Kardexes'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
	array('label'=>'View Kardex','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Kardex','url'=>array('admin')),
);
?>

<h1>Update Kardex <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>