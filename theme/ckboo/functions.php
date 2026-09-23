<?php
/**
 * CkBoo — functions.php
 */

define( 'CKBOO_VERSION', '1.3.7' );

/* ---------------------------------------------------------
 * Theme setup
 * ------------------------------------------------------- */
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ] );
} );

/* ---------------------------------------------------------
 * Assets
 * ------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {
    $uri = get_template_directory_uri();

    wp_enqueue_style( 'ckboo-fonts', $uri . '/assets/css/fonts.css', [], CKBOO_VERSION );
    wp_enqueue_style( 'ckboo-style', $uri . '/assets/css/style.css', [ 'ckboo-fonts' ], CKBOO_VERSION );
    wp_enqueue_style( 'ckboo-dj', $uri . '/assets/css/dj.css', [ 'ckboo-style' ], CKBOO_VERSION );
    wp_enqueue_script( 'ckboo-main', $uri . '/assets/js/main.js', [], CKBOO_VERSION, true );
} );

// The theme doesn't use blocks on the front end: drop their default CSS.
add_action( 'wp_enqueue_scripts', function () {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
}, 100 );

/* ---------------------------------------------------------
 * <head> clean-up
 * ------------------------------------------------------- */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

add_filter( 'body_class', function ( $classes ) {
    $classes[] = 'dj-mode';
    return $classes;
} );

/* ---------------------------------------------------------
 * "Fotos del slider" — editable from the admin menu.
 * Title = caption shown over the photo, featured image = the photo,
 * "Orden" (page attributes) = position in the slider.
 * ------------------------------------------------------- */
add_action( 'init', function () {
    register_post_type( 'ckboo_foto', [
        'labels' => [
            'name'                  => 'Fotos del slider',
            'singular_name'         => 'Foto',
            'menu_name'             => 'Fotos del slider',
            'all_items'             => 'Todas las fotos',
            'add_new'               => 'Añadir foto',
            'add_new_item'          => 'Añadir foto',
            'edit_item'             => 'Editar foto',
            'new_item'              => 'Nueva foto',
            'search_items'          => 'Buscar fotos',
            'not_found'             => 'No hay fotos todavía',
            'not_found_in_trash'    => 'No hay fotos en la papelera',
            'featured_image'        => 'Foto',
            'set_featured_image'    => 'Elegir foto',
            'remove_featured_image' => 'Quitar foto',
            'use_featured_image'    => 'Usar como foto',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-images-alt2',
        'menu_position'=> 20,
        'supports'     => [ 'title', 'thumbnail', 'page-attributes' ],
        'has_archive'  => false,
        'rewrite'      => false,
    ] );
} );

add_filter( 'enter_title_here', function ( $title, $post ) {
    return 'ckboo_foto' === $post->post_type ? 'Pie de foto (ej. Cupra Pulse · Barcelona)' : $title;
}, 10, 2 );

/**
 * Slides for the bio slider.
 *
 * @return array[] Each item: src, srcset, alt, caption.
 */
function ckboo_get_slides() {
    $slides = [];

    $fotos = get_posts( [
        'post_type'   => 'ckboo_foto',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby'     => [ 'menu_order' => 'ASC', 'date' => 'ASC' ],
    ] );

    foreach ( $fotos as $foto ) {
        $thumb_id = get_post_thumbnail_id( $foto );
        if ( ! $thumb_id ) {
            continue;
        }
        $alt = trim( (string) get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ) );
        $slides[] = [
            'src'     => wp_get_attachment_image_url( $thumb_id, 'large' ),
            'srcset'  => wp_get_attachment_image_srcset( $thumb_id, 'large' ),
            'alt'     => $alt ? $alt : 'CkBoo — ' . $foto->post_title,
            'caption' => $foto->post_title,
        ];
    }

    if ( $slides ) {
        return $slides;
    }

    // Fallback: the photos bundled with the theme.
    $img = get_template_directory_uri() . '/assets/img/';
    return [
        [ 'src' => $img . 'ckboo-cupra-pulse.webp',         'srcset' => '', 'alt' => 'CkBoo pinchando en el evento Cupra Pulse en Barcelona',                  'caption' => 'Cupra Pulse · Barcelona' ],
        [ 'src' => $img . 'ckboo-evento-corporativo.webp',  'srcset' => '', 'alt' => 'CkBoo pinchando en un evento corporativo al aire libre en Barcelona',   'caption' => 'Evento corporativo' ],
        [ 'src' => $img . 'ckboo-hero.webp',                'srcset' => '', 'alt' => 'CkBoo mezclando en directo en un evento corporativo',                    'caption' => 'En directo' ],
    ];
}

require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/landings.php';

/**
 * Small line icons used in the header and footer social links.
 */
function ckboo_icon_svg( $name ) {
    $icons = [
        'instagram' => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
        'whatsapp'  => '<svg width="18" height="18" viewBox="0 0 448 512" fill="currentColor"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>',
        'mixcloud'  => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14v-2a9 9 0 0 1 18 0v2"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3v5z"/><path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3v5z"/></svg>',
    ];
    return $icons[ $name ] ?? '';
}
