<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array( 'id'=>'user-form',
        'enableAjaxValidation'=>true, ));
//    if ($a->isNewRecord==false) { 
//        $b=  Detalleventa::model()->findByPk($a->NumVenta); 
//        
//    }
        echo $form->errorSummary(array($a,$b)); ?>
    
    <div class="required">
        <?php echo $form->labelEx($a,'NumVenta'); ?>
        <?php echo $form->textField($a,'NumVenta'); ?>
        <?php echo $form->error($a,'NunVenta'); ?>
    </div>
    
     <div class="required">
        <?php echo $form->labelEx($a, 'Fecha');?>
        <?php 
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'attribute'=>'Fecha',
                'model'=>$a,
                'language'=>'es',
                'options'=>array(
                    'dateFormat'=>'yy-mm-dd',
                    'showButtonPanel'=>TRUE,
                    'changeYear'=>TRUE,
                    'yearRange'=>'-80:-10',
                    'minDate'=>'-80Y',
                    'maxDate'=>'-10Y',
                )
            ))
         ?>
        <?php echo $form->error($a,'Fecha'); ?>
    </div>
    
     <div class="required">
        <?php echo $form->labelEx($a, 'Vencimiento');?>
         <?php 
            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'attribute'=>'Vencimiento',
                'model'=>$a,
                'language'=>'es',
                'options'=>array(
                    'dateFormat'=>'yy-mm-dd',
                    'showButtonPanel'=>TRUE,
                    'changeYear'=>TRUE,
                )
            ))
         ?>
        <?php echo $form->error($a,'Vencimiento'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'CodBodega');?>
        <?php echo $form->textField($a, 'CodBodega');?>
        <?php echo $form->error($a,'CodBodega'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'ForPago');?>
        <?php echo $form->dropDownList($a, 'ForPago', array('Debito', 'Credito', 'Efectivo', 'Cheque', 'Vale'));?>
        <?php echo $form->error($a,'ForPago'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'TotExento');?>
        <?php echo $form->textField($a, 'TotExento');?>
        <?php echo $form->error($a,'TotExento'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'TotDescuento');?>
        <?php echo $form->textField($a, 'TotDescuento');?>
        <?php echo $form->error($a,'TotDescuento'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'TotNeto');?>
        <?php echo $form->textField($a, 'TotNeto');?>
        <?php echo $form->error($a,'TotNeto'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'TotIva');?>
        <?php echo $form->textField($a, 'TotIva');?>
        <?php echo $form->error($a,'TotIva'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'TotImpuesto');?>
        <?php echo $form->textField($a, 'TotImpuesto');?>
        <?php echo $form->error($a,'TotImpuesto'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'TotRetencion');?>
        <?php echo $form->textField($a, 'TotRetencion');?>
        <?php echo $form->error($a,'TotRetencion'); ?>
    </div>
    
    <div class="required">
        <?php echo $form->labelEx($a, 'Total');?>
        <?php echo $form->textField($a, 'Total');?>
        <?php echo $form->error($a,'Total'); ?>
    </div>
    
    <div class="requiered">
        <?php echo $form->labelEx($b,'CodProducto'); ?>
        <?php echo $form->textField($b,'CodProducto'); ?>
        <?php echo $form->error($b,'CodProducto'); ?>
    </div>
    
    <div class="requiered">
        <?php echo $form->labelEx($b,'Descripcion'); ?>
        <?php echo $form->textField($b,'Descripcion'); ?>
        <?php echo $form->error($b,'Descripcion'); ?>
    </div>
    
    <div class="requiered">
        <?php echo $form->labelEx($b,'Precio'); ?>
        <?php echo $form->textField($b,'Precio'); ?>
        <?php echo $form->error($b,'Precio'); ?>
    </div>
    
    <div class="requiered">
        <?php echo $form->labelEx($b,'Cantidad'); ?>
        <?php echo $form->textField($b,'Cantidad'); ?>
        <?php echo $form->error($b,'Cantidad'); ?>
    </div>
    
    </div>
        <div class="buttons">
            <?php echo CHtml::submitButton($a->isNewRecord ? 'Crear' : 'Actualizar'); ?>
</div> 
<?php $this->endWidget(); ?> 