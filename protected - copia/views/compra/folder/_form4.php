<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl?>/js/compra.js'></script>

<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>-->
<!--<link rel="stylesheet" href="<?php #echo Yii::app()->request->baseUrl?>/css/jquery.css" />-->


<script type="text/javascript">
    
    function agregar()
    {
        $('#cuenta').show(500);
        $('#contador').val(parseInt($('#contador').val())+1);
        var contador = $('#contador').val();
        $('#tabla').find('tbody').append($('<tr>').attr('id', 'fila'+contador));
        //Primera Fila
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'CodProducto'+contador).attr('style', 'border-width: 0; resize: none; width: 40px')
        ));
        //Segunda
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'Descripcion'+contador).attr('style', 'border-width: 0; resize: none; width: 400px')
        ));
        //Tercera
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'Precio'+contador).attr('style', 'border-width: 0; resize: none; width: 60px')
        ));
        //Cuarta
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'cantidad'+contador).attr('style', 'border-width: 0; resize: none; width: 60px')
        ));
        //Quinta 
//        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'precio'+contador).attr('style', 'border-width: 0; resize: none; width: 60px')
//        .attr('readonly', 'readonly')
//        ));
        //Boton quitar
        $('#fila'+contador).append($('<td>').append($('<a>').attr('href', '#').text('x').attr('style', 'color:blue; font-size:1.3em; text-decoration:none;')
                        .click(function(){ 
                                quitar(this.parentNode.parentNode.id);
                                if($('#contador').val() == 0){
                                        ('#subtotal').val(0);
                                        ('#total').val(0);
                                }
                                })));

    $('#Detallecompra_precio'+contador).click(function(){
        var precio = $('#Detallecompra_precio'+contador).val();	
        var cantidad = $('#Detallecompra_cantidad'+contador).val();

        var totalP =  parseFloat(precio) * parseFloat(cantidad) ;

        totalP = roundNumber(totalP, 2);	
        $('#Detallecompra_precio'+contador).val(totalP);


        var subtotal=0;
        for(var i = 1; i<=contador; i++){
                subtotal += parseFloat($('#Detallecompra_precio'+i).val());
                alert(subtotal);
        }
        subtotal= roundNumber(subtotal, 2);
        $('Detallecompra_subtotal').attr('readonly', 'readonly').val(parseFloat(subtotal));

        var totalCuenta = parseFloat($('#Detallecompra_subtotal').val());// * parseFloat($('#iva').val());
        totalCuenta += parseFloat($('#Detallecompra_subtotal').val());

        totalCuenta = roundNumber(totalCuenta, 2);
        $('#Detallecompra_total').attr('readonly', 'readonly').val(totalCuenta);
    });


    }

    function quitar(fila)
    {

        var numero = parseInt(String(fila).substring(4));
        $('#'+String(fila)).remove();
        for (var i = numero; i < $('#contador').val(); i++)
        {
                $('#fila'+(i+1)).attr('id', 'fila'+i);
                $('#texto'+(i+1)).attr('id', 'texto'+i);
                $('#numero'+(i+1)).attr('id', 'numero'+i);
        }
        $('#contador').val(parseInt($('#contador').val())-1);
    }
    //Creo unos arreglos para poder manipularlos durante la ejecucion de la funcion
    //Adicional unas variables para como cadena de caracteres
    var CodCliente = Array();
    var CodBodega = Array();
    var Fecha = Array();
    var Vencimiento = Array();
    var ForPago = Array();
    var TotExcento = Array();
    var TotDescuento = Array();
    var TotNeto = Array();
    var TotIva = Array();
    var TotImpuesto = Array();
    var Total = Array();
    
    
    var cadena="";

    //Una funcion para recoger los datos agregados

    function recogerDatos(){
//            var orden = "&orden="+$('#numeroOrden').val();
            for(var i = 1; i <= $('#contador').val(); i++){
                    CodCliente[i] = $('#identidad').val();
                    CodBodega[i] = $('#bodega').val();
                    Fecha[i] = $('#fecha').val();
                    Vencimiento[i] = $('#vencimiento').val();
                    ForPago[i] = $('#for_pago').val();
                    TotExcento[i] = $('#subtotal').val();
                    TotDescuento[i] = $('#descuento').val();
                    TotNeto[i] = $('#total').val();
                    TotIva[i] = $('#iva').val();
                    TotImpuesto[i] = $('#ila').val();
                    Total[i] = $('#total').val();
                    
                    cadena +="&cadena[]="+"'"+CodCliente[i]+"','"+CodBodega[i]+"','"+Fecha[i]+"','"+Vencimiento[i]+"',"+ForPago[i]+","+TotExcento[i]+","+TotDescuento[i]+","+TotNeto[i]+","+TotIva[i]+","+TotImpuesto[i]+","+Total[i];
            }
            $.ajax({
                url: "http://localhost/libs_php/formulario.php",
                type: "POST",
                data: cadena+orden,
                success: function(data)
                        {
                                $('#reporte').val(data);
                                alert("Esta orden es la No. :"+$('#reporte').val());
                                $('#reiniciar').show(500);
                        }

            });
    }
    function Consultar(){
            var numerOrden = $('#reporte').val();
            $.ajax({
                    url: "convertir.php",
                    type: "POST",
                    data: numeroOrden,
                    sucess: function(data){

                    }

            });
    }
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
            
        
                <th>
                    <?php echo $form->labelEx($model,'ForPago'); ?>
                    <?php echo $form->dropDownList($model,'ForPago',CHtml::listData(Formapago::model()->findAll(),'Id','Descripcion'),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'ForPago'); ?>
                </th>
        </table>
        
        <h1>Detalle</h1>
        <div class="table">
        
        <table>
