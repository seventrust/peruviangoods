<?php
/* @var $this PermisoController */
/* @var $data Permiso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodPermiso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CodPermiso), array('view', 'id'=>$data->CodPermiso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UrlInicio')); ?>:</b>
	<?php echo CHtml::encode($data->UrlInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UrlImagen')); ?>:</b>
	<?php echo CHtml::encode($data->UrlImagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categoria')); ?>:</b>
	<?php echo CHtml::encode($data->Categoria); ?>
	<br />


</div>