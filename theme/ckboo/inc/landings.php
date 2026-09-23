<?php
/**
 * CkBoo — landing pages (services, format, professional, and areas).
 *
 * The copy below is only the starting content: `ckboo_seed_landings()` creates
 * the pages once and from then on everything is editable in the WordPress admin
 * (title, body, excerpt = intro paragraph, and the "SEO" box for title/description).
 *
 * Groups:
 * - servicio    : client segments, shown as cards in the home "Servicios" grid.
 * - formato     : a way an event can happen (e.g. tardeos), cross-links into the
 *                 segments above instead of competing with them. Not in the grid.
 * - profesional : audience is venues/promoters, not people planning a celebration.
 *                 Different CTA. Not in the grid.
 * - zona        : areas served, shown as cards in the home "Zonas" grid.
 */

const CKBOO_LANDING_TEMPLATE = 'page-landing.php';

/**
 * @return array[] slug => data
 */
function ckboo_landings() {
    $mix = esc_url( CKBOO_MIXCLOUD_URL );

    return [

        'dj-fiestas-privadas' => [
            'group'     => 'servicio',
            'nav'       => 'Fiestas privadas',
            'title'     => 'DJ para fiestas privadas',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para fiestas privadas en Terrassa y Catalunya | CkBoo',
            'seo_desc'  => 'DJ para todo tipo de celebraciones privadas: cumpleaños, puestas de largo y aniversarios en Terrassa, Sant Cugat, Barcelona y Catalunya. Pide presupuesto.',
            'areas'     => [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ],
            'excerpt'   => 'Cumpleaños, puestas de largo, aniversarios o cualquier motivo para celebrar por todo lo alto: preparo una sesión personalizada, adaptada a las personas, al espacio y al ambiente que quieres crear.',
            'content'   => <<<HTML
<h2>Una fiesta privada con la música que te representa</h2>
<p>Las celebraciones privadas son las que más se recuerdan, y la música tiene mucho que ver con ello. En lugar de aplicar una fórmula, preparo cada fiesta escuchando antes cómo es la celebración, quién va a estar y qué ambiente quieres conseguir.</p>

<h2>Todo tipo de celebraciones</h2>
<p>Cumpleaños, puestas de largo, aniversarios o cualquier otro motivo para celebrar: pincho en todo tipo de fiestas privadas. Cada una tiene su propio ritmo, y preparo la sesión según cómo quieras que se sienta la tuya.</p>

<h2>Puestas de largo</h2>
<p>Una puesta de largo es una celebración especial con momentos importantes a lo largo de la noche. Hablamos de cómo quieres que suene cada uno de ellos y de qué música esperáis los invitados, y después construyo una sesión que acompañe toda la fiesta, desde el inicio más tranquilo hasta la pista de baile.</p>

<h2>Cumpleaños y aniversarios</h2>
<p>Pincho en cumpleaños, aniversarios y celebraciones entre amigos y familia. Sé leer a un público que puede mezclar edades y gustos, y voy cambiando de estilo según lo que necesite la pista, sin dejar nada a medias.</p>

<h2>Todo tipo de música, a medida</h2>
<p>No tengo un estilo cerrado, ni tampoco una década favorita. Mis sesiones grabadas se mueven más entre house, tech house y latin house, y puedes escucharlas en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>. En tu fiesta, la música la decide la gente que la disfruta.</p>

<h2>Residente en Txocu</h2>
<p>Soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>, así que estoy acostumbrado a trabajar en celebraciones privadas con público muy variado.</p>

<h2>Equipo propio</h2>
<p>Si el local ya tiene cabina y sonido, vengo solo a pinchar. Si no, llevo yo el equipo —cabina, sonido e iluminación—, adaptado al espacio, sea un jardín, una terraza o un local cerrado. El presupuesto se ajusta a lo que haga falta montar.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué vas a celebrar, la fecha aproximada y dónde será.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Afinamos juntos la música para que sea justo lo que imaginas.</li>
</ol>
HTML,
        ],

        'dj-eventos-corporativos' => [
            'group'     => 'servicio',
            'nav'       => 'Eventos corporativos',
            'title'     => 'DJ para eventos corporativos',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para eventos corporativos en Barcelona y Vallès | CkBoo',
            'seo_desc'  => 'DJ para eventos corporativos, presentaciones y fiestas de empresa en Barcelona, Sant Cugat, Terrassa y Catalunya. He pinchado para Nespresso, Cupra y Red Bull.',
            'areas'     => [ 'Barcelona', 'Sant Cugat del Vallès', 'Terrassa', 'Catalunya' ],
            'excerpt'   => 'Cenas de empresa, presentaciones, convenciones o la fiesta de fin de año: pongo la música pensada para cada momento del evento. He pinchado para marcas como Nespresso, Vicio, Cupra y Red Bull.',
            'content'   => <<<HTML
<h2>Un DJ profesional para tu evento de empresa</h2>
<p>La música cambia por completo cómo se vive un evento corporativo. Una buena sesión ayuda a que la gente se relaje, hable entre sí y disfrute, y una mala puede arruinar una noche que llevaba meses de preparación. Por eso preparo cada evento de empresa a medida, escuchando primero qué quieres conseguir y cómo es el público.</p>

<h2>Eventos corporativos en los que puedo pinchar</h2>
<ul>
<li><strong>Cenas y fiestas de empresa</strong>, incluidas las de fin de año y las de equipo.</li>
<li><strong>Presentaciones y lanzamientos</strong> de producto o de marca.</li>
<li><strong>Convenciones, jornadas y eventos de marca</strong> con ambiente de recepción, cóctel y fiesta posterior.</li>
<li><strong>Aniversarios y celebraciones</strong> de compañías y equipos.</li>
</ul>

<h2>La música se adapta a cada momento</h2>
<p>Un evento corporativo casi nunca tiene un único ritmo: hay un momento de llegada, otro de conversación y, muchas veces, un cierre más festivo. Adapto la sesión a esos momentos, al espacio y a la gente que está delante, sin lista cerrada y con el volumen y la energía que pida cada fase.</p>
<p>Ni me caso con un estilo ni con una década — en un evento manda lo que pide el público. Mis sesiones grabadas se mueven más por house, tech house y latin house; puedes escuchar mi estilo en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>.</p>

<h2>Experiencia con marcas</h2>
<p>He puesto música para <strong>Nespresso, Vicio, Cupra y Red Bull</strong>, entre otros, en eventos como Cupra Pulse en Barcelona. Trabajo con soltura en espacios y formatos muy distintos, desde un espacio de oficina hasta un evento al aire libre.</p>

<h2>Equipo propio</h2>
<p>En un evento de empresa el sonido tiene que ser nítido para presentaciones y discursos, y dar paso a la fiesta después si la hay. En espacios que ya tienen equipo propio, vengo solo a pinchar; si no lo tienen, llevo cabina, sonido e iluminación. Lo vemos juntos antes de cerrar el presupuesto.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué tipo de evento es, la fecha aproximada y dónde se celebra.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Afinamos el planteamiento de la música para que el día del evento todo fluya.</li>
</ol>
HTML,
        ],

        'dj-bodas' => [
            'group'     => 'servicio',
            'nav'       => 'Bodas',
            'title'     => 'DJ para bodas',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para bodas en Terrassa, Sant Cugat y Barcelona | CkBoo',
            'seo_desc'  => 'DJ para bodas en Terrassa, Sant Cugat, Barcelona y Catalunya. Música adaptada a cada momento del convite y la fiesta. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ],
            'excerpt'   => 'En una boda pincho de la cena al baile, sin dejar que la energía decaiga. Adapto la sesión a cada momento del convite y a los gustos de los novios y sus invitados — llevo más de 25 años haciendo esto.',
            'content'   => <<<HTML
<h2>Música para cada momento de la boda</h2>
<p>Una boda no es una única fiesta, son varias seguidas: la recepción, el convite, el baile de los novios y la fiesta que sigue después. Cada momento pide un tipo de música distinto, y preparo la sesión escuchando antes qué imagináis los novios para cada uno de ellos.</p>

<h2>De la cena al baile</h2>
<p>Durante la cena, música tranquila que acompañe sin imponerse. Al terminar, subo la energía poco a poco hasta llenar la pista, leyendo al público según van entrando invitados de edades y gustos distintos. No sigo una lista cerrada: construyo la sesión en directo, como en cualquier otra celebración.</p>

<h2>Todo tipo de música, a vuestro gusto</h2>
<p>No tengo un estilo fijo ni una década a la que sea fiel, así que antes de la boda hablamos de lo que os gusta, lo que no puede faltar y lo que preferís evitar. Mis sesiones grabadas sí se mueven más por house, tech house y latin house — las tienes en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a> por si quieres hacerte una idea.</p>

<h2>Más de 25 años en celebraciones privadas</h2>
<p>Llevo más de 25 años poniendo música en celebraciones privadas y soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>, así que estoy acostumbrado a trabajar con públicos muy variados y a que un evento salga bien de principio a fin.</p>

<h2>Equipo propio</h2>
<p>En una boda ajusto el sonido a cada momento: discreto en la ceremonia y el convite, con más potencia e iluminación de fiesta cuando se abre la pista. Puedes contratarme solo para pinchar, o con el equipo completo, según lo que ya tenga el espacio. Lo hablamos, y de ahí sale el presupuesto.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario la fecha de la boda, el lugar y cómo os la imagináis.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Preparamos juntos la música para cada momento del día.</li>
</ol>
HTML,
        ],

        'dj-fiestas-mayores' => [
            'group'     => 'servicio',
            'nav'       => 'Fiestas mayores',
            'title'     => 'DJ para fiestas mayores',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para fiestas mayores en Catalunya | DJ CkBoo',
            'seo_desc'  => 'DJ para fiestas mayores y celebraciones populares en Terrassa, Sant Cugat, Barcelona y toda Catalunya. Música para todas las edades. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ],
            'excerpt'   => 'En una fiesta mayor conviven varias generaciones a la vez, y mi sesión tiene que funcionar para todas. La voy ajustando en directo según cómo responda el público, con más de 25 años de experiencia detrás.',
            'content'   => <<<HTML
<h2>Música para toda la fiesta mayor</h2>
<p>En una fiesta mayor conviven varias generaciones a la vez, y la sesión tiene que llegar a todas. Preparo una selección con clásicos, hits y música de baile que funcione para todos, y la ajusto en directo según cómo vaya respondiendo el público.</p>

<h2>De la tarde a la noche</h2>
<p>Muchas fiestas mayores empiezan por la tarde con un ambiente familiar y terminan de noche con la pista llena. Adapto la energía de la sesión a cada momento, sin dejar que decaiga, tanto si es un tardeo de tarde como la fiesta de después.</p>

<h2>Todo tipo de música</h2>
<p>Aquí menos que en ningún sitio me cierro a un estilo o una década: pincho lo que pida el momento para que la fiesta funcione, sea cual sea el público que tenga delante.</p>

<h2>Más de 25 años de experiencia</h2>
<p>Llevo más de 25 años poniendo música en celebraciones privadas y populares, y soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>.</p>

<h2>Equipo propio</h2>
<p>Una fiesta mayor suele pedir más potencia, por el aforo y por ser muchas veces al aire libre. Si el escenario ya cuenta con sonido, iluminación y cabina, vengo solo a pinchar; si hay que montarlo desde cero, lo llevo yo, adaptado al aforo. El presupuesto varía según lo que haga falta.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario la fecha, el lugar y el tipo de fiesta.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Preparamos juntos la selección musical.</li>
</ol>
HTML,
        ],

        'dj-tardeos' => [
            'group'     => 'formato',
            'nav'       => 'Tardeos',
            'title'     => 'DJ para tardeos',
            'label'     => 'Formato',
            'seo_title' => 'DJ para tardeos en Terrassa, Sant Cugat y Barcelona | CkBoo',
            'seo_desc'  => 'DJ para tardeos en fiestas privadas, clubs y fiestas mayores en Terrassa, Sant Cugat, Barcelona y Catalunya. Música que sube de energía con el día. Pide presupuesto.',
            'areas'     => [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ],
            'excerpt'   => 'Un tardeo empieza con luz de día y termina ya de noche, y la música tiene que acompañar ese recorrido. Puede ser en una fiesta privada, en un club o en una fiesta mayor — en cualquier caso, adapto la sesión al momento y al público.',
            'content'   => <<<HTML
<h2>¿Qué es un tardeo?</h2>
<p>Un tardeo es una fiesta que empieza por la tarde, con luz de día, y va subiendo de energía hasta la noche. La música tiene que acompañar ese recorrido: ambiente tranquilo al principio, más intensidad a medida que se llena la pista.</p>

<h2>Un tardeo puede ser distintas cosas</h2>
<ul>
<li>Una <strong>fiesta privada</strong>, en una terraza, jardín o local. <a href="/dj-fiestas-privadas/">Más información</a>.</li>
<li>Una sesión en un <strong>club o sala</strong>. <a href="/dj-clubs-y-salas/">Más información</a>.</li>
<li>Parte de una <strong>fiesta mayor</strong> o celebración popular. <a href="/dj-fiestas-mayores/">Más información</a>.</li>
</ul>
<p>Sea cual sea el contexto, me adapto igual: leo la pista y construyo la sesión en directo, sin lista cerrada ni un estilo o década fijos.</p>

<h2>Cómo pedir presupuesto</h2>
<p>Cuéntame en el formulario si tu tardeo es una fiesta privada, un club o una fiesta mayor, junto con la fecha y el lugar, y te respondo con disponibilidad y presupuesto.</p>
HTML,
        ],

        'dj-clubs-y-salas' => [
            'group'     => 'profesional',
            'nav'       => 'Salas y clubs',
            'title'     => 'DJ CkBoo para clubs y salas',
            'label'     => 'Salas y clubs',
            'seo_title' => 'DJ CkBoo para clubs y salas en Catalunya',
            'seo_desc'  => 'DJ CkBoo busca fechas para pinchar en clubs y salas. Ha pinchado en Hola Club (Sitges), Sala Apolo y Atlantic Club. Sesiones de house, tech house y latin house.',
            'areas'     => [ 'Barcelona', 'Sitges', 'Catalunya' ],
            'excerpt'   => 'Además de eventos privados y corporativos, busco fechas para pinchar en clubs y salas. He pinchado en Hola Club (Sitges), Sala Apolo (Barcelona) y Atlantic Club (Barcelona). Si programas una sala y buscas un DJ, escríbeme.',
            'content'   => <<<HTML
<h2>Un DJ con experiencia en sala</h2>
<p>Además de mi trabajo en eventos privados y corporativos, pincho en clubs y salas. Me interesa seguir sumando fechas y colaborando con programadores que buscan una sesión de house, tech house y latin house con oficio.</p>

<h2>Dónde he pinchado</h2>
<ul>
<li><strong>Hola Club</strong> (Sitges)</li>
<li><strong>Sala Apolo</strong> (Barcelona)</li>
<li><strong>Atlantic Club</strong> (Barcelona)</li>
</ul>

<h2>Mi estilo</h2>
<p>Mis sesiones se mueven entre house, tech house y latin house. Puedes escuchar mis mixes grabados en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a> antes de contactarme, para hacerte una idea de cómo sesiono en sala.</p>

<h2>¿Programas una sala o un club?</h2>
<p>Si buscas un DJ para una fecha, una residencia o un evento puntual, escríbeme a dj@ckboo.es o rellena el formulario contándome la sala, el tipo de sesión que buscas y las fechas disponibles.</p>
HTML,
        ],

        'dj-terrassa' => [
            'group'     => 'zona',
            'nav'       => 'Terrassa',
            'title'     => 'DJ en Terrassa para eventos privados y corporativos',
            'label'     => 'Zona · Terrassa',
            'seo_title' => 'DJ en Terrassa para eventos y fiestas | DJ CkBoo',
            'seo_desc'  => 'DJ en Terrassa para bodas, fiestas privadas, eventos de empresa y fiestas mayores. +25 años de experiencia. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Terrassa', 'Sabadell', 'Rubí', 'Cerdanyola del Vallès', 'Sant Quirze del Vallès', 'Vallès Occidental' ],
            'excerpt'   => 'Soy CkBoo, DJ con base en Terrassa y más de 25 años poniendo música en eventos privados y corporativos. Adapto cada sesión al espacio, al público y al momento de tu celebración.',
            'content'   => <<<HTML
<h2>Un DJ en Terrassa para eventos de todo tipo</h2>
<p>Si buscas un DJ en Terrassa, trabajo desde aquí: mi base está en la ciudad, así que moverme por Terrassa y el resto del Vallès es lo más natural para mí. Pincho en bodas, fiestas privadas, eventos de empresa y fiestas populares, siempre con una sesión pensada para quien va a estar delante. También me desplazo con regularidad a Sabadell, Rubí, Cerdanyola del Vallès y Sant Quirze del Vallès.</p>

<h2>Eventos en Terrassa en los que puedo pinchar</h2>
<ul>
<li><strong>Bodas.</strong> <a href="/dj-bodas/">Más información</a>.</li>
<li><strong>Eventos de empresa</strong>: cenas, presentaciones y celebraciones de equipo. <a href="/dj-eventos-corporativos/">Más información</a>.</li>
<li><strong>Fiestas privadas</strong>: cumpleaños, puestas de largo, aniversarios. <a href="/dj-fiestas-privadas/">Más información</a>.</li>
<li><strong>Fiestas mayores y de barrio</strong>, con público de todas las edades. <a href="/dj-fiestas-mayores/">Más información</a>.</li>
</ul>

<h2>La música se adapta a tu evento</h2>
<p>No tengo un repertorio cerrado ni un estilo fijo: construyo la sesión sobre la marcha, según el espacio, la hora y quién esté bailando. Mis sesiones grabadas se mueven más entre house, tech house y latin house, y puedes escucharlas en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>.</p>

<h2>Más de 25 años de experiencia</h2>
<p>Llevo más de 25 años poniendo música en eventos privados y celebraciones. He puesto música para marcas como Nespresso, Vicio, Cupra y Red Bull y soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué celebras, la fecha aproximada y dónde será.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Ajustamos los detalles de la música para que el día del evento todo salga bien.</li>
</ol>
HTML,
        ],

        'dj-sant-cugat' => [
            'group'     => 'zona',
            'nav'       => 'Sant Cugat',
            'title'     => 'DJ en Sant Cugat para eventos privados y corporativos',
            'label'     => 'Zona · Sant Cugat del Vallès',
            'seo_title' => 'DJ en Sant Cugat para eventos y fiestas | DJ CkBoo',
            'seo_desc'  => 'DJ en Sant Cugat del Vallès para bodas, fiestas privadas, eventos de empresa y fiestas mayores. DJ residente de Txocu. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Sant Cugat del Vallès', 'Cerdanyola del Vallès', 'Sabadell', 'Vallès Occidental' ],
            'excerpt'   => 'Soy CkBoo, DJ con más de 25 años de experiencia en eventos privados y corporativos. Pincho con regularidad en Sant Cugat: soy el DJ residente para los eventos privados de Txocu.',
            'content'   => <<<HTML
<h2>Un DJ en Sant Cugat para tus fiestas y eventos</h2>
<p>Sant Cugat es una de las zonas donde más pincho, y lo hago con una idea clara: adaptar la música al espacio y a la gente. Ya sea una boda, una fiesta privada, un evento de empresa o una celebración con amigos, preparo la sesión para que encaje con el ambiente que quieres crear.</p>

<h2>DJ residente en Txocu</h2>
<p>Soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>, un espacio donde trabajo regularmente con públicos muy variados. Esa experiencia me ayuda a leer rápido a la gente y a ajustar la música en directo.</p>

<h2>Eventos en Sant Cugat en los que puedo pinchar</h2>
<ul>
<li><strong>Bodas.</strong> <a href="/dj-bodas/">Más información</a>.</li>
<li><strong>Eventos corporativos</strong>: cenas de empresa, presentaciones, lanzamientos y fiestas de equipo. <a href="/dj-eventos-corporativos/">Más información</a>.</li>
<li><strong>Fiestas privadas y puestas de largo</strong>, con música personalizada. <a href="/dj-fiestas-privadas/">Más información</a>.</li>
<li><strong>Fiestas mayores</strong> con todo tipo de público. <a href="/dj-fiestas-mayores/">Más información</a>.</li>
</ul>

<h2>Música a medida, sin lista cerrada</h2>
<p>Aquí tampoco sigo un guion: construyo la sesión sobre la marcha, según quién tenga delante. Mis mixes se mueven más entre house, tech house y latin house, y puedes escucharlos en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>. En tu evento, la música se adapta a la pista.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué celebras, la fecha aproximada y el lugar.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Concretamos juntos la música para el día del evento.</li>
</ol>
HTML,
        ],

        'dj-barcelona' => [
            'group'     => 'zona',
            'nav'       => 'Barcelona',
            'title'     => 'DJ en Barcelona para eventos privados y corporativos',
            'label'     => 'Zona · Barcelona',
            'seo_title' => 'DJ en Barcelona para eventos y empresas | DJ CkBoo',
            'seo_desc'  => 'DJ en Barcelona para eventos corporativos, bodas y fiestas privadas. He pinchado para Cupra, Nespresso y Red Bull, y en salas como Apolo. Pide presupuesto.',
            'areas'     => [ 'Barcelona', 'Barcelonès' ],
            'excerpt'   => 'Soy CkBoo, DJ nacido en Barcelona y con más de 25 años de experiencia poniendo música en eventos privados y corporativos. Adapto la sesión al espacio, al público y al momento.',
            'content'   => <<<HTML
<h2>Un DJ en Barcelona con más de 25 años de experiencia</h2>
<p>Nací en Barcelona y crecí entre clubs electrónicos y tiendas de discos, y la música siempre ha sido la constante. Hoy pongo música en eventos privados y corporativos en Barcelona con una idea sencilla: leer la sala y construir la sesión en tiempo real, sin dejar nada a medias.</p>

<h2>Eventos corporativos y de marca en Barcelona</h2>
<p>He puesto música para <strong>Nespresso, Vicio, Cupra y Red Bull</strong>, entre otros, en eventos como Cupra Pulse en Barcelona. Si organizas una presentación, un lanzamiento, una cena de empresa o una fiesta de equipo, preparo la música para acompañar cada momento. <a href="/dj-eventos-corporativos/">Más información sobre eventos corporativos</a>.</p>

<h2>Bodas y fiestas privadas en Barcelona</h2>
<p>También pincho en bodas y celebraciones privadas: adapto la música al espacio, a la hora y a la audiencia, y voy ajustando según cómo responda la pista. <a href="/dj-bodas/">Bodas</a> · <a href="/dj-fiestas-privadas/">Fiestas privadas</a>.</p>

<h2>También en sala</h2>
<p>He pinchado en clubs y salas de Barcelona como Sala Apolo y Atlantic Club. <a href="/dj-clubs-y-salas/">Más información para programadores</a>.</p>

<h2>Escucha cómo pincho</h2>
<p>Mis sesiones grabadas se mueven entre house, tech house y latin house; las tienes en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>. En un evento, la música se adapta a lo que necesite la gente para bailar.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué celebras, la fecha aproximada y el lugar.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Ajustamos la música para que el día del evento todo fluya.</li>
</ol>
HTML,
        ],
    ];
}

