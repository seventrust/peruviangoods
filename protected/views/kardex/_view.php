<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumDocumento')); ?>:</b>
	<?php echo CHtml::encode($data->NumDocumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodProducto')); ?>:</b>
	<?php echo CHtml::encode($data->CodProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TipoMovimiento')); ?>:</b>
	<?php echo CHtml::encode($data->TipoMovimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->Cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SaldoAnterior')); ?>:</b>
	<?php echo CHtml::encode($data->SaldoAnterior); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SaldoActual')); ?>:</b>
	<?php echo CHtml::encode($data->SaldoActual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Precio')); ?>:</b>
	<?php echo CHtml::encode($data->Precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->Subtotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->Usuario); ?>
	<br />

	*/ ?>

</div>