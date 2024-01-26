$(function(){
    $("#miModal").dialog({
            autoOpen: false,
            modal: true,
            buttons: {
              Cerrar: function() {
                $(this).dialog("close");
              }
            },
            close: function(){
              $(this).dialog("close");
            },
            show: {
              effect: "blind", // Puedes personalizar el efecto de apertura del diálogo
              duration: 500
            },
            hide: {
              effect: "blind", // Puedes personalizar el efecto de cierre del diálogo
              duration: 500
            }
        });

    $("#miModal input[type=submit]").css({"margin-top": "5%"});

    $("#miModalRegistro").dialog({
      autoOpen: false,
      modal: true,
      buttons: {
        Cerrar: function() {
          $(this).dialog("close");
        }
      },
      closeText: "",
      show: {
        effect: "blind", // Puedes personalizar el efecto de apertura del diálogo
        duration: 500
      },
      hide: {
        effect: "blind", // Puedes personalizar el efecto de cierre del diálogo
        duration: 500
      },
      close: function(){
        $(this).dialog("close");
      }
    });

    $("#miModalRegistro input[type=submit]").css({"margin-top": "5%"}).on("click",function(ev){
        //ev.preventDefault();
    });

    $("#miModal input[type=submit]").css({"margin-top": "5%"}).on("click",function(ev){
        //alert("Hola");
        //ev.preventDefault();
    });

    
    $("#registrar").on("click",function(ev){
        ev.preventDefault();
        $("#miModalRegistro").dialog("open");
    });

    $("#login").on("click",function(ev){
      ev.preventDefault();
      $("#miModal").dialog("open");
  });

  var errorDiv = $("#error");
  debugger;
  if (errorDiv.html().trim()!==""){
    $("#miModal").dialog("open");
  }else{
    errorDiv.html().trim()="";
    $("#miModal").dialog("close");
  }

  if (errorDiv.html().trim()!==""){
    $("#miModalRegistro").dialog("open");
  }else{
    errorDiv.html().trim()="";
    $("#miModalRegistro").dialog("close");
  }
        



    
})