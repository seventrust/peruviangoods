<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/compra.js"></script>

<div id="contador"></div>

<div class="form wide">
 
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'group-form',
            'enableAjaxValidation'=>false,
    )); ?>
 
    <?php
        echo $form->errorSummary(array_merge(array($model),$validatedMembers));
    ?>

<!--<script TYPE="text/javascript" LANGUAGE="JavaScript"> 
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

   
    
    
<script>
    
    
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
               <?php // $this->widget('zii.widgets.jui.CJuiAutoComplete',
//                      array(
//                       'id'=>'Proveedor',
//                       'name'=>'Descripcion', // Nombre para el campo de autocompletar
//                       'model'=>$model,
//                       'value'=>$model->isNewRecord ? '' : $model->Compra->CodProveedor.' ',
//                       'source'=>$this->createUrl('compra/AutocompleteProveedor'), // URL que genera el conjunto de datos
//                       'options'=> array(
//                         'showAnim'=>'fold',
//                         'size'=>'30',
//                         'minLength'=>'1', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
//                         'select'=>"js:function(event, ui) { 
//                          $('#Proveedor').val(ui.item.id); 
//                           }"
//                         ),
//                       'htmlOptions'=> array(
//                        'size'=>40,
//                        'placeholder'=>'Proveedor',
//                        'title'=>'Indique el Proveedor.'
//                        ),
//                      ));                  ?>
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
 
    echo CHtml::script('function alertIds(newElem,sourceElem) {alert(newElem.attr("id"));}');

    
    
    $memberFormConfig = array(
          'elements'=>array(
            'CodProducto'=>array(
                'type'=>'text',
                 'size'=>'10',
                'maxlength'=>10,
                'style'=>'WIDTH:100px',
                'readonly'=>TRUE,
                 'class'=>'CodProducto',
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
                          var nomobj_texto = this.id; //El identificador del campo en mi caso #Detallecompra_Descripcion 
                          var indexid = nomobj_texto.substring(25,nomobj_texto.length); 
                          $('#Detallecompra_CodProducto'+indexid).val(ui.item.id); 
                          $('#Detallecompra_Precio'+indexid).val(ui.item.Precio); 
                          $('#Detallecompra_UniMedida'+indexid).val(ui.item.UniMedida);
                          $('#Detallecompra_Saldo'+indexid).val(ui.item.Saldo); 
                          $('#Detallecompra_Descuento'+indexid).val(0);
                          $('#Detallecompra_Exento'+indexid).val(0);
                          $('#contador').html(indexid);
                         }",
                ),
                'htmlOptions'=> array(
                        'size'=>30,
                   'onFocus'=>"init(this.id)",
                        'placeholder'=>'Buscar ...',
                        'title'=>'Indique el producto.'
                ),
            ),
                    
            'Cantidad'=>array(
                'type'=>'text',
                //it is important to add an empty item because of new records
                'maxlength'=>8,
                'size'=>8,
               'style'=>'WIDTH:80px',
//               'onchage'=>'calcularPrecioIVA()',
                'class'=>'Cantidad',
                
            ),
            'Precio'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:80px',
                 'class'=>'Precio',
            ),
            'UniMedida'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:80px',
                'readonly'=>TRUE,
                 'class'=>'UniMedida',
            ),
            'Descuento'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:80px',
                 'class'=>'Descuento',
            ),
            'Exento'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:80px',
                 'class'=>'Exento',
            ),
            'Subtotal'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:80px',
                 'class'=>'Subtotal',
//                 'readonly'=>true,
                
               
            ),
              'Saldo'=>array(
//                'type'=>'hidden',
                  'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:80px',
                'readonly'=>true,
                 'class'=>'Saldo',
             
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
//              'jsAfterCloneCallback'=>'alertIds',
                
                
//                'jsAfterNewId' => "alert(this.attr('id'));",

                
                
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