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
    <img src="<?php echo esc_url( $img . 'ckboo-hero.webp' ); ?>" width="560" height="700" alt="CkBoo, DJ profesional mezclando en directo en un evento corporativo en Barcelona" fetchpriority="high" />
  </div>

  <div class="dj-hero-tag">Terrassa · Sant Cugat · Barcelona</div>

  <h1>
    <span class="dj-prefix">DJ</span><span class="ck">Ck</span><span class="boo">Boo</span>
  </h1>

  <p class="dj-hero-sub">
    Pincho en bodas, eventos de empresa y fiestas privadas, leyendo la pista para adaptar la música a cada momento.
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
     SERVICIOS
     ====================================================== -->
<?php $landings = ckboo_live_landings(); ?>
<?php if ( $landings ) : ?>
<section class="dj-services" id="servicios">
  <div class="container">
    <p class="section-label">Servicios</p>
    <h2>DJ para cada tipo de evento</h2>
    <p class="section-intro">
      Soy CkBoo (Adrià López), DJ desde hace más de 20 años. Trabajo sobre todo en Terrassa, Sant Cugat, Barcelona y el resto de Catalunya, y cada sesión la monto distinta según el espacio, quién vaya a estar y qué tipo de evento sea.
    </p>
    <div class="service-cards">
      <?php foreach ( $landings as $slug => $l ) : if ( 'servicio' !== $l['group'] ) { continue; } ?>
        <a class="service-card fade-up" href="<?php echo esc_url( $l['url'] ); ?>">
          <h3><?php echo esc_html( $l['nav'] ); ?></h3>
          <p><?php echo esc_html( wp_trim_words( $l['excerpt'], 24, '…' ) ); ?></p>
          <span class="service-card-more">Ver más <?php echo $arrow; ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ======================================================
     EQUIPO PROPIO
     ====================================================== -->
<section class="dj-equipment" id="equipo">
  <div class="container">
    <p class="section-label">Equipo</p>
    <h2>Equipo técnico</h2>
    <p class="section-intro">
      En cada evento reviso qué hace falta. Si el espacio ya tiene sonido, iluminación o cabina, los aprovechamos; si no, los llevo yo, adaptados al aforo. Por eso puedes contratar solo la sesión o el equipo completo — lo hablamos según el sitio, y de ahí sale el presupuesto.
    </p>
    <div class="equipment-cards">
      <div class="equipment-card fade-up">
        <h3>Sonido</h3>
        <p>Si el espacio no lo tiene, lo llevo yo, ajustado al aforo.</p>
      </div>
      <div class="equipment-card fade-up">
        <h3>Iluminación</h3>
        <p>Aporta ambiente a la sesión, del cóctel a la pista llena.</p>
      </div>
      <div class="equipment-card fade-up">
        <h3>Cabina de DJ</h3>
        <p>En salas y clubs suele haberla. Si no, pongo la mía.</p>
      </div>
    </div>
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
      Grabando, sin nadie delante a quien leer, es donde más experimento: sobre todo house, tech house y latin house, sin setlist ni guion. Lo tienes todo en Mixcloud.
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

    <?php $clubs = $landings['dj-clubs-y-salas'] ?? null; ?>
    <?php if ( $clubs ) : ?>
      <p class="dj-mixes-club-teaser fade-up">
        ¿Programas una sala o club? <a href="<?php echo esc_url( $clubs['url'] ); ?>">Más información <?php echo $arrow; ?></a>
      </p>
    <?php endif; ?>
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

        <p class="fade-up">Llevo más de 20 años poniendo música en fiestas y eventos. Nací en Barcelona y crecí entre clubs y tiendas de discos — la música ha sido lo único que no ha cambiado desde entonces.</p>
        <p class="fade-up">En los platos mando yo por sensaciones: leo la sala y voy construyendo sobre la marcha, sin dejar nada a medias. Da igual si es una fiesta privada, un evento de empresa o una noche de club — me adapto al momento.</p>
        <p class="fade-up">En directo no me caso ni con un estilo ni con una década: pincho lo que haga falta para llenar la pista. En cualquier tipo de celebración —bodas, eventos corporativos, fiestas privadas o fiestas mayores— construyo la sesión sobre la marcha según quién esté delante, mezclando lo que sea necesario para que la gente no pare de bailar.</p>
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
     RESEÑAS
     ====================================================== -->
<?php $reviews = ckboo_reviews(); ?>
<?php if ( $reviews ) : ?>
<section class="dj-reviews" id="resenas">
  <div class="container">
    <p class="section-label">Reseñas</p>
    <h2>Lo que dicen de mí</h2>
    <div class="review-cards">
      <?php foreach ( $reviews as $review ) : ?>
        <div class="review-card fade-up">
          <div class="review-stars" aria-label="<?php echo esc_attr( $review['rating'] ); ?> de 5 estrellas"><?php echo str_repeat( '★', $review['rating'] ); ?></div>
          <p class="review-quote">"<?php echo esc_html( $review['text'] ); ?>"</p>
          <p class="review-author"><?php echo esc_html( $review['name'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ======================================================
     ZONAS + FAQ
     ====================================================== -->
<?php if ( $landings ) : ?>
<section class="dj-areas" id="zonas">
  <div class="container">
    <p class="section-label">Zonas</p>
    <h2>Dónde trabajo</h2>
    <p class="section-intro">
      Vivo en Terrassa, y desde ahí me muevo por el Vallès, Barcelona y el resto de Catalunya.
    </p>
    <div class="link-cards">
      <?php foreach ( $landings as $slug => $l ) : if ( 'zona' !== $l['group'] ) { continue; } ?>
        <a class="link-card fade-up" href="<?php echo esc_url( $l['url'] ); ?>">
          <span class="link-card-kind">DJ en</span>
          <span class="link-card-title"><?php echo esc_html( $l['nav'] ); ?></span>
        </a>
      <?php endforeach; ?>
      <span class="link-card link-card-static">
        <span class="link-card-kind">Y también</span>
        <span class="link-card-title">Resto de Catalunya</span>
      </span>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="dj-faq" id="faq">
  <div class="container">
    <p class="section-label">Preguntas frecuentes</p>
    <h2>Todo lo que suelen preguntarme</h2>
    <div class="faq-list">
      <?php foreach ( ckboo_faqs() as $faq ) : ?>
        <details class="faq-item">
          <summary><?php echo esc_html( $faq['q'] ); ?></summary>
          <p><?php echo esc_html( $faq['a'] ); ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ======================================================
     BOOKING
     ====================================================== -->
<?php get_template_part( 'template-parts/booking' ); ?>


<!-- ======================================================
     INSTAGRAM
     ====================================================== -->
<section class="dj-instagram" id="instagram">
  <div class="container">

    <div class="ig-header fade-up">
      <div class="ig-profile">
        <img src="<?php echo esc_url( $img . 'ckboo-avatar.webp' ); ?>" alt="CkBoo" width="56" height="56" loading="lazy" class="ig-avatar" />
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
