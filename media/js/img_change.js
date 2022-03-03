

$(document).ready(function(){


    var characters = [
        {
            name:'Link', 
            information:'They are chosen by the Golden Goddesses to protect the land from evil whenever deemed necessary.', 
        },
        {
            name:'Zelda', 
            information:'She was born with the "power of sacred exorcism," the power that princesses of all time who succeeded the lineage of the Iral royal family naturally gain.', 
        },
        {
            name:'Mipha', 
            information:'Princess of the Zora tribe and had the authority to control the elephant-shaped god, Vah Ruta, among the four gods.', 
        },
        {
            name:'Urbosa', 
            information:'The owner of the camel-type god, Vah Naboris, and a key figure authorized to control.', 
        },
        {
            name:'Rivali', 
            information:'It has the authority to control the new shape of Vah Medoh among the four gods. A Rito man whose whole body is covered with blue feathers.' 
        },
        {
            name:'Daruk', 
            information:'It has the authority to coordinate the new number Vah Rudania in the form of lizards. He is usually cool and calm, but he bravely changes when he goes into battle.', 
        }
      ];
  
  
    $('.characters .charbox img').attr('src','./images/char01_x2.png');
    $('.gallery-thumbs .title').html(characters[0].name);
    $('.gallery-thumbs .main_t').html(characters[0].information);
    $('.characters .gallery-thumbs ul li:eq(0) a').css('filter','grayscale(0)');
      
    $('.characters .gallery-thumbs a').click(function(e){
        e.preventDefault();
      
        var ind = $(this).index('.characters .gallery-thumbs a');
  
        $('.characters .charbox img').attr('src','./images/char0'+(ind+1)+'_x2.png');
  
        $('.gallery-thumbs .title').html(characters[ind].name);
        $('.gallery-thumbs .main_t').html(characters[ind].information);

        $('.characters .gallery-thumbs ul li a').css('filter','grayscale(100%)');
        $('.characters .gallery-thumbs ul li:eq('+ind+') a').css('filter','grayscale(0)');
    });
  });
  
  