<section
    data-banner-slider
    aria-label="Oferte și promoții"
    class="relative h-[240px] overflow-hidden rounded-xl md:h-[270px]">

    <!-- Banner 1 - Swiffer -->
    <a data-banner-slide
        href="/pages/catalog.php?brand=swiffer"
        class="block">

        <img
            src="/assets/banners/swiffer.webp"
            alt="Produse Swiffer"
            class="block h-[240px] w-full object-cover md:h-[270px]">
    </a>

    <!-- Banner 2 - FA -->
    <a data-banner-slide
        href="/pages/catalog.php?category=deodorante-antiperspirante&amp;brand=fa"
        class="hidden">

        <img
            src="/assets/banners/fa.webp"
            alt="Produse FA"
            class="block h-[240px] w-full object-cover md:h-[270px]">
    </a>

    <!-- Banner 3 - Seturi Tesori d'Oriente -->
    <div data-banner-slide class="relative hidden">

        <img
            src="/assets/banners/tesori.webp"
            alt="Seturi Tesori d'Oriente"
            class="block h-[240px] w-full object-cover md:h-[270px]">

        <!-- Fundal semitransparent -->
        <div class="absolute inset-0 bg-black/30"></div>

        <!-- Conținut banner -->
        <div class="absolute inset-0 flex flex-col items-center justify-center px-10 text-center text-white">

            <h2 class="mb-1 text-2xl font-bold md:text-3xl">
                Tesori d'Oriente
            </h2>

            <p class="max-w-[350px] text-sm md:text-base">
                Mega Reducere la toată gama de produse Tesori d'Oriente
            </p>

            <a
                href="/pages/catalog.php?category=seturi"
                class="mt-6 border border-white px-4 py-2 text-sm transition-colors hover:bg-white hover:text-black">
                Cumpără acum
            </a>

        </div>

    </div>

    <!-- Banner 4 - Biointimo -->
    <a data-banner-slide
        href="/pages/product.php?id=ID_PRODUS"
        class="hidden">

        <img
            src="/assets/banners/biointimo.webp"
            alt="Plasture termic Biointimo"
            class="block h-[240px] w-full object-cover md:h-[270px]">
    </a>

    <!-- Banner 5 - Tesori d'Oriente -->
    <a data-banner-slide
        href="/pages/catalog.php?brand=tesori-doriente"
        class="hidden">

        <img
            src="/assets/banners/tesori-1.webp"
            alt="Produse Tesori d'Oriente"
            class="block h-[240px] w-full object-cover md:h-[270px]">
    </a>

    <!-- Banner 6 - Finish -->
    <a data-banner-slide
        href="/pages/catalog.php?brand=finish"
        class="hidden">

        <img
            src="/assets/banners/finish.webp"
            alt="Produse Finish"
            class="block h-[240px] w-full object-cover md:h-[270px]">
    </a>

    <!-- Buton anterior -->
    <button
        type="button"
        data-banner-prev
        aria-label="Banner anterior"
        class="absolute left-2 top-1/2 z-10 flex h-8 w-8 -translate-y-1/2 cursor-pointer items-center justify-center rounded-full bg-black/20 text-lg text-white hover:bg-black/40">

        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <!-- Buton următor -->
    <button
        type="button"
        data-banner-next
        aria-label="Banner următor"
        class="absolute right-2 top-1/2 z-10 flex h-8 w-8 -translate-y-1/2 cursor-pointer items-center justify-center rounded-full bg-black/20 text-lg text-white hover:bg-black/40">

        <i class="fa-solid fa-chevron-right"></i>
    </button>

    <!-- Indicatori de navigare -->
    <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 gap-2">

        <button
            type="button"
            data-banner-dot
            aria-label="Banner 1"
            class="h-2 w-2 cursor-pointer rounded-full bg-white">
        </button>

        <button
            type="button"
            data-banner-dot
            aria-label="Banner 2"
            class="h-2 w-2 cursor-pointer rounded-full bg-white/40">
        </button>

        <button
            type="button"
            data-banner-dot
            aria-label="Banner 3"
            class="h-2 w-2 cursor-pointer rounded-full bg-white/40">
        </button>

        <button
            type="button"
            data-banner-dot
            aria-label="Banner 4"
            class="h-2 w-2 cursor-pointer rounded-full bg-white/40">
        </button>

        <button
            type="button"
            data-banner-dot
            aria-label="Banner 5"
            class="h-2 w-2 cursor-pointer rounded-full bg-white/40">
        </button>

        <button
            type="button"
            data-banner-dot
            aria-label="Banner 6"
            class="h-2 w-2 cursor-pointer rounded-full bg-white/40">
        </button>

    </div>

</section>

<!-- npx.cmd @tailwindcss/cli -i ./public/css/styles.css -o ./public/css/output.css --watch -->