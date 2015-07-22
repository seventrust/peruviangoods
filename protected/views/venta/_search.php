<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NumVenta'); ?>
		<?php echo $form->textField($model,'NumVenta',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodCliente'); ?>
		<?php echo $form->textField($model,'CodCliente',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CodBodega'); ?>
		<?php echo $form->textField($model,'CodBodega',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Vencimiento'); ?>
		<?php echo $form->textField($model,'Vencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ForPago'); ?>
		<?php echo $form->textField($model,'ForPago',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotExento'); ?>
		<?php echo $form->textField($model,'TotExento',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotDescuento'); ?>
		<?php echo $form->textField($model,'TotDescuento',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotNeto'); ?>
		<?php echo $form->textField($model,'TotNeto',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotIva'); ?>
		<?php echo $form->textField($model,'TotIva',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotImpuesto'); ?>
		<?php echo $form->textField($model,'TotImpuesto',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotRetencion'); ?>
		<?php echo $form->textField($model,'TotRetencion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Total'); ?>
		<?php echo $form->textField($model,'Total',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->