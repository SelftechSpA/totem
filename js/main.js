$(function(){
    bootbox.setLocale('es');
    
    $('.bt-abandon-test').click(function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Se perderá todo el progreso realizado en este test. ¿Está seguro?", function(result) {    
            if (result) {
                document.location.href = link;
            }    
        });
    });
    
    $('.menu .exit').click(function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("¿Salir e ingresar como un nuevo usuario?", function(result) {    
            if (result) {
                document.location.href = link;
            }    
        });
    });
    
    clickCount = 0;
    $('.menu .logo').click(function(){
       clickCount++; 
       if (clickCount == 5){
           window.close();
       } 
    });
});