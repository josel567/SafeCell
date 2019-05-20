function checkImei () {

    if(isNaN(document.getElementById('inputImei').value)){
        alert("El IMEI debe ser un número");
        return false;
    }
}