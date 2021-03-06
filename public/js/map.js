window.onload = function() {
    function getLocation() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(xhttp.responseText);
                initMap(response.location.lat, response.location.lon);
            }
        };
        xhttp.open("GET", "https://safe-cell.herokuapp.com/api/device/getDeviceLocation/" + appSettings.deviceId, true);
        xhttp.setRequestHeader("Authorization", "Bearer " + appSettings.accesToken);
        xhttp.send();
    }
    getLocation();
    setInterval(getLocation, 15000);

    function initMap(lat, lon) {

            let mapdiv = document.getElementById('map');
            mapdiv.innerHTML = "<iframe src=\"https://maps.google.com/maps?q=" +lat + "," + lon + "&z=15&output=embed\" width=\"100%\" height=\"100%\" frameborder=\"0\" style=\"border:0\"></iframe>";
    }
}