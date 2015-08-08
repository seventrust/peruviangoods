<?php
/* @var $this TipoclienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipoclientes',
);

$this->menu=array(
	array('label'=>'Create Tipocliente', 'url'=>array('create')),
	array('label'=>'Manage Tipocliente', 'url'=>array('admin')),
);
?>

<h1>Tipoclientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
