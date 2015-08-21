<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'CodCliente'); ?>">
		<?php echo $form->labelEx($model,'CodCliente'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CodCliente',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'CodCliente'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'Descripcion'); ?>">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'Descripcion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'Direccion'); ?>">
		<?php echo $form->labelEx($model,'Direccion'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Direccion',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'Direccion'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'Telefono'); ?>">
		<?php echo $form->labelEx($model,'Telefono'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Telefono',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'Telefono'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'Estatus'); ?>">
		<?php echo $form->labelEx($model,'Estatus'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Estatus',array('size'=>1,'maxlength'=>1)); ?>
			<?php echo $form->error($model,'Estatus'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->