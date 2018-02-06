(function (window, $) {
	'use strict';

	// Cache document for fast access.
	var document = window.document;


	function mainSlider() {
		$('.bxslider').bxSlider({
			pagerCustom: '#bx-pager',
			mode: 'fade',
			nextText: '',
			prevText: ''
		});
	}

	mainSlider();



	var $links = $(".bx-wrapper .bx-controls-direction a, #bx-pager a");
	$links.click(function(){
	   $(".slider-caption").removeClass('animated fadeInLeft');
	   $(".slider-caption").addClass('animated fadeInLeft');
	});

	$(".bx-controls").addClass('container');
	$(".bx-next").addClass('fa fa-angle-right');
	$(".bx-prev").addClass('fa fa-angle-left');


	$('a.toggle-menu').click(function(){
        $('.responsive .main-menu').toggle();
        return false;
    });

    $('.responsive .main-menu a').click(function(){
        $('.responsive .main-menu').hide();

    });

    $('.main-menu').singlePageNav();
	
//	var dt = window.atob('fCBEZXNpZ246IDxhIHJlbD0ibm9mb2xsb3ciIGhyZWY9Imh0dHA6Ly93d3cudGVtcGxhdGVtby5jb20vdG0tNDAxLXNwcmludCIgdGFyZ2V0PSJfcGFyZW50Ij5TcHJpbnQ8L2E+'); 		// decode the string
//	var div = document.getElementById('copyright');

//	div.innerHTML += dt;


})(window, jQuery);

var map = '';

function initialize() {
    var mapOptions = {
      zoom: 14,
      center: new google.maps.LatLng(40.9816228, -81.37541750000003 )
    };
    map = new google.maps.Map(document.getElementById('map'),  mapOptions);
}

// load google map
var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
        'callback=initialize';
    document.body.appendChild(script);
    
// $('#connect').click(function(){
//     
//           $('#connexionForm').html('<style="border:2px solid #333;position:fixed;top:100px;left:600px;width:6"');
//             
//  });


  
 $('#search').click(function(){
     
           $('.showB').show();
             
  });
  
  
  
  //geocoding
var geocoder = new google.maps.Geocoder();
 var addr, latitude, longitude;
 
 /* Fonction chargée de géolocaliser l'adresse */ 
 function geolocalise(){
  /* Récupération du champ "adresse" */ 
  addr = document.getElementById('adresse').value;
  /* Tentative de géocodage */ 
  geocoder.geocode( { 'address': addr}, function(results, status) {
   /* Si géolocalisation réussie */ 
   if (status == google.maps.GeocoderStatus.OK) {
    /* Récupération des coordonnées */ 
    latitude = results[0].geometry.location.lat();
    longitude = results[0].geometry.location.lng();
    
    /* Appel AJAX pour insertion en BDD */ 
//    var sendAjax = $.ajax({
//     type: "POST",
//     url: 'insert-in-bdd.php',
//     data: 'lat='+latitude+'&lng='+longitude+'&adr='+addr,
//     success: handleResponse
//   
//    });
    }
//   function handleResponse(){
//    $('#answer').get(0).innerHTML = sendAjax.responseText;
//   }
  });
   }
////   <?php
// header('Content-type: text/html; charset=ISO-8859-1');
// if(isset($_POST['lat']) && isset($_POST['lng'])){//
////  $lat = addslashes($_POST['lat']);
////  $lng = addslashes($_POST['lng']);
////  $adr = addslashes($_POST['adr']);
////  $db = mysql_connect(SERVER, USER, PASSWORD);
////  $select = mysql_select_db(DATABASE, $db);
////  mysql_query('INSERT INTO ma_table (lat,lng,adresse)
////               VALUES ("'.$lat.'","'.$lng.'","'.$adr.'")');
////  echo 'Vos coordonnées ont bien été insérées en base de données.';
//// }else
//   echo 'Problème rencontré dans les valeurs passées en paramètres';
//?>