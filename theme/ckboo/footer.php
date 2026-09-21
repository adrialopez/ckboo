
<footer class="dj-footer">
  <div class="dj-footer-left">
    <strong class="ckboo-wordmark">Ck<span class="boo">Boo</span></strong> — DJ · Terrassa · Sant Cugat · Barcelona
    <br />
    <?php $ft_landings = function_exists( 'ckboo_live_landings' ) ? ckboo_live_landings() : []; ?>
    <?php if ( $ft_landings ) : ?>
      <nav class="footer-links" aria-label="Servicios y zonas">
        <?php foreach ( $ft_landings as $l ) : ?>
          <a href="<?php echo esc_url( $l['url'] ); ?>"><?php echo esc_html( 'zona' === $l['group'] ? 'DJ en ' . $l['nav'] : 'DJ · ' . $l['nav'] ); ?></a>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>
    <span style="font-size:0.8rem;margin-top:0.25rem;display:block;">
      &copy; <span id="footer-year"></span> Adrià López. Todos los derechos reservados.
      · <a href="<?php echo esc_url( home_url( '/politica-privacidad/' ) ); ?>" style="color:var(--gray);text-decoration:underline;">Privacidad</a>
      · <a href="<?php echo esc_url( home_url( '/politica-cookies/' ) ); ?>" style="color:var(--gray);text-decoration:underline;">Cookies</a>
      · <a href="javascript:void(0);" class="cky-banner-element" style="color:var(--gray);text-decoration:underline;">Configurar cookies</a>
    </span>
  </div>

  <div class="dj-footer-social">
    <a href="<?php echo esc_url( CKBOO_MIXCLOUD_URL ); ?>" target="_blank" rel="noopener">Mixcloud</a>
    <a href="<?php echo esc_url( CKBOO_INSTAGRAM_URL ); ?>" target="_blank" rel="noopener">Instagram</a>
  </div>
</footer>

<script>document.getElementById('footer-year').textContent = new Date().getFullYear();</script>
<?php wp_footer(); ?>
</body>
</html>
