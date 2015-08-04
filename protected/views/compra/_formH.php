<?php
/* @var $this VentasController */
/* @var $model Ventas */
/* @var $form CActiveForm */

$baseUrl = Yii::app()->baseUrl;

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/ajaxScript.js');
?>

<script>
    function myFunction() {
    
        alert('si carga myFunction');
    }

    function prueba(codigo) {
        
        var nomobj_texto = codigo.id;
        indexid = nomobj_texto.substring(6,nomobj_texto.length);
        jQuery.ajax({
            url: "index.php?r=ventas/prueba",
            type: 'post',
            async: false,
            contentType: "application/json",
            data: "{codigo: " + codigo.value + "}",
            success: function(data, textStatus, jqXHR){
                    // llamado cuando el action responde con un echo
                    // aqui "data" sera lo que tu hayas enviado desde el action
                    // puede ser json o texto simple,
                    // si es texto simple puedes hacer:
                    // alert(data);
                    // si es json puedes hacer:
                    //
                                        
                    //$('#descripcion_articulo'+indexid).value = data.descripcion;
                    //$('#precio_catalogo'+indexid).value = data.descripcion;
                    
                   document.getElementById('descripcion_articulo'+indexid).value =
                        data.descripcion;
                   document.getElementById('precio_catalogo'+indexid).value =
                        data.precio_catalogo;
                   document.getElementById('descuento'+indexid).value = '25.00';
                   document.getElementById('articulos_id'+indexid).value =
                        data.id;
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
        var precio_empresaria = 0;
        
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

<div class="form wide">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ventas-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array_merge(array($model),$validatedMembers)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'fecha'); ?>
        <?php
            
                    if ($model->Fecha!='') {
                            $model->Fecha=date('Y-m-d',strtotime($model->Fecha));
                    }
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'Fecha',
                            'value'=>$model->Fecha,
                            'language' => 'es',
                            'htmlOptions' => array('readonly'=>"readonly"),
                            'options'=>array(
                                    'autoSize'=>true,
                                    'defaultDate'=>$model->Fecha,
                                    'dateFormat'=>'yy-mm-dd',
                                    'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
                                    'buttonImageOnly'=>true,
                                    'buttonText'=>'Fecha',
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                            ),
                    ));
            
        ?>

        <?php echo $form->error($model,'Fecha'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'tiposdoc_id'); ?>

                <?php
                    echo $form->dropDownList($model,'tiposdoc_id', CHtml::listData(Tiposdoc::model()->findAll() ,
                         'id', 'descripcion'),array('empty'=>'Seleccione'));                 
        ?>

        <?php echo $form->error($model,'tiposdoc_id'); ?>
    </div>

        <div class="column">
        <div class="row">
        <?php echo $form->labelEx($model,'seriedoc'); ?>
        <?php echo $form->textField($model,'seriedoc',array('size'=>3,'maxlength'=>3)); ?>
        <?php echo $form->error($model,'seriedoc'); ?>
        </div>
        </div>    
        <div class="column">
        <div class="row">
        <?php echo $form->labelEx($model,'nrodoc'); ?>
        <?php echo $form->textField($model,'nrodoc',array('size'=>7,'maxlength'=>7)); ?>
        <?php echo $form->error($model,'nrodoc'); ?>        
        </div>
        </div>
        <div class="column">
        <div class="row">
        <?php echo $form->labelEx($model,'moneda'); ?>
                <?php echo $form->dropDownList($model,'moneda',array('S'=>'Nuevos Soles','D'=>'Dólares'));?>
        <?php echo $form->error($model,'moneda'); ?>
    </div>
        </div>
        
    <div class="row">
        <?php echo $form->labelEx($model,'cambio'); ?>
        <?php echo $form->textField($model,'cambio',array('size'=>5,'maxlength'=>5)); ?>
        <?php echo $form->error($model,'cambio'); ?>
    </div>

        <div class="row">
        <?php echo $form->labelEx($model,'condicion_pago_id'); ?>
                <?php
                    echo $form->dropDownList($model,'condicion_pago_id', CHtml::listData(CondicionPago::model()->findAll() ,
                         'id', 'descripcion'),array('empty'=>'Seleccione'));                 
        ?>
        <?php echo $form->error($model,'condicion_pago_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'empresarias_id'); ?>
        <?php
                    echo $form->dropDownList($model,'empresarias_id', CHtml::listData(Empresarias::model()->findAll(array('order'=>'apellidos ASC, nombres ASC')) ,
                         'id', 'fullName'),array('empty'=>'Seleccione'));                 
        ?>

        <?php echo $form->error($model,'empresarias_id'); ?>
    </div>
        
    <div class="row">
        <?php echo $form->labelEx($model,'creado_por'); ?>
        <?php echo $form->textField($model,'creado_por'); ?>
        <?php echo $form->error($model,'creado_por'); ?>
    </div>

        
        <fieldset>
        <?php

        // see http://www.yiiframework.com/doc/guide/1.1/en/form.table
        // Note: Can be a route to a config file too,
        //       or create a method 'getMultiModelForm()' in the member model

        //var_dump($detalle);
        $detalleFormConfig = array(
              'elements'=>array(
                  
                'codigo'=>array(
                    'type'=>'text',
                    'size'=>'10',
                    'maxlength'=>10,
                    'id'=>'codigo',
                    //'value'=>$detalle->articulos->Codigo,
                ),

                'cantidad'=>array(
                    'type'=>'text',
                    'size'=>'5',
                    'maxlength'=>5,
                    'STYLE'=>'text-align:right',
                    'id'=>'cantidad',
                    'onChange'=>'totaliza_linea_venta()',
                ),
                  
                'descripcion'=>array(
                    'type'=>'text',
                    'size'=>'50',
                    'maxlength'=>100,
                    'id'=>'descripcion_articulo',
                ),                  
                  
                'precio_catalogo'=>array(
                    'type'=>'text',
                    'size'=>'10',
                    'maxlength'=>10,
                    'id'=>'precio_catalogo',
                    'STYLE'=>'text-align:right',
                ),  
                  
                'dscto'=>array(
                    'type'=>'text',
                    'size'=>'5',
                    'maxlength'=>5,
                    'STYLE'=>'text-align:right',
                    'id'=>'descuento',
                    'onChange'=>'totaliza_linea_venta()',
                 ),  

                'total'=>array(
                    'type'=>'text',
                    'size'=>'10',
                    'maxlength'=>10,
                    'STYLE'=>'text-align:right',
                    'id'=>'total',
                ),  

                'articulos_id'=>array(
                    'type'=>'text',
                    'size'=>'0',
                    'maxlength'=>0,
                    'id'=>'articulos_id',
                    'type'=>'hidden',
                ),  

                'precio_empresaria'=>array(
                    'type'=>'text',
                    'size'=>'10',
                    'maxlength'=>10,
                    'id'=>'precio_empresaria',
                    'STYLE'=>'text-align:right',
                    'type'=>'hidden',
                ),  
                
            ));

        $this->widget('ext.multimodelform.MultiModelForm',array(
                'id' => 'id_detalle', //the unique widget id
                'formConfig' => $detalleFormConfig, //the form configuration array
                'model' => $detalle, //instance of the form model
                'tableView' => true,
                //if submitted not empty from the controller,
                //the form will be rendered with validation errors
                'validatedItems' => $validatedMembers,

                //array of member instances loaded from db
                'data' => $detalle->findAll('ventas_id=:ventas_id', array(':ventas_id'=>$model->id)),
            ));
        ?>        
        
    <div class="span-3">
    <div class="row">
        <?php echo $form->labelEx($model,'total_items'); ?>
        <?php echo $form->textField($model,'total_items',array('size'=>4,'maxlength'=>4,'id'=>'total_items','STYLE'=>'text-align:right')); ?>
        <?php echo $form->error($model,'total_items'); ?>
    </div>
    </div>

    <div class="span-3">
    <div class="row">
    <?php echo $form->labelEx($model,'pvp'); ?>
    <?php echo $form->textField($model,'pvp',array('size'=>10,'maxlength'=>10,'id'=>'pvp','STYLE'=>'text-align:right')); ?>
    <?php echo $form->error($model,'pvp'); ?>
    </div>
    </div>

        <?php //echo $form->labelEx($model,'bruto'); ?>
        <?php echo $form->hiddenField($model,'bruto',array('size'=>10,'maxlength'=>10,'id'=>'total_bruto','STYLE'=>'text-align:right')); ?>
        <?php //echo $form->error($model,'bruto'); ?>

        <?php //echo $form->labelEx($model,'inafecto'); ?>
        <?php echo $form->hiddenField($model,'inafecto',array('size'=>10,'maxlength'=>10,'id'=>'inafecto','STYLE'=>'text-align:right')); ?>
        <?php //echo $form->error($model,'inafecto'); ?>
        
    <div class="span-3">
    <div class="row">
        <?php echo $form->labelEx($model,'descuento'); ?>
        <?php echo $form->textField($model,'descuento',array('size'=>10,'maxlength'=>10,'id'=>'total_dscto','STYLE'=>'text-align:right')); ?>
        <?php echo $form->error($model,'descuento'); ?>
    </div>
        </div>                            
        
    <div class="span-3">
        <div class="row">
        <?php echo $form->labelEx($model,'igv'); ?>
        <?php echo $form->textField($model,'igv',array('size'=>10,'maxlength'=>10,'id'=>'total_igv','STYLE'=>'text-align:right')); ?>
        <?php echo $form->error($model,'igv'); ?>
    </div>
    </div>

        <div class="span-3">
        <div class="row">
        <?php echo $form->labelEx($model,'total'); ?>
        <?php echo $form->textField($model,'total',array('size'=>10,'maxlength'=>10,'id'=>'total_general','STYLE'=>'text-align:right')); ?>
        <?php echo $form->error($model,'total'); ?>
    </div>
    </div>
            
        </fieldset>
        <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

