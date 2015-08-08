<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<style type="text/css" media="all">
    @import url("public/admin/css/style.css");
    @import url("public/admin/css/jquery.wysiwyg.css");
    @import url("public/admin/css/facebox.css");
    @import url("public/admin/css/visualize.css");
    @import url("public/admin/css/date_input.css");
</style>

<script type="text/javascript">
$(function(){
    $('.descripcion').autocomplete({
        source: function(solicitud, respuesta){
            $.ajax({
                url: <?php echo "'".Yii::app()->createUrl('venta/autocomplete')."'";?>,
                type: 'POST',
                data: {term: solicitud.term},
                dataType: 'json',
                success: function(data){
                    respuesta(data);
                }
            });
            
        },
        select: function(event, ui){

            $('#CodProducto').val(ui.item.CodProducto);
            $('#precioU').val(ui.item.PreCompra);
            
        }
        
    });
});
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compra-form',
	'enableAjaxValidation'=>false,
    ));

?>
    
    <div class="table-responsive">
       <table class="table">
                <th> 
                    <?php echo $form->labelEx($model,'Nro Compra'); ?>
                    <?php echo $form->textField($model,'NumCompra',array('size'=>10,'maxlength'=>10)); ?>
                    <?php echo $form->error($model,'NumCompra'); ?>
                </th>
         
               <th> <?php echo $form->labelEx($model,'Fecha'); ?>
                     <?php 
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                            'attribute'=>'Fecha',
                            'model'=>$model,
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
                         <?php echo $form->error($model,'Fecha'); ?>
                <th>
                    <th> <?php echo $form->labelEx($model,'Vencimiento'); ?>
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
                         <?php echo $form->error($model,'Vencimiento'); ?>
                <th>
                    
                </table>
        <table>
            <th>
                    <?php echo $form->labelEx($model,'Proveedor'); ?>
                    <?php echo $form->dropDownList($model,'CodProveedor',CHtml::listData(Proveedor::model()->findAll(),'CodProveedor','Descripcion'),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'CodProveedor'); ?>
                </th>

                <th>
                    <?php echo $form->labelEx($model,'Bodega'); ?>
                    <?php echo $form->dropDownList($model,'CodBodega',CHtml::listData(Bodega::model()->findAll(),'CodBodega','Descripcion'),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'CodBodega'); ?>
                </th>
            </tr>
        </table>

        <table>
                <th>
                    <?php echo $form->labelEx($model,'ForPago'); ?>
                    <?php echo $form->dropDownList($model,'ForPago',CHtml::listData(Formapago::model()->findAll(),'Id','Descripcion'),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'ForPago'); ?>
                </th>
        </table>
        

        
        
<!--<div class="table">
            <table>
                <tr>
                    <th>
                        <div class="row_buttons">
                            <tr>
                                <?php echo $form->labelEx($model_detalle,'CodProducto'); ?>
                                <?php echo $form->dropDownList($model_detalle,'CodProducto',CHtml::listData(Productos::model()->findAll(),'CodProducto','Descripcion'),array('empty'=>' ')); ?>
                                <?php echo $form->error($model_detalle,'CodProducto'); ?>
                            </tr>
                         <p align="left"><input type="button" class="submit extra_long" id="buscar_prod_serv" value="Añadir Producto" /></p>
                          <br clear="all" />
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%">
            
                    <thead>
                        <tr>
                            <th style="text-align:left" width="2%"> Item</th>
                            <th width="30%">Descripción</th>
                            <th style="text-align:right" width="10%">Cantidad</th>
                            <th style="text-align:right" width="10%">Precio</th>
                            <th style="text-align:right" width="10%">SubTotal</th>
                        </tr>
                        
                    </thead>
                    <tbody id="detalle">
                    	<tr class="nothing">
                        	<td style="text-align:center" colspan="6">Sin detalle</td>
                        </tr>
                    </tbody>
                        </table>
            </tr>
            </table>
    
    </div> form 
                    <footer>
                        
                        <tr>
                            <p align="right"><?php echo $form->labelEx($model,'TotExento'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotExento',array('size'=>10,'maxlength'=>10)); ?></p>
                            <p align="right"><?php echo $form->error($model,'TotExento'); ?></p>    
                        </tr>    
                    
                        <tr>
                            <p align="right"><?php echo $form->labelEx($model,'TotDescuento'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotDescuento',array('size'=>10,'maxlength'=>10)); ?></p>    
                            <p align="right"><?php echo $form->error($model,'TotDescuento'); ?></p>    
                        </tr>
		
                        <tr>
                            <p align="right"><?php echo $form->labelEx($model,'TotNeto'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotNeto',array('size'=>10,'maxlength'=>10)); ?></p>
                            <p align="right"><?php echo $form->error($model,'TotNeto'); ?></p> 
                        </tr>
		
                        <tr>
                            <p align="right"><?php echo $form->labelEx($model,'TotIva'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotIva',array('size'=>10,'maxlength'=>10)); ?></p> 
                            <p align="right"> <?php echo $form->error($model,'TotIva'); ?></p> 
                        </tr>
		
                        <tr>
                            <p align="right"><?php echo $form->labelEx($model,'TotImpuesto'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotImpuesto',array('size'=>10,'maxlength'=>10)); ?></p>    
                            <p align="right"><?php echo $form->error($model,'TotImpuesto'); ?></p> 
                        </tr>

                        <tr>
                            <p align="right"><?php echo $form->labelEx($model,'TotRetencion'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotRetencion',array('size'=>10,'maxlength'=>10)); ?></p>   
                            <p align="right"><?php echo $form->error($model,'TotRetencion'); ?></p>    
                        </tr>

                        <tr>
                        <p align="right"><?php echo $form->labelEx($model,'Total'); ?></p> 
                        <p align="right"><?php echo $form->textField($model,'Total',array('size'=>10,'maxlength'=>10)); ?></p> 
                        <p align="right"><?php echo $form->error($model,'Total'); ?></p>    
                        </tr>

                        
                    </footer>-->
                
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

