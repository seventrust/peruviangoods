<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />

<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<div class="form wide">
 
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'group-form',
            'enableAjaxValidation'=>false,
    )); ?>
 
    <?php
        echo $form->errorSummary(array_merge(array($model),$validatedMembers));
    ?>
    
<script>
    function myFunction() {
    
        alert('si carga myFunction');
    }

//    function prueba(codigo) {
//        
//        var nomobj_texto = codigo.id;
//        indexid = nomobj_texto.substring(6,nomobj_texto.length);
//        jQuery.ajax({
//            url: "index.php?r=ventas/prueba",
//            type: 'post',
//            async: false,
//            contentType: "application/json",
//            data: "{codigo: " + codigo.value + "}",
//            success: function(data, textStatus, jqXHR){
//                    // llamado cuando el action responde con un echo
//                    // aqui "data" sera lo que tu hayas enviado desde el action
//                    // puede ser json o texto simple,
//                    // si es texto simple puedes hacer:
//                    // alert(data);
//                    // si es json puedes hacer:
//                    //
//                                        
//                    //$('#descripcion_articulo'+indexid).value = data.descripcion;
//                    //$('#precio_catalogo'+indexid).value = data.descripcion;
//                    
//                   document.getElementById('descripcion_articulo'+indexid).value =
//                        data.descripcion;
//                   document.getElementById('precio_catalogo'+indexid).value =
//                        data.precio_catalogo;
//                   document.getElementById('descuento'+indexid).value = '25.00';
//                   document.getElementById('articulos_id'+indexid).value =
//                        data.id;
//                },
//            error: function(jqXHR, textStatus, errorThrown){
//                   // llamado cuando el action emite una excepcion
//                   //
//                   alert(jqXHR.responseText);
//                }
//        });
//    }
    
    function totaliza_linea_venta() {
    
        var cantidad = 0;
        var precio   = 0;
        var dscto    = 0;
        var subtotal = 0;
//        var precio_empresaria = 0;
        
        cantidad = document.getElementById('cantidad'+indexid).value;
        precio   = document.getElementById('precio_catalogo'+indexid).value;
        dscto    = document.getElementById('descuento'+indexid).value ;
        precio_empresaria = precio * (1 - dscto/100) ;
        subtotal = cantidad * precio_empresaria ;
        document.getElementById('total'+indexid).value = subtotal.toFixed(2);
        document.getElementById('precio_empresaria'+indexid).value = precio_empresaria.toFixed(2);
        
        totaliza_venta();
    }
    
    function totaliza_venta() {
        var subtotal = 0;
        var total    = 0;
        var igv      = 0;
        var totBruto = 0;
        var total2   = 0;
        var cantidad = 0;
        var precio   = 0;
        var tasa     = 0;
        var totDscto = 0;
        var i        = 0;
        var totItems = 0;

        do {
            i++;
            if(i==1) {
               cantidad = document.getElementById('cantidad').value;
               precio   = document.getElementById('precio_catalogo').value;
               total2   = total2 + cantidad * precio;
               subtotal = document.getElementById('total').value;
               totItems = totItems + 1*cantidad
            }else{
               if(document.getElementById('total'+i)==null) {
                   break;
               }
               cantidad = document.getElementById('cantidad'+i).value;
               precio   = document.getElementById('precio_catalogo'+i).value;
               total2   = total2 + cantidad * precio;
               subtotal = document.getElementById('total'+i).value;
               totItems = totItems + 1*cantidad
            }
            if(!isNaN(parseFloat(subtotal))) {
                total = total + parseFloat(subtotal);
            }        
        } while(1==1);

        totDscto = total2 - total;
        totBruto = total / 1.18;
        igv      = total - totBruto;
        totBruto = totBruto + totDscto;
        document.getElementById('total_bruto').value = totBruto.toFixed(2);
        document.getElementById('total_dscto').value = totDscto.toFixed(2);

        document.getElementById('total_igv').value = igv.toFixed(2);
        document.getElementById('total_general').value = total.toFixed(2);
        document.getElementById('total_items').value = totItems;

        document.getElementById('pvp').value = total2.toFixed(2);
        document.getElementById('inafecto').value = 0;
        
    }
