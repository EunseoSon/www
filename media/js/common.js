/*모든페이지 공통 js*/ 

$(document).ready(function() {
    var screenHeight = $(window).height();  //스크린의 높이

    $(window).on('scroll',function(){
        let scroll = $(window).scrollTop();
        if (scroll>screenHeight) {
          $('#headerArea').css('background','rgba(0,0,0,.9)');
        } else{
            $('#headerArea').css('background','none');
        }

        if(scroll>500) {
            $('.topMove').fadeIn('slow');
        }else{
            $('.topMove').fadeOut('fast');
        }
    });


    $('.topMove').click(function(e){
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},1000);
    });

    //반응형 네비

    $("#headerArea .menuOpen").toggle(function() {
	    $("#gnb").slideDown('slow');
   }, function() {
	    $("#gnb").slideUp('fast');
   });
   
   
    var current=0;
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 768){
        $("#gnb").show();
		    current=1;
      }
      if(current==1 && screenSize <= 768){
        $("#gnb").hide();
         current=0;
      }
    }); 
    

});