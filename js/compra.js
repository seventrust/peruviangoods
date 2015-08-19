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


//DESDE AQUI
function update_total() {
  var total = 0;
    
  $('.Subtotal').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) total += Number(price);
  });
  total = roundNumber(total,2);
  $('#Compra_TotNeto').val(total);
  
  
  var totalexento=0;
  $('.Exento').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) totalexento += Number(price);
  });
  totalexento = roundNumber(totalexento,2);
  $('#Compra_TotExento').val(totalexento);
  
  
  
    var totaldscto=0;
  $('.Descuento').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) totaldscto += Number(price);
  });
  totaldscto = roundNumber(totaldscto,2);
  $('#Compra_TotDescuento').val(totaldscto);
  
  
      var totaldscto=0;
  $('.Descuento').each(function(i){
    price = $(this).val();
    if (!isNaN(price)) totaldscto += Number(price);
  });
  totaldscto = roundNumber(totaldscto,2);
  $('#Compra_TotDescuento').val(totaldscto);
  
  
  var total_si = 0;
  $('.Iva').each(function(i){
     price = $(this).val();
    if (!isNaN(price)) total_si += Number(price);
  });
  total_si=roundNumber(total_si,2);
   $('#Compra_TotIva').val(total_si);
  
//  var iva = parseFloat($('#Compra_TotIva').val()/100);
//  total_si += total*iva;
  
  var total_ci = 0;
  total_ci = parseFloat(total)+parseFloat(total_si);
  
  
  total_ci = roundNumber(total_ci,2);
  $('#Compra_Total').val(total_ci);
  
  update_balance();
}

function update_balance() {
  var due = $("#total").val().replace("$","") - $("#paid").val().replace("$","");
  due = roundNumber(due,2);
  
  $('.due').val("$"+due);
}

function update_price() {
  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val().replace("$","") * row.find('.qty').val();
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').val("N/A") : row.find('.price').val("$"+price);
  
  update_total();
}

function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);
}

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });

  $("#paid").blur(update_balance);
   
  $("#addrow").click(function(){
    $(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td class="description"><textarea>Description</textarea></td><td><textarea class="cost">$0</textarea></td><td><textarea class="qty">0</textarea></td><td><span class="price">$0</span></td></tr>');
    if ($(".delete").length > 0) $(".delete").show();
    bind();
  });
  
  bind();
  //CUANDO CAMBIA LA CANTIDAD
        var index = $('#contador').html();
          $('#Detallecompra_Cantidad'+index).change( function() {
          var index = $('#contador').html();
      //    alert(index);
            var j = $('#Detallecompra_Cantidad'+index).val();
            var l = $('#Detallecompra_Descuento'+index).val();
            var m = $('#Detallecompra_Exento'+index).val();
            var i = $('#Detallecompra_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detallecompra_Iva'+index).val(subiva);
//            $('#Detallecompra_Precio'+index).val(preciosiniva);
            $('#Detallecompra_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();
      }); 
      
 //CUANDO CAMBIA EL PRECIO
        var index = $('#contador').html();
            $('#Detallecompra_Precio'+index).change( function() {
            var index = $('#contador').html();
        //    alert(index);
            var j = $('#Detallecompra_Cantidad'+index).val();
            var l = $('#Detallecompra_Descuento'+index).val();
            var m = $('#Detallecompra_Exento'+index).val();
            var i = $('#Detallecompra_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detallecompra_Iva'+index).val(subiva);
            $('#Detallecompra_Precio'+index).val(preciosiniva);
            $('#Detallecompra_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();

        });

//CUANDO CAMBIA EL DESCUENTO
        var index = $('#contador').html();
            $('#Detallecompra_Descuento'+index).change( function() {
            var index = $('#contador').html();
        //    alert(index);
            var j = $('#Detallecompra_Cantidad'+index).val();
            var l = $('#Detallecompra_Descuento'+index).val();
            var m = $('#Detallecompra_Exento'+index).val();
            var i = $('#Detallecompra_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detallecompra_Iva'+index).val(subiva);
            $('#Detallecompra_Precio'+index).val(preciosiniva);
            $('#Detallecompra_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();
        });
        
//CUANDO CAMBIA EL EXENTO
        var index = $('#contador').html();
            $('#Detallecompra_Exento'+index).change( function() {
            var index = $('#contador').html();
        //    alert(index);
            var j = $('#Detallecompra_Cantidad'+index).val();
            var l = $('#Detallecompra_Descuento'+index).val();
            var m = $('#Detallecompra_Exento'+index).val();
            var i = $('#Detallecompra_Precio'+index).val();
            var iva=((parseFloat(i)*19)/100).toFixed(2);
            var preciosiniva= (parseFloat(i)-parseFloat(iva)).toFixed(2);
            var subiva=(parseFloat(iva)*parseFloat(j)).toFixed(2);
            
            var k = ((parseFloat(preciosiniva)*parseFloat(j))-(parseFloat(l)+parseFloat(m))).toFixed(2);
            $('#Detallecompra_Iva'+index).val(subiva);
            $('#Detallecompra_Precio'+index).val(preciosiniva);
            $('#Detallecompra_Subtotal'+index).val(k);
        //    alert(k);
            index = $('#contador').html();
            update_total();

        });

  $(".delete").click(function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  });
  
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });
  
  
});
