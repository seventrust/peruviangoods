<?php
$this->breadcrumbs=array(
	'Medidas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Medida','url'=>array('index')),
	array('label'=>'Manage Medida','url'=>array('admin')),
);
?>

<h1>Create Medida</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>