// Interactive Enhancements for Al Rashed Traffic Website

const scrollCallbacks = [];
let scrollTicking = false;

function onScrollFrame() {
    scrollCallbacks.forEach((callback) => callback());
    scrollTicking = false;
}

function registerScrollCallback(callback) {
    scrollCallbacks.push(callback);
}

window.addEventListener('scroll', () => {
    if (!scrollTicking) {
        scrollTicking = true;
        requestAnimationFrame(onScrollFrame);
    }
}, { passive: true });

// Smooth Scroll for in-page anchors only (never break Bootstrap dropdowns)
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');

            // Ignore empty / dropdown / collapse toggles
            if (
                !href ||
                href === '#' ||
                this.classList.contains('dropdown-toggle') ||
                this.dataset.bsToggle === 'dropdown' ||
                this.dataset.bsToggle === 'collapse' ||
                this.dataset.bsToggle === 'offcanvas'
            ) {
                return;
            }

            let target = null;
            try {
                target = document.querySelector(href);
            } catch (_) {
                return;
            }

            if (!target) {
                return;
            }

            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });
}

// Animate on Scroll (AOS) functionality
function initAnimateOnScroll() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
            }
        });
    }, observerOptions);

    const elementsToAnimate = [
        '.hero-content',
        '.service-card',
        '.feature-card',
        '.about-image-wrapper',
        '.stat-card',
        '.timeline-item',
        '.mission-vision-card',
        '.product-card',
        '.project-card',
        '.client-logo-card',
        '.contact-info-card',
        '.contact-form-card',
        '.map-card',
        '.fade-in',
        '.slide-in-right',
        '.section-header',
        '.hero-title',
        '.hero-subtitle',
        '.hero-buttons'
    ];

    elementsToAnimate.forEach((selector) => {
        document.querySelectorAll(selector).forEach((element, index) => {
            if (!element.hasAttribute('data-aos')) {
                element.setAttribute('data-aos', 'fade-up');
                element.setAttribute('data-aos-delay', (index * 100).toString());
                element.setAttribute('data-aos-duration', '800');
            }
            observer.observe(element);
        });
    });

    // Also observe any existing elements with data-aos attributes
    document.querySelectorAll('[data-aos]').forEach(element => {
        observer.observe(element);
    });
}

// Tooltip functionality
function initTooltips() {
    const tooltip = document.createElement('div');
    tooltip.className = 'custom-tooltip';
    tooltip.style.cssText = `
        position: absolute;
        background: #0e1016;
        color: #f4f5f7;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 14px;
        pointer-events: none;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease;
        max-width: 200px;
        word-wrap: break-word;
    `;
    document.body.appendChild(tooltip);

    document.querySelectorAll('[title], [data-tooltip]').forEach(element => {
        const tooltipText = element.getAttribute('data-tooltip') || element.getAttribute('title');
        if (tooltipText) {
            element.removeAttribute('title');
            element.addEventListener('mouseenter', () => {
                tooltip.textContent = tooltipText;
                tooltip.style.opacity = '1';
            });
            element.addEventListener('mousemove', (e) => {
                tooltip.style.left = e.pageX + 10 + 'px';
                tooltip.style.top = e.pageY - 30 + 'px';
            });
            element.addEventListener('mouseleave', () => {
                tooltip.style.opacity = '0';
            });
        }
    });
}

// Lazy Loading for images
function initLazyLoading() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const src = img.getAttribute('data-src');
                if (src) {
                    img.setAttribute('src', src);
                    img.removeAttribute('data-src');
                    img.classList.remove('lazy');
                    img.classList.add('lazy-loaded');
                }
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        img.classList.add('lazy');
        imageObserver.observe(img);
    });
    document.querySelectorAll('[data-bg]').forEach(element => {
        imageObserver.observe(element);
    });
}

