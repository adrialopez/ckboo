<?php
/**
 * Front page — CkBoo
 */

get_header();

$uri       = get_template_directory_uri();
$img       = $uri . '/assets/img/';
$mixcloud  = CKBOO_MIXCLOUD_URL;
$mc_handle = 'ckboo';
$ig_url    = CKBOO_INSTAGRAM_URL;
$ig_handle = 'dj_ckboo';
$genres    = [ 'House', 'Tech House', 'Latin House' ];
$slides    = ckboo_get_slides();
$form_id   = (int) get_option( 'ckboo_booking_form_id' );

$arrow = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$ig_icon = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>';
?>

<!-- ======================================================
     HERO
     ====================================================== -->
<section class="dj-hero" aria-label="CkBoo DJ">
  <div class="dj-hero-photo"></div>
  <div class="dj-hero-bg"></div>

  <div class="dj-hero-image">
    <img src="<?php echo esc_url( $img . 'ckboo-hero.jpg' ); ?>" alt="CkBoo, DJ profesional mezclando en directo en un evento corporativo en Barcelona" fetchpriority="high" />
  </div>

  <div class="dj-hero-tag">Terrassa · Sant Cugat · Barcelona</div>

  <h1>
    <span class="dj-prefix">DJ</span><span class="ck">Ck</span><span class="boo">Boo</span>
  </h1>

  <p class="dj-hero-sub">
    DJ para eventos privados y corporativos: adapto la música al momento, al espacio y a la gente.
  </p>

  <div class="dj-hero-cta">
    <a href="#booking" class="btn-dj">
      Pide presupuesto
      <?php echo $arrow; ?>
    </a>
    <a href="#mixes" class="btn-dj-outline">
      Escuchar
      <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3l14 9-14 9V3z"/></svg>
    </a>
  </div>
</section>


<!-- ======================================================
     MIXES — Mixcloud embed
     ====================================================== -->
<section class="dj-mixes" id="mixes">
  <div class="container">
    <p class="section-label">Música</p>
    <h2 style="font-size:clamp(2rem,4vw,3rem);">Sets y mixes</h2>
    <p style="color:var(--gray);margin-top:0.75rem;margin-bottom:1.5rem;max-width:480px;">
      Mis sesiones grabadas se mueven entre house, tech house y latin house — es el terreno donde más disfruto y experimento, sin setlist ni guion.
    </p>

    <div class="dj-genres fade-up" style="margin-bottom:2.5rem;">
      <?php foreach ( $genres as $genre ) : ?>
        <span class="genre-tag"><?php echo esc_html( $genre ); ?></span>
      <?php endforeach; ?>
    </div>

    <div class="fade-up">
      <iframe
        width="100%"
        height="120"
        src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&light=0&feed=%2F<?php echo rawurlencode( $mc_handle ); ?>%2F"
        frameborder="0"
        allow="autoplay"
        loading="lazy"
        sandbox="allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"
        title="Sesiones de CkBoo en Mixcloud"
      ></iframe>
    </div>

    <div style="text-align:center;margin-top:2.5rem;">
      <a href="<?php echo esc_url( $mixcloud ); ?>" class="btn-dj" target="_blank" rel="noopener">
        Escucha más sesiones en Mixcloud
        <?php echo $arrow; ?>
      </a>
    </div>
  </div>
</section>


<!-- ======================================================
     BIO
     ====================================================== -->
<section class="dj-bio" id="bio">
  <div class="container">
    <div class="dj-bio-grid">

      <div class="dj-bio-slider">
        <div class="dj-bio-slides" id="djBioSlides">
          <?php foreach ( $slides as $slide ) : ?>
            <div class="dj-bio-slide">
              <img
                src="<?php echo esc_url( $slide['src'] ); ?>"
                <?php if ( ! empty( $slide['srcset'] ) ) : ?>srcset="<?php echo esc_attr( $slide['srcset'] ); ?>" sizes="(max-width: 900px) 92vw, 540px"<?php endif; ?>
                alt="<?php echo esc_attr( $slide['alt'] ); ?>"
                loading="lazy" decoding="async" />
              <?php if ( $slide['caption'] ) : ?>
                <span class="dj-bio-slide-caption"><?php echo esc_html( $slide['caption'] ); ?></span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <button class="dj-bio-slider-arrow prev" id="djBioPrev" aria-label="Foto anterior" type="button">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M15 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <button class="dj-bio-slider-arrow next" id="djBioNext" aria-label="Foto siguiente" type="button">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>

        <div class="dj-bio-slider-dots" id="djBioDots"></div>
      </div>

      <div class="dj-bio-text">
        <p class="section-label">Sobre CkBoo</p>
        <h2>Detrás de los <em>platos</em>.</h2>

        <p class="fade-up">Llevo más de 20 años poniendo música en eventos privados y celebraciones. Nací en Barcelona y crecí entre clubs electrónicos y tiendas de discos — la música siempre ha sido la constante.</p>
        <p class="fade-up">En los platos manda la sensación: leo la sala y construyo la sesión en tiempo real, sin dejar nada a medias. Me adapto siempre al espacio, la audiencia y el momento, ya sea una fiesta privada, un evento corporativo o una noche de club.</p>
        <p class="fade-up">En directo no me caso con un estilo: pincho lo que haga falta para llenar la pista. Para fiestas privadas y eventos corporativos —tardeos, fiestas mayores, puestas de largo— construyo la sesión sobre la marcha según quién esté delante, mezclando lo que sea necesario para que la gente no pare de bailar.</p>
        <p class="fade-up" style="display:flex;align-items:center;gap:0.75rem;">
          <img src="<?php echo esc_url( $img . 'txocu-logo-white.png' ); ?>" alt="Txocu" width="32" height="32" loading="lazy" style="width:32px;height:32px;opacity:0.85;flex-shrink:0;" />
          <span>Soy el DJ residente para los eventos privados de <a href="https://www.txocu.com/" target="_blank" rel="noopener" style="color:var(--yellow);text-decoration:underline;">Txocu</a>.</span>
        </p>

        <p class="fade-up" style="font-size:0.8rem;letter-spacing:0.06em;text-transform:uppercase;color:var(--gray);margin-top:1.5rem;">
          He puesto música para Nespresso, Vicio, Cupra y Red Bull
        </p>

        <div style="display:flex;gap:1rem;margin-top:2.5rem;flex-wrap:wrap;" class="fade-up">
          <a href="<?php echo esc_url( $mixcloud ); ?>" class="btn-dj" target="_blank" rel="noopener">
            Mixcloud
            <?php echo $arrow; ?>
          </a>
          <a href="<?php echo esc_url( $ig_url ); ?>" class="btn-dj-outline" target="_blank" rel="noopener">
            Instagram @<?php echo esc_html( $ig_handle ); ?>
            <?php echo $arrow; ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ======================================================
     BOOKING
     ====================================================== -->
