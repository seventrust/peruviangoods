<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CodCliente',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Descripcion',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'Fantasia',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'Giro',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'Direccion',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'Telefono',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Fax',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'Correo',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'Contacto',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'Observaciones',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'IdTipo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Estatus',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
