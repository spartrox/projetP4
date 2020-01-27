
/*
$(document).ready(function(){
    
var $carrousel = $('#carrousel'),
    $img = $('#carrousel li img'),
    indexImg = $img.length - 1, 
    i = 0, // on initialise un compteur
    $currentImg = $img.eq(i);

$img.css('display', 'none'); // on cache les images
$currentImg.css('display', 'block'); // on affiche seulement l'image courante

	// Constructor methodes / suivantes avancer reculer/
/*
class Diaporama {
	constructor(){

	}
	avancer(){}
	reculer(){}

}
*/
/*
let idTimeout;

function slideImg(){
   idTimeout = setTimeout(function(){
						
        if(i < indexImg){ 
	    i++; 
	}
	else{ 
	    i = 0;
	}

	$img.css('display', 'none');

	$currentImg = $img.eq(i);
	$currentImg.css('display', 'block');

	slideImg();

    }, 5000); // on définit l'intervalle à 5000 millisecondes
}

slideImg(); // enfin, on lance la fonction une première fois
});

let selected = 0;
let max = $("#carrousel li img").length;

$(document).ready(function(){
	$("#carrousel li img").each(function(i){
		if (i == 0)
			$(this).show();
		else
			$(this).hide();
	});


$("#slider #right").click(function(){
	selected += 1;
	if(selected >= max) selected = 0;

	$("#carrousel li img").hide();
	$("#carrousel li img ").eq(selected).fadeIn(0);
});

$("#slider #left").click(function(){
	selected -= 1	;
	if(selected < 0) selected = max ;

	$("#carrousel li img").hide();
	$("#carrousel li img ").eq(selected).fadeIn(0);
	});
});



$("#stop").click(function(){
	clearTimeout(idTimeout);
	$('#slideImg').stop();
});
*/