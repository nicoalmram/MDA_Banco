$( document ).ready(function() {
    $( "#cliente" ).change(function() {
        selected2=$(this).children(":selected").attr("id");
        var data2 ={
            "selected" : selected2
          };
        llamada2(data2);
      });
});

$( document ).ready(function() {
    $( "#cuenta" ).change(function() {
        selected=$(this).children(":selected").attr("id");
        var data ={
            "selected" : selected
          };
        llamada(data);
      });
});

function llamada(data){
    jQuery.ajax({
          type: "POST",
          url: "../php/change_deposit.php",
          type: 'post',
          data: data,
          success: function(e)
          {

              jQuery('#balance').html(e);
              

          }, 
          error: function(data) {
            console.log("Error");

            }

      });
  }

  function llamada2(data2){
    jQuery.ajax({
          type: "POST",
          url: "../php/change_deposit.php",
          type: 'post',
          data: data,
          success: function(e)
          {

              jQuery('#balance').html(e);
              

          }, 
          error: function(data) {
            console.log("Error");

            }

      });
  }