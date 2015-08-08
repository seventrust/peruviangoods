<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />

<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<div class="form">
    <?php
    /** @var VentaController $this */
    /** @var Venta $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'venta-form',
    'enableAjaxValidation' => false,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                        <?php echo $form->textFieldRow($model, 'CodCliente', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'CodBodega', array('class' => 'span5', 'maxlength' => 10)) ?>
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
                        <?php echo $form->labelEx($model, 'Vencimiento');?>
                        <?php 
                           $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                               'attribute'=>'Vencimiento',
                               'model'=>$model,
                               'language'=>'es',
                               'options'=>array(
                                   'dateFormat'=>'yy-mm-dd',
                                   'showButtonPanel'=>TRUE,
                                   'changeYear'=>TRUE,
                               )
                           ))
                        ?>
                        <?php echo $form->textFieldRow($model, 'ForPago', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'TotExento', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'TotDescuento', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'TotNeto', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'TotIva', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'TotImpuesto', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'TotRetencion', array('class' => 'span5', 'maxlength' => 10)) ?>
                        <?php echo $form->textFieldRow($model, 'Total', array('class' => 'span5', 'maxlength' => 10)) ?>
                <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Crear') : Yii::t('AweCrud.app', 'Guardar'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>