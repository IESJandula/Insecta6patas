<?php
/* Añadimos el acceso al fichero que contiene todas las conexiones a la base de datos de phpmyAdmin */
require_once 'bd.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <!--Introducimos los meta para establecer una mejor SEO-->
        <meta charset="UTF-8" />
        <!--codificación para nuestro idioma con ñ y tildes-->
        <meta name="title" content="Descripción de insectos y clasificación en órdenes | Insecta 6 Patas" />
        <!-- contiene el título que se mostrará en los buscadores que mejora SEO, no superar 70 caracteres-->
        <meta
            name="description"
            content="Descubre cómo son los insectos, su clasificación en órdenes, las partes mas importantes de su cuerpo así como su distribución mundial."
            />
        <!--es el texto que se muestra bajo el título en los motores de búsqueda, se debería hacer una para cada página y no más de 155 caracteres, es 
        lo que llama la atención del usuario para entrar en la página-->
        <meta
            name="keywords"
            content="insectos, entomologia, odonatos, coleopteros, libelulas"
            />
        <!-- palabras clave de búsqueda que usará el navegador-->
        <meta name="author" content="Pilar Benitez" />
        <!-- nombre del autor-->
        <meta name="copyright" content="Pilar Benitez" />
        <!--quien es el propietario-->
        <meta name="robots" content="index, follow" />
        <!--permite a los robots o googlebots buscar la indexacion de la página si es noindex está prohibido que el buscador transfiera contenidos de 
        una página html a su base de datos. Si pones follow permites a los robots recorrer los enlaces de la página y nofollow se lo prohibes y se olvida de mirar los enlaces-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--Ajustar la página a la anchura de pantalla de cualquier dispositivo-->
        <title>Vida de insectos | Insecta 6patas</title>
        <!--Fuente diseñada por el instituto Braille para las lineas de Braille y personas con problemas de visión de Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&family=Cinzel+Decorative:wght@400;700;900&display=swap" rel="stylesheet">
        <!--enlace a la hoja de estilo css-->
        <link rel="stylesheet" href="assets/css/style.css" />
        <!--Enlace a Leaflet y a sus librerías para obtener el mapa-->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css"
            />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>

        <!--Para implementar que el icono de los subtitulos aparezca en la barra de los videos-->
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    </head>
    <body>
        <!--Si los usuarios tiene deshabilitado Javascript lo redireccionamos a esta página que le mostrará contenido obtenido de la base de datos
        relacional con php, el 0 indica que se hará en los 0s tras la recarga de la página-->
        <noscript role="complementary">
        <p>Su navegador no permite usar javascript. Para poder acceder a la información de manera correcta refresque la página.</p>
        <meta http-equiv="refresh" content="0;url='accesible.php'">
        </noscript>
        <header>
            <!--Hay personas que navegan con el teclado y les resulta engorroso los navegadores así los evitamos-->
            <a class="salto-main" href="#salta" id="salto" tabindex="1" aria-label="Si pulsas aquí saltas la navegación principal" aria-controls="salta">Salta la navegación</a>
            <img id="logo" src="assets/images/logo.jpg" aria-hidden="true" aria-label="Logo de la página" alt="logo de la web">
            <!-- Aquí pondremos el navegador principal con los submenús correspondientes y las anclas que lo llevarán por las distintas partes de las 
            páginas en él utilizaremos elementos aria para que el usuario de lector de pantallas se haga una idea de la composición del menú indicándole 
            los elementos escondidos y para que sirven--->
            <nav id="navegador" aria-label="Navegación principal">
                <!--Usamos tabindex para darle un sentido de orden a la hora de tabular por la página y controlar los movimientos ya que sin él no sigue la
                secuencia lógica. Los aria-controls avisan que hay una acción de ancla y el aria-label actua informando que hace el elemento. Con aria-expanded le indicamos que ese listado no está desplegado originalmente y aria-hidden indica que está escondido--->
                <ul>
                    <li>
                        <a href="#descubre_insectos" tabindex="1" aria-controls="descubre_insectos" aria-label="Ir a la seccion descubre" aria-expanded="false">Descubre</a>
                        <ul aria-hidden="true">
                            <li> 
                                <a href="#titulo-cabeza" tabindex="1" aria-controls="titulo-cabeza" aria-label="Ir a la parte de cabeza" aria-expanded="false">Cabeza</a>
                                <ul>
                                    <li> 
                                        <a href="#ojos" tabindex="1" aria-controls="ojos" aria-label="Dentro de la cabeza ver ojos">Ojos</a>
                                    </li>
                                    <li> 
                                        <a href="#aparato_bucal" tabindex="1" aria-controls="aparato_bucal" aria-label="Dentro de la cabeza ver aparato bucal">Aparato Bucal</a>
                                    </li>
                                    <li> 
                                        <a href="#antenas" tabindex="1" aria-controls="antenas" aria-label="Dentro de la cabeza ver antenas">Antenas</a>
                                    </li>
                                </ul>
                            </li>
                            <li> 
                                <a href="#titulo-torax" tabindex="1" aria-controls="titulo-torax" aria-label="Ir a la parte del torax" aria-expanded="false">Torax</a>
                                <ul aria-hidden="true">
                                    <li> 
                                        <a href="#alas" tabindex="1" aria-controls="alas" aria-label="Dentro del torax ver las alas">Alas</a>
                                    </li>
                                    <li> 
                                        <a href="#patas" tabindex="1" aria-controls="patas" aria-label="Dentro de la cabeza ver patas">Patas</a>
                                    </li>
                                </ul>
                            </li>
                            <li> 
                                <a href="#titulo-abdomen" tabindex="1" aria-controls="titulo-abdomen" aria-label="Ir a la parte del abdomen" aria-expanded="false">Abdomen</a>
                                <ul aria-hidden="true">
                                    <li> 
                                        <a href="#forma" tabindex="1" aria-controls="forma" aria-label="Dentro del abdomen ver su clasificación según su forma">Clasificación según su forma</a>
                                    </li>
                                    <li> 
                                        <a href="#cola" tabindex="1" aria-controls="cola" aria-label="Dentro del abdomen ver su clasificación según su cola terminal">Clasificación según su cola terminal</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#metamorfosis_insectos" tabindex="1" aria-controls="metamorfosis_insectos" aria-label="Ir a la seccion metamorfosis" aria-expanded="false">Metamorfosis</a>
                        <ul>
                            <li> 
                                <a href="#tipo_metamorfosis" tabindex="1" aria-controls="tipo_metamorfosis" aria-label="Ir a la clasificación según la metamorfosis que sufren">Clasificación según la metamorfosis que sufren</a>
                            </li>
                            <li> 
                                <a href="#titulo-video" tabindex="1" aria-controls="titulo-video" aria-label="Ir al video de la mariposa monarca">Metamorfosis de la mariposa monarca</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#conoce_insectos" tabindex="1" aria-controls="conoce_insectos"
                           aria-label="Ir a la seccion conoce">Conoce</a></li>
                    <li><a href="#identifica_insectos" tabindex="1" aria-controls="identifica_insectos"
                           aria-label="Ir a la seccion identifica">Identifica</a></li>
                    <li><a href="#localiza_insectos" tabindex="1" aria-controls="localiza_insectos"
                           aria-label="Ir a la seccion localiza">Localiza</a></li>
                    <li><a href="#informacion_contacto" tabindex="1" aria-controls="informacion_contacto"
                           aria-label="Ir a la seccion Contacto">Contacto</a></li>
                </ul>
            </nav>
        </header>
        <main id="salta" aria-label="Contenido principal">
            <!--Estableceremos un menu navegador de accesibilidad que mantendremos fijo en el lateral derecho de la pantalla con un botón visible 
            para acceder a él cada vez que queramos-->
            <aside class="contenedor-accesibilidad">
                <div class="boton-accesibilidad"  role="button"
                     aria-expanded="false"
                     aria-label="Abrir herramientas de accesibilidad">
                    <a tabindex="1"><span class="oculto" aria-hidden="true">Abrir herramientas de accesibilidad</span></a>
                </div>
                <!--Los tabindex los ponemos en secuencia para que dentre a continuación del otro navegador y no impiden que se navegue por el al tabular.
                Los role indica al lector de pantallas que se trata de un botón y con aria-label explica que hace-->
                <nav class="navegador-accesibilidad" aria-label="Herramientas de accesibilidad" aria-hidden="true">
                    <p>Herramientas de accesibilidad</p>
                    <ul>
                        <li><a href="#" id="aumentar" tabindex="1" role="button" aria-label="Pulsando aqui aumentas el tamaño de las letras">Aumentar tamaño de letra</a></li>
                        <li><a href="#" id="disminuir" tabindex="1" role="button" aria-label="Pulsando aqui disminuyes el tamaño de las letras">Disminuir tamaño de letra</a></li>
                        <li><a href="#" id="fuente" tabindex="1" role="button" aria-label="Pulsando aqui cambias a letra para dislexicos">Cambiar fuente para dislexia</a></li>
                        <li><a href="#" id="enlaces" tabindex="1" role="button" aria-label="Pulsando aqui señalas los enlaces">Señalar enlaces</a></li>
                        <li><a href="#" id="animaciones" tabindex="1" role="button" aria-label="Pulsando aqui anulas las animaciones">Anular animaciones</a></li>
                        <li><a href="#" id="imagenes" tabindex="1" role="button" aria-label="Pulsando aqui anulas las imagenes y los videos">Anular imagenes y videos</a></li>
                        <li><a href="#" id="nitidez" tabindex="1" role="button" aria-label="Pulsando aqui mejoras la nitidez">Mejorar nitidez</a></li>
                        <li><a href="#" id="modo-claro-oscuro" tabindex="1" role="button" aria-label="Pulsando aqui cambias entre tema claro y oscuro">Modo claro-oscuro</a></li>
                        <li><a href="#salto" id="volver" tabindex="0" aria-controls="salto"
                               aria-label="Pulsando aqui vuelves al navegador">Volver al navegador</a></li>
                    </ul>
                </nav>
            </aside>
            <!--El role presentation nos indica que presenta un componente meramente decorativo y no hay que hacerle caso-->
            <section class="primero">
                <h1 id="video-mantis" aria-label="Insectos" aria-level="1">INSECTOS</h1>
                <!--Video que mantendremos fijo en el fondo y para que el lector de pantalla lo ignore porque no tiene sonido ni descripción le ponemos
                aria-hidden igual a true-->
               <video role="presentation" id="v-background" playsinline autoplay muted loop aria-hidden="true" aria-label='Video en el que se ve a una mantis limpiandose las patas en bucle'>
                    <source src="assets/video/mantis.mp4" type="video/mp4" />
                    <source src="assets/video/mantis.webm" type="video/webm" />
                     <!-- Si no ve ninguna extensión de video entonces mostramos este mensaje para alertar al lector de pantalla de la situación-->
                    <p>Tu navegador no implementa el elemento video.</p>
                </video>
                
            </section>
            <!--Esta estructura es la que tiene la animación del círculo que hace mención a cada parte de los temas con su explicación 
            de los mismos, por lo que se va a repetir antes de profundizar y mostrar la información principal siempre. Aria-labelledby 
            relaciona con un título el contenido-->
            <section class="insectos-container title-descubre">
                <article class="circle" aria-labelledby="descubre">
                    <!--Un div será para hacer el círculo y el otro para contener el título dentro de él-->
                    <div class="circle" tabindex="2"></div>
                    <div class="title-circle">
                        <h2 aria-level="2" id="descubre">Descubre</h2>
                    </div>
                </article>
                <!--En este article colocaremos la descripción del tema que estará oculto hasta que se haga hover sobre el círculo-->
                <article class="bocadillo color" aria-labelledby="frase-descubre">
                    <p id="frase-descubre">
                        Un insecto es un artrópodo invertebrado que tiene un cuerpo dividido
                        en tres partes (cabeza, tórax y abdomen), seis patas y dos pares de
                        alas (en algunos casos)
                    </p>
                </article>
            </section>
            <!--Una vez acabada la introducción con la animación pasamos a mostrar la información estructurada con encabezados,p y luego las figure que 
            contendran la imagen con su explicación. Esta estructura se repetirá para cada parte-->
            <section class="descubre container-card" id="descubre_insectos">
                <!--La etiqueta div no tiene ningún valor semántico que pueda reconocer el lector de pantalla por lo que le damos un role-aria para indicar
                que función desempeña para que el usuario se haga un esquema mental de la página-->
                <div role="group" aria-label="Partes del cuerpo de un insecto">
                    <!--Asociamos con un aria labelledby o aria describedby aquellas partes que le dan un sentido de explicación más produnda al usuario del
                    lector de pantalla. El aria label es similar al alt de las imágenes-->
                    <article class='card' aria-labelledby="titulo-cabeza" aria-describedby="descripcion-cabeza">
                        <h2 tabindex="2" id="titulo-cabeza" aria-label="Cabeza" aria-level="2">CABEZA</h2>
                        <p id="descripcion-cabeza">En la cabeza se encuentran las antenas, los ojos y el aparato bucal. Las antenas son un par de órganos localizados normalmente entre los ojos. Son segmentadas, teniendo como mínimo 3 partes. Las antenas son utilizadas para percibir sensaciones táctiles, como órganos olfatorios o como órganos auditivos, dependiendo del tipo de insecto. Estas antenas pueden ser de forma y tamaño variable</p>
                        <h3 tabindex="2" aria-label="Ojos" aria-level="3" id="ojos">Ojos</h3>
                        <p>
                            Los insectos tienen una visión panorámica gracias a sus ojos y pueden detectar movimientos muy rápidos gracias a ellos. Son capaces de ver colores fuera de  nuestro espectro y captar detalles minúsculos en su entorno.
                        </p>
                        <!--Al inicio de la página hemos importada el fichero bd.php que nos ofrece el contenido de acceso a la base de datos. 
                        Con esas conexiones vamos a obtener las distintas partes de información que nos mostrará la base de datos relacional así como
                        de las tablas guardadas en ella y que tienen meramente información suelta. Usaremos el php para colocar en el punto exacto la 
                        información que tenemos. En el resto de la estructura mantenemos el html-->
                        <?php
                        $cabeza = datos_cuerpo('cabeza');
                        if ($cabeza == false) {
                            ?>
                            <!--Si hubiera fallo de conexión saldría esta frase-->
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información de los ojos accediendo a las características específicas que queremos mostrar 
                             * y volcándolas en una variable que luego en el bucle irá dando forma a figure y su contenido con todos los datos obtenidos */
                            foreach ($cabeza as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'ojos') {
                                    ?>
                                    <!--Es muy importante dejar información sobre la imagen tanto por si no se descargar como si alguien usa un lector de pantalla. 
                                    Por lo tanto usamos el alt y el aria-label-->
                                    <figure  tabindex="2" aria-labelledby='titulo-ojos-<?= $contador ?>'  aria-describedby='descripcion-ojos-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de un insecto con <?= $nombre ?>' aria-label='Fotografía de un insecto con <?= $nombre ?>' >
                                        <figcaption id="descripcion-ojos-<?= $contador ?>">
                                            <span id="titulo-ojos-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
                                    <?php
                                    //incrementamos el contador
                                    $contador++;
                                }
                            }
                        }
                        ?>
                        <h3 tabindex="2" aria-label="Aparato Bucal" aria-level="3" id="aparato_bucal">Aparato bucal</h3>
                        <p>
                            Según la posición de las piezas bucales en la cabeza se pueden clasificar en 3 grupos: <pan>hipognatos</pan> (hacia abajo), <span>prognatos</span> (hacia adelante) y <span>opistognatos</span> (hacia atrás).</p>
                        <!--Ya a partir de aquí usaremos la funcion datos_cuerpo de manera que obtendremos los datos de cada parte del cuerpo al introducirlo como
                        parámetro en ella y luego con un foreach y la definición de variables que recogen la información específica que queremos hacemos el volcado.
                        Con esta función actuaremos igual en todas las partes del cuerpo. Además añadiremos un control con el if else por si hay problemas de conexión que nos lo indique.-->
                        <?php
                        $cabeza = datos_cuerpo('cabeza');
                        if ($cabeza == false) {
                            ?>
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información del aparato bucal especificando ya la categoría que queremos */
                            foreach ($cabeza as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'aparato_bucal') {
                                    ?>
                                    <figure  tabindex="2" aria-labelledby='titulo-boca-<?= $contador ?>'  aria-describedby='descripcion-boca-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de un insecto con aparato bucal  <?= $nombre ?>' aria-label='Fotografía de un insecto con aparato bucal  <?= $nombre ?>'>
                                        <figcaption  id="descripcion-boca-<?= $contador ?>">
                                            <span id="titulo-boca-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
            <?php
            //incrementamos el contador
            $contador++;
        }
    }
}
?>
                        <h3 tabindex="2" aria-level="3" aria-label="Antenas" id="antenas">Antenas</h3>
                        <p>
                            Son elementos móviles, localizados en la cabeza, delante de los ojos o entre los mismos, formados por varias piezas en las cuales residen las funciones del tacto u olfato. El número de piezas, su forma y largo se utilizan para diferenciar a las distintas especies. Podemos clasificar las alas de la siguiente manera:
                        </p>
