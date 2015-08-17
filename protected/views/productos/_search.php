<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'Id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'CodProducto',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'Descripcion',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'UniMedida',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'CanExistencia',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PreCompra',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'PreVenta',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'PreVenta1',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textAreaRow($model,'Foto',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'CodCategoria',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Estatus',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'CodProveedor',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
