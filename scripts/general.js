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
		for(var i=0;i < errors.length;i++){
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
		$("#videos a").html("<img src='images/videos-24x24-off.png' alt='videos' title='Le centre en images !' />");
		$("#videos a img").hover(
			function(){
				$(this).attr("src","images/videos-24x24-on.png");
			},
			function(){
				$(this).attr("src","images/videos-24x24-off.png");
			}
		);
	}else{
		$("#videos a").html("<img src='images/videos-24x24-on.png' alt='videos' title='Le centre en images !' />");
	}
}

function initGMap() {
	// icon de geolocalisation du local
	//var image = 'img/dog.png';
	
	var posCentreCanin = new google.maps.LatLng(45.267427,5.840107);//coordonnees du centre canin
	var posMapCenter = new google.maps.LatLng(45.225579,5.80616);//coordonnees du centre de la carte
	
	var myOptions = {
		zoom: 11, // zoom
		center: posMapCenter, // centrage de la carte
		mapTypeId: google.maps.MapTypeId.ROADMAP // type de carte
	};
	
	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	
	var marker = new google.maps.Marker({
		position: posCentreCanin,
		map: map,
		//icon: image,
		animation: google.maps.Animation.DROP,
		title: "Centre canin de la Dent de Crolles"
	});
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