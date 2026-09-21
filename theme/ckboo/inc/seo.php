<?php
/**
 * CkBoo — SEO / GEO: titles, meta descriptions, Open Graph, structured data (JSON-LD),
 * robots.txt rules for search and AI crawlers, and /llms.txt.
 */

const CKBOO_SEO_TITLE = 'DJ CkBoo | Eventos privados y corporativos en Terrassa';
const CKBOO_SEO_DESC  = 'CkBoo, DJ en Terrassa, Sant Cugat y Barcelona. +20 años adaptando la música a cada evento privado y corporativo. Escucha mis mixes y contrátame.';

const CKBOO_MIXCLOUD_URL  = 'https://www.mixcloud.com/ckboo/';
const CKBOO_INSTAGRAM_URL = 'https://www.instagram.com/dj_ckboo/';
const CKBOO_EMAIL         = 'dj@ckboo.es';

/**
 * Frequently asked questions: shown on the home page and exposed as FAQPage schema.
 *
 * @return array[] Each: q, a (plain text).
 */
function ckboo_faqs() {
    return [
        [
            'q' => '¿Quién es DJ CkBoo?',
            'a' => 'CkBoo es el nombre artístico de Adrià López, DJ con base en Terrassa y más de 20 años de experiencia poniendo música en eventos privados y corporativos. Es DJ residente para los eventos privados de Txocu y ha puesto música para marcas como Nespresso, Vicio, Cupra y Red Bull.',
        ],
        [
            'q' => '¿En qué zonas trabajas?',
            'a' => 'Trabajo en Terrassa, Sant Cugat del Vallès, Barcelona y el resto de Catalunya. Mi base está en Terrassa.',
        ],
        [
            'q' => '¿Para qué tipo de eventos puedes pinchar?',
            'a' => 'Para eventos corporativos, tardeos, fiestas mayores, puestas de largo y fiestas privadas como cumpleaños o aniversarios.',
        ],
        [
            'q' => '¿Qué tipo de música pinchas?',
            'a' => 'Todo tipo de música, adaptada a cada evento. Construyo la sesión según el espacio, la audiencia y el momento. Mis sesiones grabadas se mueven entre house, tech house y latin house y puedes escucharlas en Mixcloud.',
        ],
        [
            'q' => '¿Cómo puedo pedir presupuesto?',
            'a' => 'Rellena el formulario de contratación de esta web o escríbeme a ' . CKBOO_EMAIL . ' con el tipo de evento, la fecha aproximada y el lugar. Te respondo con disponibilidad y presupuesto.',
        ],
        [
            'q' => '¿De qué depende el precio?',
            'a' => 'Depende del tipo de evento, la duración, la ubicación y las necesidades de cada celebración. Cuéntame los detalles y te preparo un presupuesto a medida.',
        ],
    ];
}

/* ---------------------------------------------------------
 * Per-page SEO data
 * ------------------------------------------------------- */

/**
 * @return array{title:string,desc:string}|null Null for pages that aren't indexable content.
 */
function ckboo_page_seo() {
    if ( is_front_page() ) {
        return [ 'title' => CKBOO_SEO_TITLE, 'desc' => CKBOO_SEO_DESC ];
    }
    if ( is_page() ) {
        $id    = get_queried_object_id();
        $title = (string) get_post_meta( $id, '_ckboo_seo_title', true );
        $desc  = (string) get_post_meta( $id, '_ckboo_seo_desc', true );
        if ( $title || $desc ) {
            return [
                'title' => $title ? $title : get_the_title( $id ) . ' | DJ CkBoo',
                'desc'  => $desc ? $desc : wp_strip_all_tags( get_the_excerpt( $id ) ),
            ];
        }
    }
    return null;
}

function ckboo_og_image() {
    return [
        'url' => get_template_directory_uri() . '/assets/img/og-ckboo.jpg',
        'w'   => 1200,
        'h'   => 630,
        'alt' => 'DJ CkBoo — DJ para eventos privados y corporativos en Terrassa, Sant Cugat y Barcelona',
    ];
}

add_filter( 'pre_get_document_title', function ( $title ) {
    $seo = ckboo_page_seo();
    return $seo ? $seo['title'] : $title;
} );

