document.addEventListener("DOMContentLoaded", () => {
    const button = document.querySelector("#back-to-top");

    if (!button) return;

    function toggleButton() {
        const visible = window.scrollY > 300;

        button.classList.toggle("hidden", !visible);
        button.classList.toggle("flex", visible);
    }

    window.addEventListener("scroll", toggleButton, { passive: true });

    button.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    toggleButton();
});