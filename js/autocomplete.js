    $(document).ready(function(){
        $('#Venta_CodCliente').autocomplete({				
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
    });     
         


