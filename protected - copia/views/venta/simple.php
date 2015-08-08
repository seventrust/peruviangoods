<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->Fecha,
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'Update Venta', 'url'=>array('update', 'id'=>$model->Fecha)),
	array('label'=>'Delete Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Fecha),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>
<table>
<tr><th>Name</th><th>Price</th><th>Count</th><th>Description</th></tr>
<?php foreach($items as $i=>$item): ?>
<tr>
    <td><?php echo CHtml::activeTextField($item,"[$i]name"); ?></td>
    <td><?php echo CHtml::activeTextField($item,"[$i]price"); ?></td>
    <td><?php echo CHtml::activeTextField($item,"[$i]count"); ?></td>
    <td><?php echo CHtml::activeTextArea($item,"[$i]description"); ?></td>
</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


