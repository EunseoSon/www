$(document).ready(function(){
     
    $('.openBtn').on('click', function(e){
        e.preventDefault();
        
        $(this).next('.open_popup').fadeIn('slow');
        $('.bg_box').show();
    });
   
   $('.closeBtn, .bg_box').on('click', function(e){
        e.preventDefault();

        $('.open_popup').fadeOut('fast');
        $('.bg_box').hide();
   });
});