<?php
$cabeza = datos_cuerpo('cabeza');
if ($cabeza == false) {
    ?>
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información de las antenas */
                            foreach ($cabeza as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'antenas') {
                                    ?>
                                    <figure  tabindex="2" aria-labelledby='titulo-antenas-<?= $contador ?>'  aria-describedby='descripcion-antenas-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de un insecto con antena <?= $nombre ?>' aria-label='Fotografía de un insecto con antena <?= $nombre ?>'>
                                        <figcaption  id="descripcion-antenas-<?= $contador ?>">
                                            <span  id="titulo-antenas-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
            <?php
            //incrementamos el contador
            $contador++;
        }
    }
}
?>
                        <a class="subir" href="#salto" tabindex="2" aria-controls="salto"
                           aria-label="Ir al navegador">Ir al navegador</a>
                    </article>
                    <article class="card" aria-labelledby="titulo-torax"
                             aria-describedby="descripcion-torax">
                        <h2 tabindex="3" id="titulo-torax"
                            aria-label="Torax"
                            aria-level="2">Tórax</h2>
                        <p id="descripcion-torax">
                            El tórax está compuesto por tres zonas segmentadas:
                            <span>protórax, mesotórax y metatórax</span>. Es importante porque sostienen los elementos motrices como <span>patas</span> y
                            <span>alas</span>; de cada segmento nace un par de patas.
                        </p>
                        <h3 tabindex="3" aria-label="Alas" aria-level="3" id="alas">Alas</h3>
                        <p>
                            Los insectos son los únicos invertebrados con alas presentado dos, cuatro o estar ausentes. Están situadas en los últimos segmentos del tórax. Si los insectos pueden plegar las alas sobre el cuerpo al estar posados , se les denomina <span>neópteros</span> (más evolucionados, pueden
                            plegar las alas)  y si no es así son <span>paleópteros</span> (incapaces de plegar las
                            alas sobre el cuerpo, como las libélulas).
                        </p>
