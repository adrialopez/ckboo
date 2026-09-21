<?php
/**
 * Template Name: Landing (servicio / zona)
 *
 * Service and area pages. Title = H1, excerpt = intro paragraph, body = content.
 */
get_header();

$landings = ckboo_live_landings();
$current  = get_post_field( 'post_name', get_queried_object_id() );
$data     = $landings[ $current ] ?? null;
$label    = $data['label'] ?? 'DJ CkBoo';
$arrow    = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

$services = array_filter( $landings, fn( $l ) => 'servicio' === $l['group'] );
$areas    = array_filter( $landings, fn( $l ) => 'zona' === $l['group'] );
?>

<main>

  <?php while ( have_posts() ) : the_post(); ?>

  <div class="page-hero landing-hero">
    <div class="page-hero-inner">
      <nav class="landing-crumbs" aria-label="Migas de pan">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">DJ CkBoo</a>
        <span aria-hidden="true">/</span>
        <span><?php echo esc_html( $label ); ?></span>
      </nav>
      <h1><?php the_title(); ?></h1>
      <?php if ( has_excerpt() ) : ?>
        <p class="landing-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
      <?php endif; ?>
      <div class="landing-cta">
        <a href="#booking" class="btn-dj">Pide presupuesto <?php echo $arrow; ?></a>
        <a href="<?php echo esc_url( CKBOO_MIXCLOUD_URL ); ?>" class="btn-dj-outline" target="_blank" rel="noopener">Escucha mis mixes</a>
      </div>
    </div>
  </div>

  <div class="page-content landing-content">
    <?php the_content(); ?>
  </div>

  <?php endwhile; ?>

  <section class="landing-related">
    <div class="container">
      <p class="section-label">Más información</p>
      <h2>Otros servicios y zonas</h2>
      <div class="link-cards">
        <?php foreach ( array_merge( $services, $areas ) as $slug => $l ) : ?>
          <?php if ( $slug === $current ) { continue; } ?>
          <a class="link-card" href="<?php echo esc_url( $l['url'] ); ?>">
            <span class="link-card-kind"><?php echo 'servicio' === $l['group'] ? 'Servicio' : 'Zona'; ?></span>
            <span class="link-card-title"><?php echo esc_html( $l['nav'] ); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/booking' ); ?>

</main>

<?php get_footer(); ?>
