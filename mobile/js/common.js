$(document).ready(function() {
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)

    $(".menu_open").click(function(e) { //메뉴버튼 클릭시
        e.preventDefault();
       
        var documentHeight =  $(document).height();
        $("#gnb").css('height',documentHeight); // 높이값

        if(op==false){ // 네비가 닫혀있으면 열어라
            $("#gnb").animate({right:0,opacity:1}, 'fast');
            $('#headerArea').addClass('mn_open');
            $('.gnb_bg').fadeIn();
            op=true;
        } else { // 네비가 열려있으면 닫아라
            $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
            $('#headerArea').removeClass('mn_open');
            $('.gnb_bg').fadeOut();
            op=false;
        }

    });
   
   
    //2depth 메뉴 교대로 열기 처리
    var onoff=[false,false,false,false,false,false]; // 각각의 메뉴가 열려있으면 true, 닫혀있으면 false
    var arrcount = onoff.length;

    //console.log(arrcount);

    $('#gnb .depth1 h3 a').click(function(){
        var ind=$(this).parents('.depth1').index();

        //console.log(ind);

        if(onoff[ind]==false){
            //$('#gnb .depth1 ul').hide();
            $(this).parents('.depth1').find('ul').slideDown('fast'); // 클릭 ul 열기
            $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast'); // 클릭 ul 빼고 닫기

            for(var i=0; i<arrcount; i++){
                onoff[i]=false;
            } // 전부 false주고
            onoff[ind]=true; // 나만 true 줘라

            $('.depth1 span').text('+'); // 전부 +
            $(this).find('span').text('-'); // 나만 -

        } else {
            $(this).parents('.depth1').find('ul').slideUp('fast'); // 전부 닫기
            onoff[ind]=false; // 전부 false

            $(this).find('span').text('+'); // 전부 +
        }
    });



    /* family site */
    $('.family .site_open').toggle(function(e){
        e.preventDefault();
        $('.family ul').slideDown();

    }, function(e){
        e.preventDefault();
        $('.family ul').slideUp('fast');
    });


    /* top 버튼 */
    $('.topMove').hide();
           
    $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
        var scroll = $(window).scrollTop(); //스크롤의 거리
    
     //$('.text').text(scroll);

        if(scroll>50){ //50이상의 거리가 발생되면
            $('.topMove').fadeIn('fast');  //top보여라~~~~
        }else{
            $('.topMove').fadeOut('slow');//top안보여라~~~~
        }
    });

    $('.topMove').click(function(e){
        e.preventDefault();
        //상단으로 스르륵 이동합니다.
        $("html,body").stop().animate({"scrollTop":0},1000); 
    });

  
});


