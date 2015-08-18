<?php
$this->breadcrumbs=array(
	'Medidas',
);

$this->menu=array(
	array('label'=>'Create Medida','url'=>array('create')),
	array('label'=>'Manage Medida','url'=>array('admin')),
);
?>

<h1>Medidas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
