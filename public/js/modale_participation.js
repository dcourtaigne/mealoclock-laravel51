$("#buttonmsg").click(function(){
		$(".overlay").toggle()
})

$(".fermer_modale_p").click(function(event){
    $(".overlay").toggle()
    event.stopPropagation()
})

 $('#participation').submit(function ( e ) { // affectation d'un listener sur l'evenement "submit" du formulaire d'inscription
 	console.log('ok');
    e.preventDefault(); // empeche la soumission du formulaire
    var formData = $(this).serialize();// récupère toutes les données du formulaire et les encode au format URL ( chaine de caracteres )
    // récupère toutes les données du formulaire et les encode au format URL ( chaine de caracteres )
    console.log(formData);

    $.ajax({ // fonction jQuery pour la requete ajax en utilisant la methode HTTP POST
      type: 'POST',
      url: $(this).attr('action'),
      data: formData,
      success: function(data){
        console.log(data);
        javascript:window.location.reload();
      },
      error: function(data){
        var errors = data.responseJSON;
        console.log(errors);
        $("#error").html(errors.message);
      }
    });
  });

$("#cancel").click(function(){
		$(".overlay2").toggle()
})

$(".fermer_modale_2").click(function(event){
    event.stopPropagation()
    $(".overlay2").toggle()
})

$('#annulation').submit(function ( e ) { // affectation d'un listener sur l'evenement "submit" du formulaire d'inscription
 	console.log('ok');
    e.preventDefault(); // empeche la soumission du formulaire
    var formData = $(this).serialize();// récupère toutes les données du formulaire et les encode au format URL ( chaine de caracteres )
    // récupère toutes les données du formulaire et les encode au format URL ( chaine de caracteres )
    console.log(formData);
    
    $.ajax({ // fonction jQuery pour la requete ajax en utilisant la methode HTTP POST
      type: 'POST',
      url: $(this).attr('action'),
      data: formData,
      success: function(data){
        console.log(data);
        javascript:window.location.reload()
      },
      error: function(data){
        var errors = data.responseJSON;
        console.log(errors);
      }
    });
  });