</script>

 
 <div class="table-responsive">
     <table class="table">
         <th>
            <?php echo $form->labelEx($model,'NumCompra'); ?>
            <?php echo $form->textField($model,'NumCompra'); ?>
            <?php echo $form->error($model,'NumCompra'); ?>
         </th>
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
//                        'yearRange'=>'-80:-10',
//                        'minDate'=>'-80Y',
//                        'maxDate'=>'-10Y',
                    )
                ))
             ?>
            <?php echo $form->error($model,'Fecha'); ?>
        </th>
        <th>
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
            <?php echo $form->error($model,'Vencimiento'); ?>
        </th>
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
        
    <div>
        
 <?php
 
//    echo CHtml::script('function alertIds(newElem,sourceElem) {alert(newElem.attr("id"));}');

    
    
    $memberFormConfig = array(
          'elements'=>array(
            'CodProducto'=>array(
                'type'=>'text',
                'maxlength'=>80,
            ),
             
             'Descripcion'=>array(
                'type'=>'zii.widgets.jui.CJuiAutoComplete',   
                'source'=>$this->createUrl('compra/autocomplete'),
                'options'=>array(
                    'showAnim'=>'fold',
                    'common_id_string'=>'Descripcion',
                         'size'=>'120',
                         'minLength'=>'2', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
                         'select'=>"js:function(event, ui) { 
                          $('#Detallecompra_CodProducto').val(ui.item.id); 
                          $('#Detallecompra_Precio').val(ui.item.PreVenta); // HTML-Id del campo
                          $('#Detallecompra_UniMedida').val(ui.item.UniMedida);
                                                    
                         }",   
                ),
                'htmlOptions'=> array(
                        'size'=>40,
                        'placeholder'=>'Buscar ...',
                        'title'=>'Indique el producto.'
                ),
            ),

            'Cantidad'=>array(
                'type'=>'text',
                //it is important to add an empty item because of new records
                'maxlength'=>20,
                'size'=>8,
                
            ),
            'Precio'=>array(
                'type'=>'text',
                'maxlength'=>20,
                'size'=>8,
            ),
            'UniMedida'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
            ),
            'Descuento'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
            ),
            'Exento'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
            ),
            'Subtotal'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
            ),
        ));
    
            $this->widget('ext.multimodelform.MultiModelForm',array(
            'id' => 'id_member', //the unique widget id
            'formConfig' => $memberFormConfig, //the form configuration array
            'model' => $member, //instance of the form model
            'tableView'=>true,
            //if submitted not empty from the controller,
            //the form will be rendered with validation errors
            'validatedItems' => $validatedMembers,
            
//            'clearInputs'=>true,
//             'jsBeforeNewId' => "alert(this.attr('id'));",   
            'jsAfterNewId' => MultiModelForm::afterNewIdAutoComplete($memberFormConfig['elements']['Descripcion']),
            //array of member instances loaded from db
//            'jsBeforeNewId' => "alert(this.attr('id'));",
//              'jsAfterNewId' =>  "alert(this.attr('id'));",

                
                
            'data' => $member->findAll('NumCompra=:groupId', array(':groupId'=>$model->NumCompra)),
            'showAddItemOnError' => false,
            'addItemText' => 'Agregar',
            'removeText' => 'Eliminar',
            'removeConfirm' => '¿ Eliminar el producto seleccionado ?', 
        ));
            
            
    ?>
        
                            <p align="right"><?php echo $form->labelEx($model,'TotExento'); ?></p>
                            <p align="right"><?php echo $form->textField($model,'TotExento',array('size'=>10,'maxlength'=>10)); ?></p>
                            <p align="right"><?php echo $form->error($model,'TotExento'); ?></p>    
                           
                    
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

                       
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
            <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
    </div>
    <?php $this->endWidget(); ?>
 
    </div><!-- form -->