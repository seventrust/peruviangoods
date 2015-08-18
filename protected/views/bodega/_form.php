<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'productos-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldRow($model,'Id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'CodBodega',array('class'=>'span2','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'Descripcion',array('class'=>'span5','maxlength'=>200)); ?>

        <?php echo $form->textFieldRow($model,'Direccion',array('class'=>'span5','maxlength'=>200)); ?>

         <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

