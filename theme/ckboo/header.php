<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
// In-page anchors on the home page, absolute links everywhere else.
$ck_anchor = is_front_page() ? '' : home_url( '/' );
?>

<header class="dj-header" id="dj-header">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="dj-logo ckboo-wordmark" aria-label="CkBoo — inicio">Ck<span class="boo">Boo</span></a>

  <nav class="dj-nav" id="dj-nav" aria-label="Navegación principal">
    <a href="<?php echo esc_url( $ck_anchor . '#mixes' ); ?>">Mixes</a>
    <a href="<?php echo esc_url( $ck_anchor . '#bio' ); ?>">Sobre mí</a>
    <a href="<?php echo esc_url( $ck_anchor . '#booking' ); ?>">Contrataciones</a>
    <a href="<?php echo esc_url( $ck_anchor . '#instagram' ); ?>">Instagram</a>

    <div class="dj-nav-icons">
      <a class="dj-icon-link" href="<?php echo esc_url( CKBOO_INSTAGRAM_URL ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php echo ckboo_icon_svg( 'instagram' ); ?></a>
      <?php if ( ckboo_whatsapp_url() ) : ?>
        <a class="dj-icon-link" href="<?php echo esc_url( ckboo_whatsapp_url() ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo ckboo_icon_svg( 'whatsapp' ); ?></a>
      <?php endif; ?>
      <a class="dj-icon-link" href="<?php echo esc_url( CKBOO_MIXCLOUD_URL ); ?>" target="_blank" rel="noopener" aria-label="Mixcloud"><?php echo ckboo_icon_svg( 'mixcloud' ); ?></a>
    </div>
  </nav>

  <button class="hamburger" id="dj-hamburger" aria-label="Abrir menú" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</header>
<script>
  (function(){
    var h = document.getElementById('dj-header');
    window.addEventListener('scroll', function(){
      h.classList.toggle('scrolled', window.scrollY > 40);
    });
  })();
</script>
