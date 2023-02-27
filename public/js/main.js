var myText = document.getElementById('forum-description');
var maxLength = 300; // ubah nilai ini sesuai kebutuhan
if (myText.innerHTML.length > maxLength) {
  myText.innerHTML = myText.innerHTML.substring(0, maxLength) + '...';
}

function initMap() {
  let marker;
  let mapElement = document.getElementById('map');
  let latitudeElementVal = parseFloat(document.getElementById('latitude-detail').value);
  let longitudeElementVal = parseFloat(document.getElementById('longitude-detail').value);

  if (latitudeElementVal && longitudeElementVal) {
    let map = new google.maps.Map(mapElement, {
      zoom: 10,
      center: {lat: latitudeElementVal, lng: longitudeElementVal},
    });

    marker = new google.maps.Marker({
      position: {
        lat: latitudeElementVal,
        lng: longitudeElementVal,
      },
      map: map,
      draggable: true,
    });

    marker.addListener('click', function () {
      if (confirm('Apakah Anda ingin membuka lokasi ini di Google Maps ?')) {
        window.open(`https://www.google.com/maps/search/?api=1&query=${latitudeElementVal},${longitudeElementVal}`);
      }
    });
  } else {
    let map = new google.maps.Map(mapElement, {
      zoom: 10,
      center: {lat: -6.1753924, lng: 106.84513},
    });

    map.addListener('click', (event) => {
      const latLng = event.latLng;
      const lat = latLng.lat();
      const lng = latLng.lng();
      // console.log('Latitude: ' + lat + ', Longitude: ' + lng);
      let inputLat = document.getElementById('input-latitude');
      let inputLng = document.getElementById('input-longitude');

      inputLat.value = lat;
      inputLng.value = lng;

      if (marker) {
        marker.setMap(null);
      }

      marker = new google.maps.Marker({
        position: {lat, lng},
        map: map,
        draggable: true,
      });

      marker.addListener('click', function () {
        if (confirm('Apakah Anda ingin membuka lokasi ini di Google Maps ?')) {
          window.open(`https://www.google.com/maps/search/?api=1&query=${lat},${lng}`);
        }
      });

      google.maps.event.addListener(marker, 'dragend');
    });
  }
}
