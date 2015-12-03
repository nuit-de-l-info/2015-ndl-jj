jQuery(document).ready(function($) {

	var base_url = "http://ninfo.fr/index.php/";
	var theme_url = "http://ninfo.fr/themes/";

	//Initialiation de js Chosen
	$('select.js-chosen').chosen({
		no_results_text: "Oups, aucun résultat !",
		allow_single_deselect: true,
		width: "100%"
	});

	//Script MAP HOMEPAGE
	//Differentes fonctions utilisés pr GM
	function addMarker(marker,info_window) {
	  markers.push({'marker':marker, 'info_window':info_window});
	  google.maps.event.addListener(marker, 'click', function () {
				info_window.open(carte, marker);
		});
	}

	function build_items_map(data){ 

		if(data!=null){
			//création de la fenêtre

			var content_el =  "<a style='text-decoration: none;' href='"+data.url+"'>";
			content_el  += "<h2>";
			content_el += data.name;
			content_el += "</h2>";
			content_el += "<p>";
			content_el += data.description;
			content_el += "</p>";
			content_el += "</a>";

			 var info_window = new google.maps.InfoWindow({
				content: content_el
			 });
			 //création du marker
			 var position = new google.maps.LatLng( data.lat , data.longitude );

			 var marker = new google.maps.Marker({
			  'position' : position,
			  'map' : carte,
			  'icon' : theme_url+'ninfo/img/marker.png',
			  animation: google.maps.Animation.DROP
			  });
			 console.debug(marker);
			  addMarker(marker,info_window);		   
		}
		
	};
	if($('#homepage').length > 0){
		markers = [];
		//Initilisation de la carte
		var position = new google.maps.LatLng(48.858093 , 2.294694 ); //tour effeil
		var optionsCarte = {
			zoom: 7,
			center: position
		}
		carte = new google.maps.Map(document.getElementById("map-home"), optionsCarte);

	
		$('#crises').change(function(){

			for (var i = 0; i < markers.length; i++) {
				markers[i]['marker'].setMap(null);
			}

			var id_crise_to_filter = $('#crises option:selected').val(); //utilisé pour 'tous les lieux' faute de mieux
			if(id_crise_to_filter != -1){
				$.ajax( {
					url:  base_url+"recuperer_crise_par_id/"+id_crise_to_filter,
					type: "post",
					dataType: "json"
				})
				.done(function(data) {
					console.debug(data);
					build_items_map(data);

				}) 
				.fail(function(reponse) {
					console.debug(reponse);
				});  
			}
		});
	}
});
