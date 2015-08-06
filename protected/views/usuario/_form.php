<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CodUsuario',array('class'=>'span2','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Nombre',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->passwordFieldRow($model,'Contrasena',array('class'=>'span3','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'Correo',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'Tipo',array('class'=>'span3','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Departamento',array('class'=>'span3','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'Estatus',array('class'=>'span1','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
