$(document).ready(function() {
    $("#loginForm").on("submit", function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        $.ajax({
            url: "login.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $("#loginResponse").html("<div class='alert alert-success'>" + response + "</div>");
                $("#loginForm")[0].reset();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#loginResponse").html("<div class='alert alert-danger'>Error: " + textStatus + "</div>");
            }
        });
    });
});
