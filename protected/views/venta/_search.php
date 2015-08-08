<?php
/** @var VentaController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'NumVenta', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'CodCliente', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'CodBodega', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'Fecha', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'Vencimiento', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'ForPago', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'TotExento', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'TotDescuento', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'TotNeto', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'TotIva', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'TotImpuesto', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'TotRetencion', array('class' => 'span5', 'maxlength' => 10)); ?>

<?php echo $form->textFieldRow($model, 'Total', array('class' => 'span5', 'maxlength' => 10)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
