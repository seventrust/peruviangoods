<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php
/* @var $this BodegaController */
/* @var $model Bodega */

$this->breadcrumbs=array(
	'Bodegas'=>array('index'),
	'Mantenimiento',
);


$this->menu=array(
	array('label'=>'Listado de Bodega', 'url'=>array('index')),
	array('label'=>'Crear Bodega', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bodega-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Listado de Bodegas</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bodega-grid',
        'itemsCssClass'=>"table table-striped",
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'CodBodega',
		'Descripcion',
		'Direccion',
		'Estatus',
//                'categoria.Descripcion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
