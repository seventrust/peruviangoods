<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/compra.js"></script>

<script type="text/javascript">
$(document).ready(function(){
//    if( $('auto').is(':checked') ) {
//    alert('Seleccionado');
//     $('#Compra_NumCompra').val(<?php //  echo getCompra()?>);
        }
   
     
});


</script>

<div id="contador"></div>

<div class="form wide">
 
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'group-form',
            'enableAjaxValidation'=>false,
    )); ?>
 
    <?php
//        echo $form->errorSummary(array_merge(array($model),$validatedMembers));
    ?>

<div>
  
    
</div>

 <div >
     <table class="table">
         <th>
            <?php echo $form->labelEx($model,'Id'); ?>
            <?php echo $form->textField($model,'Id' ); ?>
            <?php echo $form->error($model,'Id'); ?>
         </th>
         <th>
           <label>auto</label>
           <input type="checkbox" id="auto"/>
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
            <?php // echo $form->labelEx($model, 'Vencimiento');?>
            <?php 
//                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
//                    'attribute'=>'Vencimiento',
//                    'model'=>$model,
//                    'language'=>'es',
//                    'options'=>array(
//                        'dateFormat'=>'yy-mm-dd',
//                        'showButtonPanel'=>TRUE,
//                        'changeYear'=>TRUE,
//                    )
//                ))
             ?>
            <?php // echo $form->error($model,'Vencimiento'); ?>
        </th>
     </table>
    
<table class="table">
<!--            <th>
        <div class="required">
        <?php // echo $form->labelEx($model, 'CodProveedor');?>
        <?php
//             $this->widget('zii.widgets.jui.CJuiAutoComplete',
//                      array(
//                       'id'=>'CodProveedor',
//                       'name'=>'Compra[CodProveedor]', // Nombre para el campo de autocompletar
//                       'model'=>$model,
//                       'value'=>$model->CodProveedor,
//                       'source'=>$this->createUrl('compra/autocompletel'), // URL que genera el conjunto de datos
//                       'options'=> array(
//                         'showAnim'=>'fold',
//                         'size'=>'30',
//                         'minLength'=>'2', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
//                         'select'=>"js:function(event, ui) { 
//                          $('#nombreCliente').val(ui.item.nombre); // HTML-Id del campo
//                          $('#direccion').val(ui.item.direccion);
//                          $('#telefono').val(ui.item.telefono);
//                           }"
//                         ),
//                       'htmlOptions'=> array(
//                        'size'=>40,
//                        'placeholder'=>'Buscar ...',
//                        'title'=>'Indique el RUT del proveedor.',
//                        'style'=>'width: 80px',
//                        ),
//                      )); 
//        ?>
        <?php // echo $form->error($model,'CodProveedor'); ?>
    </div>
    </th>
    
    <th>
    <div class="required">
        <label>Proveedor</label>
        <input type="text" id="nombreCliente"/>
    </div>
    </th>
    <th>
    <div class="required">
        <label>Direccion</label>
        <input type="text" id="direccion" style="WIDTH:10"/>
    </div>
    </th>
    <th>
    <div class="required">
        <label>Telefono</label>
        <input type="text" id="telefono"/>
    </div>
    </th>-->
        </table>
     <table class="table">
         <th>
            <?php echo $form->labelEx($model,'Bodega'); ?>
            <?php echo $form->dropDownList($model,'CodBodega',CHtml::listData(Bodega::model()->findAll(),'CodBodega','Descripcion'),array('empty'=>' ')); ?>
            <?php echo $form->error($model,'CodBodega'); ?>
        </th>
        <th>
            <?php // echo $form->labelEx($model,'ForPago'); ?>
            <?php // echo $form->dropDownList($model,'ForPago',CHtml::listData(Formapago::model()->findAll(),'Id','Descripcion'),array('empty'=>' ')); ?>
            <?php // echo $form->error($model,'ForPago'); ?>
        </th>
        <th>
            <?php // echo $form->labelEx($model,'Usuario'); ?>
            <?php // echo $form->textField($model,'Usuario',array('value'=>Yii::app()->user->name)); ?>
            <?php // echo $form->error($model,'Usuario'); ?>
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
//                          $('#Detallecompra_CodProducto'+indexid).val(ui.item.id); 
//                          $('#Detallecompra_Precio'+indexid).val(ui.item.Precio); 
//                          $('#Detallecompra_UniMedida'+indexid).val(ui.item.UniMedida);
//                          $('#Detallecompra_Saldo'+indexid).val(ui.item.Saldo); 
//                          $('#Detallecompra_Descuento'+indexid).val(0);
//                          $('#Detallecompra_Exento'+indexid).val(0);
//                          $('#contador').html(indexid);
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
               'style'=>'WIDTH:70px',
//               'onchage'=>'calcularPrecioIVA()',
                'class'=>'Cantidad',
                
            ),
            'Precio'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:70px',
                 'class'=>'Precio',
            ),
            'UniMedida'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:70px',
                'readonly'=>TRUE,
                 'class'=>'UniMedida',
            ),
              'Iva'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:70px',
                 'class'=>'Iva',
            ),
            'Descuento'=>array(
                'type'=>'text',
                'maxlength'=>8,
                'size'=>8,
                'style'=>'WIDTH:70px',
                 'class'=>'Descuento',
            ),
            
            'Exento'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:70px',
                 'class'=>'Exento',
            ),
            'Subtotal'=>array(
                'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:70px',
                 'class'=>'Subtotal',
                'readonly'=>true,
                
               
            ),
              'Saldo'=>array(
//                'type'=>'hidden',
                  'type'=>'text',
                'maxlength'=>10,
                'size'=>8,
                'style'=>'WIDTH:70px',
                'readonly'=>true,
                 'class'=>'Saldo',
             
            ),
        ));
    
//            $this->widget('ext.multimodelform.MultiModelForm',array(
//            'id' => 'id_member', //the unique widget id
//            'formConfig' => $memberFormConfig, //the form configuration array
//            'model' => $member, //instance of the form model
//            'tableView'=>true,
//            //if submitted not empty from the controller,
//            //the form will be rendered with validation errors
//            'validatedItems' => $validatedMembers,            
////            'clearInputs'=>true,
////             'jsBeforeNewId' => "alert(this.attr('id'));",   
//            'jsAfterNewId' => MultiModelForm::afterNewIdAutoComplete($memberFormConfig['elements']['Descripcion']),
//            //array of member instances loaded from db
////            'jsBeforeNewId' => "alert(this.attr('id'));",
////              'jsAfterCloneCallback'=>'alertIds',             
////                'jsAfterNewId' => "alert(this.attr('id'));",
//            'data' => $member->findAll('NumCompra=:groupId', array(':groupId'=>$model->NumCompra)),
//            'showAddItemOnError' => false,
//            'addItemText' => 'Agregar',
//            'removeText' => 'Eliminar',
//            'removeConfirm' => '¿ Eliminar el producto seleccionado ?', 
//        ));
            
            
    ?>
             
         </table>
     </div>
    
        
       <tr>
                <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
                <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
                </div>
            </tr>    
    </div>
    <?php $this->endWidget(); ?>
    
     
 
    </div><!-- form -->