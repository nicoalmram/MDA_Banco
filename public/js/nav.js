function equis(x) {
  x.classList.toggle("change");
}

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        penDropdown.classList.remove('show');
      }
    }
  }
}
function logOut(){
  document.getElementById("logged-in").style.visibility = "visible";
  document.getElementById("logged-in").style.display = "block";
  document.getElementById("logged-out").style.visibility = "hidden";
  document.getElementById("logged-out").style.display = "none";
}
function logIn(){
  document.getElementById("logged-out").style.visibility = "visible";
  document.getElementById("logged-out").style.display = "block";
  document.getElementById("logged-in").style.visibility = "hidden";
  document.getElementById("logged-in").style.display = "none";
}