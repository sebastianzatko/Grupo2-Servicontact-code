$('.capa-data').hide();
$('.container-data').hide();
$('#loadPhoto').hide();

$('.container-data').css({
    
    bottom: '-750px'
    
});


$('.request').on('click', function(){
    
        $('.capa-data').fadeIn();

        $('.container-data').show();

        $('.container-data').animate({

            bottom: '0px'

        });
})

$('.capa-data').on('click', function(){
    
    $(this).fadeOut();
    
     $('.container-data').animate({

            bottom: '-750px'

        });
    
    
});


$('.perfil-photo').on('click', function(){
    $('#loadPhoto').click();
})



$(function() {
  $('#loadPhoto').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#photoSelect').attr("src",result);
     }
    });