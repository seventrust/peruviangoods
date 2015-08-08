
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl?>/js/example.js'></script>
<script type="text/javascript">
    $(document).ready(function(){  
        //Declaramos las variables para hacer el conteo de las filas agregadas
        //o hacer los calculos automaticos desde el lado del cliente.
        $('#contador').val(0); 
      
        $('#cuenta').hide();
	
        $('#reiniciar').hide();
        
         $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#fecha").datepicker({
        firstDay: 1,
        dateFormat: 'yy-mm-dd',
        });
        $("#vencimiento").datepicker({
            firstDay: 1,
            dateFormat: 'yy-mm-dd',
        });
      
    });
    function agregar()
    {
        $('#cuenta').show(500);
        $('#contador').val(parseInt($('#contador').val())+1);
        var contador = $('#contador').val();
        $('#tabla').find('tbody').append($('<tr>').attr('id', 'fila'+contador));
        //Primera Fila
        $('#fila'+contador).append($('<td>').append($('<input>').attr('class', 'detalle').attr('type', 'text').attr('id', 'idProducto'+contador).attr('title', 'CodProducto').attr('style', 'border-width: 0; resize: none; width: 40px')
        ));
        //Segunda
        $('#fila'+contador).append($('<td>').append($('<input>').attr('class', 'detalle').attr('type', 'text').attr('id', 'producto'+contador).attr('title', 'Descripcion').attr('style', 'border-width: 0; resize: none; width: 400px')
        ));
        //Tercera
        $('#fila'+contador).append($('<td>').append($('<input>').attr('class', 'detalle').attr('type', 'text').attr('id', 'precioU'+contador).attr('title', 'PreVenta').attr('style', 'border-width: 0; resize: none; width: 60px')
        ));
        //Cuarta
        $('#fila'+contador).append($('<td>').append($('<input>').attr('class', 'detalle').attr('type', 'text').attr('id', 'cantidad'+contador).attr('title', 'CanExistencia').attr('style', 'border-width: 0; resize: none; width: 60px')
        ));
        //Quinta 
        $('#fila'+contador).append($('<td>').append($('<input>').attr('class', 'detalle').attr('type', 'text').attr('id', 'precio'+contador).attr('title', 'Total').attr('style', 'border-width: 0; resize: none; width: 60px')
        .attr('readonly', 'readonly')
        ));
        //Boton quitar
        $('#fila'+contador).append($('<td>').append($('<a>').attr('href', '#').text('x').attr('style', 'color:blue; font-size:1.3em; text-decoration:none;')
                        .click(function(){ 
                                quitar(this.parentNode.parentNode.id);
                                if($('#contador').val() === 0){
                                        ('#subtotal').val(0);
                                        ('#total').val(0);
                                }
                                })));

        $('#producto'+contador).autocomplete({				
            source: function(solicitud, respuesta)
                {
                    $.ajax(
                    {
                            url: "<?php echo Yii::app()->createUrl('venta/autocomplete')?>",
                            type: "GET",
                            dataType: "json",
                            data:
                            {
                                    term: solicitud.term
                            },
                            success: function(data)
                            {
                                    respuesta(data);
                            }
                    });
                },

            select: function(event, ui){
                $('#idProducto'+contador).val(ui.item.id);
                $('#precioU'+contador).val(ui.item.precio);
            }});
            
            $('#identidad').autocomplete({				
            source: function(solicitud, respuesta)
                {
                    $.ajax(
                    {
                            url: "<?php echo Yii::app()->createUrl('venta/autocompletel')?>",
                            type: "GET",
                            dataType: "json",
                            data:
                            {
                                    term: solicitud.term
                            },
                            success: function(data)
                            {
                                    respuesta(data);
                            }
                    });
                },

            select: function(event, ui){
                $('#nombreCliente').val(ui.item.nombre);
                $('#telefono').val(ui.item.telefono);
                $('#direccion').val(ui.item.direccion);
                
            }
        });

    $('#precio'+contador).click(function(){
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


    }
//Funcion para restar las filas y actualizar el valor de contador parar
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

    
    var id = Array();
    var descripcion = Array();
    var cantidad = Array();
    var precio = Array();
    var detalle="";
    var cadena=Array();   

    //Una funcion para recoger los datos agregados

    function recogerDatos(){
            
            cadena[0] = $('#numeroOrden').val();
            cadena[1] = $('#identidad').val();
            cadena[2] = $('#bodega').val();
            cadena[3] = $('#fecha').val();
            cadena[4] = $('#vencimiento').val();
            cadena[5] = $('#for_pago').val();
            cadena[6] = $('#subtotal').val();
            cadena[7] = $('#descuento').val();
            cadena[8] = $('#total').val();
            cadena[9] = $('#iva').val();
            cadena[10] = $('#ila').val();
            cadena[11] = $('#totalRetencion').val();
            cadena[12] = $('#total').val();
                 
            $.ajax({
                url: "http://localhost/libs_php/formulario.php",
                type: "POST",
                data: {info: cadena, detalle},
                success: function(data)
                        {
                                $('#reiniciar').show(500);
                        }
            });
        }
        
        function recogerDatos2(){
           var orden = "&orden="+$('#numeroOrden').val();
           for(var i = 1; i <= $('#contador').val(); i++){
                id[i] = $('#idProducto'+i).val();
                descripcion[i] = $('#producto'+i).val();
                cantidad[i] = $('#cantidad'+i).val();
               

                detalle +='&detalle[]='+id[i]+" "+descripcion[i]+" "+cantidad[i];
            }
            $.ajax({
                url: "http://localhost/libs_php/detalle_venta.php",
                type: "POST",
                data: cadena+orden,
            });
           
        }
    
    
</script>

<div>
    <header>
    <div id="HTML" align="center">  
    	<table id="informacion">
      	<tr>
            <th colspan="4">Cliente</th>
            <tr id="estiloCol">
                <td>RUT</td>
                <td><input type="text" id="identidad"/></td>
            </tr>
            <tr>
                <td>Cliente/Empresa</td>
                 <td><input type="text" id="nombreCliente" /></td>
            </tr>
            <tr>
                <td>Tlf:</td>
                <td><input type="text" id="telefono"></td>
            </tr>
            <tr>
                 <td>Direccion:</td>
                 <td><input type="text" id="direccion"></td>
            </tr>
            
            <tr>
                <td>Bodega</td>
                <td><input type="text" id="bodega"></td>
            </tr>
               
      
       <table id="invoice">
      	<tr>
            <th colspan="2">Info Factura</th>
            <tr id="estiloCol">
                    <td>#Orden</td>
                    <td>Fecha</td>
                    <td>Vencimiento</td>
      			

            </tr>
            <tr>
                    <td> <input type="text" id="numeroOrden" value="<?php getOrden();?>"/></td>
                    <td><input type="text" id="fecha" /></td>
                    <td><input type="text" id="vencimiento"/></td>
            </tr>
      	
       </tr>
      	
      	
      </table>
      	
     
      
      <table id="tabla" border="1">
      	<tr id="estiloCol">
      		<th>ID</th>
      		<th style="width: 400px;"><p><b>Descripcion</p></th>
      		<th><p><b>P. Unidad</p></th>
      		<th><p><b>Cantidad</p></th>
      		<th colspan="2"><p><b>Subtotal</p></th>
      	</tr>
       
      	

     </table>
        <input type="button" id="enviar" value="Agregar" onclick="agregar();"/>
    	<table id="cuenta">
      	<tr>
      		<th colspan="2">Cuenta</th>
                <tr>
      			<td>Forma de Pago</td>
                        <td> <select id="for_pago">
                                <option>Efectivo</option>
                                <option>Debito</option>
                                <option>Credito</option>
                                <option>Cheque</option>
                            </select></td>
      		</tr>
      		<tr>
      			<td>Subtotal</td>
      			<td> <input type="text" id="subtotal"/></td>
      		</tr>
                
                <tr>
      			<td>Descuento %</td>
      			<td> <input type="text" id="descuento"/></td>
      		</tr>
      		<tr>
      			<td>IVA</td>
      			<td><input type="text" id="iva" value="0.19" readonly="readonly"/></td>
      		</tr>
                <tr>
      			<td>ILA</td>
      			<td><input type="text" id="ila" value="0.21" readonly="readonly"/></td>
      		</tr>
                
                <tr>
      			<td>Impuestos Agregados %</td>
      			<td><input type="text" id="im_agregado"/></td>
      		</tr>
                
                <tr>
      			<td>Total Retencion</td>
      			<td><input type="text" id="totalRetencion"></td>
      		</tr>
      		<tr>
      			<td>Total</td>
      			<td><input type="text" id="total"></td>
      		</tr>
                
                
      	</tr>
      	
      	
      </table>
      <input type="hidden" id="contador" value="0"/ >
      <input type="button" id="convertir" value="Enviar" onclick="recogerDatos(), recogerDatos2();">
      <input type="button" id="reiniciar" value="Limpiar" onclick="location.reload();"/>
	  
	  
	  <input type="hidden" id="reporte" name="orden"/>
	  <input type="submit" id="enviarForm"  value="Consultar" onclick="Consultar();"/>

    
    
    </div>

  <div id="receptorPHP"></div>
  </div>