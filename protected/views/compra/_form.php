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

<script TYPE="text/javascript" LANGUAGE="JavaScript"> 
function init(x) {
                var descrip = x.replace("Detallecompra_CodProducto","Detallecompra_Descripcion");
                var unitprice = x.replace("Detallecompra_CodProducto","Detallecompra_Precio");       
                var obj =$member; 
                $("#"+x).autocomplete("Detallecompra_Descripcion").autocomplete({source:obj,minLength:3,
                select: function( event, ui ) {$("#"+descrip).val(ui.item.label);
                $("#"+unitprice).val(ui.item.PreVenta);}});
                this.autocomplete();
                alert(obj);
                }
 </script> 
    
<script>

    function calcularPrecioIVA(){
     var subtotal=parseInt(document.getElementById("Detallecompra_Precio").valueOf());
    
//       alert(subtotal);
    }
    
    $('#precio'+contador).on('click', '',function(){
        var precioU = $('#precioU'+contador).val();	
        var cantidad = $('#cantidad'+contador).val();

        var totalP =  parseFloat(precioU) * parseFloat(cantidad) ;

        totalP = roundNumber(totalP, 2);	
        $('#precio'+contador).val(totalP);


        var subtotal=0;
        for(var i = 1; i<=contador; i++){
                subtotal += parseFloat($('#precio'+i).val());
        }
        subtotal= roundNumber(subtotal, 2);
        $('#subtotal').attr('readonly', 'readonly').val(parseFloat(subtotal));

        var totalCuenta = parseFloat($('#subtotal').val()) * parseFloat($('#iva').val());
        totalCuenta += parseFloat($('#subtotal').val());

        totalCuenta = roundNumber(totalCuenta, 2);
        $('#total').attr('readonly', 'readonly').val(totalCuenta);
    });
    
    
