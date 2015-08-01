<?php
/* @var $this DetallecompraController */
/* @var $model Detallecompra */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detallecompra-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Item'); ?>
		<?php echo $form->textField($model,'Item'); ?>
		<?php echo $form->error($model,'Item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumCompra'); ?>
		<?php echo $form->textField($model,'NumCompra',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'NumCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CodProducto'); ?>
		<?php echo $form->textField($model,'CodProducto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'CodProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cantidad'); ?>
		<?php echo $form->textField($model,'Cantidad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Precio'); ?>
		<?php echo $form->textField($model,'Precio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UniMedida'); ?>
		<?php echo $form->textField($model,'UniMedida',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'UniMedida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descuento'); ?>
		<?php echo $form->textField($model,'Descuento',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Descuento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Exento'); ?>
		<?php echo $form->textField($model,'Exento',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Exento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubTotal'); ?>
		<?php echo $form->textField($model,'SubTotal',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'SubTotal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->