<?php
$torax = datos_cuerpo('torax');
if ($torax == false) {
    ?>
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información de las alas */
                            foreach ($torax as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'alas') {
                                    ?>
                                    <figure tabindex="3" aria-labelledby='titulo-alas-<?= $contador ?>'  aria-describedby='descripcion-alas-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de la parte del cuerpo llamada <?= $nombre ?>' aria-label='Fotografía de la parte del cuerpo llamada <?= $nombre ?>'>
                                        <figcaption id="descripcion-alas-<?= $contador ?>">
                                            <span  id="titulo-alas-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
            <?php
            //incrementamos el contador
            $contador++;
        }
    }
}
?>
                        <h3 tabindex="3" aria-label="Patas" aria-level="3" id="patas">Patas</h3>
                        <p>
                            Las patas están formadas por distintos segmentos llamados: <span>Coxa</span> (primer segmento que se une al tórax), <span>Trocánter</span>  (segundo segmento que articula con el primero y que está unida al fémur,
                            <span>Fémur </span>(suele ser el segmento mas largo de la pata, como en los insectos adaptados para el salto),

                            <span>Tibia</span> (que puede ser tan largo como el fémur)
                            <span>Tarso</span> (segmento compuesto por varias piezas llamadas artejos, teniendo este último artejo llamado <span>pretarso</span> un par de uñas).
                        </p>
<?php
$torax = datos_cuerpo('torax');
if ($torax == false) {
    ?>
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información de las patas */
                            foreach ($torax as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'patas') {
                                    ?>
                                    <figure tabindex="3" aria-labelledby='titulo-patas-<?= $contador ?>'  aria-describedby='descripcion-patas-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de un insecto con <?= $nombre ?>' aria-label='Fotografía de un insecto con <?= $nombre ?>'>
                                        <figcaption id="descripcion-patas-<?= $contador ?>">
                                            <span id="titulo-patas-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
            <?php
            //incrementamos el contador
            $contador++;
        }
    }
}
?>
                        <a class="subir" href="#salto" tabindex="3" aria-controls="salto"
                           aria-label="Ir al navegador">Ir al navegador</a>
                    </article>
                    <article class="card" aria-labelledby="titulo-abdomen"
                             aria-describedby="descripcion-abdomen">
                        <h2 tabindex="4" id="titulo-abdomen"
                            aria-label="Abdomen"
                            aria-level="2">Abdomen</h2>
                        <p id="descripcion-abdomen">
                            El abdomen de los adultos suele estar formado por once segmentos, estando los últimos modificados para formar los órganos sexuales externos
                        </p>
                        <h3 tabindex="4" aria-label="Clasificación según su forma"
                            aria-level="3" id="forma">Clasificación según su forma</h3>
                        <p>
                            El abdomen de los insectos puede ser <span>globoso</span> o
                            <span>alargado</span>,observándose claramente la segmentación diferenciada 
                        </p>
