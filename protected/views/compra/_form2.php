<html>
<HEAD>
     <TITLE>Anyadir Filas Dinámicamente en HTML by jotaerre.net</TITLE>
     <SCRIPT language="javascript">

          function addRow(tableID) {
               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               var row = table.insertRow(rowCount);
               var cell1 = row.insertCell(0);
               var element1 = document.createElement("input");
               element1.type = "text";
               cell1.appendChild(element1);
               var cell2 = row.insertCell(1);
               var element2 = document.createElement("input");
               element2.type = "text";
               cell2.appendChild(element2);
          }

          function deleteRow(tableID) {
               try {
               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                         table.deleteRow(i);
                         rowCount--;
                         i--;
                    }
               }
               }catch(e) {
                    alert(e);
               }
          }
     </SCRIPT>

</HEAD>
<BODY>
    <div class="form">
     <TABLE id="dataTable" width="350px" border="1">
          <TR>
              <TD>
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
              </TD>
               <TD> <INPUT type="text" NAME="Cantidad"/> </TD>
               <TD> <INPUT type="text" NAME="Precio"/> </TD>
          </TR>
          
         <INPUT type="button" value="Add Row" onclick="addRow('dataTable');" />
         <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable');" />
     </TABLE>
        </div>
</BODY>

</html>