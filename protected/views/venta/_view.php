<?php
/** @var VentaController $this */
/** @var Venta $data */
?>
<div class="view">
                    
        <?php if (!empty($data->CodCliente)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CodCliente')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->CodCliente); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->CodBodega)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('CodBodega')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->CodBodega); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->Fecha)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->Fecha, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->Fecha)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->Vencimiento)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Vencimiento')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->Vencimiento, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->Vencimiento)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->ForPago)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ForPago')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->ForPago); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TotExento)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TotExento')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TotExento); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TotDescuento)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TotDescuento')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TotDescuento); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TotNeto)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TotNeto')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TotNeto); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TotIva)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TotIva')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TotIva); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TotImpuesto)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TotImpuesto')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TotImpuesto); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->TotRetencion)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('TotRetencion')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->TotRetencion); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->Total)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Total')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->Total); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>