<?php
$abdomen = datos_cuerpo('abdomen');
if ($abdomen == false) {
    ?>
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información de su forma */
                            foreach ($abdomen as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'forma') {
                                    ?>
                                    <figure tabindex="4" aria-labelledby='titulo-forma-<?= $contador ?>'  aria-describedby='descripcion-forma-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de insecto con  <?= $nombre ?>' aria-label='Fotografía de insecto con  <?= $nombre ?>'>
                                        <figcaption id="descripcion-forma-<?= $contador ?>">
                                            <span id="titulo-forma-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
            <?php
            //incrementamos el contador
            $contador++;
        }
    }
}
?>
                        <h3 tabindex="4" aria-label="Clasificación según su cola terminal"
                            aria-level="3" id="cola">Clasificación según su cola terminal</h3>
                        <p>
                            Aunque carece de patas, puede presentar una especie de piezas
                            en las colas terminales llamadas <span>cercos,</span> a veces terminados
                            en <span>pinzas</span>. También se pueden observar en algunas especies los
                            <span>apéndices sexuales</span>, como puede ser el apéndice ovopositor de algunas hembras.
                        </p>
<?php
$abdomen = datos_cuerpo('abdomen');
if ($abdomen == false) {
    ?>
                            <p class='error'>Error al conectar con la base datos</p>
                            <?php
                        } else {
                            //crearemos un contador para formar los id
                            $contador = 1;
                            /* vamos a obtener la información de su cola */
                            foreach ($abdomen as $parte) {
                                $ruta = $parte['ruta'];
                                $categoria = $parte['nombre_categoria'];
                                $descripcion = $parte['descripcion'];
                                $nombre = $parte['nombre'];
                                if ($categoria == 'cola') {
                                    ?>
                                    <figure tabindex="4" aria-labelledby='titulo-cola-<?= $contador ?>'  aria-describedby='descripcion-cola-<?= $contador ?>'>
                                        <img src='<?= $ruta ?>' alt='Fotografía de la parte terminal del cuerpo  <?= $nombre ?>' aria-label='Fotografía de la parte terminal del cuerpo  <?= $nombre ?>'>
                                        <figcaption id="descripcion-cola-<?= $contador ?>">
                                            <span id="titulo-cola-<?= $contador ?>"><?= $nombre ?>: </span><?= $descripcion ?>
                                        </figcaption>
                                    </figure>
                                    <?php
                                    //incrementamos el contador
                                    $contador++;
                                }
                            }
                        }
                        ?>
                        <a class="subir" href="#salto" tabindex="4" aria-controls="salto"
                           aria-label="Ir al navegador">Ir al navegador</a>
                    </article>
                </div>
            </section>
            <section class="insectos-container title-metamorfosis">
                <article class="circle" aria-labelledby="metamorfosis">
                    <div class="circle" tabindex="5"></div>
                    <div class="title-circle">
                        <h2 aria-label="Metamorfosis" aria-level="2" id="metamorfosis" >Metamorfosis</h2>
                    </div>
                </article>
                <article class="bocadillo color" aria-labelledby="frase-metamorfosis">
                    <p id="frase-metamorfosis">
                        Otra característica de los insectos es que realizan la metamorfosis,
                        es decir, una transición entre la forma juvenil y la forma adulta a
                        lo largo de la vida del insecto.
                    </p>

                </article>
            </section>
            <section class="metamorfosis" id="metamorfosis_insectos">
                <article class="met-1 card" aria-labelledby="titulo-metamorfosis"
                         aria-describedby="descripcion-metamorfosis">
                    <h2 tabindex="5" aria-label="La Metamorfosis"
                        aria-level="2"
                        id="titulo-metamorfosis">La Metamorfosis</h2>
                    <p id="descripcion-metamorfosis">
                        Es un proceso de transformación corporal que experimentan durante su ciclo de vida, que suelen incluir cambios radicales en su apariencia, comportamiento y función, a medida que pasan por diferentes etapas
                        de desarrollo, desde su inicio (huevo) hasta su etapa de mayor madurez (adulto)
                    </p>
                    <h3 tabindex="5" aria-label="Clasificación la metamorfosis que sufren"
                        aria-level="3" id="tipo_metamorfosis">Clasificación según la metamorfosis que sufren</h3>
                    <p>
                        Los insectos se pueden clasificar en tres grupos en función de
                        cómo se realice esta transformación. <span>Insectos ametábolos</span>
                        (no sufren metamorfosis), <span>insectos hemimetábolos</span> (sufren cambios graduales de algunas partes) e <span>insectos holometábolos</span>  (que sufren una metamorfosis completa).
                    </p>
