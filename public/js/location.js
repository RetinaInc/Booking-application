// Find User Location
function getLocation() {
  alert("Start");
//	var lat = document.getElementById("lat");
//	var lng = document.getElementById("lng");
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition, showError);
    } /*else { 
        lat.value = "Geolocation is not supported by this browser.";
        lng.value = "Geolocation is not supported by this browser.";
    }*/
}
    
function showPosition(position) {
    alert(position.coords.latitude+", "+position.coords.longitude);
    return position.coords.latitude+", "+position.coords.longitude;	
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      document.getElementById("locationinfo").value="User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      document.getElementById("locationinfo").value="Location information is unavailable."
      break;
    case error.TIMEOUT:
      document.getElementById("locationinfo").value="The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      document.getElementById("locationinfo").value="An unknown error occurred."
      break;
    default:
      document.getElementById("locationinfo").value="An unknown error occurred."      
      break;
    }
    alert("Fail");
    return "59.329444, 18.068611";  
}

