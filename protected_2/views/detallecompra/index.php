<?php
/* @var $this DetallecompraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detallecompras',
);

$this->menu=array(
	array('label'=>'Create Detallecompra', 'url'=>array('create')),
	array('label'=>'Manage Detallecompra', 'url'=>array('admin')),
);
?>

<h1>Detallecompras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
