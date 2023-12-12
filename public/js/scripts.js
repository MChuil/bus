$(document).ready(function() {
	$('.datepicker').datepicker({
		format: 'dd/mm/yyyy'
	});
});

$("#login-button").click(function(){ 

    username=$("#user").val();
    password=$("#password").val();

    $.ajax({
        type: "POST",
        url: "includes/session.php",
        data: "user="+username+"&pwd="+password,
        success: function(html){

        if(html=='true')    {
             location.reload();    
            }
        else    {
            $("#add_err").show();
            }
        }
    });
    return false;
});

$("#register-button").click(function(){    
    username=$("#regUsername").val();
    name=$("#regName").val();
    movil=$("#regMovil").val();
    email=$("#regEmail").val();
    password=$("#regPass").val();
    
    $.ajax({
        type: "POST",
        url: "includes/crear_usuario.php",
        data: "user="+username+"&name="+name+"&pwd="+password+"&movil="+movil+"&email="+email,
        success: function(html){

        if(html=='true')    {
             window.location = "index.php";				 
            }
        else    {
            $("#add_err").show();
            }
        }
    });
    return false;
});