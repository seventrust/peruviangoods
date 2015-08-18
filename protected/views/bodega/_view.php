<?php
/* @var $this BodegaController */
/* @var $data Bodega */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('CodBodega')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CodBodega), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direccion')); ?>:</b>
	<?php echo CHtml::encode($data->Direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Estatus')); ?>:</b>
	<?php echo CHtml::encode($data->Estatus); ?>
	<br />


</div>