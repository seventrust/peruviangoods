<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>
 <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="../../extensions/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 jQuery library 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 Latest compiled JavaScript 
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--<script src="../../extensions/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

       
    <div class="table">
        <table>
            <th>
                <?php echo $form->labelEx($model,'CodProducto'); ?>
		<?php echo $form->textField($model,'CodProducto',array('size'=>10,'maxlength'=>10)); ?>
                <?php #echo TbHtml::textField($model,'CodProducto',array('size'=>10,'maxlength'=>10), array('placeholder' => 'Text input')); ?>
		<?php echo $form->error($model,'CodProducto'); ?>
            </th>
            <th>
                <?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
            </th>
            <th>
                <?php echo $form->labelEx($model,'UniMedida'); ?>
		<?php echo $form->textField($model,'UniMedida',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'UniMedida'); ?>
            </th>
            <th>
                <?php echo $form->labelEx($model,'CanExistencia'); ?>
		<?php echo $form->textField($model,'CanExistencia',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'CanExistencia'); ?>
            </th>
        </table>
        <table>
            <th>
                <?php echo $form->labelEx($model,'PreCompra'); ?>
		<?php echo $form->textField($model,'PreCompra',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PreCompra'); ?>
            </th>
            <th>
                <?php echo $form->labelEx($model,'PreVenta'); ?>
		<?php echo $form->textField($model,'PreVenta',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PreVenta'); ?>
            </th>
            <th>
                <?php echo $form->labelEx($model,'Categoria'); ?>
                <?php echo $form->dropDownList($model,'CodCategoria',CHtml::listData(Categoria::model()->findAll(),'CodCategoria','Descripcion'),array('empty'=>' ')); ?>
                <?php echo $form->error($model,'CodCategoria'); ?>
                
            </th>
            <th>
                <?php echo $form->labelEx($model,'Activo'); ?>
           	<?php echo $form->checkBox($model,'Estatus',array()); ?>
		<?php echo $form->error($model,'Estatus'); ?>
            </th>
        </table>
    </div>
    
   
    
<!--	<div class="row">
		<?php #echo $form->labelEx($model,'Foto'); ?>
		<?php #echo $form->textArea($model,'Foto',array('rows'=>6, 'cols'=>50)); ?>
		<?php #echo $form->error($model,'Foto'); ?>
	</div>-->

        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->