</script>

   
    
    
<!--<script>
    
    
    function myFunction() {
    
        alert('si carga myFunction');
    }

    function prueba(codigo) {
        
        var nomobj_texto = codigo.id;
        indexid = nomobj_texto.substring(6,nomobj_texto.length);
        jQuery.ajax({
            url: "_form.php?r=compra/prueba",
            type: 'post',
            async: false,
            contentType: "application/json",
            data: "{Detallecompra_CodProducto: " + codigo.value + "}",
            success: function(data, textStatus, jqXHR){
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
                    
                   document.getElementById('descripcion_articulo'+indexid).value =
                        data.descripcion_articulo;
                   document.getElementById('Detallecompra_Precio'+indexid).value =
                        data.Detallecompra_Precio;
                   document.getElementById('Detallecompra_Descuento'+indexid).value = '25.00';
                   document.getElementById('Detallecompra_CodProducto'+indexid).value =
                        data.Detallecompra_CodProducto;
                },
            error: function(jqXHR, textStatus, errorThrown){
                   // llamado cuando el action emite una excepcion
                   //
                   alert(jqXHR.responseText);
                }
        });
    }
    
    function totaliza_linea_venta() {
    
        var cantidad = 0;
        var precio   = 0;
        var dscto    = 0;
        var subtotal = 0;
//        var precio_empresaria = 0;
        
        cantidad = document.getElementById('Detallecompra_Cantidad'+indexid).value;
        precio   = document.getElementById('Detallecompra_Precio'+indexid).value;
        dscto    = document.getElementById('Detallecompra_Descuento'+indexid).value ;
        precio_empresaria = precio * (1 - dscto/100) ;
        subtotal = cantidad * precio_empresaria ;
        document.getElementById('Detallecompra_Subtotal'+indexid).value = subtotal.toFixed(2);
        document.getElementById('Detallecompra_Precio'+indexid).value = Detallecompra_Precio.toFixed(2);
        
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
               cantidad = document.getElementById('Detallecompra_Cantidad').value;
               precio   = document.getElementById('Detallecompra_Precio').value;
               total2   = total2 + cantidad * precio;
               subtotal = document.getElementById('Detallecompra_Subtotal').value;
               totItems = totItems + 1*cantidad
            }else{
               if(document.getElementById('Detallecompra_Subtotal'+i)==null) {
                   break;
               }
               cantidad = document.getElementById('Detallecompra_Cantidad'+i).value;
               precio   = document.getElementById('Detallecompra_Precio'+i).value;
               total2   = total2 + cantidad * precio;
               subtotal = document.getElementById('Detallecompra_Subtotal'+i).value;
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
</script>-->

<div>
    
    
</div>
 <div id='miId'>...</div>
 <div >
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
    
     <table class="table">
         
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
        
    <div class="table-responsive">
        <table class="table">
         
             
             <?php
 
//    echo CHtml::script('function alertIds(newElem,sourceElem) {alert(newElem.attr("id"));}');

    
    
    $memberFormConfig = array(
          'elements'=>array(
            'CodProducto'=>array(
                'type'=>'text',
                 'size'=>'10',
                'maxlength'=>10,
                'style'=>'WIDTH:100px',
               
//				'type'=>'dropdownlist',
//				//it is important to add an empty item because of new records
//				'items'=>array(''=>'-',2008=>2008,2009=>2009,2010=>2010,2011=>2011,),
//                 
            ),
             
//             'item_id'=>array(              
//               'type'=>'zii.widgets.jui.CJuiAutoComplete',
//               'source'=>$auto,
//                                        'options'=>array(
//                                                'minLength'=>3,
//                                                'showAnim'=>'fold',
//                                        ),
//                                        'htmlOptions'=>array(
//
//                                       'size'=>4,
//                                       'onFocus'=>"init(this.id)",
//                                   ),),

              
             'Descripcion'=>array(
                'type'=>'zii.widgets.jui.CJuiAutoComplete',   
                'source'=>$this->createUrl('compra/autocomplete'),
                'options'=>array(
                    'showAnim'=>'fold',
                    'common_id_string'=>'Descripcion',
                         'size'=>'120',
                         'minLength'=>'2', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
//                         'select'=>"js:function(event, ui) { 
//                          $('#Detallecompra_CodProducto').val(ui.item.id); 
//                          $('#Detallecompra_Precio').val(ui.item.PreVenta); // HTML-Id del campo
//                          $('#Detallecompra_UniMedida').val(ui.item.UniMedida);
//                          $('#Detallecompra_Descuento').val(0);
//                          $('#Detallecompra_Exento').val(0);
//                                                    
//                         }",
//                    'change'=>"js:function(){calcularPrecioIVA()}"
                    
                ),
                'htmlOptions'=> array(
                        'size'=>30,
                   'onFocus'=>"init(this.id)",
                        'placeholder'=>'Buscar ...',
                        'title'=>'Indique el producto.'
                    
                    
                ),
                 
                    
                 
//                    'onchange'=>'
//                        var nomobj_texto = this.id;
//                        //28->Tamaño del nombre del campo sin numeración -> #Revisionsignosvitales_svi_id Enumera los campos desde el 2do.
//                        var indexid = nomobj_texto.substring(25,nomobj_texto.length); 
//                        var nombre1 = "#Detallecompra_Precio1"+indexid; 
////                        var nombre2 = "#Revisionsignosvitales_rsv_comentario2"+indexid; 
//                        // Ejecutar función para obtener los datos via GET
//                        var targetUrl ="'.$this->createUrl("compra/autocomplete").'";    
//                        $.getJSON(targetUrl, { id: $(this).val() }, function(data) {
//                        // Ubicamos los valor que estaban en el JSON en los campos 
//                            $(nombre1).val(ui.item.PreVenta);
////                            $(nombre2).val(data.B);
//                        });'
//                        ),
                 
            ),
                    
            'Cantidad'=>array(
                'type'=>'text',
                //it is important to add an empty item because of new records
                'maxlength'=>8,
                'size'=>8,
               'style'=>'WIDTH:80px',
               'onchage'=>'calcularPrecioIVA()',
                
            ),
            'Precio'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:80px',
            ),
            'UniMedida'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:80px',
            ),
            'Descuento'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:80px',
            ),
            'Exento'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:80px',
            ),
            'SubTotal'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:80px',
                'onchage'=>'calcularPrecioIVA()',
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
             
         </table>
     </div>
    
        
    <div class="table-responsive">
        <table class="table">
            <tr>
                <?php echo $form->labelEx($model,'TotExento'); ?>
                <?php echo $form->textField($model,'TotExento',array('size'=>10,'maxlength'=>10)); ?>
                <?php echo $form->error($model,'TotExento'); ?>
            </tr>
            
            <tr>
                <?php echo $form->labelEx($model,'TotDescuento'); ?>
                <?php echo $form->textField($model,'TotDescuento',array('size'=>10,'maxlength'=>10)); ?>   
                <?php echo $form->error($model,'TotDescuento'); ?>    
            </tr>
		
            <tr>
                <?php echo $form->labelEx($model,'TotNeto'); ?>
                <?php echo $form->textField($model,'TotNeto',array('size'=>10,'maxlength'=>10)); ?>
                <?php echo $form->error($model,'TotNeto'); ?>
            </tr>
		
            <tr>
                <?php echo $form->labelEx($model,'TotIva'); ?>
                <?php echo $form->textField($model,'TotIva',array('size'=>10,'maxlength'=>10)); ?>
                <?php echo $form->error($model,'TotIva'); ?>
            </tr>
		
            <tr>
                <?php echo $form->labelEx($model,'TotImpuesto'); ?>
                <?php echo $form->textField($model,'TotImpuesto',array('size'=>10,'maxlength'=>10)); ?>   
                <?php echo $form->error($model,'TotImpuesto'); ?> 
            </tr>

            <tr>
                <?php echo $form->labelEx($model,'TotRetencion'); ?>
                <?php echo $form->textField($model,'TotRetencion',array('size'=>10,'maxlength'=>10)); ?>  
                <?php echo $form->error($model,'TotRetencion'); ?>   
            </tr>

            <tr>
                <?php echo $form->labelEx($model,'Total'); ?>
                <?php echo $form->textField($model,'Total',array('size'=>10,'maxlength'=>10)); ?>
                <?php echo $form->error($model,'Total'); ?>    
            </tr>

                           
        <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
            <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
         
        </table>
     </div>
   
    </div>
    <?php $this->endWidget(); ?>
 
    </div><!-- form -->