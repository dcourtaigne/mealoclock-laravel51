
    //Display desired title
    function setTitle(){
    var modalstate = $(".top").css("display");
      if (modalstate == "none"){
        $(".toggle-button").html("Ou connectez vous");
      } else {
        $(".toggle-button").html("Ou inscrivez vous");
      }
    }
    //Open window
    $(".toggle-button").click(function() {
    $(".top, #mid, #registerform" ).slideToggle(300, function(){});
    setTimeout(setTitle, 400);
    });
    //Display modal
    function overlay(){
    var overlaystate = $("#overlay").css("display");
      if (overlaystate = "none") {
        $("#overlay").css({"display":"initial"})
        }
    };
    //Display desired sections
    $("#login").click(function(){
      $("#overlay").animate({top:'125px'});
      overlay();
    })

    $("#requireLogin button").click(function(){
      $("#overlay").animate({top:'125px'});
      overlay();
    })


    $("#inscription, #open_register_form, #button_inscription_about").click(function(){
      console.log('ok');
      $("#overlay").animate({top:'125px'})
      overlay();
      setTitle();
      $(".top, #mid, #registerform").toggle();
    });
    //Close modal
    $("#button").click(function(){
      $("#overlay").css({"display":"none"})
    })

/*****************GESTION FORMULAIRE INSCRIPTION****************************/
   $('#registerform').submit(function ( e ) { // affectation d'un listener sur l'evenement "submit" du formulaire d'inscription

    e.preventDefault(); // empeche la soumission du formulaire
    var formData = $(this).serialize();// récupère toutes les données du formulaire et les encode au format URL ( chaine de caracteres )
    console.log(formData);
    $.ajax({ // fonction jQuery pour la requete ajax en utilisant la methode HTTP POST
      type: 'POST',
      url: $(this).attr('action'),
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: formData,
      success: function(data){
        console.log('c\'est OK');
        javascript:window.location.reload()
      },
      error: function(data){
        var errors = data.responseJSON;
        console.log(errors);
        $("#errorName").html(errors.name);
        $("#errorEmail").html(errors.email);
        $("#errorPass").html(errors.password);
        $("#errorPassRepeat").html(errors.passwordrepeat);
        $("#errorPassRepeat").html(errors.passwords);
      }
    });
  });

   /*****************GESTION FORMULAIRE Login****************************/

$('#loginform').submit(function ( e ) { // affectation d'un listener sur l'evenement "submit" du formulaire de login
    e.preventDefault();// empeche la soumission du formulaire

    var fromData = $(this).serialize();

    console.log(fromData); // récupère toutes les données du formulaire et les encode au format URL ( chaine de caracteres )
    $.ajax({ // fonction jQuery pour la requete ajax en utilisant la methode HTTP POST
      type: 'POST',
      url: $(this).attr('action'), // recupere l'url de soumission du formulaire
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: fromData, // les données encodées du formulaire
      success:  function(data) {//fonction callback un fois la requête PHP terminée
      console.log('requete OK');//un ptit console.log pour checker les données renvoyées par PHP dans la fonction de callback
      javascript:window.location.reload()//si PHP dit tout est ok (statut = 1) on reload la page courante afin d'afficher logout, le nom de l'utilisateur et autres
      },
      error: function(data){
        var errors = data.responseJSON;
        //console.log(errors.email);
      $("#error").html('');
      jQuery.each(errors, function(i, val){
          $("#error").append("<p>" + val + "</p>")
        })
        //$("#errorEmail").html(errors.email);
        //$("#errorPassword").html(errors.password);
        //$("#error").html(errors.error);
      }
    });
  });