add_filter( 'wp_robots', function ( $robots ) {
    // Legal pages stay out of search results (still followable).
    if ( is_page( [ 'politica-privacidad', 'politica-cookies' ] ) ) {
        $robots['noindex'] = true;
        $robots['follow']  = true;
        unset( $robots['index'] );
        return $robots;
    }
    // Indexable pages: allow full snippets so search and AI answers can quote the page.
    if ( ! is_404() && ! is_search() ) {
        $robots['max-snippet']       = '-1';
        $robots['max-video-preview'] = '-1';
    }
    return $robots;
} );

/* ---------------------------------------------------------
 * LCP: preload the hero photo and the two main fonts
 * ------------------------------------------------------- */
add_action( 'wp_head', function () {
    $uri = get_template_directory_uri();
    if ( is_front_page() ) {
        printf( '<link rel="preload" as="image" href="%s" type="image/webp" fetchpriority="high" />' . "\n", esc_url( $uri . '/assets/img/ckboo-hero.webp' ) );
    }
    foreach ( [ 'playfair-display-latin', 'dm-sans-latin' ] as $font ) {
        printf( '<link rel="preload" as="font" type="font/woff2" href="%s" crossorigin />' . "\n", esc_url( $uri . '/assets/fonts/' . $font . '.woff2' ) );
    }
}, 1 );

/* ---------------------------------------------------------
 * <head>: description, Open Graph, Twitter, JSON-LD
 * ------------------------------------------------------- */
