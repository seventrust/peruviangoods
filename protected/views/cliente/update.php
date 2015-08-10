<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cliente','url'=>array('index')),
	array('label'=>'Create Cliente','url'=>array('create')),
	array('label'=>'View Cliente','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage Cliente','url'=>array('admin')),
);
?>

<h1>Update Cliente <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>