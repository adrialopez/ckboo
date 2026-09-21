<?php
/**
 * CkBoo — SEO: title, meta description, Open Graph and structured data.
 */

const CKBOO_SEO_TITLE = 'DJ CkBoo | Eventos privados y corporativos en Terrassa';
const CKBOO_SEO_DESC  = 'CkBoo, DJ en Terrassa, Sant Cugat y Barcelona. +20 años adaptando la música a cada evento privado y corporativo. Escucha mis mixes y contrátame.';

const CKBOO_MIXCLOUD_URL  = 'https://www.mixcloud.com/ckboo/';
const CKBOO_INSTAGRAM_URL = 'https://www.instagram.com/dj_ckboo/';

// Front page <title>.
add_filter( 'pre_get_document_title', function ( $title ) {
    return is_front_page() ? CKBOO_SEO_TITLE : $title;
} );

// Legal pages stay out of search results (still followable).
add_filter( 'wp_robots', function ( $robots ) {
    if ( is_page( [ 'politica-privacidad', 'politica-cookies' ] ) ) {
        $robots['noindex'] = true;
        $robots['follow']  = true;
        unset( $robots['index'] );
    }
    return $robots;
} );

add_action( 'wp_head', function () {
    if ( ! is_front_page() ) {
        return;
    }

    $home  = home_url( '/' );
    $image = get_template_directory_uri() . '/assets/img/ckboo-hero.jpg';

    echo "\n<!-- CkBoo SEO -->\n";
    printf( '<meta name="description" content="%s" />' . "\n", esc_attr( CKBOO_SEO_DESC ) );
    echo '<meta name="theme-color" content="#0a0a0a" />' . "\n";

    printf( '<meta property="og:type" content="website" />' . "\n" );
    printf( '<meta property="og:locale" content="es_ES" />' . "\n" );
    printf( '<meta property="og:site_name" content="CkBoo" />' . "\n" );
    printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( 'DJ CkBoo | Terrassa, Sant Cugat y Barcelona' ) );
    printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( CKBOO_SEO_DESC ) );
    printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $home ) );
    printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $image ) );
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";

    $graph = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'       => 'WebSite',
                '@id'         => $home . '#website',
                'url'         => $home,
                'name'        => 'CkBoo',
                'description' => CKBOO_SEO_DESC,
                'inLanguage'  => 'es-ES',
            ],
            [
                '@type'         => 'Person',
                '@id'           => $home . '#dj',
                'name'          => 'CkBoo',
                'alternateName' => 'Adrià López',
                'description'   => CKBOO_SEO_DESC,
                'url'           => $home,
                'image'         => $image,
                'jobTitle'      => 'DJ',
                'homeLocation'  => [ '@type' => 'City', 'name' => 'Terrassa' ],
                'areaServed'    => [
                    [ '@type' => 'City',  'name' => 'Terrassa' ],
                    [ '@type' => 'City',  'name' => 'Sant Cugat del Vallès' ],
                    [ '@type' => 'City',  'name' => 'Barcelona' ],
                    [ '@type' => 'State', 'name' => 'Catalunya' ],
                ],
                'sameAs'        => [ CKBOO_MIXCLOUD_URL, CKBOO_INSTAGRAM_URL ],
            ],
        ],
    ];

    echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
    echo "<!-- /CkBoo SEO -->\n";
}, 5 );
