<?php
/* @var $this PermisoController */
/* @var $model Permiso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permiso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CodPermiso'); ?>
		<?php echo $form->textField($model,'CodPermiso',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'CodPermiso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UrlInicio'); ?>
		<?php echo $form->textField($model,'UrlInicio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'UrlInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UrlImagen'); ?>
		<?php echo $form->textField($model,'UrlImagen',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'UrlImagen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categoria'); ?>
		<?php echo $form->textField($model,'Categoria',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Categoria'); ?>
	</div>
    
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->