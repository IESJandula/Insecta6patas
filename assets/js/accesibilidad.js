/***********************Funciones de javascript que usaremos modificando el style a través de selectores del DOM y para efectos mas complicados usaremos las funciones y métodos que manipulan la raiz del documento al recoger los datos volcados de estilo al cargarse la página. */

//variable que usaremos para mostrar la caja de accesibilidad
let cajavisible = false;

//Variable usada para ejecutar funciones con opciones
let existen = false;

//FUNCION para MOSTRAR LA CAJA DE ACCESIBILIDAD en función de como esté la caja la mostramos u ocultamos al pulsar el div
function mostrarAccesibilidad1() {
  let caja = document.querySelector("aside");

  if (cajavisible) {
    caja.style.right = "-40vw";
    cajavisible = false;
  } else {
    caja.style.right = "0vw";
    cajavisible = true;
  }
}
//FUNCION para AUMENTAR EL TAMAÑO DE LAS LETRAS actuando sobre el tamaño que recogen las variables del css
function aumentarTletra() {
  let tamanioRoot = getComputedStyle(document.documentElement);
  //obtenemos el valor actual de la variable
  let tneutral = tamanioRoot.getPropertyValue("--font-size-neutral");
  let tprimary = tamanioRoot.getPropertyValue("--font-size-primary");
  let tsecundary = tamanioRoot.getPropertyValue("--font-size-secundary");
  let tthird = tamanioRoot.getPropertyValue("--font-size-third");
  //convertimos ese valor a número
  let tNeutral = parseFloat(tneutral);
  let tPrimary = parseFloat(tprimary);
  let tSecundary = parseFloat(tsecundary);
  let tThird = parseFloat(tthird);
  //aumentamos el valor
  let nNeutral = tNeutral + 0.05;
  let nPrimary = tPrimary + 0.05;
  let nSecundary = tSecundary + 0.05;
  let nThird = tThird + 0.05;
  document.documentElement.style.setProperty(
    "--font-size-neutral",
    nNeutral + "rem"
  );
  document.documentElement.style.setProperty(
    "--font-size-primary",
    nPrimary + "rem"
  );
  document.documentElement.style.setProperty(
    "--font-size-secundary",
    nSecundary + "rem"
  );
  document.documentElement.style.setProperty(
    "--font-size-third",
    nThird + "rem"
  );
}

//FUNCION para DISMINUIR EL TAMAÑO DE LAS LETRAS actuando sobre el valor de las variables del css
function disminuirTletra() {
  /*Uso de la función de javascript getComputedStule para obtener todos los estilos de la hoja una vez cargada la página. Con esto podremos acceder a las variables a través del método getProperyValue y las modificamos en el elemento raiz del html con documentElement aplicando el nuevo estilo con setProperty*/
  let tamanioRoot = getComputedStyle(document.documentElement);
  //obtenemos el valor actual de la variable
  let tneutral = tamanioRoot.getPropertyValue("--font-size-neutral");
  let tprimary = tamanioRoot.getPropertyValue("--font-size-primary");
  let tsecundary = tamanioRoot.getPropertyValue("--font-size-secundary");
  let tthird = tamanioRoot.getPropertyValue("--font-size-third");
  //convertimos ese valor a número
  let tNeutral = parseFloat(tneutral);
  let tPrimary = parseFloat(tprimary);
  let tSecundary = parseFloat(tsecundary);
  let tThird = parseFloat(tthird);
  //aumentamos el valor
  let nNeutral = tNeutral - 0.05;
  let nPrimary = tPrimary - 0.05;
  let nSecundary = tSecundary - 0.05;
  let nThird = tThird - 0.05;
  document.documentElement.style.setProperty(
    "--font-size-neutral",
    nNeutral + "rem"
  );
  document.documentElement.style.setProperty(
    "--font-size-primary",
    nPrimary + "rem"
  );
  document.documentElement.style.setProperty(
    "--font-size-secundary",
    nSecundary + "rem"
  );
  document.documentElement.style.setProperty(
    "--font-size-third",
    nThird + "rem"
  );
}

//FUNCION para cambiar la fuente decorativa a una mas accesible y el resto ya utiliza la del instituto Braille pero la cambiamos también para favorecerles lo mejor posible
function cambiarFuente() {
  if (!existen) {
    document.documentElement.style.setProperty(
      "--font-family-primary",
      "OpenDyslexic"
    );
    document.documentElement.style.setProperty(
      "--font-family-secundary",
      "OpenDyslexic"
    );
    existen = true;
  } else {
    document.documentElement.style.setProperty(
      "--font-family-primary",
      "Atkinson Hyperlegible"
    );
    document.documentElement.style.setProperty(
      "--font-family-secundary",
      "Cinzel Decorative"
    );
    existen = false;
  }
}

//FUNCION para SEÑALAR LOS ENLACES
function senialarEnlaces() {
  let enlaces = document.querySelectorAll("a");
  if (existen) {
    for (let i = 0; i < enlaces.length; i++) {
      enlaces[i].style.textDecoration = "underline";
    }
    //ponemos la variable a true
    existen = false;
  } else {
    for (let i = 0; i < enlaces.length; i++) {
      enlaces[i].style.textDecoration = "none";
    }
    //ponemos la variable a false
    existen = true;
  }
}

