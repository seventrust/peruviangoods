<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'productos-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php echo $form->errorSummary($model); ?>

	<?php // echo $form->textFieldRow($model,'Id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'CodProducto',array('class'=>'span2','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'Descripcion',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->dropDownListRow($model,'UniMedida',CHtml::listData(Medida::model()->findAll(),'Id','Descripcion'),array('empty'=>' ')); ?>
        <?php //  echo $form->dropDownList($model,'UniMedida',CHtml::listData(Medida::model()->findAll(),'Id','Descripcion'),array('empty'=>' ')); ?>

        <?php echo $form->dropDownListRow($model,'CodCategoria',CHtml::listData(Categoria::model()->findAll(),'CodCategoria','Descripcion'),array('empty'=>' ')); ?>
        
	<?php // echo $form->textFieldRow($model,'CanExistencia',array('class'=>'span2')); ?>

	<?php // echo $form->textFieldRow($model,'PreCompra',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'PreVenta',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'PreVenta1',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textAreaRow($model,'Foto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	

	<?php // echo $form->textFieldRow($model,'Estatus',array('class'=>'span5','maxlength'=>1)); ?>

	<?php // echo $form->textFieldRow($model,'CodProveedor',array('class'=>'span5','maxlength'=>20)); ?>

         <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
