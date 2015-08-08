<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'CodCliente'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CodCliente',array('size'=>10,'maxlength'=>10)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'Descripcion'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'Direccion'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Direccion',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'Telefono'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Telefono',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'Estatus'); ?>
		<div class="input">
			<?php echo $form->textField($model,'Estatus',array('size'=>1,'maxlength'=>1)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->