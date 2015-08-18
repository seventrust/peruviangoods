<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'kardex-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Fecha',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'NumDocumento',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'CodProducto',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'TipoMovimiento',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Cantidad',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'SaldoAnterior',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'SaldoActual',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Precio',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Subtotal',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Usuario',array('class'=>'span3','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
