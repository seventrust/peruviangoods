
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl?>/css/jquery.css" />
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl?>/js/jquery-ui.js"></script>
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl?>/js/example.js'></script>
<script type="text/javascript">
    $(document).ready(function(){  
        $('#contador').val(0); 
      
        $('#cuenta').hide();

        $.post("ordenDeVenta.php", function(data){
                $('#numeroOrden').val(data);
                $('#reporte').val(data);

        });		
        $('#reiniciar').hide();
    });
    function agregar()
    {
        $('#cuenta').show(500);
        $('#contador').val(parseInt($('#contador').val())+1);
        var contador = $('#contador').val();
        $('#tabla').find('tbody').append($('<tr>').attr('id', 'fila'+contador));
        //Primera Fila
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'idProducto'+contador).attr('style', 'border-width: 0; resize: none; width: 40px')
        ));
        //Segunda
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'producto'+contador).attr('style', 'border-width: 0; resize: none; width: 400px')
        ));
        //Tercera
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'precioU'+contador).attr('style', 'border-width: 0; resize: none; width: 60px')
        ));
        //Cuarta
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'cantidad'+contador).attr('style', 'border-width: 0; resize: none; width: 60px')
        ));
        //Quinta 
        $('#fila'+contador).append($('<td>').append($('<input>').attr('type', 'text').attr('id', 'precio'+contador).attr('style', 'border-width: 0; resize: none; width: 60px')
        .attr('readonly', 'readonly')
        ));
        //Boton quitar
        $('#fila'+contador).append($('<td>').append($('<a>').attr('href', '#').text('x').attr('style', 'color:blue; font-size:1.3em; text-decoration:none;')
                        .click(function(){ 
                                quitar(this.parentNode.parentNode.id);
                                if($('#contador').val() == 0){
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
                            type: "POST",
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
                $('#idProducto'+contador).val(ui.item.CodProducto);
                $('#precioU'+contador).val(ui.item.PreCompra);
                }});

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
                data: {info: cadena},
                success: function(data)
                        {
                                $('#reiniciar').show(500);
                        }

            });
        }
    
    function Consultar(){
            var numerOrden = $('#reporte').val();
            $.ajax({
                    url: "convertir.php",
                    type: "POST",
                    data: numeroOrden,
                    sucess: function(data){

                    }

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
                <td>Cliente/Empresa</td>
                <td>Tlf:</td>
                <td>Direccion:</td>
                <td>Bodega</td>
            </tr>
            <tr>
                <td><input type="text" id="identidad"/></td>
                <td><input type="text" id="nombreCliente" /></td>
                <td><input type="text" id="telefono"></td>
                <td><input type="text" id="direccion"></td>
                <td><input type="text" id="bodega"></td>
            </tr>	
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
      <input type="button" id="convertir" value="Enviar" onclick="recogerDatos();">
      <input type="button" id="reiniciar" value="Limpiar" onclick="location.reload();"/>
	  
	  
	  <input type="hidden" id="reporte" name="orden"/>
	  <input type="submit" id="enviarForm"  value="Consultar" onclick="Consultar();"/>

    
    
    </div>

  <div id="receptorPHP"></div>
  </div>