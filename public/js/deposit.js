$( document ).ready(function() {
  $( "#user" ).change(function() {
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

            //jQuery('#balance').html(e);
            

        }, 
        error: function(data) {
          console.log("Error");

          }

    });
}