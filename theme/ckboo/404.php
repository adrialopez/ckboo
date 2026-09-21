<?php
/**
 * 404 — Not Found
 */
get_header();
?>

<style>
  /* ============================================================
     404 PAGE — Vinyl record concept
     "This track doesn't exist in our setlist."
     ============================================================ */
  .page-404 {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 7rem 2rem 4rem;
    position: relative;
    overflow: hidden;
    background: var(--black);
  }

  /* Ambient glow */
  .page-404::before {
    content: '';
    position: absolute;
    width: 700px;
    height: 700px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(225,185,40,0.05) 0%, transparent 65%);
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
  }

  .page-404-inner {
    display: flex;
    align-items: center;
    gap: 6rem;
    max-width: 1100px;
    width: 100%;
    position: relative;
    z-index: 1;
  }

  /* ---- VINYL RECORD ---- */
  .vinyl-wrap {
    flex-shrink: 0;
    position: relative;
    width: 340px;
    height: 340px;
  }

  /* Tonearm */
  .tonearm {
    position: absolute;
    top: -24px;
    right: -20px;
    width: 130px;
    height: 8px;
    transform-origin: 8px 4px;
    transform: rotate(-18deg);
    z-index: 10;
    animation: tonearm-drift 8s ease-in-out infinite;
  }
  @keyframes tonearm-drift {
    0%, 100% { transform: rotate(-18deg); }
    50%       { transform: rotate(-14deg); }
  }

  .tonearm-arm {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(to right, #555, #888, #555);
    border-radius: 4px;
  }
  .tonearm-pivot {
    position: absolute;
    left: 0; top: 50%;
    transform: translate(-50%, -50%);
    width: 16px; height: 16px;
    background: radial-gradient(circle at 40% 35%, #aaa, #444);
    border-radius: 50%;
    box-shadow: 0 2px 6px rgba(0,0,0,0.6);
  }
  .tonearm-head {
    position: absolute;
    right: -12px; top: 50%;
    transform: translate(0, -50%) rotate(20deg);
    width: 20px; height: 12px;
    background: linear-gradient(135deg, #999, #444);
    border-radius: 2px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.5);
  }
  .tonearm-needle {
    position: absolute;
    bottom: -8px; right: 2px;
    width: 2px; height: 10px;
    background: var(--yellow);
    border-radius: 1px;
    transform: rotate(-20deg);
  }

  /* The record itself */
  .vinyl {
    width: 340px;
    height: 340px;
    border-radius: 50%;
    position: relative;
    animation: spin 3.2s linear infinite;
    cursor: pointer;
  }
  .vinyl.paused { animation-play-state: paused; }

  @keyframes spin {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
  }

  /* Black vinyl base */
  .vinyl-disc {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background:
      repeating-radial-gradient(
        circle at 50%,
        #111 0px,
        #111 1px,
        #1a1a1a 1px,
        #1a1a1a 2.5px,
        #111 2.5px,
        #111 3px,
        #181818 3px,
        #181818 5px
      );
    box-shadow:
      0 0 0 2px #222,
      0 20px 60px rgba(0,0,0,0.8),
      0 0 0 1px rgba(255,255,255,0.03);
    position: relative;
    overflow: hidden;
  }

  /* Sheen overlay */
  .vinyl-disc::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: linear-gradient(
      135deg,
      rgba(255,255,255,0.04) 0%,
      transparent 40%,
      rgba(0,0,0,0.2) 100%
    );
    pointer-events: none;
  }

  /* Center label */
  .vinyl-label {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 110px;
    height: 110px;
    border-radius: 50%;
    background: var(--yellow);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.5);
    z-index: 2;
  }

  /* Spindle hole */
  .vinyl-label::after {
    content: '';
    position: absolute;
    width: 10px; height: 10px;
    border-radius: 50%;
    background: var(--black);
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.6);
  }

  .vinyl-404 {
    font-family: var(--font-heading);
    font-size: 2rem;
    font-weight: 700;
    color: var(--black);
    line-height: 1;
    letter-spacing: -0.03em;
    position: relative;
    z-index: 1;
    margin-bottom: -4px;
  }
  .vinyl-label-text {
    font-size: 0.42rem;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    font-weight: 700;
    color: rgba(0,0,0,0.55);
    position: relative;
    z-index: 1;
  }

  /* Outer edge ring */
  .vinyl-edge {
    position: absolute;
    inset: -3px;
    border-radius: 50%;
    background: transparent;
    border: 3px solid rgba(255,255,255,0.04);
    pointer-events: none;
  }

  /* Pause hint */
  .vinyl-hint {
    text-align: center;
    margin-top: 1.25rem;
    font-size: 0.7rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: rgba(255,255,255,0.2);
    transition: color 0.3s;
  }
  .vinyl-wrap:hover .vinyl-hint { color: rgba(255,255,255,0.45); }

  /* ---- COPY ---- */
  .page-404-copy { flex: 1; min-width: 0; }

  .page-404-eyebrow {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.75rem;
  }
  .page-404-eyebrow::before {
    content: '';
    display: block;
    width: 32px; height: 2px;
    background: var(--yellow);
    flex-shrink: 0;
  }
  .page-404-eyebrow span {
    font-size: 0.7rem;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--yellow);
    font-weight: 600;
  }

  .page-404-copy h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 1.5rem;
  }
  .page-404-copy h1 em {
    color: var(--yellow);
    font-style: italic;
  }

  .page-404-copy p {
    font-size: 1.0625rem;
    color: var(--gray-light);
    line-height: 1.75;
    margin-bottom: 1rem;
    max-width: 480px;
  }
  .page-404-copy p:last-of-type { margin-bottom: 2.5rem; }

  .page-404-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }

  /* Scratch badge */
  .scratch-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(225,185,40,0.08);
    border: 1px solid rgba(225,185,40,0.2);
    border-radius: 50px;
    padding: 0.4rem 1rem;
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--yellow);
    font-weight: 600;
    margin-bottom: 2rem;
    width: fit-content;
  }
  .scratch-badge .dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--yellow);
    animation: blink 1.4s ease-in-out infinite;
  }
  @keyframes blink {
    0%, 100% { opacity: 1; }
    50%       { opacity: 0.2; }
  }

  /* Mobile */
  @media (max-width: 860px) {
    .page-404-inner {
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 3.5rem;
    }
    .vinyl-wrap { width: 260px; height: 260px; }
    .vinyl { width: 260px; height: 260px; }
    .vinyl-label { width: 84px; height: 84px; }
    .vinyl-404 { font-size: 1.5rem; }
    .vinyl-label-text { font-size: 0.35rem; }
    .tonearm { width: 100px; }
    .page-404-eyebrow { justify-content: center; }
    .page-404-copy p { margin-left: auto; margin-right: auto; }
    .scratch-badge { margin: 0 auto 2rem; }
    .page-404-actions { justify-content: center; }
  }
