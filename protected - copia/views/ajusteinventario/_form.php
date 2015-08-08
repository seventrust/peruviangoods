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

<div class="block_content" id="new">
    <script type="text/javascript">
  
        $(function() {
        var availableTags = [
           "Principal L58 B-C",
           "Bodega L710",
           "Bodega L58 A",
           "Congelados L58 B-C",
           "Verduras L58 B-C",
            ];
            $( "#bodega" ).autocomplete({
              source: availableTags
            });
          });
          
        $(function() {
        var availableTags = [
           "Entrada",
           "Salida",
            ];
            $( "#tipoajuste" ).autocomplete({
              source: availableTags
            });
          });

        </script>
</div>
</head>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>

    <div class="table">
       <table>
          
          </div>
            <tr>
                <th> <?php echo $form->labelEx($model,'Numero'); ?>
                     <?php echo $form->textField($model,'Id'); ?>
                     <?php echo $form->error($model,'Id'); ?>
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
                    <?php echo $form->labelEx($model,'Bodega'); ?>
                    <?php echo $form->dropDownList($model,'CodBodega',  $model->getMenuBodega(),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'CodBodega'); ?>

                </th>

                <th>
                    <?php echo $form->labelEx($model,'Tipo de ajuste'); ?>
                    <?php echo $form->dropDownList($model,'Tipo',$model->getMenuCategoria(),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'Tipo'); ?>
                </th>
            </tr>
            <tr>
                <th>
                     <?php echo $form->labelEx($model,'Descripcion'); ?>
                     <?php echo $form->textField($model,'Descripcion',array('size'=>50,'maxlength'=>200)); ?>
                     <?php echo $form->error($model,'Descripcion'); ?>
                </th>
                
                            <th>
                    <?php echo $form->labelEx($model,'CodProducto'); ?>
                    <?php #echo $form->dropDownList($model,'CodProducto',CHtml::listData(Productos::model()->findAll(),'Id','Descripcion'),array('empty'=>' ')); ?>
                    <?php echo $form->error($model,'CodProducto'); ?>
                </th>
            </tr>
        
       </table>   
        
        <table>
           
        </table>
        
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
                            <th style="text-align:right" width="10%">Cantidad Teorica</th>
                            <th style="text-align:right" width="10%">Cantidad Fisica</th>

                        </tr>
                        
                    </thead>
                    <tbody id="detalle">
                    	<tr class="nothing">
                        	<td style="text-align:center" colspan="6">Sin detalle</td>
                        </tr>
                    </tbody>

             </form>
					
                    						
		</div>
                    </th>
                </tr>
            </table>
            
        </div>
          
      <p class="note">Campos con <span class="required">*</span> requeridos.</p>

	<div class="row_buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
	</div>

 
<?php $this->endWidget(); ?>
</div><!-- form -->