<section class="dj-booking" id="booking" style="padding:100px 0;position:relative;overflow:hidden;border-top:1px solid rgba(255,255,255,0.04);border-bottom:1px solid rgba(255,255,255,0.04);text-align:center;">
  <div style="position:absolute;top:0;right:0;bottom:0;left:0;background-image:linear-gradient(180deg, rgba(20,20,20,0.90) 0%, rgba(20,20,20,0.96) 100%), url('<?php echo esc_url( $img . 'booking-bg.jpg' ); ?>');background-size:cover;background-position:center 20%;"></div>
  <div class="container" style="max-width:640px;margin:0 auto;position:relative;z-index:1;">
    <p class="section-label">Contrataciones</p>
    <h2 style="margin-top:0.5rem;">¿Buscas un DJ para tu evento?</h2>
    <p class="fade-up" style="color:var(--gray);margin-top:1rem;margin-bottom:2.5rem;">
      Tardeos, fiestas mayores, puestas de largo, eventos corporativos y fiestas privadas en Terrassa, Sant Cugat, Barcelona y el resto de Catalunya. Adapto la música al espacio y la audiencia de cada evento. Cuéntame los detalles y te respondo con disponibilidad y presupuesto.
    </p>
    <div class="dj-booking-form" style="text-align:left;">
      <?php if ( $form_id && shortcode_exists( 'contact-form-7' ) ) : ?>
        <?php echo do_shortcode( '[contact-form-7 id="' . $form_id . '" title="Reserva"]' ); ?>
      <?php else : ?>
        <p style="text-align:center;"><a href="mailto:hola@adria-lopez.com?subject=Contrataci%C3%B3n%20CkBoo" class="btn-dj">Escríbeme por email <?php echo $arrow; ?></a></p>
      <?php endif; ?>
    </div>
    <p class="fade-up" style="font-size:0.7rem;color:var(--gray);margin-top:1.5rem;line-height:1.6;">
      Este sitio está protegido por reCAPTCHA. Se aplican la <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" style="color:var(--gray);text-decoration:underline;">Política de Privacidad</a> y los <a href="https://policies.google.com/terms" target="_blank" rel="noopener" style="color:var(--gray);text-decoration:underline;">Términos de Servicio</a> de Google.
    </p>
  </div>
</section>


<!-- ======================================================
     INSTAGRAM
     ====================================================== -->
<section class="dj-instagram" id="instagram">
  <div class="container">

    <div class="ig-header fade-up">
      <div class="ig-profile">
        <img src="<?php echo esc_url( $img . 'ckboo-hero.jpg' ); ?>" alt="CkBoo" width="56" height="56" loading="lazy" class="ig-avatar" />
        <div>
          <div class="ig-handle">@<?php echo esc_html( $ig_handle ); ?></div>
          <div class="ig-desc">Sígueme para sets, eventos y música</div>
        </div>
      </div>
      <a href="<?php echo esc_url( $ig_url ); ?>" class="btn-dj-outline" target="_blank" rel="noopener">
        Seguir en Instagram
        <?php echo $ig_icon; ?>
      </a>
    </div>

    <?php if ( shortcode_exists( 'instagram-feed' ) ) : ?>
      <div class="ig-grid" style="display:block;">
        <?php echo do_shortcode( '[instagram-feed num=9 cols=3 showheader=false showbio=false showbutton=false showfollow=false]' ); ?>
      </div>
    <?php endif; ?>

    <div class="ig-footer">
      <a href="<?php echo esc_url( $ig_url ); ?>" class="btn-dj" target="_blank" rel="noopener">
        Ver más en Instagram
        <?php echo $ig_icon; ?>
      </a>
    </div>

  </div>
</section>

<?php get_footer(); ?>
