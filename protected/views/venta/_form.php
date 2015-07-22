<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl?>/js/example.js'></script>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
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

                $('#Detalleventa_CodProducto').val(ui.item.CodProducto);
                $('#precioU').val(ui.item.PreCompra);

        }
        
        
    });
});

</script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        


<div id="page-wrap">	
    <div id="identity">
        <?php echo $form->labelEx($model,'CodCliente'); ?>
        <?php echo $form->textField($model,'CodCliente',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'CodCliente'); ?>		
    </div>

    <div id="customer">
        <?php echo $form->labelEx($model,'CodBodega'); ?>
        <?php echo $form->textField($model,'CodBodega',array('size'=>10,'maxlength'=>10,
                                                      'value'=>Yii::app()->user->isGuest?CHtml::encode(Yii::app()->name):CHtml::encode(Yii::app()->user->id))); ?>
        <?php echo $form->error($model,'CodBodega'); ?>

        <table id="meta">
            <tr>
                <td class="meta-head"><?php echo $form->labelEx($model,'NumVenta'); ?></td>
                <td>
                    <?php echo $form->textField($model,'NumVenta'); ?>
                    <?php echo $form->error($model,'NumVenta'); ?>
                </td>
            </tr>
            
            <tr>
                <td class="meta-head"><?php echo $form->labelEx($model,'Fecha'); ?></td>
                <td>
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model'=>$model,
                        'attribute'=>'Fecha',
                        'language'=>'es',
                        'name'=>'datepicker-Inline',
                       //'flat'=>true,//remove to hide the datepicker
                        'options'=>array(
                            'dateFormat'=>'yy-mm-dd',
                            'changeYear'=>TRUE,
                            'showButtonPanel'=>TRUE,
                            'showAnim'=>'fadeIn',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                        ),
                        'htmlOptions'=>array(
                            'style'=>''
                        ),  
                    ));
                    ?>
                    <?php echo $form->error($model,'Fecha'); ?>
                </td>            
            </tr>

            <tr>
                <td class="meta-head"><?php echo $form->labelEx($model,'Vencimiento'); ?></td>
                <td>
                     <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'model'=>$model,
                        'attribute'=>'Vencimiento',
                        'language'=>'es',
                        'name'=>'datepicker-Inline2',
                       //'flat'=>true,//remove to hide the datepicker
                        'options'=>array(
                            'showAnim'=>'fadeIn',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeYear'=>TRUE,
                            'showButtonPanel'=>TRUE,
                        ),
                        'htmlOptions'=>array(
                            'style'=>''
                        ),                  
                    ));
                    ?>
                    <?php echo $form->error($model,'Vencimiento'); ?>
                </td>            
            </tr>

            <tr>
                <td class="meta-head"><?php echo $form->labelEx($model,'Total'); ?></td>
                <td><div class="due">
                        <?php echo $form->textField($model,'Total',array('size'=>10,'maxlength'=>10, 'class'=>'due')); ?>
                        <?php echo $form->error($model,'Total'); ?>
                </div>
                </td>       
            </tr>

        </table>

    </div>
		
    <table id="items">
		  <tr>
		      <th>Codigo del Producto</th>
		      <th>Descripcion</th>
		      <th>Precio Unitario</th>
		      <th>Cantidad</th>
		      <th>Sub Total</th>
		  </tr>
                  
		  <tr class="item-row">
                        <td class="item-name">
                            <?php echo $form->textField($detalle,'CodProducto',array('size'=>10,'maxlength'=>10, 'class'=>'descripcion')); ?>
                            <?php echo $form->error($detalle,'CodProducto'); ?>
                            <div class="delete-wpr">
                                <a class="delete" href="#" title="Remove row">X</a>
                            </div>
                        </td>

                        <td class="description">
                            <input type="text" class="descripcion"/>
                        </td>
                        
                        <td>
                          <input type="text" class="cost" id="precioU" />
                              
                        </td>
                          <td>
                            <?php echo $form->textField($detalle, 'Cantidad', array('class'=>'qty'));?>
                            <?php echo $form->error($detalle, 'Cantidad');?>
                          </td>
		      <td>
                          <?php echo $form->textField($detalle, 'Subtotal', array('class'=>'qty'));?>
                          <?php echo $form->error($detalle, 'Subtotal');?>
                      </td>
		  </tr>
		
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Añadir Producto</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"><?php echo $form->labelEx($model,'TotExento'); ?></td>
		      <td class="total-value">
                        <?php echo $form->textField($model,'TotExento',array('size'=>10,'maxlength'=>10, 'id'=>'subtotal')); ?>
                        <?php echo $form->error($model,'TotExento'); ?>
                      </td>
                    
		  </tr>
		  
                  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"><?php echo $form->labelEx($model,'TotNeto'); ?></td>
                      <td class="total-value">
                        <?php echo $form->textField($model,'TotNeto',array('size'=>10,'maxlength'=>10, 'id'=>'total')); ?>
                        <?php echo $form->error($model,'TotNeto'); ?>
                      </td>
		  </tr>
                  
                   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"><?php echo $form->labelEx($model,'TotIva'); ?></td>
                      <td class="total-value">
                        <?php echo $form->textField($model,'TotIva',array('size'=>10,'maxlength'=>10, 'id'=>'iva', 'value'=>'19')); ?>
                        <?php echo $form->error($model,'TotIva'); ?>
                      </td>
		  </tr>
                  
                   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"> <?php echo $form->labelEx($model,'TotImpuesto'); ?></td>
                      <td class="total-value">
                        <?php echo $form->textField($model,'TotImpuesto',array('size'=>10,'maxlength'=>10, 'id'=>'impuesto','value'=>'21')); ?>
                        <?php echo $form->error($model,'TotImpuesto'); ?>
                      </td>
		  </tr>
                  
                   <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"><?php echo $form->labelEx($model,'TotDescuento'); ?></td>
                      <td class="total-value">
                        <?php echo $form->textField($model,'TotDescuento',array('size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'TotDescuento'); ?>
                      </td>
		  </tr>
                  
                  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"><?php echo $form->labelEx($model,'TotRetencion'); ?></td>
                      <td class="total-value">
                        <?php echo $form->textField($model,'TotRetencion',array('size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'TotRetencion'); ?>
                      </td>
		  </tr>
                  
                  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line"> <?php echo $form->labelEx($model,'ForPago'); ?></td>
                      <td class="total-value">
                        <?php echo $form->textField($model,'ForPago',array('size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'ForPago'); ?>
                      </td>
		  </tr>
                    
                  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total Cancelado</td>
		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Deuda Pendiente</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>
		  
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>Comprobante de movimiento de mercancia, verificar el Stock.</textarea>
		</div>
	
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

