<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />

<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<div class="form wide">
 
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'group-form',
            'enableAjaxValidation'=>false,
    )); ?>
 
    <?php
        //show errorsummary at the top for all models
        //build an array of all models to check
        echo $form->errorSummary(array_merge(array($model),$validatedMembers));
    ?>
 
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
     </table>
     <table>
         
        <th>
            <?php echo $form->labelEx($model,'Proveedor'); ?>
            <?php echo $form->dropDownList($model,'CodProveedor',CHtml::listData(Proveedor::model()->findAll(),'CodProveedor','Descripcion'),array('empty'=>' ')); ?>
            <?php #$this->widget('zii.widgets.jui.CJuiAutoComplete',
//                      array(
//                       'id'=>'CodProveedor',
//                       'name'=>'Descripcion', // Nombre para el campo de autocompletar
//                       'model'=>$proveedor,
//                       'value'=>$proveedor->isNewRecord ? '' : $proveedor->Compra->CodProveedor.' ',
//                       'source'=>$this->createUrl('compra/AutocompleteProveedor'), // URL que genera el conjunto de datos
//                       'options'=> array(
//                         'showAnim'=>'fold',
//                         'size'=>'30',
//                         'minLength'=>'1', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
//                         'select'=>"js:function(event, ui) { 
//                          $('#Compra_Proveedor').val(ui.item.id); 
//                           }"
//                         ),
//                       'htmlOptions'=> array(
//                        'size'=>40,
//                        'placeholder'=>'Proveedor',
//                        'title'=>'Indique el Proveedor.'
//                        ),
//                      ));                  ?>
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
     <table>
         <th>
                <?php echo $form->labelEx($member,'Descripcion'); ?>
                    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete',
                      array(
                       'id'=>'CodProducto',
                       'name'=>'Descripcion', // Nombre para el campo de autocompletar
                       'model'=>$member,
                       'value'=>$member->isNewRecord ? '' : $member->Detallecompra->CodProducto.' ',
                       'source'=>$this->createUrl('compra/autocomplete'), // URL que genera el conjunto de datos
                       'options'=> array(
                         'showAnim'=>'fold',
                         'size'=>'30',
                         'minLength'=>'1', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
                         'select'=>"js:function(event, ui) { 
                          $('#Detallecompra_Precio').val(ui.item.Precio); // HTML-Id del campo
                          $('#Detallecompra_CodProducto').val(ui.item.id); 
                          $('#Detallecompra_UniMedida').val(ui.item.unimedida);
                           }"
                         ),
                       'htmlOptions'=> array(
                        'size'=>40,
                        'placeholder'=>'Producto',
                        'title'=>'Indique el producto.'
                        ),
                      ));  
                    ?>
                    <?php echo $form->error($member,'CodProducto'); ?>
                  
            </th>
     </table>
    
    <div>
 <?php
 
    // see http://www.yiiframework.com/doc/guide/1.1/en/form.table
    // Note: Can be a route to a config file too,
    //       or create a method 'getMultiModelForm()' in the member model
 
 
 
    $memberFormConfig = array(
          'elements'=>array(
            'Item'=>array(
                'type'=>'text',
                'maxlength'=>2,
            ),
            'CodProducto'=>array(
                'type'=>'text',
                'maxlength'=>80,
            ),
             'Descripcion'=>array(
                'type'=>'zii.widgets.jui.CJuiAutoComplete',                
                'source'=>$this->createUrl('compra/autocomplete'),
                'options'=>array(
                    'showAnim'=>'fold',
                         'size'=>'120',
                         'minLength'=>'2', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
                         'select'=>"js:function(event, ui) { 
                          $('#Detallecompra_Precio').val(ui.item.Precio); // HTML-Id del campo
                          $('#Detallecompra_CodProducto').val(ui.item.id); 
                          $('#Detallecompra_UniMedida').val(ui.item.unimedida);
                            
                           }"                       
                ),
                'htmlOptions'=> array(
                        'size'=>40,
                        'placeholder'=>'Buscar ...',
                        'title'=>'Indique el producto.'
                ),
                 ),
//            'Descripcion'=>array(
//                'type'=>'zii.widgets.jui.CJuiAutoComplete',
//                'model'=>$member,
//                'attribute'=>'descripcion',
//                'source'=>'js: function(request, response) {
//                $.ajax({
//                url: "'.$this->createUrl('autocompletedescripcion').'",
//                dataType: "json",
//                data: {
//                term: request.term,
//                idFabricaSeleccionada: $("#Pedido_fabrica_id").val(),
//                idTarifaFabricaSeleccionada: $("#tarifa_id").val()
//
//                },
//                success: function (data) {
//                response(data);
//                }
//                })
//                }',
//                'options'=>array(
//                'minLength'=>2,
//                'showAnim'=>'fold',
//                'select'=> 'js:function(event, ui)
//                {
//                $("#Detallecompra_Precio").val(ui.item.label[1]);
//                $("#Detallecompra_CodProducto").val(ui.item.id);
//                $("#Detallecompra_UniMedida").val(ui.item.label[2]);
//                return true;
//                }'
//                ),
//            ),                      
//                          

            'Cantidad'=>array(
                'type'=>'text',
                //it is important to add an empty item because of new records
                'maxlength'=>120,
            ),
            'Precio'=>array(
                'type'=>'text',
                'maxlength'=>120,
            ),
            'UniMedida'=>array(
                'type'=>'text',
                'maxlength'=>10,
            ),
            'Descuento'=>array(
                'type'=>'text',
                'maxlength'=>10,
            ),
            'Exento'=>array(
                'type'=>'text',
                'maxlength'=>10,
            ),
            'Subtotal'=>array(
                'type'=>'text',
                'maxlength'=>10,
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
 
            //array of member instances loaded from db
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