<?php
$this->breadcrumbs=array(
	'Kardexes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
         array('label'=>'Export to excel', 'url'=>array('excel')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kardex-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h1>Manage Kardexes</h1>-->

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $gridWidget = $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kardex-grid',
	'dataProvider'=>$model->search(),
        'htmlOptions'=>array('width'=>40),
	'filter'=>$model,
	'columns'=>array(
//		'Id',
//		'Fecha',
//		'NumDocumento',
		'CodProducto',
		'TipoMovimiento',
		'SaldoAnterior',
                'Cantidad',
		'SaldoActual',
		/*'Precio',
		'Subtotal',
		'Usuario',
		*/
//		array(
//			'class'=>'bootstrap.widgets.TbButtonColumn',
//		),
	),
)); ?>
<?php $this->renderExportGridButton($gridWidget,'Export Grid Results',array('class'=>'btn btn-info pull-right')); ?>