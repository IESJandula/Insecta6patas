const documento = document;
const familia = document.querySelector("#especie");
const resultados = document.getElementById("map");
const ubicacion = document.getElementById("map");
var map; //Si la declaro como const le tengo que dar un valor

//Función para obtener los datos de las familias que voy a volcar en el select
const datos = async () => {
  try {
    let response = await fetch(
      "https://api.gbif.org/v1/species/search?rank=FAMILY&classKey=216&limit=1000"
    );

    json = await response.json();

    if (!response.ok)
      throw { status: response.status, statusText: response.statusText };

    // console.log(json.results);es un objeto que tiene un array llamado results
    //En el forEach filtro por reino animal y clase insecta ya que en la URL al final me vuelca todos los datos independientemente de las variables puestas en ella
    json.results.forEach((element) => {
      if (element.kingdomKey === 1 && element.classKey === 216) {
        console.log(element);
        var option = document.createElement("option");
        option.value = element.key;
        option.textContent = element.scientificName;
        familia.appendChild(option);
      }
    });
  } catch (error) {
    let message = error.statusText || "Error en la conexión";
    console.log(message);
  }
};

//Función para obtener con la clave de la familia que seleccionamos en el select su información más detallada
const datosPosicion = async (familyKey) => {
  //Si tiene algun hijo anterior lo eliminamos para que no se repitan las búsquedas

  if (familyKey) {
    console.log(familyKey);
    if (ubicacion.hasChildNodes()) {
      //Eliminamos el mapa para borrar las coordenadas anteriores
      map.remove();
    }

    try {
      //creamos la variable donde se volcaran los datos de coordenadas
      const coordinates = [];

      // Hacemos la solicitud a la API de GBIF
      fetch(
        `https://api.gbif.org/v1/occurrence/search?familyKey=${familyKey}&hasCoordinate=true&limit=1000`
      )
        .then((response) => response.json())
        .then((data) => {
          // Obtenemos las coordenadas y las metemos en parejas en el array
          console.log(data.results);
          data.results.forEach((record) => {
            const lat = record.decimalLatitude;
            const lon = record.decimalLongitude;

            if (lat && lon) {
              coordinates.push([lat, lon]);
            }
          });

          // Crear un mapa con las coordenadas centrales y para que no se repita pongo preferCanvas
          map = L.map(ubicacion, { preferCanvas: true }).setView([0, 0], 2);

          // Agregar una capa de mapa base
          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
              'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
          }).addTo(map);

          // Agregar marcadores para cada coordenada de los registros de ocurrencia
          coordinates.forEach((coord) => {
            L.marker(coord).addTo(map);
          });
        });
    } catch (error) {
      let message = error.statusText || "Error en la conexión";
      console.log(message);
    }
  }
};

//Evento que detecta el cambio de opción en el select y vuelca el valor del nuevo dato a la función datosPosicion
familia.addEventListener("change", (event) => {
  const selectedOption = event.target.selectedOptions[0];
  const familyKey = selectedOption.value;

  if (familyKey) {
    datosPosicion(familyKey);
  }
});

//Cuando se cargue la página de rellena el select automáticamente con los datos encontrados
d.addEventListener("DOMContentLoaded", datos);
