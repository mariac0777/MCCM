<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mccm";
$db = mysqli_connect($servidor, $usuario, $clave, $basededatos);

// Verifica si la conexión fue exitosa
if (!$db) {
  die("Conexión fallida: " . mysqli_connect_error());
}

$categories = [
  "Nudez/ Romance/ Sensualidad" => [
    ["title" => "Ecos de Siluetas", "description" => "La pintura muestra una figura humana abstracta con tonos cálidos, principalmente marrones y rosados, que parecen esbozar un cuerpo femenino en una postura arrodillada con los brazos hacia arriba o estirados hacia atrás. La obra evoca una sensación de introspección y libertad, con un enfoque en la expresión de la forma humana de manera emotiva y suelta.", "information" => "70cm*40cm", "details" => "COP 90.000", "img" => "../assets/Echoes_of_Silhouettes.jpeg"],

    ["title" => "Rayos de Serenidad", "description" => "La pintura titulada Rayos de Serenidad representa a una mujer joven en un estado de relajación profunda. La composición y la paleta de colores evocan una atmósfera de paz y quietud, destacando la belleza y la fragilidad del momento capturado.", "information" => "60cm*40cm", "details" => "COP 130.000", "img" => "../assets/Rayos_de_Serenidad.jpeg"],

    ["title" => "Sombras de Soledad", "description" => "La pintura muestra una figura femenina de perfil, con el rostro parcialmente cubierto por su cabello oscuro que fluye de manera natural. La composición transmite una sensación de melancolía y reflexión, acentuada por los tonos fríos y oscuros del fondo que contrastan con la piel clara de la figura. La mujer parece estar en un momento de introspección, con los ojos entrecerrados, lo que sugiere una conexión interna o un estado de ensoñación.", "information" => "70cm*40cm", "details" => "COP 80.000", "img" => "../assets/Sombras_de_Soledad.jpeg"],

    ["title" => "Reflejos Desvanecidos", "description" => "La pintura muestra a una mujer arrodillada en una postura íntima, con los brazos cruzados alrededor de su torso, en un gesto de protección o autoabrazo. El color rojo dominante puede interpretarse como un símbolo de emociones intensas, como el amor, la pasión o incluso el dolor. La postura de la mujer y su expresión facial transmiten una profunda introspección, capturando un momento de conexión consigo misma o con una emoción fuerte.", "information" => "50cm*40cm", "details" => "COP 100.000", "img" => "../assets/Faded_Reflections.jpeg"],

    ["title" => "Elegant Redkwine", "description" => "Las pinceladas son gruesas y expresivas, transmitiendo un movimiento inquieto y un estado emocional intenso. La elección del rojo como color principal refuerza el simbolismo de la pasión, el deseo o incluso el conflicto interno. La postura de la mujer, sumada al contraste entre las luces y sombras, sugiere un momento de lucha interna o un esfuerzo por liberarse de una carga emocional, invitando al espectador a interpretar su historia y sus emociones.", "information" => "40cm*50cm", "details" => "COP 100.000", "img" => "../assets/Elegant_RedWine.jpeg"],
  ],

  "Realismo/ Abstracto/ Existencial" => [
    ["title" => "Dark Goddess", "description" => "La pintura representa una rosa en un estilo expresionista, donde los pétalos rojos son el foco central de la obra. La flor se destaca sobre un fondo completamente negro, lo cual intensifica su color vibrante y la hace resaltar con fuerza. Los pétalos están definidos por pinceladas sueltas y gruesas, que capturan la textura y la forma de la rosa de una manera emocional y abstracta, sugiriendo un movimiento sutil y delicado.", "information" => "60cm*50cm", "details" => "COP 60.000", "img" => "../assets/Dark_Goddess.jpeg"],

    ["title" => "A sight of fear", "description" => "Esta impactante obra presenta una calavera que cautiva con un ojo humano, simbolizando la dualidad entre la vida y la muerte. La paleta de colores —blanco, beige, rojo y negro— evoca una sensación de contraste y profundidad, donde el blanco y el beige sugieren fragilidad, mientras que el rojo intenso infunde pasión y energía. La calavera, con su mirada penetrante, invita al espectador a reflexionar sobre la impermanencia y la belleza efímera de la existencia.",  "information" => "50cm*50cm", "details" => "COP 80.000", "img" => "../assets/A_Sigth_of_Fear.jpeg"],

    ["title" => "A Flame", "description" => "Esta pintura presenta una vela encendida, cuya llama vibrante brilla con intensidad contra un fondo negro profundo. La luz cálida de la vela se refleja en la cera, creando un contraste fascinante que simboliza esperanza y resiliencia. La penumbra que rodea la vela enfatiza su luminosidad, invitando al espectador a contemplar la fragilidad y la belleza de la vida en medio de la oscuridad. La obra captura un instante de serenidad y meditación, donde la luz se convierte en un faro de inspiración", "information" => "70cm*50cm", "details" => "COP 90.000", "img" => "../assets/A_Flame.jpeg"],

    ["title" => "Other Woman", "description" => "La pintura presenta un rostro en tonos oscuros, casi monocromáticos, con una paleta de grises y negros que transmiten una atmósfera sombría e introspectiva. La figura parece mirar hacia arriba, en una expresión ambigua que podría sugerir anhelo, reflexión o angustia. Las sombras dominan la composición, cubriendo gran parte del rostro y dejando solo áreas parciales iluminadas, lo que genera un efecto dramático y casi fantasmal.", "information" => "70cm*50cm", "details" => "COP 120.000", "img" => "../assets/Other_Woman.jpeg"],

    ["title" => "Blurred Thoughts", "description" => "Esta pintura presenta una figura apenas discernible, compuesta por gruesas pinceladas de tonos apagados que oscilan entre grises, blancos y rosados pálidos. La técnica empleada, caracterizada por un estilo de empaste, hace que el rostro de la figura se vuelva abstracto y casi irreconocible, evocando una sensación de introspección y misterio.", "information" => "70cm*40cm", "details" => "COP 120.000", "img" => "../assets/Blurred_Thoughts.jpeg"],

  ],
  "Paisajes/ Impresionismo" => [
    ["title" => "A Purple View", "description" => "La pintura captura un atardecer vibrante y emocional, donde los tonos cálidos y suaves se entrelazan para transmitir una atmósfera de calma y belleza. El cielo se despliega en una sinfonía de colores que van desde el magenta profundo hasta el rosa suave, mientras que los matices de celeste y violeta añaden una sensación etérea y soñadora. El horizonte se ilumina con tonos dorados y anaranjados, mientras el sol se oculta lentamente, bañando la escena en una luz cálida y envolvente.", "information" => "60cm*30cm", "details" => "COP 70.000", "img" => "../assets/A_Purple_View.jpeg"],

    ["title" => "Fiction Feeling", "description" => "La pintura presenta una escena de ensueño donde un sol radiante se alza sobre un horizonte teñido de tonos morados y violetas, creando una atmósfera mágica y etérea. El sol, en un tono suave pero brillante, baña el cielo con matices violetas que se desvanecen en un azul profundo y misterioso. Esta elección cromática genera un contraste fascinante y a la vez armonioso entre la calidez de los rayos solares y la frialdad envolvente del cielo.", "information" => "80cm*40cm", "details" => "COP 100.000", "img" => "../assets/Fiction_Feeling.jpeg"],

    ["title" => "Sad lake", "description" => "La pintura muestra un lago de aguas tranquilas y azuladas, cuya superficie refleja la serenidad de un entorno natural en calma. El lago se extiende como un manto azul que varía en tonalidades, desde un azul profundo en las zonas más sombreadas hasta un tono más claro y brillante donde la luz toca el agua. Pequeños charcos se dispersan alrededor del lago, formados por las recientes lluvias, y sus superficies espejadas capturan fragmentos del cielo y el follaje cercano, añadiendo profundidad y detalle a la escena.3", "information" => "70cm*50cm", "details" => "COP 100.000", "img" => "../assets/Sad_Lake.jpeg"],

    ["title" => "Calm", "description" => "Las pinceladas en la superficie del agua son suaves y delicadas, simulando el movimiento sutil de una brisa ligera que apenas altera el espejo azul. A su alrededor, la flora se alza vibrante y verde, creando un marco natural para el lago. La vegetación es densa y frondosa, con plantas altas que se inclinan hacia el agua y otras más bajas que crecen en los bordes, pareciendo casi abrazar al lago en un gesto de protección.", "information" => "80cm*40cm", "details" => "COP 90.000", "img" => "../assets/Calm.jpeg"],

    ["title" => "Hope", "description" => "Los verdes más claros reflejan la frescura de los brotes jóvenes y las hojas más recientes, brillando bajo la luz del sol. Los tonos esmeralda y oliva ofrecen un contraste más profundo, aportando un sentido de madurez y estabilidad al jardín. Entre los arbustos y las plantas, se aprecian toques de verde lima, verde musgo, y verdes azulados que crean un ambiente vibrante y cautivador. La pincelada suave y detallada da la impresión de una suave brisa que recorre el espacio, meciendo las hojas y brindando movimiento al paisaje.", "information" => "80cm*40cm", "details" => "COP 90.000", "img" => "../assets/Hope.jpeg"],

  ],
  "Animales/ Modernismo " => [
    ["title" => "The tortoise", "description" => "La tortuga, de caparazón robusto y detallado con patrones geométricos en tonos marrones, ocres y verdes oscuros, se desplaza con elegancia por el agua. La luz del sol penetra suavemente desde la superficie del mar, creando destellos y reflejos dorados sobre su caparazón, lo que aporta una sensación de calidez y realismo. La tortuga, con sus aletas extendidas, parece moverse con un ritmo sereno y paciente, lo cual transmite una sensación de paz y libertad.", "information" => "40cm*40cm", "details" => "COP 80.000", "img" => "../assets/The_Tortoise.jpeg"],

    ["title" => "Darwin in the life", "description" => "La pintura captura a un pez de vibrante color naranja, nadando entre las tranquilas aguas del mar. El pez destaca por su cuerpo estilizado y brillante, con escamas detalladas que reflejan destellos dorados y rojizos bajo la luz del agua. Sus aletas, largas y fluidas, se despliegan con elegancia mientras se mueve, creando suaves ondas en su entorno.", "information" => "80cm*40cm", "details" => "COP 120.000", "img" => "../assets/Darwin_in_The_Life.jpeg"],

    ["title" => "A Darwin Couple", "description" => "Los peces koi son conocidos por su resistencia y determinación. En la cultura japonesa, se cree que los koi que nadan río arriba simbolizan la perseverancia y el esfuerzo para superar obstáculos. Su representación en el agua puede resaltar la importancia de fluir con la vida y adaptarse a las circunstancias.", "information" => "60cm*40cm", "details" => "COP 90.000", "img" => "../assets/A_Darwin_Couple.jpeg"],

    ["title" => "A Octopus Choice", "description" => "A Octopus Choice es una pintura que resalta la diferencia entre la realidad y la ficción, la realidad es el fondo rojo y el azul es la ficción que se encuentran en nuestras vidas. El pulpo hace referencia a el ser humano, un claro ejemplo de un ser que acepta las condiciones en las que se encuentra, decide ver la realidad, aceptarla y afrontarla, tornándose así de colores en sus tentáculos de tonos cercanos a el rojo de el fondo y poco a poco este va mostrando una adaptación, sin importar en las condiciones e imperfecciones de la vida y de ser humano imperfecto.", "information" => "130cm*90cm", "details" => "COP 380.000", "img" => "../assets/A_Octopus_Choice.jpeg"],

    ["title" => "Cute Thief", "description" => "La pintura presenta el rostro de un lindo mapache, con su distintiva máscara facial negra que resalta sus grandes ojos brillantes y expresivos. Su pelaje es suave y grisáceo, con matices de blanco y marrón que añaden profundidad y textura. Las orejas son redondeadas y de un color más oscuro, mientras que su hocico es pequeño y adorable, con un pequeño botón negro como nariz. La expresión del mapache es curiosa y juguetona, evocando una sensación de simpatía y ternura. El fondo puede ser un sutil desenfoque de un entorno natural, lo que permite que el rostro del mapache sea el punto focal de la obra.", "information" => "50cm*40cm", "details" => "COP 80.000", "img" => "../assets/Cute_Thief.jpeg"],

  ],
  "Artistas/ Cine/ Modernismo" => [
    ["title" => "Born To Die", "description" => "La pintura de la portada de Born to Die de Lana Del Rey captura un ambiente nostálgico y melancólico. El retrato muestra a Lana Del Rey de medio cuerpo, de pie, con un fondo azul cielo y nubes difusas que evocan un día sereno y veraniego. Ella lleva una blusa blanca semi-transparente, abotonada hasta el cuello, que contrasta con su piel clara. Su cabello es largo, de un tono rojizo oscuro, con ondas suaves que enmarcan su rostro.", "information" => "50cm*50cm", "details" => "COP 70.000", "img" => "../assets/Born_To_Die.jpeg"],

    ["title" => "Fox Reflexion", "description" => "La pintura muestra a Megan Fox de pie frente a un espejo, con un ambiente íntimo y emocional. Está mirando su propio reflejo con los ojos llorosos, donde las lágrimas han comenzado a correr por sus mejillas. Su expresión refleja una mezcla de tristeza, vulnerabilidad y reflexión profunda. Con una mano, se toca suavemente el rostro, cerca de su mejilla, como si intentara reconfortarse o procesar un momento difícil.", "information" => "70cm*40cm", "details" => "COP 100.000", "img" => "../assets/Fox_Reflexion.jpeg"],

    ["title" => "Deadpool Pearl", "description" => "La pintura reimagina la icónica obra La Joven de la Perla de Johannes Vermeer, pero con Deadpool como el protagonista. En esta versión, el personaje de Deadpool se muestra en la clásica pose de la joven, girando ligeramente la cabeza hacia un lado mientras mira al espectador con una expresión curiosa y divertida.", "information" => "60cm*40cm", "details" => "COP 200.000", "img" => "../assets/Deadpool_Pear.jpeg"],

    ["title" => "Franc Ocean", "description" => " La imagen presenta a Frank Ocean de medio cuerpo, con la cabeza inclinada hacia abajo y cubierta parcialmente por su mano derecha, como en un gesto de vulnerabilidad o introspección. Su piel está mojada, sugiriendo que acaba de salir de una ducha o del agua, lo cual se refleja en los detalles sutiles de las gotas de agua en su cabeza y torso.", "information" => "70cm*40cm", "details" => "COP 120.000", "img" => "../assets/Frank_Ocean.jpeg"],

    ["title" => "Cuarteto De Nos", "description" => "El ícono de la banda 'El Cuarteto de Nos' que muestra a una rata y una cabra es característico y tiene un estilo simple, pero llamativo. En este diseño, se ven dos figuras minimalistas: una cabra y una rata, ambas perfiladas con líneas gruesas y limpias, en un estilo que podría recordar un logotipo o un emblema.", "information" => "30cm*50cm", "details" => "COP 60.000", "img" => "../assets/El_Cuarteto_De_Nos.jpeg"],

  ],
  "Ficción/ Modernismo" => [
    ["title" => "Batman", "description" => "La pintura de la silueta minimalista de Batman se centra en un diseño limpio y estilizado. La figura de Batman se representa en blanco puro sobre un fondo completamente negro, creando un contraste marcado y dramático.", "information" => "70cm*40cm", "details" => "COP 70.000", "img" => "../assets/Batman.jpeg"],

    ["title" => "Akatsuki", "description" => "La pintura de las nubes de Akatsuki, inspirada en el icónico símbolo de la organización de Naruto, presenta un diseño estilizado y llamativo. En esta obra, se representan múltiples nubes rojas de contornos suaves y bordes blancos bien definidos, flotando sobre un fondo completamente negro.", "information" => "50cm*40cm", "details" => "COP 40.000", "img" => "../assets/Akatsuki.jpeg"],

    ["title" => "Black spider", "description" => "La pintura presenta el icónico símbolo de Spider-Man, representado en un estilo minimalista y moderno. En esta obra, el símbolo de Spider-Man, que generalmente incluye la araña estilizada, se muestra en blanco puro sobre un fondo negro profundo. El símbolo consiste en una araña con patas largas y alargadas que se extienden hacia los lados, creando un efecto dinámico", "information" => "50cm*50cm", "details" => "COP 50.000", "img" => "../assets/Black_Spider.jpeg"],

    ["title" => "VENOM", "description" => "La pintura de Venom muestra al personaje en una pose poderosa y amenazante, con la boca abierta en una expresión feroz. Su cabeza es grande y angular, con una piel negra brillante que resalta bajo la luz, creando un efecto casi tridimensional. La boca de Venom está completamente abierta, revelando unos colmillos afilados y prominentes, lo que acentúa su naturaleza agresiva.", "information" => "70cm*40cm", "details" => "COP 60.000", "img" => "../assets/Venom.jpeg"],

    ["title" => "Feedback", "description" => "La pintura representa al personaje Feedback de la serie Ben 10. Esta versión del personaje captura su silueta icónica y poderosa, con cables y extremidades largas y delgadas que resaltan su estética alienígena y su habilidad de absorber y redirigir energía. La elección del fondo verde también es un guiño al tema de la serie y al color asociado con Ben 10.", "information" => "70cm*40cm", "details" => "COP 70.000", "img" => "../assets/Feedback.jpeg"],
  ],
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./inicio.css">
  <title>MCCM</title>
</head>

<body>
  <div class="container">
    <link rel="stylesheet" href="./index.css" />
    <header class="header">
      <div class="header-content">
        <div class="icon">
          <img src="../assets/mccmicon.jpeg" width="90" />
        </div>
        <nav class="nav">
          <a href="../cart/index.php" style="color: white; text-decoration: none">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="lucide lucide-shopping-cart">
              <circle cx="8" cy="21" r="1" />
              <circle cx="19" cy="21" r="1" />
              <path
                d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
            </svg>
            Cart</a>
        </nav>
      </div>
    </header>


    <section class="main-section">
      <p>MCCM- Art & Marketing of Exclusive Paints, es una tienda virtual, que se dedica a la venta de pinturas personalisadas y fabricadas por inspiracion de la Artista M.C.C.M. cuyo proposito es transmitir un mensaje conmovedor mediante sus pinturas y alegrar los hogares/oficinas de el usuario.</p>
      <span style="position: absolute; right: 100px; bottom: 50px;">
        <a href="../info/index.php">Mas informacion ></a>
      </span>
    </section>

    <main class="main-content">
      <?php foreach ($categories as $categoryName => $paintings) : ?>
        <section class="category">
          <h2 class="category-title"><?php echo $categoryName; ?></h2>
          <div class="painting-grid">
            <?php foreach ($paintings as $painting) : ?>
              <div class="flip-card">
                <div class="flip-card-inner">
                  <!-- Parte Frontal de la Tarjeta -->
                  <div class="flip-card-front">
                    <div class="painting-image">
                      <img src="<?php echo $painting['img']; ?>" alt="<?php echo $painting['title']; ?>">
                    </div>
                    <h3 class="painting-title"><?php echo $painting['title']; ?></h3>
                  </div>

                  <!-- Parte Trasera de la Tarjeta -->
                  <div class="flip-card-back">
                    <div>
                      <h3 class="painting-title"><?php echo $painting['title']; ?></h3>
                      <p class="painting-description"><?php echo $painting['description']; ?></p>
                      <p>Detalles de la pintura: <strong class='button-style'><?php echo $painting['information']; ?></strong></p>
                    </div>



                    <div>
                      <p class="painting-details button-style"><?php echo $painting['details']; ?></p>
                      <?php
                      echo "<button class='painting-details button-style add-to-cart' 
                            onClick='insertarDatos(\"{$painting['title']}\", \"{$painting['title']}\", \"{$painting['description']}\", \"{$painting['details']}\", 1)'>Añadir</button>";
                      ?>

                    </div>

                  </div>

                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endforeach; ?>
      <section>
        <h2>Testimonio</h2>
        <div class="containerTestimonios">
          <div>
            <p>
              "Siempre he amado el arte, así que cuando descubrí MCCM, supe que tenía que probarlo. Pedí una pintura personalizada de mi mascota, y el resultado fue espectacular. Capturaron su personalidad a la perfección. La calidad de la obra es impresionante, y la atención al cliente fue excepcional. Me mantuvieron informado en cada etapa del proceso. Sin duda, volveré a comprar más piezas para mi colección. ¡Gracias, MCCM!"
            </p>
            <span> -- Michell Barros</span>
          </div>
          <div>
            <p>
              "Recientemente compré una pintura personalizada para decorar mi oficina en casa, y la experiencia con MCCM fue maravillosa. La selección de estilos y la posibilidad de personalizar cada detalle me dejaron sin palabras. El proceso de creación fue muy sencillo, y el equipo me brindó sugerencias valiosas. Cuando recibí la pintura, quedé impresionado por la calidad y el acabado. Ha transformado completamente mi espacio de estudio y me inspira cada día. Sin duda, volveré a MCCM para futuros proyectos. ¡Altamente recomendado!"
            </p>
            <span>--Isabella Amaris</span>
          </div>
          <div>
            <p>
              "Decidí encargar una pintura personalizada para celebrar el aniversario de mis padres, y no podría estar más feliz con el resultado. MCCM hizo un trabajo increíble al capturar momentos especiales de su vida juntos. La calidad de la obra es impresionante, y el proceso de personalización fue muy sencillo. Mis padres se emocionaron al recibirla, y ahora es una pieza central en su sala de estar. Agradezco a MCCM por hacer de este regalo algo tan significativo. Sin duda, volveré a comprar más en el futuro."
            </p>
            <span>--Camila Lopez</span>
          </div>
        </div>
      </section>
    </main>




    <footer>
      <div class="containerFooter">
        <img src="../assets/logo_footer.jpg" alt="Logo Footer">
        <div>
          <p>mccm_art</p>
          <p>MCCM: Art & Marketing of Exclusive Paints</p>
          <p>Correo: mccm.art.07gmail.com</p>
          <p>telefono de contacto: 350 217 0114</p>
        </div>
      </div>
      <span>2024 MCCM ART & MARKETING OF EXCLUSIVE PAINTS. NIT: 830024974-3. Todos los derechos reservados.</span>
    </footer>
  </div>
  <script>
    const insertarDatos = (imagen, nombre, descripcion, precio, cantidad) => {
      console.log(imagen);
      console.log(nombre);
      console.log(descripcion);
      console.log(precio);
      console.log(typeof(precio));
      console.log(cantidad);

      // Crea un objeto para los datos a enviar
      const data = new URLSearchParams();
      data.append('imagen', imagen);
      data.append('nombre', nombre);
      data.append('descripcion', descripcion);
      data.append('precio', precio);
      data.append('cantidad', cantidad);


      console.log(data.toString())
      fetch('insertar.php', {
          method: 'POST',
          body: data,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        })
        .then(response => response.text())
        .then(data => {
          console.log(data);
          alert('Se agrego el producto al carrito');
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Ocurrió un error al insertar los datos.');
        });
    }
  </script>

</body>

</html>