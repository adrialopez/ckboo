<?php
/**
 * Plantilla de reserva. La portada usa front-page.php y las páginas legales page.php.
 */
get_header();
?>
<main style="padding: 9rem 2rem 5rem; max-width: 800px; margin: 0 auto;">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 style="font-size: clamp(2rem,5vw,3.5rem); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
    <div><?php the_content(); ?></div>
  <?php endwhile; else : ?>
    <h1 style="font-size: clamp(2rem,5vw,3.5rem); margin-bottom: 1.5rem;">Nada por aquí</h1>
    <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-dj">Volver al inicio</a></p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
