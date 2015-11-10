(function initialisation(){
		$("#enattente").hide();
		$("#organises").hide();
})();


function hideAll(){
	$('#inscriptions, #enattente, #organises').hide();
}
function clearColor(){
	$('#inc, #att, #org').css({"background-color":"white", "color":"black"});
}
function stepone(){
	hideAll();
	clearColor();
}

$('#inc').click(function(){
	stepone();
	$(this).css({"background-color": "#8C091E", "color":"white"})
	$("#inscriptions").show();
})
$('#att').click(function(){
	stepone();
	$(this).css({"background-color": "#8C091E", "color":"white"})
	$("#enattente").show();
})
$('#org').click(function(){
	stepone();
	$(this).css({"background-color": "#8C091E", "color":"white"})
	$("#organises").show();
})
/*Fin script gestion fenetre
Script gestion modale gerer utilisateur*/


$(".fermer_modale").click(function(){
	$(".overlay").toggle();
})


/*function getRequests(id){
	$.get('eventrequests',{'id':id},function(data){
		console.log('ok')
		console.log(data)
		$requestList=$('<div/>');
		for (var i=0; i<data.length ; i++){
		var $eventRequest = $('<div/>');
		$eventRequest.addClass('conteneur_bis');
		$eventRequest.append("<section class='utilisateur'>\
														<div class='alignright'>\
															<div class='image_prenom'>\
																<img src='http://img15.hostingpics.net/pics/740435visage.jpg'>\
																	<h4>"+data[i].user_name+"</h4>\
															</div>\
															<p class='commentaire wide'>" + data[i].message + "</p>")
		$eventRequest.append("<span class='liste'>")
		$eventRequest.append("<ul><li>Confirmer l'inscription</li><li>Refuser l'inscription</li></ul></span></div>")
		$eventRequest.append("<div class='display_bottom_comment'><strong>Afficher son message</strong></div>");

		$eventRequest.append("<p class='commentaire'>"+data[i].message+"<br><div class='display_bottom_profile'><strong>Apercu du profil</strong></div>")
		$eventRequest.append("<article class='profile_preview'><p><strong>Introduction:</strong>"+data[i].user_desc+"</p><span><strong>Repas participes: 8</strong></span>")
		$eventRequest.append("<br><span><strong>Repas organises: 2</strong></span><br><a href='#''>Consulter son profil</a></article></section>");
		$eventRequest.appendTo($requestList);
		}
		$requestList.prepend("<button class='fermer_modale'>X</button>");
		$('.overlay').html($requestList)
  })
}*/



/*$(".confirmer_event").click(function overlaystatus(){
	/*var eventId = $(this).attr('data-id');
	console.log(eventId);
	getRequests(eventId);
    var overlaystate = $(".overlay").css("display")
      if (overlaystate == "none") {
        $(".overlay").css({"display":"block"})
        }
    })*/


