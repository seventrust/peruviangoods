<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css"/>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php // echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>
<div class="table-responsive">
    <table class="table">
        <th>
            <?php echo $form->labelEx($model, 'Fecha');?>
            <?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'attribute'=>'Fecha',
                    'model'=>$model,
                    'language'=>'es',
                    'options'=>array(
                        'dateFormat'=>'yy-mm-dd',
                        'showButtonPanel'=>TRUE,
                        'changeYear'=>TRUE,
                        
                    )
                ))
             ?>
            <?php echo $form->error($model,'Fecha'); ?>
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
