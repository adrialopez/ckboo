<?php
/**
 * CkBoo — landing pages (services and areas).
 *
 * The copy below is only the starting content: `ckboo_seed_landings()` creates
 * the pages once and from then on everything is editable in the WordPress admin
 * (title, body, excerpt = intro paragraph, and the "SEO" box for title/description).
 */

const CKBOO_LANDING_TEMPLATE = 'page-landing.php';

/**
 * @return array[] slug => data
 */
function ckboo_landings() {
    $mix = esc_url( CKBOO_MIXCLOUD_URL );

    return [

        'dj-eventos-corporativos' => [
            'group'     => 'servicio',
            'nav'       => 'Eventos corporativos',
            'title'     => 'DJ para eventos corporativos',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para eventos corporativos en Barcelona y Vallès | CkBoo',
            'seo_desc'  => 'DJ para eventos corporativos, presentaciones y fiestas de empresa en Barcelona, Sant Cugat, Terrassa y Catalunya. He pinchado para Nespresso, Cupra y Red Bull.',
            'areas'     => [ 'Barcelona', 'Sant Cugat del Vallès', 'Terrassa', 'Catalunya' ],
            'excerpt'   => 'Soy CkBoo, DJ con más de 20 años de experiencia en eventos privados y corporativos. Pongo la música en presentaciones, cenas, convenciones y fiestas de empresa, con una sesión pensada para cada momento del evento. He puesto música para Nespresso, Vicio, Cupra y Red Bull.',
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
<p>Mis sesiones grabadas se mueven entre house, tech house y latin house, pero en un evento manda lo que el público necesita. Puedes escuchar mi estilo en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>.</p>

<h2>Experiencia con marcas</h2>
<p>He puesto música para <strong>Nespresso, Vicio, Cupra y Red Bull</strong>, entre otros, en eventos como Cupra Pulse en Barcelona. Trabajo con soltura en espacios y formatos muy distintos, desde un espacio de oficina hasta un evento al aire libre.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué tipo de evento es, la fecha aproximada y dónde se celebra.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Afinamos el planteamiento de la música para que el día del evento todo fluya.</li>
</ol>
HTML,
        ],

        'dj-tardeos-fiestas-mayores' => [
            'group'     => 'servicio',
            'nav'       => 'Tardeos y fiestas mayores',
            'title'     => 'DJ para tardeos y fiestas mayores',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para tardeos y fiestas mayores en Catalunya | CkBoo',
            'seo_desc'  => 'DJ para tardeos y fiestas mayores en Terrassa, Sant Cugat, Barcelona y toda Catalunya. Todo tipo de música adaptada al público. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ],
            'excerpt'   => 'Soy CkBoo, DJ con más de 20 años poniendo música en celebraciones populares y privadas. Para tardeos y fiestas mayores construyo la sesión sobre la marcha, según quién esté delante, para que la pista no pare.',
            'content'   => <<<HTML
<h2>Música para que la fiesta arranque y no baje</h2>
<p>Un tardeo y una fiesta mayor comparten lo esencial: mucha gente, ganas de pasarlo bien y un público que mezcla edades y gustos. Ahí no funciona una lista cerrada. Leo la pista y voy construyendo la sesión en tiempo real, pinchando <strong>todo tipo de música</strong> según lo que pida el momento.</p>

<h2>Tardeos</h2>
<p>El tardeo empieza con la luz del día y termina ya de noche, y la música tiene que acompañar ese recorrido: ambiente agradable al principio, más energía a medida que se llena la pista. Lo adapto al espacio, sea un local, una terraza o un evento privado, y a la gente que ha venido.</p>

<h2>Fiestas mayores y celebraciones populares</h2>
<p>En una fiesta mayor conviven distintas generaciones y hay que llegar a todas. Preparo una sesión con hits, clásicos y música de baile que funcione para todos, y la voy ajustando según cómo responda el público.</p>

<h2>Música personalizada para tu evento</h2>
<p>Adapto la música al espacio, a la audiencia y al tipo de celebración. Si tienes claro lo que quieres, o lo que no, dímelo en el formulario y lo tendré en cuenta. Mis sesiones grabadas se mueven entre house, tech house y latin house; puedes escucharlas en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>.</p>

<h2>Dónde trabajo</h2>
<p>Mi base está en Terrassa y me muevo por el Vallès, Barcelona y el resto de Catalunya. Consulta también mis páginas de <a href="/dj-terrassa/">DJ en Terrassa</a>, <a href="/dj-sant-cugat/">DJ en Sant Cugat</a> y <a href="/dj-barcelona/">DJ en Barcelona</a>.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario el tipo de evento, la fecha aproximada y el lugar.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Concretamos los detalles de la música antes del día del evento.</li>
</ol>
HTML,
        ],

        'dj-puestas-de-largo-fiestas-privadas' => [
            'group'     => 'servicio',
            'nav'       => 'Puestas de largo y fiestas privadas',
            'title'     => 'DJ para puestas de largo y fiestas privadas',
            'label'     => 'Servicio',
            'seo_title' => 'DJ para puestas de largo y fiestas privadas | CkBoo',
            'seo_desc'  => 'DJ para puestas de largo, cumpleaños, aniversarios y fiestas privadas en Terrassa, Sant Cugat, Barcelona y Catalunya. Música a medida. Pide presupuesto.',
            'areas'     => [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ],
            'excerpt'   => 'Soy CkBoo, DJ con más de 20 años poniendo música en celebraciones privadas. Para puestas de largo y fiestas privadas preparo una sesión personalizada, adaptada a las personas, al espacio y al ambiente que quieres crear.',
            'content'   => <<<HTML
<h2>Una fiesta privada con la música que te representa</h2>
<p>Las celebraciones privadas son las que más se recuerdan, y la música tiene mucho que ver con ello. En lugar de aplicar una fórmula, preparo cada fiesta escuchando antes cómo es la celebración, quién va a estar y qué ambiente quieres conseguir.</p>

<h2>Puestas de largo</h2>
<p>Una puesta de largo es una celebración especial con momentos importantes a lo largo de la noche. Hablamos de cómo quieres que suene cada uno de ellos y de qué música esperáis los invitados, y después construyo una sesión que acompañe toda la fiesta, desde el inicio más tranquilo hasta la pista de baile.</p>

<h2>Cumpleaños, aniversarios y otras fiestas privadas</h2>
<p>Pincho en cumpleaños, aniversarios y celebraciones entre amigos y familia. Sé leer a un público que puede mezclar edades y gustos, y voy cambiando de estilo según lo que necesite la pista, sin dejar nada a medias.</p>

<h2>Todo tipo de música, a medida</h2>
<p>Pincho todo tipo de música y adapto la sesión al espacio y a la audiencia. Mis sesiones grabadas se mueven entre house, tech house y latin house, y puedes escucharlas en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>. En tu fiesta, la música la decide la gente que la disfruta.</p>

<h2>Residente en Txocu</h2>
<p>Soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>, así que estoy acostumbrado a trabajar en celebraciones privadas con público muy variado.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario qué vas a celebrar, la fecha aproximada y dónde será.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Afinamos juntos la música para que sea justo lo que imaginas.</li>
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
            'excerpt'   => 'Soy CkBoo, DJ con más de 20 años poniendo música en todo tipo de celebraciones. También pincho en bodas, adaptando la sesión a cada momento del convite y la fiesta, y a los gustos de los novios y sus invitados.',
            'content'   => <<<HTML
<h2>Música para cada momento de la boda</h2>
<p>Una boda no es una única fiesta, son varias seguidas: la recepción, el convite, el baile de los novios y la fiesta que sigue después. Cada momento pide un tipo de música distinto, y preparo la sesión escuchando antes qué imagináis los novios para cada uno de ellos.</p>

<h2>De la cena al baile</h2>
<p>Durante la cena, música tranquila que acompañe sin imponerse. Al terminar, subo la energía poco a poco hasta llenar la pista, leyendo al público según van entrando invitados de edades y gustos distintos. No sigo una lista cerrada: construyo la sesión en directo, como en cualquier otra celebración.</p>

<h2>Todo tipo de música, a vuestro gusto</h2>
<p>Pincho todo tipo de música, así que hablamos antes de la boda de lo que os gusta, lo que no puede faltar y lo que preferís evitar. Mis sesiones grabadas se mueven entre house, tech house y latin house, y puedes escucharlas en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a> para hacerte una idea de mi estilo.</p>

<h2>Más de 20 años en celebraciones privadas</h2>
<p>Llevo más de 20 años poniendo música en celebraciones privadas y soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>, así que estoy acostumbrado a trabajar con públicos muy variados y a que un evento salga bien de principio a fin.</p>

<h2>Cómo pedir presupuesto</h2>
<ol>
<li>Cuéntame en el formulario la fecha de la boda, el lugar y cómo os la imagináis.</li>
<li>Te respondo con disponibilidad y presupuesto.</li>
<li>Preparamos juntos la música para cada momento del día.</li>
</ol>
HTML,
        ],

        'dj-terrassa' => [
            'group'     => 'zona',
            'nav'       => 'Terrassa',
            'title'     => 'DJ en Terrassa para eventos privados y corporativos',
            'label'     => 'Zona · Terrassa',
            'seo_title' => 'DJ en Terrassa para eventos y fiestas | DJ CkBoo',
            'seo_desc'  => 'DJ en Terrassa para fiestas mayores, tardeos, celebraciones privadas y eventos de empresa. +20 años de experiencia. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Terrassa', 'Vallès Occidental' ],
            'excerpt'   => 'Soy CkBoo, DJ con base en Terrassa y más de 20 años poniendo música en eventos privados y corporativos. Adapto cada sesión al espacio, al público y al momento de tu celebración.',
            'content'   => <<<HTML
<h2>Un DJ en Terrassa para eventos de todo tipo</h2>
<p>Si buscas un DJ en Terrassa, trabajo desde aquí: mi base está en la ciudad, así que moverme por Terrassa y el resto del Vallès es lo más natural para mí. Pincho en fiestas privadas, celebraciones de amigos y familia, eventos de empresa y fiestas populares, siempre con una sesión pensada para quien va a estar delante.</p>

<h2>Eventos en Terrassa en los que puedo pinchar</h2>
<ul>
<li><strong>Fiestas mayores y de barrio</strong>, con público de todas las edades. <a href="/dj-tardeos-fiestas-mayores/">Más información</a>.</li>
<li><strong>Tardeos</strong> en locales, terrazas y espacios privados.</li>
<li><strong>Puestas de largo y fiestas privadas</strong>, desde cumpleaños hasta aniversarios. <a href="/dj-puestas-de-largo-fiestas-privadas/">Más información</a>.</li>
<li><strong>Eventos de empresa</strong>: cenas, presentaciones y celebraciones de equipo. <a href="/dj-eventos-corporativos/">Más información</a>.</li>
</ul>

<h2>La música se adapta a tu evento</h2>
<p>No tengo un repertorio cerrado. Pincho todo tipo de música y construyo la sesión sobre la marcha según el espacio, la hora y quién esté bailando. Mis sesiones grabadas se mueven entre house, tech house y latin house, pero en un evento manda lo que necesite la gente para no parar de bailar. Puedes escucharlas en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>.</p>

<h2>Más de 20 años de experiencia</h2>
<p>Llevo más de 20 años poniendo música en eventos privados y celebraciones. He puesto música para marcas como Nespresso, Vicio, Cupra y Red Bull y soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>.</p>

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
            'seo_desc'  => 'DJ en Sant Cugat del Vallès para fiestas privadas, eventos de empresa, tardeos y fiestas mayores. DJ residente de Txocu. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Sant Cugat del Vallès', 'Vallès Occidental' ],
            'excerpt'   => 'Soy CkBoo, DJ con más de 20 años de experiencia en eventos privados y corporativos. Pincho con regularidad en Sant Cugat: soy el DJ residente para los eventos privados de Txocu.',
            'content'   => <<<HTML
<h2>Un DJ en Sant Cugat para tus fiestas y eventos</h2>
<p>Sant Cugat es una de las zonas donde más pincho, y lo hago con una idea clara: adaptar la música al espacio y a la gente. Ya sea una fiesta privada, un evento de empresa o una celebración con amigos, preparo la sesión para que encaje con el ambiente que quieres crear.</p>

<h2>DJ residente en Txocu</h2>
<p>Soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener">Txocu</a>, un espacio donde trabajo regularmente con públicos muy variados. Esa experiencia me ayuda a leer rápido a la gente y a ajustar la música en directo.</p>

<h2>Eventos en Sant Cugat en los que puedo pinchar</h2>
<ul>
<li><strong>Fiestas privadas y puestas de largo</strong>, con música personalizada. <a href="/dj-puestas-de-largo-fiestas-privadas/">Más información</a>.</li>
<li><strong>Eventos corporativos</strong>: cenas de empresa, presentaciones, lanzamientos y fiestas de equipo. <a href="/dj-eventos-corporativos/">Más información</a>.</li>
<li><strong>Tardeos y fiestas mayores</strong> con todo tipo de público. <a href="/dj-tardeos-fiestas-mayores/">Más información</a>.</li>
</ul>

<h2>Música a medida, sin lista cerrada</h2>
<p>Pincho todo tipo de música y construyo la sesión sobre la marcha, según quién esté delante. Mis mixes se mueven entre house, tech house y latin house, y puedes escucharlos en <a href="{$mix}" target="_blank" rel="noopener">Mixcloud</a>. En tu evento, la música se adapta a la pista.</p>

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
            'seo_desc'  => 'DJ en Barcelona para eventos corporativos, fiestas privadas y tardeos. He pinchado para Cupra, Nespresso y Red Bull. Pide presupuesto a CkBoo.',
            'areas'     => [ 'Barcelona', 'Barcelonès' ],
            'excerpt'   => 'Soy CkBoo, DJ nacido en Barcelona y con más de 20 años de experiencia poniendo música en eventos privados y corporativos. Adapto la sesión al espacio, al público y al momento.',
            'content'   => <<<HTML
<h2>Un DJ en Barcelona con más de 20 años de experiencia</h2>
<p>Nací en Barcelona y crecí entre clubs electrónicos y tiendas de discos, y la música siempre ha sido la constante. Hoy pongo música en eventos privados y corporativos en Barcelona con una idea sencilla: leer la sala y construir la sesión en tiempo real, sin dejar nada a medias.</p>

<h2>Eventos corporativos y de marca en Barcelona</h2>
<p>He puesto música para <strong>Nespresso, Vicio, Cupra y Red Bull</strong>, entre otros, en eventos como Cupra Pulse en Barcelona. Si organizas una presentación, un lanzamiento, una cena de empresa o una fiesta de equipo, preparo la música para acompañar cada momento. <a href="/dj-eventos-corporativos/">Más información sobre eventos corporativos</a>.</p>

<h2>Fiestas privadas y tardeos en Barcelona</h2>
<p>Para celebraciones privadas y tardeos adapto la música al espacio, a la hora y a la audiencia. Pincho todo tipo de música y voy ajustando según cómo responda la pista. <a href="/dj-puestas-de-largo-fiestas-privadas/">Fiestas privadas y puestas de largo</a> · <a href="/dj-tardeos-fiestas-mayores/">Tardeos y fiestas mayores</a>.</p>

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
