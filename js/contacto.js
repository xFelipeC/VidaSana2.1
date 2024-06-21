$(document).ready(function(){
    $("#contactForm").on("submit", function(event){
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        $.ajax({
            url: "postcontacto.php", // URL del script PHP que procesará el formulario
            type: "POST", // Método de envío
            data: $(this).serialize(), // Serializar los datos del formulario
            success: function(response){
                // Mostrar el mensaje de éxito en el div de respuesta
                $("#response").html("<div class='alert alert-success'>" + response + "</div>");
                $("#contactForm").hide(); // Ocultar el formulario después del envío exitoso
            },
            error: function(jqXHR, textStatus, errorThrown){
                // Mostrar el mensaje de error en el div de respuesta
                $("#response").html("<div class='alert alert-danger'>Error: " + textStatus + "</div>");
            }
        });
    });
});