<?php
$metamorfosis = datos_tabla('metamorfosis');

if ($metamorfosis == false) {
    ?>
                        <p class='error'>Error al conectar con la base datos</p>
                        <?php
                    } else {
                        //crearemos un contador para formar los id
                        $contador = 1;
                        /* vamos a obtener la información de la tabla metamorfosis */
                        foreach ($metamorfosis as $parte) {

                            $ru = $parte['i_metamorfosis'];
                            $de = $parte['d_metamorfosis'];
                            $no = $parte['p_metamorfosis'];
                            ?>
                            <figure tabindex="5" aria-labelledby='titulo-metamorfosis-<?= $contador ?>'  aria-describedby='descripcion-metamorfosis-<?= $contador ?>'>
                                <img src='<?= $ru ?>' alt='Fotografía de la parte del cuerpo de los <?= $no ?>' aria-label='Fotografía de la parte del cuerpo de los <?= $no ?>'>
                                <figcaption id="descripcion-metamorfosis-<?= $contador ?>">
                                    <span id="titulo-metamorfosis-<?= $contador ?>"><?= $no ?> </span><?= $de ?>
                                </figcaption>
                            </figure>
                            <?php
                            //incrementamos el contador
                            $contador++;
                        }
                    }
                    ?>
                    <!--Colocamos un acceso que se muestra con el tabulador para que suba a la barra de navegación-->
                    <a class="subir" href="#salto" tabindex="5" aria-controls="salto"
                       aria-label="Ir al navegador">Ir al navegador</a>
                </article>
                <article class="met-2 card" aria-labelledby="titulo-video"
                         aria-describedby="descripcion-video">
                    <h3  aria-label="Metamorfosis de la mariposa monarca"
                         aria-level="3"
                         id="titulo-video" tabindex="5">Metamorfosis de la mariposa Monarca</h3>
                    <!--Para evitar que vea el video le damos la opción de que se salte a la siguiente sección-->
                    <a class="bajar" href="#titulo-orden" tabindex='5' aria-controls="titulo-orden"            
                       aria-label="Saltar a la sección de órdenes">Saltar a sección Órdenes</a>
                    <video id="video-metamorfosis" controls tabindex="5">
