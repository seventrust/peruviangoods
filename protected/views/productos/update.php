<?php
$this->breadcrumbs=array(
	'Productoses'=>array('index'),
	$model->CodProducto=>array('view','id'=>$model->CodProducto),
	'Update',
);

$this->menu=array(
	array('label'=>'List Productos','url'=>array('index')),
	array('label'=>'Create Productos','url'=>array('create')),
	array('label'=>'View Productos','url'=>array('view','id'=>$model->CodProducto)),
	array('label'=>'Manage Productos','url'=>array('admin')),
);
?>

<h1>Update Productos <?php echo $model->CodProducto; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>