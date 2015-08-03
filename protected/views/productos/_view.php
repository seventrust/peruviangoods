<?php
/* @var $this ProductosController */
/* @var $data Productos */
?>

<div class="view">

<!--	<b><?php #echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php #echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodProducto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CodProducto),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UniMedida')); ?>:</b>
	<?php echo CHtml::encode($data->UniMedida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CanExistencia')); ?>:</b>
	<?php echo CHtml::encode($data->CanExistencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PreCompra')); ?>:</b>
	<?php echo CHtml::encode($data->PreCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PreVenta')); ?>:</b>
	<?php echo CHtml::encode($data->PreVenta); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Estatus')); ?>:</b>
	<?php echo CHtml::encode($data->Estatus==1?"Activo":"Desactivo"); ?>
	<br />
        
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Foto')); ?>:</b>
	<?php echo CHtml::encode($data->Foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->CodCategoria); ?>
	<br />
*/
	

	 ?>

</div>