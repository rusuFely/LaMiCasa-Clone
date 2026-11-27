// home banner
document.addEventListener("DOMContentLoaded", () => {

    const sliders = document.querySelectorAll("[data-banner-slider]");

    sliders.forEach(slider => {

        const slides = slider.querySelectorAll("[data-banner-slide]");
        const prevBtn = slider.querySelector("[data-banner-prev]");
        const nextBtn = slider.querySelector("[data-banner-next]");
        const dots = slider.querySelectorAll("[data-banner-dot]");

        let currentIndex = 0;

        // Afișarea bannerului selectat
        function showSlide(index) {

            slides.forEach(slide => {
                slide.classList.add("hidden");
            });

            slides[index].classList.remove("hidden");

            // Actualizarea cerculețelor
            dots.forEach(dot => {
                dot.classList.remove("bg-white");
                dot.classList.add("bg-white/40");
            });

            if (dots[index]) {
                dots[index].classList.remove("bg-white/40");
                dots[index].classList.add("bg-white");
            }
        }

        // Bannerul următor
        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Bannerul anterior
        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        // Navigare prin săgeți
        prevBtn.addEventListener("click", prevSlide);
        nextBtn.addEventListener("click", nextSlide);

        // Navigare prin cerculețe
        dots.forEach((dot, index) => {

            dot.addEventListener("click", () => {
                currentIndex = index;
                showSlide(currentIndex);
            });

        });

        // Schimbare automată la fiecare 7 secunde
        setInterval(nextSlide, 7000);

    });

});