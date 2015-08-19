<?php
/* @var $this CompraController */
/* @var $data Compra */
?>

<div class="view">
    
        <b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

        <b><?php // echo CHtml::encode($data->getAttributeLabel('NumCompra')); ?>:</b>
	<?php // echo CHtml::link(CHtml::encode($data->NumCompra), array('view', 'Id'=>$data->NumCompra)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('NumCompra')); ?>:</b>
	<?php echo CHtml::encode($data->NumCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->CodProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodBodega')); ?>:</b>
	<?php echo CHtml::encode($data->CodBodega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Vencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->Vencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ForPago')); ?>:</b>
	<?php echo CHtml::encode($data->ForPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotExento')); ?>:</b>
	<?php echo CHtml::encode($data->TotExento); ?>
	<br /><?php 
        
        
        
        
        ?>

</div>