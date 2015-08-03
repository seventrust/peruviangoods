<?php
/* @var $this AjusteinventarioController */
/* @var $model Ajusteinventario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tipo'); ?>
		<?php echo $form->textField($model,'Tipo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

<!--	<div class="row">
		<?php# echo $form->label($model,'campo1'); ?>
		<?php# echo $form->textField($model,'campo1'); ?>
	</div>

	<div class="row">
		<?php# echo $form->label($model,'campo2'); ?>
		<?php# echo $form->textField($model,'campo2'); ?>
	</div>

	<div class="row">
		<?php# echo $form->label($model,'campo3'); ?>
		<?php# echo $form->textField($model,'campo3'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->