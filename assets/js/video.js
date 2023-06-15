const subtitulosvideo = new Plyr("#video-metamorfosis");
// Para quitar el atributo tabindex que viene por defecto selecciono los elementos que lo contienen
var videoElement = document.querySelector(".plyr");
var divVideo = document.querySelector("div.plyr__controls");
var botones = document.querySelectorAll("button");
var barras = document.querySelectorAll(".plyr__progress input");
var barraVolumen = document.querySelectorAll(".plyr__volume input");
// Modifico el atributo tabindex en cada uno de ellos para establecer el orden que quiero en mi página web
videoElement.setAttribute("tabindex", 5);
divVideo.setAttribute("tabindex", 5);
botones.forEach(function (boton) {
  boton.setAttribute("tabindex", 5);
});
barras.forEach(function (barra) {
  barra.setAttribute("tabindex", 5);
});
barraVolumen.forEach(function (barra) {
  barra.setAttribute("tabindex", 5);
});
