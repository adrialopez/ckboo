<?php
/**
 * Plantilla genérica de página
 * Usada para: Política de privacidad, Política de cookies, etc.
 */
get_header();
?>

<style>
  .page-hero {
    padding: 10rem 0 4rem;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    background: var(--dark);
    position: relative;
    overflow: hidden;
  }
  .page-hero::before {
    content: '';
    position: absolute;
    top: 0; right: 0;
    width: 40%;
    height: 100%;
    background: radial-gradient(ellipse at 80% 30%, rgba(225,185,40,0.04) 0%, transparent 60%);
    pointer-events: none;
  }
  .page-hero-inner {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 2rem;
  }
  .page-hero .section-label {
    margin-bottom: 1rem;
  }
  .page-hero h1 {
    font-size: clamp(2.25rem, 5vw, 3.75rem);
    font-weight: 700;
    line-height: 1.1;
    color: var(--white);
  }
  .page-hero-meta {
    margin-top: 1.5rem;
    font-size: 0.8125rem;
    color: var(--gray);
    letter-spacing: 0.05em;
  }

  .page-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 5rem 2rem 7rem;
  }

  /* Rich text styles */
  .page-content h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 3rem 0 1rem;
    color: var(--white);
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .page-content h3 {
    font-size: 1.125rem;
    font-weight: 600;
    margin: 2rem 0 0.75rem;
    color: var(--gray-light);
    font-family: var(--font-body);
  }
  .page-content p {
    font-size: 1rem;
    color: var(--gray-light);
    line-height: 1.85;
    margin-bottom: 1.25rem;
  }
  .page-content a {
    color: var(--yellow);
    text-decoration: underline;
    text-underline-offset: 3px;
    transition: color var(--transition);
  }
  .page-content a:hover { color: var(--yellow-light); }
  .page-content ul,
  .page-content ol {
    margin: 0 0 1.5rem 1.5rem;
    color: var(--gray-light);
    font-size: 1rem;
    line-height: 1.8;
  }
  .page-content ul { list-style: disc; }
  .page-content ol { list-style: decimal; }
  .page-content li { margin-bottom: 0.4rem; }
  .page-content strong { color: var(--white); font-weight: 600; }
  .page-content em { color: var(--yellow); font-style: italic; }
  .page-content blockquote {
    border-left: 3px solid var(--yellow);
    padding: 0.75rem 0 0.75rem 1.5rem;
    margin: 2rem 0;
    color: var(--gray);
    font-style: italic;
  }
  .page-content hr {
    border: none;
    border-top: 1px solid rgba(255,255,255,0.07);
    margin: 3rem 0;
  }
  .page-content table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.9rem;
    margin: 2rem 0;
  }
  .page-content th,
  .page-content td {
    text-align: left;
    padding: 0.75rem 1rem;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    color: var(--gray-light);
  }
  .page-content th {
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--yellow);
    font-weight: 600;
  }
  .page-content tr:last-child td { border-bottom: none; }

  /* Back link */
  .page-back {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.8125rem;
    color: var(--gray);
    letter-spacing: 0.05em;
    transition: color var(--transition);
    margin-bottom: 4rem;
  }
  .page-back:hover { color: var(--yellow); }
  .page-back svg { transition: transform var(--transition); }
  .page-back:hover svg { transform: translateX(-3px); }
</style>


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
