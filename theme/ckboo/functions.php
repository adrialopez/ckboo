<?php
/**
 * CkBoo — functions.php
 */

define( 'CKBOO_VERSION', '1.2.0' );

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
