<?php
/* @var $this DetallecompraController */
/* @var $data Detallecompra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumCompra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NumCompra), array('view', 'id'=>$data->NumCompra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Item')); ?>:</b>
	<?php echo CHtml::encode($data->Item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodProducto')); ?>:</b>
	<?php echo CHtml::encode($data->CodProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->Cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode($data->Precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UniMedida')); ?>:</b>
	<?php echo CHtml::encode($data->UniMedida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descuento')); ?>:</b>
	<?php echo CHtml::encode($data->Descuento); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Exento')); ?>:</b>
	<?php echo CHtml::encode($data->Exento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubTotal')); ?>:</b>
	<?php echo CHtml::encode($data->SubTotal); ?>
	<br />

	*/ ?>

</div>