<!--            <th>
                <div class="row">
                    <?php #echo $form->labelEx($model_detalle,'Item'); ?>
                    <?php #echo $form->textField($model_detalle,'Item'); ?>
                    <?php #echo $form->error($model_detalle,'Item'); ?>
                   </div>
            </th>-->
            <th>
                <div class="row">
                    <?php echo $form->labelEx($model_detalle,'Codigo'); ?>
                    <?php echo $form->textField($model_detalle,'CodProducto'); ?>
                    <?php echo $form->error($model_detalle,'CodProducto'); ?>
                   </div>
            </th>
            
            <th>
                <div class="row">
                    <?php echo $form->labelEx($model_detalle,'Descripcion'); ?>
                    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete',
                      array(
                       'id'=>'CodProducto',
                       'name'=>'Descripcion', // Nombre para el campo de autocompletar
                       'model'=>$model_detalle,
                       'value'=>$model_detalle->isNewRecord ? '' : $model_detalle->Detallecompra->CodProducto.' ',
                       'source'=>$this->createUrl('compra/autocomplete'), // URL que genera el conjunto de datos
                       'options'=> array(
                         'showAnim'=>'fold',
                         'size'=>'30',
                         'minLength'=>'1', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
                         'select'=>"js:function(event, ui) { 
                          $('#Detallecompra_Precio').val(ui.item.label[1]); // HTML-Id del campo
                          $('#Detallecompra_CodProducto').val(ui.item.id);  
                           }"
                         ),
                       'htmlOptions'=> array(
                        'size'=>40,
                        'placeholder'=>'Producto',
                        'title'=>'Indique el producto.'
                        ),
                      ));  
                    ?>
                    <?php echo $form->error($model_detalle,'CodProducto'); ?>
                   </div>
            </th>
            
            <th>
                 <?php echo $form->labelEx($model_detalle,'UniMedida'); ?>
                <?php echo $form->textField($model_detalle,'UniMedida'); ?>
                <?php echo $form->error($model_detalle,'UniMedida'); ?>
            </th>
               
            <th>
                 <?php echo $form->labelEx($model_detalle,'Cantidad'); ?>
                <?php echo $form->textField($model_detalle,'Cantidad'); ?>
                <?php echo $form->error($model_detalle,'Cantidad'); ?>
            </th>
            
            <th>
                 <?php echo $form->labelEx($model_detalle,'Precio'); ?>
                <?php echo $form->textField($model_detalle,'Precio'); ?>
                <?php echo $form->error($model_detalle,'Precio'); ?>
            </th>
            <th>
                 <?php echo $form->labelEx($model_detalle,'SubTotal'); ?>
                <?php echo $form->textField($model_detalle,'SubTotal'); ?>
                <?php echo $form->error($model_detalle,'SubTotal'); ?>
            </th>
        </table>
        </div>

        
<div class="table">
            <table>
                <tr>
                    <th>
                        <div class="row_buttons">
                            
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
<!--                    <tbody id="detalle">
                    	<tr class="nothing">
                        	<td style="text-align:center" colspan="6">Sin detalle</td>
                        </tr>
                    </tbody>-->
                        </table>
            </tr>
            </table>
    
    </div><!-- form -->
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

                        
                    </footer>
                
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

