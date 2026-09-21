<?php
/**
 * Booking section (form + privacy notice). Shared by the home and the landings.
 * Expects nothing: it reads the form id from the option.
 */
$img     = get_template_directory_uri() . '/assets/img/';
$form_id = (int) get_option( 'ckboo_booking_form_id' );
$arrow   = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<section class="dj-booking" id="booking" style="padding:100px 0;position:relative;overflow:hidden;border-top:1px solid rgba(255,255,255,0.04);border-bottom:1px solid rgba(255,255,255,0.04);text-align:center;">
  <div style="position:absolute;top:0;right:0;bottom:0;left:0;background-image:linear-gradient(180deg, rgba(20,20,20,0.90) 0%, rgba(20,20,20,0.96) 100%), url('<?php echo esc_url( $img . 'booking-bg.webp' ); ?>');background-size:cover;background-position:center 20%;"></div>
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
        <p style="text-align:center;"><a href="mailto:dj@ckboo.es?subject=Contrataci%C3%B3n%20CkBoo" class="btn-dj">Escríbeme por email <?php echo $arrow; ?></a></p>
      <?php endif; ?>
    </div>
    <p class="fade-up" style="color:var(--gray);margin-top:1.5rem;font-size:0.9rem;">
      ¿Prefieres escribirme directamente? <a href="mailto:dj@ckboo.es" style="color:var(--yellow);text-decoration:underline;">dj@ckboo.es</a>
    </p>
    <p class="fade-up" style="font-size:0.7rem;color:var(--gray);margin-top:1rem;line-height:1.6;">
      Este sitio está protegido por reCAPTCHA. Se aplican la <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" style="color:var(--gray);text-decoration:underline;">Política de Privacidad</a> y los <a href="https://policies.google.com/terms" target="_blank" rel="noopener" style="color:var(--gray);text-decoration:underline;">Términos de Servicio</a> de Google.
    </p>
  </div>
</section>
