function isFormValid(formId){
	var errors = new Array();
	if(!isMailValid($("#email").val())){
		errors.push("L'adresse mail n'est pas valide !");
	}

	if($("#name").val() == ""){
		errors.push("Le nom n'est pas renseign\351 !");
	}

	if($("#message").val() == ""){
		errors.push("Le message est vide !");
	}

	if(errors.length > 0){
		var text = "";
		for ( var i = 0 ; i < errors.length ; i++ ){
			text += errors[i] + "\n";
		}
		alert(text);
	}else{
		$("#" + formId).submit();
	}
}

function isMailValid(mail){
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(mail)){
		return true;
	}else{
		return false;
	}
}

function resizeAside(){
	var height = 0;
	$("article").each(function(index){
		height += $(this).height();
	});
	$("aside").height(height);
}

function initVideoButton(){
	if($("#videos").attr("class") != "on"){
		$("#videos a").html("<img src='static/img/videos-24x24-off.png' alt='videos' title='Le centre en images !' />");
		$("#videos a img").hover(
			function(){
				$(this).attr("src","static/img/videos-24x24-on.png");
			},
			function(){
				$(this).attr("src","static/img/videos-24x24-off.png");
			}
		);
	}else{
		$("#videos a").html("<img src='static/img/videos-24x24-on.png' alt='videos' title='Le centre en images !' />");
	}
}

function initOSMMap(){
	var map = L.map('map').setView([45.225579, 5.80616], 11); // coordonnees du centre de la carte
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);

	L.marker([45.267427, 5.840107]).addTo(map) // coordonnees du centre canin
	    .bindPopup('Centre canin de la Dent de Crolles')
	    .openPopup();
}

function showMailSuccessMessage(){
	alert('Votre message a bien \351t\351 envoy\351.');
}

$(document).ready(function() {

	$("nav ul li").click(function(){
		$("nav ul li").removeAttr("class");
		$(this).attr("class","on");
		window.location.href = $(this).children().first().attr("href");
	});

	$("#form_contact_button").click(function(){
		isFormValid("form_contact");
	});

	resizeAside();
	initVideoButton();

});
