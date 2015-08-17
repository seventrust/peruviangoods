<?php
/* @var $this AjusteinventarioController */
/* @var $data Ajusteinventario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CodBodega')); ?>:</b>
	<?php echo CHtml::encode($data->CodBodega); ?>
        <?php #echo CHtml::encode(Bodega::model()->findAll('CodBodega=?',array($data->CodBodega),'Descripcion')); ?>
        
        
	<br />

<!--	<b><?php #echo CHtml::encode($data->getAttributeLabel('campo2')); ?>:</b>
	<?php #echo CHtml::encode($data->campo2); ?>
	<br />

	<b><?php# echo CHtml::encode($data->getAttributeLabel('campo3')); ?>:</b>
	<?php# echo CHtml::encode($data->campo3); ?>
	<br />-->
        
        


</div>