document.addEventListener("DOMContentLoaded", function() {
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.setAttribute("aria-label", "Buka menu");

        mobileMenuBtn.addEventListener("click", function() {
            mobileMenu.classList.toggle("hidden");
        });

        // Close menu when clicking a link (mobile)
        mobileMenu.querySelectorAll("a").forEach(function(a) {
            a.addEventListener("click", function() {
                mobileMenu.classList.add("hidden");
            });
        });
    }

    window.addEventListener("scroll", function() {
        const navbar = document.getElementById("navbar");
        const backToTop = document.getElementById("backToTop");

        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add("shadow-2xl");
            } else {
                navbar.classList.remove("shadow-2xl");
            }
        }

        if (backToTop) {
            if (window.scrollY > 300) {
                backToTop.classList.remove("hidden");
            } else {
                backToTop.classList.add("hidden");
            }
        }
    });

    const backToTop = document.getElementById("backToTop");
    if (backToTop) {
        backToTop.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }
});

