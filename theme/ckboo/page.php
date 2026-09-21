<?php
/**
 * Plantilla genérica de página
 * Usada para: Política de privacidad, Política de cookies, etc.
 */
get_header();
?>

<main>

  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="section-label">Legal</p>
      <?php while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php if ( get_the_modified_date() ) : ?>
          <div class="page-hero-meta">Última actualización: <?php echo esc_html( get_the_modified_date() ); ?></div>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </div>

  <div class="page-content">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="page-back">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M13 8H3M7 4L3 8l4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Volver al inicio
    </a>

    <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
  </div>

</main>

<?php get_footer(); ?>