<?php
$video = datos_tabla('videos');
if ($video == false) {
    ?>
                            <p class='error'>Error al conectar con la base datos</p>
    <?php
} else {
    /* vamos a obtener la información de la tabla metamorfosis */
    foreach ($video as $parte) {
        $nombre = $parte['p_video'];
        $ruta = $parte['i_video'];
        if ($nombre == 'video2') {
            ?>
                                    <source
                                        src='<?= $ruta ?>' type="video/mp4"/>
                                    <?php
                                }
                                if ($nombre == 'subtitulos2') {
                                    ?>
                                    <track kind="subtitles" src='<?= $ruta ?>' srclang="es" label="Subtitulos del video de la mariposa monarca" default  id="descripcion-video"/>
                                    <?php
                                }
                            }
                        }
                        ?>
                        <p>Si estas viendo esto tu navegador no soporta este video.</p>
                    </video>
                    <a class="subir" href="#salto" tabindex="5" aria-controls="salto"
                       aria-label="Ir al navegador">Ir al navegador</a>
                </article>
            </section>

            <section class="insectos-container title-conoce">
                <article class="circle" aria-labelledby="conoce">
                    <div class="circle" tabindex="6"></div>
                    <div class="title-circle">
                        <h2 id="conoce" >Conoce</h2>
                    </div>
                </article>
                <article class="bocadillo color" aria-labelledby="frase-conoce">
                    <p id="frase-conoce">
                        Los insectos se dividen en más de 30 órdenes taxonómicas diferentes
                        e incluyen más de un millón de especies conocidas
                    </p>
                </article>
            </section>
            <section class="conoce" id="conoce_insectos">