// Scroll to top button
function initScrollToTop() {
    const scrollBtn = document.createElement('button');
    scrollBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    scrollBtn.className = 'scroll-to-top';
    scrollBtn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: var(--accent, #FFC923);
        color: #07080b;
        font-weight: 600;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 8px 28px rgba(255, 201, 35, 0.35);
    `;

    scrollBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    document.body.appendChild(scrollBtn);

    registerScrollCallback(() => {
        if (window.pageYOffset > 300) {
            scrollBtn.style.opacity = '1';
            scrollBtn.style.visibility = 'visible';
        } else {
            scrollBtn.style.opacity = '0';
            scrollBtn.style.visibility = 'hidden';
        }
    });
}

// Navbar scroll effect
function initNavbarScrollEffect() {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        registerScrollCallback(() => {
            if (window.pageYOffset > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    }
}

// Parallax effect
function initParallaxEffect() {
    const parallaxElements = document.querySelectorAll('.hero-background, .parallax-bg');
    if (parallaxElements.length > 0) {
        registerScrollCallback(() => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            parallaxElements.forEach(element => {
                element.style.transform = `translateY(${rate}px)`;
            });
        });
    }
}

// Form enhancements
function initFormEnhancements() {
    document.querySelectorAll('.form-floating input, .form-floating textarea').forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });
        input.addEventListener('blur', () => {
            if (!input.value) {
                input.parentElement.classList.remove('focused');
            }
        });
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });

    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', (e) => {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                submitBtn.disabled = true;
            }
        });
    });
}

// Progress bar loader
function initProgressBarLoader() {
    const progressBar = document.createElement("div");
    progressBar.id = "progress-bar";
    document.body.appendChild(progressBar);

    let width = 0;
    const interval = setInterval(() => {
        if (width < 80) {
            width += Math.random() * 5;
            progressBar.style.width = width + "%";
        }
    }, 200);

    window.addEventListener("load", () => {
        clearInterval(interval);
        progressBar.style.width = "100%";
        setTimeout(() => { progressBar.style.opacity = "0"; }, 500);
        setTimeout(() => { progressBar.remove(); }, 1000);
    });
}

// Progress Scroll Indicator
function initProgressScrollIndicator() {
    const progressBar = document.createElement('div');
    progressBar.id = 'scroll-progress-bar';
    document.body.appendChild(progressBar);

    registerScrollCallback(() => {
        const scrollTop = window.pageYOffset;
        const docHeight = document.body.scrollHeight - window.innerHeight;
        const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        progressBar.style.width = scrollPercent + '%';
    });
}

// Sticky Contact Button
function initStickyContactButton() {
    const contactBtn = document.createElement('a');
    contactBtn.innerHTML = '<i class="fab fa-whatsapp"></i>';
    contactBtn.className = 'sticky-contact-btn';
    contactBtn.href = 'https://wa.me/201000864742';
    contactBtn.target = '_blank';
    contactBtn.setAttribute('data-bs-toggle', 'tooltip');
    contactBtn.setAttribute('data-bs-placement', 'left');
    contactBtn.setAttribute('title', 'Contact us on WhatsApp');

    document.body.appendChild(contactBtn);
}

// CTA Highlight on Scroll
function initCTAHighlight() {
    const ctaButtons = document.querySelectorAll('.btn-primary, .btn-light[href*="contact"], a[href*="contact"].btn');

    registerScrollCallback(() => {
        const scrollTop = window.pageYOffset;
        const docHeight = document.body.scrollHeight - window.innerHeight;
        const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

        if (scrollPercent > 70) {
            ctaButtons.forEach(btn => {
                btn.classList.add('cta-highlight');
            });
        } else {
            ctaButtons.forEach(btn => {
                btn.classList.remove('cta-highlight');
            });
        }
    });
}

// Lazy-load content images (skip logos / already marked)
function initLazyImages() {
    document.querySelectorAll('img:not([loading])').forEach((img) => {
        const isCritical = img.closest('.navbar-brand, .hero-image-wrapper')
            || img.getAttribute('fetchpriority') === 'high';
        if (isCritical) {
            if (!img.hasAttribute('decoding')) {
                img.setAttribute('decoding', 'async');
            }
            return;
        }
        img.setAttribute('loading', 'lazy');
        img.setAttribute('decoding', 'async');
    });
}

// Initialize all enhancements when DOM is loaded
function initializeEnhancements() {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Initialize AOS library if available
    if (typeof AOS !== 'undefined') {
        if (reduceMotion) {
            AOS.init({ disable: true });
        } else {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                offset: 80
            });
        }
    }

    initSmoothScroll();
    if (!reduceMotion) {
        initAnimateOnScroll();
        initParallaxEffect();
        initCTAHighlight();
    }
    initTooltips();
    initLazyLoading();
    initLazyImages();
    initScrollToTop();
    initNavbarScrollEffect();
    initFormEnhancements();
    initProgressScrollIndicator();
    initStickyContactButton();
}

// CSS injected
const enhancementStyles = document.createElement('style');
enhancementStyles.textContent = `
    #progress-bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(90deg, #FFC923, #FFE066);
        width: 0%;
        z-index: 99999;
        transition: width 0.3s ease, opacity 0.3s ease;
        box-shadow: 0 0 12px rgba(255, 201, 35, 0.45);
    }

    #scroll-progress-bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(90deg, #FFC923, #FFE066);
        width: 0%;
        z-index: 1031;
        transition: width 0.1s ease;
        box-shadow: 0 0 12px rgba(255, 201, 35, 0.45);
    }

    .sticky-contact-btn {
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: 60px;
        height: 60px;
        background: #25d366;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 24px;
        z-index: 1000;
        box-shadow: 0 8px 28px rgba(37, 211, 102, 0.4);
        transition: all 0.3s ease;
        animation: pulse-contact 2s infinite;
    }

    .sticky-contact-btn:hover {
        transform: scale(1.1);
        background: #1ebe57;
        color: #fff;
        text-decoration: none;
        box-shadow: 0 12px 32px rgba(37, 211, 102, 0.55);
    }

    @keyframes pulse-contact {
        0% { box-shadow: 0 8px 28px rgba(37, 211, 102, 0.4); }
        50% { box-shadow: 0 8px 28px rgba(37, 211, 102, 0.4), 0 0 0 12px rgba(37, 211, 102, 0.12); }
        100% { box-shadow: 0 8px 28px rgba(37, 211, 102, 0.4); }
    }

    .cta-highlight {
        animation: cta-glow 1.5s ease-in-out infinite alternate;
        position: relative;
        overflow: hidden;
    }

    @keyframes cta-glow {
        0% { box-shadow: 0 8px 24px rgba(255, 201, 35, 0.35); transform: translateY(-2px); }
        100% { box-shadow: 0 14px 40px rgba(255, 224, 102, 0.55); transform: translateY(-4px); }
    }

    .cta-highlight::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        animation: shine 2s infinite;
    }

    @keyframes shine {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .navbar-scrolled {
        background: rgba(7, 8, 11, 0.9) !important;
        backdrop-filter: blur(18px);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .navbar-scrolled .navbar-nav .nav-link {
        color: #9aa0ad !important;
    }

    .navbar-scrolled .navbar-nav .nav-link:hover,
    .navbar-scrolled .navbar-nav .nav-link.active {
        color: #f4f5f7 !important;
        background: rgba(255, 255, 255, 0.05);
    }

    .navbar-scrolled .navbar-brand {
        color: #f4f5f7 !important;
    }

    .scroll-to-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(255, 201, 35, 0.5);
    }

    .form-floating.focused label {
        color: var(--accent, #FFC923);
    }

    @media (max-width: 768px) {
        .sticky-contact-btn {
            width: 50px;
            height: 50px;
            font-size: 20px;
            bottom: 20px;
            left: 20px;
        }

        .scroll-to-top {
            width: 45px;
            height: 45px;
            bottom: 20px;
            right: 20px;
        }

        #scroll-progress-bar {
            height: 2px;
        }
    }
`;
document.head.appendChild(enhancementStyles);

// Initialize enhancements when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeEnhancements);
} else {
    initializeEnhancements();
}