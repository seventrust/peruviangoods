
/*function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
  return today;
}
*/
// from http://www.mediacollege.com/internet/javascript/number/round.html

function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

function fechaHoy() {

  var ahora = new Date();
  var meses = new Array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
  var fecha = ((ahora.getDate()<10) ? "0" : "")+ ahora.getDate();
  function fourdigits(numero) {
    return (numero < 1000) ? numero + 1900 : numero;
  }
  var hoy =  meses[ahora.getMonth()] + " " + fecha + ", " + (fourdigits(ahora.getYear()));
  return hoy;
}


//DESDE AQUI SE EFECTUAN LOS CAMBIOS PARA OBTENER LOS RESULTADOS DE LOS CALCULOS

function update_total() {
  var total = 0;
    
  $('.Subtotal').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) total += Number(price);
  });
  total = roundNumber(total,2);
  $('#Venta_TotNeto').val(total);
  
  
  var totalexento=0;
  $('.Exento').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) totalexento += Number(price);
  });
  totalexento = roundNumber(totalexento,2);
  $('#Venta_TotExento').val(totalexento);
  
  
  
    var totaldscto=0;
  $('.Descuento').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) totaldscto += Number(price);
  });
  totaldscto = roundNumber(totaldscto,2);
  $('#Venta_TotDescuento').val(totaldscto);
  
  
      var totaldscto=0;
  $('.Descuento').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) totaldscto += Number(price);
  });
  totaldscto = roundNumber(totaldscto,2);
  $('#Venta_TotDescuento').val(totaldscto);
  
  
  var total_si = 0;
  $('.Iva').each(function(i){
     price = $(this).val();
    if (!isNaN(price)) total_si += Number(price);
  });
  total_si=roundNumber(total_si,2);
   $('#Venta_TotIva').val(total_si);
  
//  var iva = parseFloat($('#Compra_TotIva').val()/100);
//  total_si += total*iva;
  
  var total_ci = 0;
  total_ci = parseFloat(total)+parseFloat(total_si);
  
  
  total_ci = roundNumber(total_ci,2);
  $('#Venta_Total').val(total_ci);
  
  
}

$(document).ready(function() {


  //CUANDO CAMBIA LA CANTIDAD
        var index = $('#contador').html();
          $('#Detalleventa_Cantidad'+index).change( function() {
          var index = $('#contador').html();
      //    alert(index);
            var j = $('#Detalleventa_Cantidad'+index).val();
            var l = $('#Detalleventa_Descuento'+index).val();
            var m = $('#Detalleventa_Exento'+index).val();
            var i = $('#Detalleventa_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detalleventa_Iva'+index).val(subiva);

            $('#Detalleventa_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();
      }); 
      
 //CUANDO CAMBIA EL PRECIO
        var index = $('#contador').html();
            $('#Detalleventa_Precio'+index).change( function() {
            var index = $('#contador').html();
        //    alert(index);
            var j = $('#Detalleventa_Cantidad'+index).val();
            var l = $('#Detalleventa_Descuento'+index).val();
            var m = $('#Detalleventa_Exento'+index).val();
            var i = $('#Detalleventa_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detalleventa_Iva'+index).val(subiva);
            $('#Detalleventa_Precio'+index).val(preciosiniva);
            $('#Detalleventa_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();

        });

//CUANDO CAMBIA EL DESCUENTO
        var index = $('#contador').html();
            $('#Detalleventa_Descuento'+index).change( function() {
            var index = $('#contador').html();
        //    alert(index);
            var j = $('#Detalleventa_Cantidad'+index).val();
            var l = $('#Detalleventa_Descuento'+index).val();
            var m = $('#Detalleventa_Exento'+index).val();
            var i = $('#Detalleventa_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detalleventa_Iva'+index).val(subiva);
            $('#Detalleventa_Precio'+index).val(preciosiniva);
            $('#Detalleventa_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();
        });
        
//CUANDO CAMBIA EL EXENTO
        var index = $('#contador').html();
            $('#Detalleventa_Exento'+index).change( function() {
            var index = $('#contador').html();
        //    alert(index);
            var j = $('#Detalleventa_Cantidad'+index).val();
            var l = $('#Detalleventa_Descuento'+index).val();
            var m = $('#Detalleventa_Exento'+index).val();
            var i = $('#Detalleventa_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detalleventa_Iva'+index).val(subiva);
            $('#Detalleventa_Precio'+index).val(preciosiniva);
            $('#Detalleventa_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();

        });


  
  
});