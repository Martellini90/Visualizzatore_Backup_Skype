$(document).ready(function (){
    //$('.Apri').hide();

    $('.Targhetta').on('click', function(e){
        $(this).siblings('.Apri').slideToggle('slow'); 
    });
    
   /* 
    NON FUNZIONA
    var data = $.getJSON ('backup/04-11-2019.json');
    
    function srotolaJSON (data){
        $.each(data, function(i, obj){ 
            $('ul').append(
                '<li>'+ 
                    obj+
                '</li>'
            );
        });
        
    }*/
})