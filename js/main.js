// Muskan Interiors — Shared JavaScript Engine

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Lucide Icons
    if (window.lucide) {
        lucide.createIcons();
    }

    // 2. Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 30) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // 3. Highlight Current Active Navigation Page
    const currentPath = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('.nav-link, .mobile-nav-drawer a').forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPath || (currentPath === '' && (href === 'index.php' || href === 'index.html'))) {
            link.classList.add('active');
        }
    });

    // 4. Before / After Interactive Drag Slider
    const baSlider = document.getElementById('beforeAfterSlider') || document.getElementById('baSlider');
    const baBefore = document.getElementById('beforeWrap') || document.getElementById('baBefore');
    const baHandle = document.getElementById('sliderHandle') || document.getElementById('baHandle');

    if (baSlider && baBefore && baHandle) {
        let isDragging = false;

        const setBaPosition = (clientX) => {
            const rect = baSlider.getBoundingClientRect();
            let pos = ((clientX - rect.left) / rect.width) * 100;
            if (pos < 0) pos = 0;
            if (pos > 100) pos = 100;
            baBefore.style.width = pos + '%';
            baHandle.style.left = pos + '%';
        };

        baSlider.addEventListener('mousedown', (e) => { 
            isDragging = true; 
            setBaPosition(e.clientX); 
        });
        window.addEventListener('mousemove', (e) => { 
            if (isDragging) setBaPosition(e.clientX); 
        });
        window.addEventListener('mouseup', () => { 
            isDragging = false; 
        });

        baSlider.addEventListener('touchstart', (e) => { 
            isDragging = true; 
            if (e.touches && e.touches[0]) setBaPosition(e.touches[0].clientX); 
        }, { passive: true });
        window.addEventListener('touchmove', (e) => { 
            if (isDragging && e.touches && e.touches[0]) setBaPosition(e.touches[0].clientX); 
        }, { passive: true });
        window.addEventListener('touchend', () => { 
            isDragging = false; 
        });
    }
});

// Mobile Nav Toggle
function toggleMobileNav() {
    const drawer = document.getElementById('mobileDrawer');
    if (drawer) {
        drawer.classList.toggle('open');
    }
}
