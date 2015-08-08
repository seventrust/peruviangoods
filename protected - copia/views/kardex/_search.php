<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="table-responsive">
    <table class="table">
        <th>
            <?php echo $form->textFieldRow($model,'Fecha',array('class'=>'span2')); 
//             $this->widget('bootstrap.widgets.TbDatePicker', array(
//            'model' => $model,
//            'attribute' => 'Fecha',
//            'options' => array(
//                'size' => '10',         // textField size
//                'maxlength' => '10',    // textField maxlength
//                'autoclose' => true,
//    ),
//  ));
            ?>
        </th>
        <th>
            <?php echo $form->textFieldRow($model,'NumDocumento',array('class'=>'span2','maxlength'=>20)); ?>
        </th>
        <th>
            <?php echo $form->textFieldRow($model,'CodProducto',array('class'=>'span2','maxlength'=>20)); ?>
        </th>
    </table>
    <table class="table">
        <th>
            <?php echo $form->textFieldRow($model,'TipoMovimiento',array('class'=>'span4','maxlength'=>10)); ?>
        </th>
        <th>
            <?php echo $form->textFieldRow($model,'Usuario',array('class'=>'span2','maxlength'=>20)); ?>
        </th>
    </table>
    
</div>    
	<?php // echo $form->textFieldRow($model,'Cantidad',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'SaldoAnterior',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'SaldoActual',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'Precio',array('class'=>'span5','maxlength'=>10)); ?>

	<?php // echo $form->textFieldRow($model,'Subtotal',array('class'=>'span5','maxlength'=>10)); ?>

	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
