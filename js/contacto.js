$(document).ready(function(){
    $("#contactForm").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            url: "postcontacto.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){
                $("#response").html("<div class='alert alert-success'>"+response+"</div>");
                $("#contactForm").hide(); // Ocultar el formulario después del envío exitoso
            },
            error: function(jqXHR, textStatus, errorThrown){
                $("#response").html("<div class='alert alert-danger'>Error: "+textStatus+"</div>");
            }
        });
    });
});

