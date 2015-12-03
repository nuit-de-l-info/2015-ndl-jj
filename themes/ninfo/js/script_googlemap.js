jQuery(document).ready(function($) {
   // On vérifie si le navigateur supporte la géolocalisation
   if(navigator.geolocation) {
    
    function hasPosition(position) {
    // Instanciation
     var point = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
     
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
    }
    navigator.geolocation.getCurrentPosition(hasPosition);
   }
});