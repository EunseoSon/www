
$(document).ready(function() {

   var smh=$('.visual').height();  //비주얼 이미지의 높이를 리턴한다   900px
   var on_off=false;  //false(안오버)  true(오버)  
   
   
       $('#headerArea').mouseenter(function(){
          var scroll = $(window).scrollTop();
           $(this).css('background','#fff');
           $('.dropdownmenu li a').css('color','#333');
           $('.top_menu a').css('color','#333');
           $('#headerArea .wrap1 h1 a').css('background', 'url(./common/images/header_logo2.png)0 0 no-repeat');
          
           on_off=true;
       });
   
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  //스크롤의 거리
           
           if(scroll>=0 && scroll<smh-180 ){
               $(this).css('background','none').css('border-bottom','none'); 
               $('.dropdownmenu li a').css('color','#fff');
               $('.top_menu a').css('color','#fff');
               $('#headerArea .wrap1 h1 a').css('background', 'url(./common/images/header_logo.png)0 0 no-repeat');
           }else if(scroll>smh-180){
               $(this).css('background','#fff'); 
               $('.dropdownmenu li a').css('color','#333');
               $('.top_menu a').css('color','#333');
               $('#headerArea .wrap1 h1 a').css('background', 'url(./common/images/header_logo2.png)0 0 no-repeat');
               
           }
          on_off=false;    
      });
   
      $(window).on('scroll',function(){//스크롤의 거리가 발생하면
           var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
        //    console.log(scroll);

           if(scroll>smh-180){
               $('#headerArea').css('background','#fff').css('box-shadow','1px 3px 10px 3px rgb(0, 0, 0, .1)');
               $('.dropdownmenu li a').css('color','#333');
               $('.top_menu a').css('color','#333');
               $('#headerArea .wrap1 h1 a').css('background', 'url(./common/images/header_logo2.png)0 0 no-repeat');
               
           }else{//스크롤 내리기 전 디폴트(마우스올리지않음)
              if(on_off==false){
                   $('#headerArea').css('background','none').css('box-shadow','none');
                   $('.dropdownmenu li a').css('color','#fff');
                   $('.top_menu a').css('color','#fff');
                   $('#headerArea .wrap1 h1 a').css('background', 'url(./common/images/header_logo.png)0 0 no-repeat');
              }
           }; 
           
        });

  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:350},'fast').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라
          $('#headerArea').animate({height:180},'fast').clearQueue();
     });
     
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#1462ad');
       },function() {
          $('.depth1',this).css('color','#333');
     });
     

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').slideDown('normal');
        $('#headerArea').animate({height:350},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').slideUp('fast');
        $('#headerArea').animate({height:180},'normal').clearQueue();
    });
});

//상단으로 이동
$('.topMove').hide();
           
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
     var scroll = $(window).scrollTop(); //스크롤의 거리
    
    
     //$('.text').text(scroll);

     if(scroll>500){ //500이상의 거리가 발생되면
         $('.topMove').fadeIn('slow');  //top보여라~~~~
     }else{
         $('.topMove').fadeOut('fast');//top안보여라~~~~
     }
});

 $('.topMove').click(function(e){
    e.preventDefault();
     //상단으로 스르륵 이동합니다.
    $("html,body").stop().animate({"scrollTop":0},1000); 
 });


    $('.footer3 .site_list').hide();
    $('.footer3 .site_open').toggle(function(e){
        e.preventDefault();
        $(this).addClass('on');
        $('.footer3 .site_list').stop().slideDown('fast'); 

    }, function(){
        $(this).removeClass('on');
        $('.footer3 .site_list').stop().slideUp('fast'); 

    $('.footer3 .site_open').on('focus', function(){  
        $(this).addClass('on');
        $('.footer3 .site_list').slideDown('fast');
    });
    $('.footer3 .site_list li:last a').on('blur', function(){
        $(this).parents('.footer3').find('.site_open').removeClass('on'); 
        $('.footer3 .site_list').slideUp('fast');
    });
});
