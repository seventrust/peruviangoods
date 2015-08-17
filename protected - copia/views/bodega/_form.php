<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php
/* @var $this BodegaController */
/* @var $model Bodega */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bodega-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="table">
            <table>
                <td>
                    <?php echo $form->labelEx($model,'CodBodega'); ?>
                    <?php echo $form->textField($model,'CodBodega',array('size'=>10,'maxlength'=>10)); ?>
                    <?php echo $form->error($model,'CodBodega'); ?>
                </td>
                
                <td>
                    <?php echo $form->labelEx($model,'Descripcion'); ?>
                    <?php echo $form->textField($model,'Descripcion',array('size'=>60,'maxlength'=>100)); ?>
                    <?php echo $form->error($model,'Descripcion'); ?>
                </td>
            </table>  
            
            <table>
                <td>
                    <?php echo $form->labelEx($model,'Direccion'); ?>
                    <?php echo $form->textField($model,'Direccion',array('size'=>60,'maxlength'=>200)); ?>
                    <?php echo $form->error($model,'Direccion'); ?>
                </td>
            </table>
	</div>

        
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Create',array('class'=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->