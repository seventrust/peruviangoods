<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<?php
/* @var $this TipoclienteController */
/* @var $model Tipocliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipocliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="table">
            <table>
                <td>
                    <?php echo $form->labelEx($model,'Descripcion'); ?>
                    <?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>20)); ?>
                    <?php echo $form->error($model,'Descripcion'); ?>
                </td>
            </table>
	</div>

<!--	<div class="row">
		<?php #echo $form->labelEx($model,'Estatus'); ?>
		<?php #echo $form->textField($model,'Estatus',array('size'=>1,'maxlength'=>1)); ?>
		<?php #echo $form->error($model,'Estatus'); ?>
	</div>-->
        
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save',array('class'=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->