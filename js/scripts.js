$(document).ready(function(){
    $("#contenido").show();
    $("#portada").show();
    $("#msg").hide();
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#imagen').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#upload").change(function(){
        readURL(this);
        $("#imagenadd").hide();
        $("#upload").hide();
        $("#imagen").show();
        
    });
    
    $("#reset").click(function(){
        $("#imagen").hide();
        $("#imagenadd").show();
        
    });
    
    $("#cambiar").click(function(){
        $("#imagen").hide();
        $("#imagenadd").show();
    });
    
    $("#lista").click(function(){
       location.href="listado.php" 
    });
    
     $("#volver").click(function(){
       location.href="/" 
    });
    
});