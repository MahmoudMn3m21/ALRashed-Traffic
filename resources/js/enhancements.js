// Interactive Enhancements for Al Rashed Traffic Website

// Smooth Scroll for anchor links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
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
        background: rgba(0, 0, 0, 0.9);
        color: white;
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
        background: var(--primary-color, #007bff);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    `;

    scrollBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    document.body.appendChild(scrollBtn);

    window.addEventListener('scroll', () => {
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
        window.addEventListener('scroll', () => {
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
        window.addEventListener('scroll', () => {
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

// Initialize all enhancements when DOM is loaded
function initializeEnhancements() {
    // Initialize AOS library if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }
    
    initSmoothScroll();
    initAnimateOnScroll();
    initTooltips();
    initLazyLoading();
    initScrollToTop();
    initNavbarScrollEffect();
    initParallaxEffect();
    initFormEnhancements();
    
    console.log('Al Rashed Traffic - Interactive enhancements loaded successfully!');
}

// CSS injected
const enhancementStyles = document.createElement('style');
enhancementStyles.textContent = `
    /* AOS Animations */
    [data-aos] {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    [data-aos].aos-animate {
        opacity: 1;
        transform: translateY(0);
    }

    /* Lazy loading */
    img.lazy { opacity: 0; transition: opacity 0.3s; }
    img.lazy-loaded { opacity: 1; }

    /* Progress bar */
    #progress-bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 4px;
        background: linear-gradient(90deg, #1e40af, #3b82f6);
        width: 0%;
        z-index: 99999;
        transition: width 0.3s ease, opacity 0.3s ease;
    }

    /* Navbar scroll effect */
    .navbar-scrolled {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    /* Scroll to top button hover */
    .scroll-to-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
    }

    /* Form floating labels */
    .form-floating.focused label {
        color: var(--primary-color, #007bff);
    }

    /* Smooth transitions */
    .btn, .card, .nav-link, .form-control {
        transition: all 0.3s ease;
    }

    .btn:hover { transform: translateY(-2px); }
    .card:hover { transform: translateY(-5px); }
`;
document.head.appendChild(enhancementStyles);