/**
 * Editable SEO box (title + description) for pages.
 */
add_action( 'add_meta_boxes', function () {
    add_meta_box( 'ckboo_seo', 'SEO (Google)', function ( $post ) {
        wp_nonce_field( 'ckboo_seo_save', 'ckboo_seo_nonce' );
        $title = get_post_meta( $post->ID, '_ckboo_seo_title', true );
        $desc  = get_post_meta( $post->ID, '_ckboo_seo_desc', true );
        echo '<p><label for="ckboo_seo_title"><strong>Título</strong> (máx. ~60 caracteres)</label><br>';
        echo '<input type="text" id="ckboo_seo_title" name="ckboo_seo_title" value="' . esc_attr( $title ) . '" style="width:100%"></p>';
        echo '<p><label for="ckboo_seo_desc"><strong>Descripción</strong> (máx. ~155 caracteres)</label><br>';
        echo '<textarea id="ckboo_seo_desc" name="ckboo_seo_desc" rows="3" style="width:100%">' . esc_textarea( $desc ) . '</textarea></p>';
        echo '<p class="description">Lo que se muestra en los resultados de Google. Si lo dejas vacío se usa el título de la página.</p>';
    }, 'page', 'normal', 'default' );
} );

add_action( 'save_post_page', function ( $post_id ) {
    if ( ! isset( $_POST['ckboo_seo_nonce'] ) || ! wp_verify_nonce( $_POST['ckboo_seo_nonce'], 'ckboo_seo_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    update_post_meta( $post_id, '_ckboo_seo_title', sanitize_text_field( wp_unslash( $_POST['ckboo_seo_title'] ?? '' ) ) );
    update_post_meta( $post_id, '_ckboo_seo_desc', sanitize_textarea_field( wp_unslash( $_POST['ckboo_seo_desc'] ?? '' ) ) );
} );

// Pages get an excerpt field: it is the intro paragraph of the landing pages.
add_action( 'init', function () {
    add_post_type_support( 'page', 'excerpt' );
} );

/**
 * Creates the landing pages that don't exist yet. Run once: `wp eval 'ckboo_seed_landings();'`
 * Existing pages are never overwritten.
 */
function ckboo_seed_landings() {
    $order = 10;
    foreach ( ckboo_landings() as $slug => $l ) {
        $order += 10;
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            echo "exists  $slug (ID {$existing->ID})\n";
            continue;
        }
        $id = wp_insert_post( [
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'post_name'    => $slug,
            'post_title'   => $l['title'],
            'post_excerpt' => $l['excerpt'],
            'post_content' => $l['content'],
            'menu_order'   => $order,
            'meta_input'   => [
                '_wp_page_template' => CKBOO_LANDING_TEMPLATE,
                '_ckboo_seo_title'  => $l['seo_title'],
                '_ckboo_seo_desc'   => $l['seo_desc'],
            ],
        ], true );
        echo is_wp_error( $id ) ? "ERROR $slug: " . $id->get_error_message() . "\n" : "created $slug (ID $id)\n";
    }
}

/**
 * Overwrites title/excerpt/content/SEO meta of pages that already exist, for the
 * given slugs only. Used for one-off content restructurings (never run blindly:
 * it discards manual admin edits made to those specific pages).
 *
 * @param string[] $slugs
 */
function ckboo_resync_landings( array $slugs ) {
    $all = ckboo_landings();
    foreach ( $slugs as $slug ) {
        $l    = $all[ $slug ] ?? null;
        $page = get_page_by_path( $slug );
        if ( ! $l || ! $page ) {
            echo "skip  $slug (missing landing data or page)\n";
            continue;
        }
        wp_update_post( [
            'ID'           => $page->ID,
            'post_title'   => $l['title'],
            'post_excerpt' => $l['excerpt'],
            'post_content' => $l['content'],
        ] );
        update_post_meta( $page->ID, '_wp_page_template', CKBOO_LANDING_TEMPLATE );
        update_post_meta( $page->ID, '_ckboo_seo_title', $l['seo_title'] );
        update_post_meta( $page->ID, '_ckboo_seo_desc', $l['seo_desc'] );
        echo "synced $slug (ID {$page->ID})\n";
    }
}

/**
 * Landing pages that actually exist and are published, keyed by slug.
 */
function ckboo_live_landings() {
    $out = [];
    foreach ( ckboo_landings() as $slug => $l ) {
        $page = get_page_by_path( $slug );
        if ( $page && 'publish' === $page->post_status ) {
            $l['url']  = get_permalink( $page );
            $l['slug'] = $slug;
            $out[ $slug ] = $l;
        }
    }
    return $out;
}