<?php
$ordenes = datos_tabla('ordenes');
if ($ordenes === false) {
    ?>
                    <p class='error'>Error al conectar con la base datos</p>
    <?php
} else {
    ?>

                    <article  aria-labelledby="titulo-orden" aria-describedby="descripcion-orden"> 
                        <h2 tabindex="6" id="titulo-orden"
                            aria-label="Orden de insectos"
                            aria-level="2">Clasificación de los insectos</h2>
                        <p id="descripcion-orden">
                            La siguiente galería muestra información de los principales órdenes
                            de insectos
                        </p>
                        <!--Por si no quiere meterse en el grid galleria le damos la opción de saltar a la siguiente opción-->
                        <a class="bajar" href="#titulo-busqueda" tabindex='6' aria-controls="titulo-busqueda"            
                           aria-label="Saltar a la sección identifica">Saltar a la sección Identifica</a>
                        <div role="group" aria-label="Ordenes mas importantes de insectos">
    <?php
    foreach ($ordenes as $orden) {
        $nombre = $orden['n_orden'];
        $numero = $orden['id_orden'];
        $descripcion = $orden['d_orden'];
        ?>
                                <figure id='orden-<?= $numero ?>' tabindex='6'>
                                    <img src='assets/images/<?= $nombre ?>.jpg' alt='Fotografía del insecto <?= $nombre ?>' aria-label='Fotografía del insecto <?= $nombre ?>' class='imagen-insecto'>
                                    <figcaption><?= $nombre ?></figcaption>
                                    <p class='description' title='Descripción del orden <?= $nombre ?>'><?= $descripcion ?></p>
                                </figure>
                                <?php
                            }
                            ?>
                            <a class="subir" href="#salto" tabindex='6' aria-controls="salto"

                               aria-label="Ir al navegador">Ir al navegador</a>
                        </div>
                    </article>
                            <?php
                        }
                        ?>

            </section>
            <section class="insectos-container title-identifica">
                <article class="circle" aria-labelledby="identifica">
                    <div class="circle" tabindex="7"></div>
                    <div class="title-circle">
                        <h2 id="identifica">Identifica</h2>
                    </div>
                </article>
                <article class="bocadillo color" aria-labelledby="frase-identifica">
                    <p id="frase-identifica">
                        Para identificar un insecto se puede observar sus características
                        morfológicas así como su comportamiento, hábitat y ciclo de vida.
                    </p>
                </article>
            </section>
            <section class="identifica" id="identifica_insectos">
                <article class="mosca" aria-label="imagen de una mosca">
                    <figure>
                        <img
                            src="assets/images/insectotransp.png"
                            alt="Imagen de una mosca"
                            aria-label="imagen de una mosca"
                            />
                    </figure>
                </article>
                <article class="busqueda " aria-labelledby="titulo-busqueda"
                         aria-describedby="descripcion-busqueda" aria-live='polite'>
                    <h2 id="titulo-busqueda">¿QUÉ ES?</h2>
                    <label for="investigar" id="descripcion-busqueda"
                           >Selecciona la familia para saber más:</label
                    >
                    <select name="investigar" id="investigar" tabindex="7" aria-label="Selector para escoger una orden de insecto"
                            aria-describedby="descripcion-busqueda"></select>                    
                    <span id="respuesta"></span>
                    <figure id="fotoRespuesta"></figure>
                    <a class="subir" href="#salto" tabindex='7' aria-controls="salto"
                       aria-label="Ir al navegador">Ir al navegador</a>
                </article>
            </section>
            <section class="insectos-container title-localiza">
                <article class="circle" aria-labelledby="localiza">
                    <div class="circle" tabindex="8"></div>
                    <div class="title-circle">
                        <h2 aria-label="Localiza" aria-level="2" id="localiza">Localiza</h2>
                    </div>
                </article>
                <article class="bocadillo color" aria-labelledby="frase-localiza">
                    <p id="frase-localiza">
                        Viven en prácticamente todos los hábitats del planeta, desde agua
                        dulce y salada hasta el suelo, la vegetación, las rocas ...capaces
                        de adaptarse a diferentes condiciones climatológicas y ecológicas.
                    </p>
                </article>
            </section>
            <section class="localiza" id="localiza_insectos">
                <article class="selection" aria-labelledby="titulo-localiza"
                         aria-describedby="descripcion-localiza" aria-live='polite'>
                    <h2 aria-label="Ubicación" aria-level="2" id="titulo-localiza">INVESTIGUEMOS UBICACIÓN</h2>
                    <!-- si lo pongo dentro de un form me obliga a enviarlo y este select ya tiene información para acceder a su contenido-->
                    <label for="especie" id="descripcion-localiza"
                           >Selecciona la especie que quieres localizar:</label
                    >
                    <select name="especie" id="especie" tabindex='8' aria-label="Selector para escoger la distribución de una orden de insecto"
                            aria-describedby="descripcion-localiza"></select>
                </article>
                <article class="imageMap" aria-label="mapa que muestra la ubicación del orden de insecto seleccionado">
                    <figure id="map"></figure>
                    <a class="subir" href="#salto" tabindex='8' aria-controls="salto"
                       aria-label="Ir al navegador">Ir al navegador</a>
                </article>
            </section>
        </main>
        <footer id="informacion_contacto">
            <div role="contentinfo" class="pie" tabindex="9" aria-label="Información sobre la página web">
                <h3>INFORMACIÓN DE CONTACTO</h3>
                <p>Estaremos encantados en atender cualquier duda o consulta que tenga.</p>
                <a tabindex="9" href="mailto:info@pbs.com" aria-label="dirección de correo electrónico">email: info@pbs.com</a>
                <img src="assets/images/logo.jpg" alt="Imagen del logo de Insecta 6 Patas"  aria-label="imagen del logo de Insecta 6 Patas">
                <p>Información obtenida de la API de naturaleza <cite><acronym lang="en" title="Global Biodiversity Information Facility">GBIF</acronym></cite></p>
            </div>
            <!--Ponemos los sellos que conseguimos y luego en el enlace de accesibilidad explicamos que nos falta por cumplir y nuestro compromiso de accesibilidad-->
            <div role="contentinfo" class="pie-accesibilidad" tabindex="9" aria-label="Información sobre sellos de calidad">
                <h3>DISTINCIONES</h3>
                <img src="assets/images/validacion-phpChecker.jpg" alt="Sello de Calidad de PHPChecker" aria-label="Imagen del sello de cumplimiento de calidad en el diseño PHP" tabindex="9">
                <img src="assets/images/valid-css-blue.png" alt="Sello de Calidad de W3CCSS" aria-label="Imagen del sello de cumplimiento de calidad en el diseño CSS" tabindex="9">
                <img src="assets/images/wcag1AAA-blue.png" alt="Sello de Calidad de WGCA 1.0 AAA" aria-label="Imagen del sello de cumplimiento de calidad accesibilidad WGAC 1.0 AAA" tabindex="9">
                <img src="assets/images/wcag2AAA-blue.png" alt="Sello de Calidad de WGCA 2.0 AAA" aria-label="Imagen del sello de cumplimiento de calidad accesibilidad WGCA 2.0 AAA" tabindex="9">
                <img src="assets/images/wcag2.1AAA-blue-v.png" alt="Sello de Calidad de WGCA 2.1 AAA" aria-label="Imagen del sello de cumplimiento de calidad accesibilidad AAA" tabindex="9">
            </div>
            <!--Los derechos legales los hemos puesto para mostrar también como se puede hacer un PDF accesible. Las buenas prácticas recomiendan poner la extensión del fichero que te vas a descargar y su peso para que el usuario valore si le merece la pena abrirlo o no-->
            <div role="contentinfo" class="pie-copyright" aria-label="Información sobre términos legales">
                <p aria-label="Derechos de autor de la página">@Insecta 6Patas. Todos los derechos reservados</p>
                <a href="assets/documentation/politica_cookies.pdf" tabindex="10">Políticas de Cookies (PDF 32KB)</a>
                <a href="assets/documentation/politica_privacidad.pdf" tabindex="10">Terminos y condiciones (PDF 90KB)</a> 
                <a href="assets/documentation/declaracion-accesibilidad.pdf" tabindex="10">Accesibilidad (PDF 67KB)</a>
            </div>
            <!--Es un criterio accesible fechar con el día de la última revisión-->
            <time datetime="2023-06-06"> Actualizado a: 6 de junio de 2023</time>
        </footer>
        <!--Aquí colocamos todos los scripts que vamos a usar-->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/mapa.js"></script>
        <script src="assets/js/accesibilidad.js"></script>
        <!--Script del video-->
        <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
        <script src="assets/js/video.js"></script>
    </body>
</html>
