<?php
/* @var $this BodegaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bodegas',
);

//$this->menu=array(
//	array('label'=>'Create Bodega', 'url'=>array('create')),
//	array('label'=>'Manage Bodega', 'url'=>array('admin')),
//);
$this->menu=array(
	array('label'=>'List Bodega', 'url'=>array('index')),
	array('label'=>'Create Bodega', 'url'=>array('create')),
	array('label'=>'View Bodega', 'url'=>array('view')),
	array('label'=>'Manage Bodega', 'url'=>array('admin')),
);
?>

<h1>Bodegas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'pager'=>array("htmlOptions"=>array("class"=>"pagination"))
)); ?>


