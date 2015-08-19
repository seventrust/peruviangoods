<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->breadcrumbs=array(
	'Compras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Compra', 'url'=>array('index')),
	array('label'=>'Manage Compra', 'url'=>array('admin')),
);
?>

<h1 align="center">Compra</h1>

<?php #$this->renderPartial('_form', array('model'=>$model,'model_detalle'=>$model_detalle)); ?>
<?php #$this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers));?>
<?php $this->renderPartial('_form', array('model'=>$model, 'member'=>$member,'validatedMembers'=>$validatedMembers));?>