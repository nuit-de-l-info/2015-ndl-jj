jQuery(document).ready(function($) {
   // On vérifie si le navigateur supporte la géolocalisation

   function geo(position) {
    creerMap(position.coords.latitude, position.coords.longitude);
   }

   if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(geo);
   }
    creerMap(48.858093 , 2.294694);

  function maPosition(latitude, longitude) {
    $('#latitude').val(latitude);
    $('#longitude').val(longitude);
  }

  
  function creerMap(latitude, longitude) {
    // Instanciation
     var point = new google.maps.LatLng(latitude, longitude),
     
     // Ajustage des paramètres
     myOptions = {
      zoom: 15,
      center: point,
      mapTypeId: google.maps.MapTypeId.ROADMAP
     },
     
     // Envoi de la carte dans la div
     googlemap = document.getElementById("googlemap"),
     map = new google.maps.Map(googlemap, myOptions),
     
     marker = new google.maps.Marker({
      position: point,
      map: map,
      // Texte du point
      title: "Vous êtes ici"
      });
     maPosition(latitude, longitude);

     google.maps.event.addListener(map, 'click', function(event) {
            deplacerMarqueur(event.latLng, marker, map);
        });
    }
  
    function deplacerMarqueur(location, marker, map) {
            if (marker == undefined){
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    animation: google.maps.Animation.DROP
                });
            }
            else{
                marker.setPosition(location);
            }
            maPosition(location.lat(), location.lng());
            map.setCenter(location);
  }
});