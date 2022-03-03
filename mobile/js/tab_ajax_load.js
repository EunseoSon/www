

$(function() {                                   

  
    var fragment = $('#content_area #tab li a.current_li').attr('href');   
       
    fragment = fragment.replace('#', ' #');                 
    $('#details').load(fragment); 
       
     $('#content_area #tab li a').on('click', function(e) { 
       e.preventDefault();                                     
       fragment = this.href;                               
   
       fragment = fragment.replace('#', ' #');  
       $('#details').load(fragment);                          
   
       $('#tab a.current').removeClass('current_li');       
       $(this).addClass('current_li');
     });
   
   
   
   });