function ckboo_area_node( $name ) {
    $cities = [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona' ];
    return [ '@type' => in_array( $name, $cities, true ) ? 'City' : 'AdministrativeArea', 'name' => $name ];
}

add_action( 'wp_head', function () {
    $seo = ckboo_page_seo();
    if ( ! $seo ) {
        return;
    }

    $home  = home_url( '/' );
    $url   = is_front_page() ? $home : get_permalink( get_queried_object_id() );
    $og    = ckboo_og_image();
    $desc  = $seo['desc'];
    $title = $seo['title'];

    echo "\n<!-- CkBoo SEO -->\n";
    printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $desc ) );
    echo '<meta name="theme-color" content="#0a0a0a" />' . "\n";

    $og_meta = [
        'og:type'         => 'website',
        'og:locale'       => 'es_ES',
        'og:site_name'    => 'CkBoo',
        'og:title'        => $title,
        'og:description'  => $desc,
        'og:url'          => $url,
        'og:image'        => $og['url'],
        'og:image:width'  => $og['w'],
        'og:image:height' => $og['h'],
        'og:image:alt'    => $og['alt'],
    ];
    foreach ( $og_meta as $prop => $val ) {
        printf( '<meta property="%s" content="%s" />' . "\n", esc_attr( $prop ), esc_attr( $val ) );
    }
    $tw_meta = [
        'twitter:card'        => 'summary_large_image',
        'twitter:title'       => $title,
        'twitter:description' => $desc,
        'twitter:image'       => $og['url'],
        'twitter:image:alt'   => $og['alt'],
    ];
    foreach ( $tw_meta as $name => $val ) {
        printf( '<meta name="%s" content="%s" />' . "\n", esc_attr( $name ), esc_attr( $val ) );
    }

    $landings = function_exists( 'ckboo_live_landings' ) ? ckboo_live_landings() : [];
    $areas    = [ 'Terrassa', 'Sant Cugat del Vallès', 'Barcelona', 'Catalunya' ];

    // Offer catalogue: one Service per published service landing.
    $catalog = [];
    foreach ( $landings as $l ) {
        if ( 'servicio' !== $l['group'] ) {
            continue;
        }
        $catalog[] = [
            '@type'       => 'Offer',
            'itemOffered' => [
                '@type'       => 'Service',
                'name'        => $l['title'],
                'url'         => $l['url'],
                'serviceType' => 'DJ para eventos',
            ],
        ];
    }

    $graph = [
        [
            '@type'       => 'WebSite',
            '@id'         => $home . '#website',
            'url'         => $home,
            'name'        => 'CkBoo',
            'description' => CKBOO_SEO_DESC,
            'inLanguage'  => 'es-ES',
            'publisher'   => [ '@id' => $home . '#dj' ],
        ],
        [
            '@type'         => 'Person',
            '@id'           => $home . '#dj',
            'name'          => 'CkBoo',
            'alternateName' => 'Adrià López',
            'description'   => 'DJ con base en Terrassa y más de 20 años de experiencia en eventos privados y corporativos. DJ residente para los eventos privados de Txocu.',
            'url'           => $home,
            'image'         => $og['url'],
            'jobTitle'      => 'DJ',
            'homeLocation'  => [ '@type' => 'City', 'name' => 'Terrassa' ],
            'knowsAbout'    => [ 'DJ', 'Música para eventos corporativos', 'Música para fiestas privadas', 'House', 'Tech house', 'Latin house' ],
            'email'         => CKBOO_EMAIL,
            'sameAs'        => [ CKBOO_MIXCLOUD_URL, CKBOO_INSTAGRAM_URL ],
        ],
        [
            '@type'        => 'ProfessionalService',
            '@id'          => $home . '#service',
            'name'         => 'DJ CkBoo',
            'description'  => CKBOO_SEO_DESC,
            'url'          => $home,
            'image'        => $og['url'],
            'email'        => CKBOO_EMAIL,
            'founder'      => [ '@id' => $home . '#dj' ],
            'address'      => [ '@type' => 'PostalAddress', 'addressLocality' => 'Terrassa', 'addressRegion' => 'Barcelona', 'addressCountry' => 'ES' ],
            'areaServed'   => array_map( 'ckboo_area_node', $areas ),
            'serviceType'  => 'DJ para eventos privados y corporativos',
            'sameAs'       => [ CKBOO_MIXCLOUD_URL, CKBOO_INSTAGRAM_URL ],
        ],
        [
            '@type'           => 'WebPage',
            '@id'             => $url . '#webpage',
            'url'             => $url,
            'name'            => $title,
            'description'     => $desc,
            'inLanguage'      => 'es-ES',
            'isPartOf'        => [ '@id' => $home . '#website' ],
            'about'           => [ '@id' => $home . '#service' ],
            'primaryImageOfPage' => [ '@type' => 'ImageObject', 'url' => $og['url'], 'width' => $og['w'], 'height' => $og['h'] ],
        ],
    ];

    if ( $catalog && is_front_page() ) {
        $graph[2]['hasOfferCatalog'] = [
            '@type'           => 'OfferCatalog',
            'name'            => 'Servicios de DJ',
            'itemListElement' => $catalog,
        ];
    }

    if ( is_front_page() ) {
        $graph[] = [
            '@type'      => 'FAQPage',
            '@id'        => $home . '#faq',
            'mainEntity' => array_map( function ( $f ) {
                return [
                    '@type'          => 'Question',
                    'name'           => $f['q'],
                    'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $f['a'] ],
                ];
            }, ckboo_faqs() ),
        ];
    } else {
        $slug = get_post_field( 'post_name', get_queried_object_id() );
        $l    = $landings[ $slug ] ?? null;
        if ( $l ) {
            $graph[] = [
                '@type'       => 'Service',
                '@id'         => $url . '#service',
                'name'        => $l['title'],
                'description' => $desc,
                'url'         => $url,
                'serviceType' => 'DJ para eventos',
                'provider'    => [ '@id' => $home . '#service' ],
                'areaServed'  => array_map( 'ckboo_area_node', $l['areas'] ),
            ];
        }
        $graph[] = [
            '@type'           => 'BreadcrumbList',
            '@id'             => $url . '#breadcrumb',
            'itemListElement' => [
                [ '@type' => 'ListItem', 'position' => 1, 'name' => 'DJ CkBoo', 'item' => $home ],
                [ '@type' => 'ListItem', 'position' => 2, 'name' => $l ? $l['nav'] : get_the_title(), 'item' => $url ],
            ],
        ];
        $graph[3]['breadcrumb'] = [ '@id' => $url . '#breadcrumb' ];
    }

    echo '<script type="application/ld+json">' . wp_json_encode( [ '@context' => 'https://schema.org', '@graph' => $graph ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
    echo "<!-- /CkBoo SEO -->\n";
}, 5 );

/* ---------------------------------------------------------
 * XML sitemap: legal pages are noindex, keep them out
 * ------------------------------------------------------- */
add_filter( 'wp_sitemaps_posts_query_args', function ( $args, $post_type ) {
    if ( 'page' === $post_type ) {
        $exclude = [];
        foreach ( [ 'politica-privacidad', 'politica-cookies' ] as $slug ) {
            $page = get_page_by_path( $slug );
            if ( $page ) {
                $exclude[] = $page->ID;
            }
        }
        $args['post__not_in'] = array_merge( isset( $args['post__not_in'] ) ? (array) $args['post__not_in'] : [], $exclude );
    }
    return $args;
}, 10, 2 );

/* ---------------------------------------------------------
 * robots.txt: search and AI crawlers are explicitly welcome
 * ------------------------------------------------------- */
add_filter( 'robots_txt', function ( $output ) {
    $bots = [
        'OAI-SearchBot', 'GPTBot', 'ChatGPT-User',
        'ClaudeBot', 'Claude-SearchBot', 'Claude-User',
        'PerplexityBot', 'Perplexity-User',
        'Google-Extended', 'Applebot-Extended',
    ];
    $rules  = "\n# Buscadores y asistentes de IA: bienvenidos\n";
    $rules .= implode( "\n", array_map( fn( $b ) => 'User-agent: ' . $b, $bots ) ) . "\n";
    $rules .= "Allow: /\nDisallow: /wp-admin/\nAllow: /wp-admin/admin-ajax.php\n";
    return $output . $rules;
}, 20 );

/* ---------------------------------------------------------
 * /llms.txt — summary of the site for language models
 * ------------------------------------------------------- */
add_action( 'template_redirect', function () {
    $path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) : '';
    if ( '/llms.txt' !== $path ) {
        return;
    }

    $home     = home_url( '/' );
    $landings = function_exists( 'ckboo_live_landings' ) ? ckboo_live_landings() : [];

    $out  = "# DJ CkBoo\n\n";
    $out .= "> CkBoo (Adrià López) es un DJ con base en Terrassa y más de 20 años de experiencia en eventos privados y corporativos en Terrassa, Sant Cugat del Vallès, Barcelona y el resto de Catalunya. Pincha todo tipo de música adaptada al espacio, al público y al momento. Es DJ residente para los eventos privados de Txocu y ha puesto música para Nespresso, Vicio, Cupra y Red Bull.\n\n";

    $out .= "## Servicios\n";
    foreach ( $landings as $l ) {
        if ( 'servicio' === $l['group'] ) {
            $out .= '- [' . $l['title'] . '](' . $l['url'] . '): ' . $l['excerpt'] . "\n";
        }
    }
    $out .= "\n## Zonas\n";
    foreach ( $landings as $l ) {
        if ( 'zona' === $l['group'] ) {
            $out .= '- [' . $l['title'] . '](' . $l['url'] . '): ' . $l['excerpt'] . "\n";
        }
    }

    $out .= "\n## Datos clave\n";
    $out .= "- Nombre artístico: CkBoo (DJ CkBoo). Nombre real: Adrià López.\n";
    $out .= "- Base: Terrassa (Barcelona, Catalunya). Zonas de trabajo: Terrassa, Sant Cugat del Vallès, Barcelona y el resto de Catalunya.\n";
    $out .= "- Experiencia: más de 20 años poniendo música en eventos privados y corporativos.\n";
    $out .= "- Eventos: corporativos, tardeos, fiestas mayores, puestas de largo y fiestas privadas.\n";
    $out .= "- Música: todo tipo, adaptada al evento. Sesiones grabadas de house, tech house y latin house.\n";
    $out .= "- Residencia: DJ residente para los eventos privados de Txocu (https://www.txocu.com/).\n";
    $out .= "- Marcas para las que ha puesto música: Nespresso, Vicio, Cupra y Red Bull.\n";

    $out .= "\n## Preguntas frecuentes\n";
    foreach ( ckboo_faqs() as $f ) {
        $out .= '- ' . $f['q'] . ' ' . $f['a'] . "\n";
    }

    $out .= "\n## Contacto y enlaces\n";
    $out .= '- Email: ' . CKBOO_EMAIL . "\n";
    $out .= '- Formulario de contratación: ' . $home . "#booking\n";
    $out .= '- Mixes en Mixcloud: ' . CKBOO_MIXCLOUD_URL . "\n";
    $out .= '- Instagram: ' . CKBOO_INSTAGRAM_URL . "\n";

    status_header( 200 );
    header( 'Content-Type: text/plain; charset=utf-8' );
    header( 'Cache-Control: public, max-age=3600' );
    echo $out; // phpcs:ignore WordPress.Security.EscapeOutput
    exit;
} );
