<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php // echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CodUsuario',array('class'=>'span2','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Nombre',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'Contrasena',array('class'=>'span2','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'Correo',array('class'=>'span4','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'Tipo',array('class'=>'span2','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Departamento',array('class'=>'span2','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'Estatus',array('class'=>'span2','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
