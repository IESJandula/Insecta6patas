const d = document;
const familias = document.querySelector("#investigar");
const resultado = document.getElementById("respuesta");
const fotoResultado = document.getElementById("fotoRespuesta");

//Función para obtener los datos de las familias que voy a volcar en el select al acceder a la API
const getAll = async () => {
  try {
    let response = await fetch(
      "https://api.gbif.org/v1/species/search?rank=FAMILY&classKey=216&limit=1000"
    );
    //convertimos los datos a json en una función asincrona y no resolvemos hasta que se convierta todo
    json = await response.json();

    if (!response.ok)
      throw { status: response.status, statusText: response.statusText };

    //console.log(json.results); es un objeto que tiene un array llamado results
    //En el forEach filtro por reino animal y clase insecta ya que en la URL al final me vuelca todos los datos independientemente de las variables puestas en ella
    json.results.forEach((element) => {
      if (element.kingdomKey === 1 && element.classKey === 216) {
        //vuelco el resultado a los options que conformaran el select
        var option = document.createElement("option");
        option.value = element.key;
        option.textContent = element.scientificName;
        familias.appendChild(option);
      }
    });
  } catch (error) {
    let message = error.statusText || "Error en la conexión";
    console.log(message);
  }
};

//Función para obtener con la clave de la familia que seleccionamos en el select su información más detallada
const getFamilyInfo = async (familyKey) => {
  //Si tiene algun hijo anterior lo eliminamos para que no se repitan las búsquedas
  if (resultado.hasChildNodes() || fotoResultado.hasChildNodes()) {
    resultado.innerHTML = "";
    fotoResultado.innerHTML = "";
  }

  if (familyKey) {
    //vamos a construir la lista donde se volcaran los datos de la option seleccionada en el select
    var orden = document.createElement("ul");
    resultado.appendChild(orden);

    try {
      let response = await fetch(
        `https://api.gbif.org/v1/species/search?rank=FAMILY&classKey=216&limit=1000`
      );

      json = await response.json();
      console.log(json); //es un objeto que tiene un array llamado results
      if (!response.ok)
        throw { status: response.status, statusText: response.statusText };

      json.results.forEach((element) => {
        if (element.kingdomKey === 1 && element.classKey === 216) {
          if (element.familyKey === parseInt(`${familyKey}`)) {
            var elemento1 = document.createElement("li");
            elemento1.textContent = "Reino: " + element.kingdom;
            orden.appendChild(elemento1);

            var elemento2 = document.createElement("li");
            elemento2.textContent = "Phylum: " + element.phylum;
            orden.appendChild(elemento2);

            var elemento3 = document.createElement("li");
            elemento3.textContent = "Clase: " + element.class;
            orden.appendChild(elemento3);

            var elemento4 = document.createElement("li");
            elemento4.textContent = "Orden: " + element.order;
            orden.appendChild(elemento4);

            var elemento5 = document.createElement("li");
            elemento5.textContent = "Familia: " + element.family;
            orden.appendChild(elemento5);

            var elemento6 = document.createElement("li");
            elemento6.textContent = "Hábitat: " + element.habitats;
            orden.appendChild(elemento6);

            getFamilyImage(familyKey); //obtenemos la foto que corresponde a la clave seleccionada en el select
          }
        }
      });
    } catch (error) {
      let message = error.statusText || "Error en la conexión";
      console.log(message);
    }
  }
};

//Función que obtiene la foto de la opción del select
const getFamilyImage = async (familyKey) => {
  if (familyKey) {
    console.log(familyKey);

    try {
      let response = await fetch(
        `https://api.gbif.org/v1/occurrence/search?limit=1&mediaType=StillImage&taxonKey=${familyKey}`
      );

      json = await response.json();
      console.log(json); //es un objeto que tiene un array llamado results
      if (!response.ok)
        throw { status: response.status, statusText: response.statusText };

      json.results.forEach((element) => {
        if (element.familyKey === parseInt(`${familyKey}`)) {
          console.log(element.media[0]);
          console.log(element.media[0].identifier);
          var imagen = document.createElement("img");
          imagen.src = `${element.media[0].identifier}`;
          var leyenda = document.createElement("figcaption");
          leyenda.textContent = `Licencia: ${element.media[0].license} -  Creador: ${element.media[0].rightsHolder}`;
          fotoResultado.appendChild(imagen);
          fotoResultado.appendChild(leyenda);
        }
      });
    } catch (error) {
      let message = error.statusText || "Error en la conexión";
      console.log(message);
    }
  }
};

//Evento que detecta el cambio de opción en el select y vuelca el valor del nuevo dato a la función getFamilyInfo
familias.addEventListener("change", (event) => {
  const selectedOption = event.target.selectedOptions[0];
  const familyKey = selectedOption.value;

  if (familyKey) {
    getFamilyInfo(familyKey);
  }
});

//Cuando se cargue la página de rellena el select automáticamente con los datos encontrados
d.addEventListener("DOMContentLoaded", getAll);
