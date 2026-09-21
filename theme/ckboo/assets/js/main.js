/* ============================================
   ADRIA LOPEZ — Main JS
   ============================================ */

// Header scroll effect
const header = document.querySelector('.site-header');
if (header) {
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 40);
  });
}

// Intersection Observer for fade-up animations
const fadeEls = document.querySelectorAll('.fade-up');
if (fadeEls.length) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(el => {
      if (el.isIntersecting) {
        el.target.classList.add('visible');
        observer.unobserve(el.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

  fadeEls.forEach(el => observer.observe(el));
}

// Mobile menu toggle
const hamburger = document.querySelector('.hamburger');
const nav = document.querySelector('.header-nav, .dj-nav');
if (hamburger && nav) {
  hamburger.addEventListener('click', () => {
    const isOpen = nav.classList.toggle('mobile-open');
    hamburger.classList.toggle('is-open', isOpen);
    hamburger.setAttribute('aria-expanded', isOpen);
    document.body.classList.toggle('menu-open', isOpen);

    // Staggered entrance for each link
    if (isOpen) {
      nav.querySelectorAll('a').forEach((link, i) => {
        link.style.animationDelay = `${0.05 + i * 0.07}s`;
      });
    }
  });

  // Close on nav link click
  nav.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      nav.classList.remove('mobile-open');
      hamburger.classList.remove('is-open');
      hamburger.setAttribute('aria-expanded', false);
      document.body.classList.remove('menu-open');
    });
  });
}

// Bio photo slider (CkBoo page)
const bioSlides = document.getElementById('djBioSlides');
const bioDots = document.getElementById('djBioDots');
if (bioSlides && bioDots) {
  const slides = bioSlides.querySelectorAll('.dj-bio-slide');
  const total = slides.length;

  const goTo = (i) => {
    bioSlides.scrollTo({ left: bioSlides.clientWidth * i, behavior: 'smooth' });
  };

  slides.forEach((_, i) => {
    const dot = document.createElement('button');
    dot.setAttribute('aria-label', `Foto ${i + 1}`);
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goTo(i));
    bioDots.appendChild(dot);
  });

  const dots = bioDots.querySelectorAll('button');
  const currentIndex = () => Math.round(bioSlides.scrollLeft / bioSlides.clientWidth);

  bioSlides.addEventListener('scroll', () => {
    const idx = currentIndex();
    dots.forEach((d, i) => d.classList.toggle('active', i === idx));
  });

  const prevBtn = document.getElementById('djBioPrev');
  const nextBtn = document.getElementById('djBioNext');
  if (prevBtn) prevBtn.addEventListener('click', () => goTo((currentIndex() - 1 + total) % total));
  if (nextBtn) nextBtn.addEventListener('click', () => goTo((currentIndex() + 1) % total));

  // Gentle autoplay, paused on interaction
  let autoplay = setInterval(() => goTo((currentIndex() + 1) % total), 5000);
  const pauseAutoplay = () => { clearInterval(autoplay); autoplay = null; };
  ['pointerdown', 'touchstart'].forEach(evt => bioSlides.addEventListener(evt, pauseAutoplay, { once: true, passive: true }));
  if (prevBtn) prevBtn.addEventListener('click', pauseAutoplay);
  if (nextBtn) nextBtn.addEventListener('click', pauseAutoplay);
}

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', (e) => {
    const target = document.querySelector(link.getAttribute('href'));
    if (target) {
      e.preventDefault();
      const offset = 80;
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  });
});
