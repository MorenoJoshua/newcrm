function fadeout(){$("#hbbutton").fadeOut(200);}
        $('#hbbutton').hide();
        $('#lightbox').hide();

        $('#closelb').click(function(event) {
          $('#lightbox').fadeOut('slow');
        });

function shlb() {
  $('#lightbox').fadeIn('slow');
}

        $('#hamburger').on('click', function(){
            $('#hbbutton').fadeIn(100);
        });

        $('#hbbutton a').on('click', function(){
          fadeout();
        });
        
        $('#hbbutton').mouseleave(function() {
          fadeout();
        });

        function playfile(recordingfile){
          $('#playhere').html('<audio id="audio" controls="true" autoplay="true"><source src="http://192.168.1.239/RECORDINGS/'+recordingfile+'" type="audio/wav"></audio>')
        }

        function saveanddispo() {
          event.preventDefault();
          leadvalues = $('#leadform').serialize();
          console.log(leadvalues);
          $('#lightbox').fadeIn('slow');
          $.post('dispo.php', leadvalues, function(data) {
            $('#lbhtml').html( data );

          });
        }

        $('#owner1table').hide();
        $('#owner2table').hide();

        $('#leadtab').on('click', function(event) {
          event.preventDefault();
          $('.tabselected').removeClass('tabselected');
          $(this).addClass('tabselected');
          $('#leadtable').show();
          $('#owner1table').hide();
          $('#owner2table').hide();
        });
          
        $('#ownertab01').on('click', function(event) {
          event.preventDefault();
          $('.tabselected').removeClass('tabselected');
          $(this).addClass('tabselected');
          $('#leadtable').hide();
          $('#owner1table').show();
          $('#owner2table').hide();
        });

        $('#ownertab02').on('click', function(event) {
          event.preventDefault();
          $('.tabselected').removeClass('tabselected');
          $(this).addClass('tabselected');
          $('#leadtable').hide();
          $('#owner1table').hide();
          $('#owner2table').show();
        });


$('#addcomment').on('click', function(event) {
  event.preventDefault();
  $(this).attr('disabled', 'true')
  $(this).delay(4000).attr('disabled', 'false');
  newcomment = $('#postcomment').serialize();

  $.post('addcomment.php', newcomment, function(data) {
    /*optional stuff to do after success */
    $('#commentbox').after(data);
  });

});


$('#toolbarsearch').keypress(function(e) {
    if(e.which == 13) {
      phonesearch = $('#toolbarsearch').val();
      window.location.href = "./search.php?phone=" + phonesearch;
    }
});