</style>


<main class="page-404" aria-label="Página no encontrada">
  <div class="page-404-inner">

    <!-- VINYL RECORD -->
    <div class="vinyl-wrap">
      <!-- Tonearm -->
      <div class="tonearm">
        <div class="tonearm-arm"></div>
        <div class="tonearm-pivot"></div>
        <div class="tonearm-head">
          <div class="tonearm-needle"></div>
        </div>
      </div>

      <!-- Record -->
      <div class="vinyl" id="vinyl-record" title="Clic para pausar/reproducir">
        <div class="vinyl-disc">
          <div class="vinyl-label">
            <div class="vinyl-404">404</div>
            <div class="vinyl-label-text">No encontrada</div>
          </div>
        </div>
        <div class="vinyl-edge"></div>
      </div>

      <div class="vinyl-hint">Clic para pausar</div>
    </div>


    <!-- COPY -->
    <div class="page-404-copy">

      <div class="page-404-eyebrow">
        <span>Error 404 — Tema no encontrado</span>
      </div>

      <div class="scratch-badge">
        <span class="dot"></span>
        La aguja cayó. Sin señal.
      </div>

      <h1>Hemos pinchado todos<br/>los discos. <em>Nada.</em></h1>

      <p>
        Esta página se ha borrado de la sesión — o quizá nunca llegó a prensarse. Sea como sea, el tema que buscas no existe aquí.
      </p>
      <p>
        Vuelve al inicio y encuentra lo que buscabas.
      </p>

      <div class="page-404-actions">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">
          Volver al inicio
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

    </div>
  </div>
</main>

<script>
  (function() {
    var record = document.getElementById('vinyl-record');
    var hint   = record.parentElement.querySelector('.vinyl-hint');
    var paused = false;

    record.addEventListener('click', function() {
      paused = !paused;
      record.classList.toggle('paused', paused);
      hint.textContent = paused ? 'Clic para reproducir' : 'Clic para pausar';
    });
  })();
</script>

<?php get_footer(); ?>
