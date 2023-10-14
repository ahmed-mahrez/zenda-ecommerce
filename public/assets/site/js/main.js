let alert = document.getElementsByClassName('alert')[0];
if (alert !== undefined) {
    setTimeout(function() {
        alert.style.display = 'none';
    }, 4000);
}