//FUNCION para ANULAR ANIMACIONES en concreto todos los movimientos de los círculos y las transiciones de su lado
function anularAnimaciones() {
  let circulos = document.querySelectorAll(".circle");
  let frases = document.querySelectorAll(".bocadillo");
  if (!existen) {
    for (let i = 0; i < circulos.length; i++) {
      circulos[i].style.animation = "none";
    }
    for (let j = 0; j < frases.length; j++) {
      frases[j].style.visibility = "visible";
      frases[j].style.transition = "none";
      frases[j].style.width = "100%";
      frases[j].style.opacity = 1;
    }
    //ponemos la variable a true
    existen = true;
  } else {
    for (let i = 0; i < circulos.length; i++) {
      circulos[i].style.animation = "";
    }
    for (let j = 0; j < frases.length; j++) {
      frases[j].style.visibility = "hidden";
      frases[j].style.transition = "width 4s, opacity 8s";
      frases[j].style.width = 0;
      frases[j].style.opacity = 0;
    }
    //ponemos la variable a false
    existen = false;
  }
  //actuamos si hay hover sobre círculos
  for (let i = 0; i < circulos.length; i++) {
    circulos[i].addEventListener("mouseenter", function () {
      frases[i].style.visibility = "visible";
      frases[i].style.width = "100%";
      frases[i].style.opacity = 1;
    });
  }
}

//FUNCIÓN para ELIMINAR IMÁGENES Y VIDEOS de toda la web

function eliminarImagenes() {
  if (existen) {
    //vamos a capturar las imagenes
    let muestras = document.querySelectorAll("img");
    for (let i = 0; i < muestras.length; i++) {
      muestras[i].style.display = "none";
    }
    //vamos a capturar los videos
    let muestrasv = document.querySelectorAll("video");
    for (let j = 0; j < muestrasv.length; j++) {
      muestrasv[j].style.display = "none";
    }
    //ponemos la variable a true
    existen = false;
  } else {
    let muestras = document.querySelectorAll("img");
    for (let i = 0; i < muestras.length; i++) {
      muestras[i].style.display = "flex";
    }
    //vamos a capturar los videos
    let muestrasv = document.querySelectorAll("video");
    for (let j = 0; j < muestrasv.length; j++) {
      muestrasv[j].style.display = "flex";
    }
    existen = true;
  }
}

//FUNCION para MEJORAR LA NITIDEZ que haremos quitando el efecto shadow que tenemos en la página
function mejorarNitidez() {
  if (!existen) {
    document.documentElement.style.setProperty(
      "--box-shadow",
      "0 0 transparent"
    );

    existen = true;
  } else {
    document.documentElement.style.setProperty(
      "--box-shadow",
      "0.5rem 0.5rem 0.5rem #d6d2d2, -1rem -1rem 1rem #e8e8e8"
    );

    existen = false;
  }
}

//FUNCION para poner el modo CLARO OSCURO en la web
function claroOscuro() {
  if (!existen) {
    //vamos a capturar las variables en el root en vez de ir una a una por elemento
    document.documentElement.style.setProperty("--color", "#1e1c1c");
    document.documentElement.style.setProperty(
      "--background-color-neo",
      "#fcf7f7"
    );
    document.documentElement.style.setProperty(
      "--box-shadow",
      "0.5rem 0.5rem 0.5rem #d6d2d2, -1rem -1rem 1rem #e8e8e8"
    );

    //ponemos la variable a true
    existen = true;
  } else {
    document.documentElement.style.setProperty("--color", "#fcf7f7");
    document.documentElement.style.setProperty(
      "--background-color-neo",
      "#1e1c1c"
    );
    document.documentElement.style.setProperty(
      "--box-shadow",
      "inset 1rem 1rem 2rem #3C3737, inset -1rem -1rem 2rem #1e1c1c"
    );
    existen = false;
  }
}

//FUNCION que al pulsar el botón muestra el aside completamente y te permite salir con y sin foco en el aside. Que conjugado con el css logramos que se desplace

function mostrarAccesibilidad() {
  let ultimoLi = document.querySelector("#volver");
  //para conseguir el valor que tiene de desplazamiento una vez carga la página web
  let caja = document.querySelector("aside");
  let boton = getComputedStyle(caja);
  let desplazamiento = boton.right;
  if (ultimoLi.focus()) {
    let caja = document.querySelector("aside");
    caja.style.right = "-40vw";
    ultimoLi.style.right =
      "-25vw"; /*para devolverlo por si lo hemos activado con el foco*/
    cajavisible = false;
  } else {
    if (desplazamiento == "-40vw") {
      let caja = document.querySelector("aside");
      caja.style.right = "-80vw";
      cajavisible = false;
    } else {
      let caja = document.querySelector("aside");
      caja.style.right = "-40vw";
      cajavisible = false;
    }
  }
}

//Accedemos a todos los eventos que hemos creado
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector(".boton-accesibilidad")
    .addEventListener("click", mostrarAccesibilidad);
  document.getElementById("aumentar").addEventListener("click", aumentarTletra);
  document
    .getElementById("disminuir")
    .addEventListener("click", disminuirTletra);
  document.getElementById("fuente").addEventListener("click", cambiarFuente);
  document.getElementById("enlaces").addEventListener("click", senialarEnlaces);
  document
    .getElementById("animaciones")
    .addEventListener("click", anularAnimaciones);
  document
    .getElementById("imagenes")
    .addEventListener("click", eliminarImagenes);
  document.getElementById("nitidez").addEventListener("click", mejorarNitidez);
  document
    .getElementById("modo-claro-oscuro")
    .addEventListener("click", claroOscuro);
});
