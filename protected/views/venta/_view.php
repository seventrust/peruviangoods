<?php
/* @var $this VentaController */
/* @var $data Venta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Fecha), array('view', 'id'=>$data->Fecha)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumVenta')); ?>:</b>
	<?php echo CHtml::encode($data->NumVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodCliente')); ?>:</b>
	<?php echo CHtml::encode($data->CodCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodBodega')); ?>:</b>
	<?php echo CHtml::encode($data->CodBodega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Vencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->Vencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ForPago')); ?>:</b>
	<?php echo CHtml::encode($data->ForPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotExento')); ?>:</b>
	<?php echo CHtml::encode($data->TotExento); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TotDescuento')); ?>:</b>
	<?php echo CHtml::encode($data->TotDescuento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotNeto')); ?>:</b>
	<?php echo CHtml::encode($data->TotNeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotIva')); ?>:</b>
	<?php echo CHtml::encode($data->TotIva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotImpuesto')); ?>:</b>
	<?php echo CHtml::encode($data->TotImpuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotRetencion')); ?>:</b>
	<?php echo CHtml::encode($data->TotRetencion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Total')); ?>:</b>
	<?php echo CHtml::encode($data->Total); ?>
	<br />

	*/ ?>

</div>