<?php
/* @var $this AjusteinventarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ajusteinventarios',
);

$this->menu=array(
	array('label'=>'Create Ajusteinventario', 'url'=>array('create')),
	array('label'=>'Manage Ajusteinventario', 'url'=>array('admin')),
);
?>

<h1>Ajuste de inventarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
