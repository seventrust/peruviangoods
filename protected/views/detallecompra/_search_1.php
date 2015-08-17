<?php
/* @var $this DetallecompraController */
/* @var $model Detallecompra */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Item'); ?>
		<?php echo $form->textField($model,'Item'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumCompra'); ?>
		<?php echo $form->textField($model,'NumCompra',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodProducto'); ?>
		<?php echo $form->textField($model,'CodProducto',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Precio'); ?>
		<?php echo $form->textField($model,'Precio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UniMedida'); ?>
		<?php echo $form->textField($model,'UniMedida',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descuento'); ?>
		<?php echo $form->textField($model,'Descuento',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Exento'); ?>
		<?php echo $form->textField($model,'Exento',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubTotal'); ?>
		<?php echo $form->textField($model,'SubTotal',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->