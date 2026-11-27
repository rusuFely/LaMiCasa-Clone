
<header id="site-header" class="sticky top-0 z-40 w-full bg-white">

    <!-- ===================================== -->
    <!-- HEADER DESKTOP -->
    <!-- ===================================== -->

    <!-- Bara superioară -->
    <div class="hidden border-b border-gray-200 bg-gray-50 lg:block">
        <div class="mx-auto flex max-w-[1100px] items-center justify-between gap-3 px-4 text-[11px]" style="max-width:1100px; height:40px; padding:0 16px; gap:12px; font-size:11px">

            <!-- Livrare -->
            <div class="shrink-0 whitespace-nowrap">
                Pentru comenzile mai mari de 399 lei
                <span class="ml-2 rounded border border-orange-500 px-1 py-0.5 font-semibold text-orange-500">
                    LIVRAREA GRATUITĂ
                </span>
            </div>

            <!-- Linkuri -->
            <nav class="desktop-top-nav flex items-center whitespace-nowrap font-condensed">
                <a href="#" style="padding:0 12px" class="transition-colors hover:text-orange-500 focus-visible:text-orange-500">
                    DESPRE NOI
                </a>
                <a href="#" style="padding:0 12px; border-left:1px solid #d4d4d4" class="transition-colors hover:text-orange-500 focus-visible:text-orange-500">
                    LIVRARE ȘI ACHITARE
                </a>
                <a href="#" style="padding:0 12px; border-left:1px solid #d4d4d4" class="transition-colors hover:text-orange-500 focus-visible:text-orange-500">
                    BRANDURI
                </a>
                <a href="#" style="padding:0 12px; border-left:1px solid #d4d4d4" class="transition-colors hover:text-orange-500 focus-visible:text-orange-500">
                    CONTACTE
                </a>
            </nav>

            <!-- Rețele sociale -->
            <div class="flex items-center gap-3 text-sm text-[#666]">

                    <a href="#" aria-label="Facebook"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="WhatsApp"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="#" aria-label="TikTok"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                    <a href="#" aria-label="Telegram"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-telegram"></i>
                    </a>

                    <a href="#" aria-label="Viber"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-viber"></i>
                    </a>
                </div>

            <!-- Limbi -->
            <div class="flex items-center gap-3 text-xs">
    <a href="#" class="font-bold text-black hover:text-orange-500">
        RO
    </a>

    <a href="#" class="font-normal text-gray-600 hover:text-orange-500">
        RU
    </a>
</div>
        </div>
    </div>

    <!-- Rândul principal desktop -->
    <div class="mx-auto hidden max-w-[1100px] items-center gap-[18px] px-4 py-1 lg:flex" style="max-width:1100px; gap:18px; padding:4px 16px">

        <!-- Logo -->
        <a href="/pages/index.php"
            class="desktop-logo shrink-0" style="width:136px; margin-right:47px"
            aria-label="LaMiCasa - Pagina principală">

            <img src="/assets/logo.svg"
                alt="LaMiCasa"
                class="block h-auto w-[136px]" width="136" style="width:136px; max-width:100%; height:auto">
        </a>

        <!-- ===================================== -->
        <!-- CATALOG DESKTOP -->
        <!-- ===================================== -->

        <div id="desktop-catalog-wrap"
            class="relative w-[243px] shrink-0" style="width:243px">

            <!-- Buton Catalog -->
            <button
                type="button"
                id="desktop-catalog-btn"
                aria-controls="desktop-catalog"
                aria-expanded="false"
                class="flex w-full items-center justify-between rounded-xl bg-[#f76b1c] px-3.5 font-condensed text-sm font-medium text-white transition-colors duration-150 hover:bg-[#e85e10] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-500 active:bg-[#d9540d]" style="height:45px; padding:0 14px; font-size:14px; border-radius:12px">

                <span>
                    <i class="fa-solid fa-bars mr-2"></i>
                    CATALOG PRODUSE
                </span>

                <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>

            <!-- Meniu Catalog -->
            <div id="desktop-catalog"
                class="absolute left-0 top-full z-50 hidden w-full rounded-b-2xl bg-white font-condensed text-sm shadow-xl">

                <!-- NIVELUL 1: Categorii principale -->
                <nav id="desktop-categories"
                    aria-label="Categorii produse">
                </nav>

                <!-- Linkuri suplimentare -->
                <nav class="border-t border-gray-200">

                    <a href="#"
                        class="block border-b border-gray-200 px-4 py-3 transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600">
                        Top vânzări
                        <span class="rounded-full bg-cyan-500 px-2 py-0.5 text-[9px] font-bold text-white">
                            PRODUSE POPULARE
                        </span>
                    </a>

                    <a href="#"
                        class="block border-b border-gray-200 px-4 py-3 transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600">
                        Reduceri
                        <span class="rounded-full bg-green-500 px-2 py-0.5 text-[9px] font-bold text-white">
                            CEL MAI BUN PREȚ
                        </span>
                    </a>

                    <a href="#"
                        class="block border-b border-gray-200 px-4 py-3 transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600">
                        Recomandate
                        <span class="rounded-full bg-red-600 px-2 py-0.5 text-[9px] font-bold text-white">
                            ÎȚI VA PLĂCEA ASTA
                        </span>
                    </a>

                    <a href="#"
                        class="block rounded-b-2xl px-4 py-3 transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600">
                        Produse Alimentare
                    </a>
                </nav>

                <!-- NIVELUL 2: Subcategorii -->
                <nav id="desktop-subcategories"
                    aria-label="Subcategorii"
                    class="absolute left-full top-0 hidden w-[220px] rounded-2xl bg-white py-2 text-gray-500 shadow-xl">
                </nav>

                <!-- NIVELUL 3: Sub-subcategorii -->
                <nav id="desktop-third-level"
                    aria-label="Sub-subcategorii"
                    class="absolute left-[463px] top-0 hidden w-[220px] rounded-2xl bg-white py-2 text-gray-500 shadow-xl" style="left:calc(100% + 220px)">
                </nav>

            </div>
        </div>

        <!-- ===================================== -->
        <!-- CĂUTARE DESKTOP -->
        <!-- ===================================== -->

        <form role="search"
            class="flex min-w-0 flex-1 items-center rounded-xl border border-orange-400 focus-within:border-orange-600" style="height:42px; border-width:1px; border-radius:12px">

            <input
                type="search"
                name="q"
                placeholder="Caută produse"
                aria-label="Caută produse"
                class="h-full w-full min-w-0 rounded-xl px-3 text-sm outline-none">

            <button type="submit"
                aria-label="Caută"
                class="px-3 text-lg transition-colors hover:text-orange-500 focus-visible:text-orange-500 active:text-orange-600">

                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

      <!-- Acțiuni desktop -->
<div class="flex shrink-0 items-center gap-5 text-gray-700">

    <!-- Cont utilizator -->
    <a href="#"
        aria-label="Contul meu"
        class="text-lg transition-colors hover:text-orange-500 focus-visible:text-orange-500">
        <i class="fa-regular fa-user"></i>
    </a>

    <!-- Compară -->
    <a href="#"
        aria-label="Compară"
        class="relative text-lg transition-colors hover:text-orange-500 focus-visible:text-orange-500">

        <i class="fa-solid fa-shuffle"></i>

        <span id="compare-count"
            class="absolute -right-2 -top-2 flex h-4 min-w-4 items-center justify-center rounded-full bg-[#80b82a] px-1 text-[10px] font-bold text-white">
            0
        </span>
    </a>

    <!-- Favorite -->
    <a href="#"
        aria-label="Favorite"
        class="relative text-lg transition-colors hover:text-orange-500 focus-visible:text-orange-500">

        <i class="fa-regular fa-heart"></i>

        <span id="favorites-count"
            class="absolute -right-2 -top-2 flex h-4 min-w-4 items-center justify-center rounded-full bg-[#80b82a] px-1 text-[10px] font-bold text-white">
            0
        </span>
    </a>

    <!-- Coș -->
    <a href="#"
        aria-label="Coșul meu"
        class="flex items-center gap-2 transition-colors hover:text-orange-500 focus-visible:text-orange-500">

        <span class="relative text-lg">
            <i class="fa-solid fa-bag-shopping"></i>

            <span id="cart-count"
                class="absolute -right-2 -top-2 flex h-4 min-w-4 items-center justify-center rounded-full bg-[#80b82a] px-1 text-[10px] font-bold text-white">
                0
            </span>
        </span>

        <span id="cart-total" class="whitespace-nowrap text-sm text-gray-700">
            0.00 MDL
        </span>
    </a>

</div>
    </div>

    <!-- ===================================== -->
    <!-- HEADER TABLETĂ ȘI MOBIL -->
    <!-- ===================================== -->

    <div class="lg:hidden">

        <!-- Bara superioară -->
        <div class="bg-[#f5f5f5]">
            <div class="mx-auto flex max-w-[900px] items-center justify-between px-4 py-3">

                <!-- Rețele sociale -->
                <div class="flex items-center gap-3 text-[15px] text-[#666]">

                    <a href="#" aria-label="Facebook"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="WhatsApp"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>

                    <a href="#" aria-label="TikTok"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                    <a href="#" aria-label="Telegram"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-telegram"></i>
                    </a>

                    <a href="#" aria-label="Viber"
                        class="transition-colors hover:text-orange-500">
                        <i class="fa-brands fa-viber"></i>
                    </a>
                </div>

                <!-- Limbi -->
                <div class="flex gap-2 text-xs">
                    <a href="#" class="font-bold hover:text-orange-500">RO</a>
                    <a href="#" class="text-gray-600 hover:text-orange-500">RU</a>
                </div>
            </div>
        </div>

        <!-- Rând principal -->
        <div class="flex items-center justify-between gap-3 border-b border-gray-100 px-4 py-3 shadow-sm">

            <!-- Logo -->
            <a href="/pages/index.php" class="shrink-0">
                <img src="/assets/logo.svg"
                    alt="LaMiCasa"
                    class="block h-auto w-[100px] sm:w-[110px]">
            </a>

            <!-- MENU și Coș -->
            <div class="flex items-center gap-5">

                <button
                    type="button"
                    id="mobile-menu-btn"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    class="flex items-center gap-2 text-[#333] transition-colors hover:text-orange-500 focus-visible:text-orange-500 active:text-orange-600">

                    <i class="fa-solid fa-bars text-xl"></i>
                    <span class="font-condensed text-base">MENU</span>
                </button>

                <a href="#"
                    aria-label="Coșul meu"
                    class="relative text-xl text-[#444] transition-colors hover:text-orange-500 focus-visible:text-orange-500 active:text-orange-600">

                    <i class="fa-solid fa-bag-shopping"></i>

                    <span class="absolute -right-2 -top-2 flex h-4 min-w-4 items-center justify-center rounded-full bg-[#80b82a] px-1 text-[10px] font-bold text-white">
                        0
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- ===================================== -->
    <!-- OVERLAY -->
    <!-- ===================================== -->

    <!-- Poziția de sus este calculată în header.js -->
    <div id="menu-overlay"
        class="fixed inset-x-0 bottom-0 z-0 hidden bg-black/70">
    </div>

    <!-- ===================================== -->
    <!-- MENIU LATERAL MOBIL -->
    <!-- ===================================== -->

    <aside id="mobile-menu"
        aria-label="Meniu mobil"
        aria-hidden="true"
        class="fixed inset-y-0 left-0 z-50 w-[300px] max-w-[90vw] -translate-x-full overflow-y-auto bg-white shadow-xl transition-transform duration-300 lg:hidden">

        <!-- Căutare -->
        <form role="search"
            class="flex items-center border-b border-gray-200 px-5 py-5">

            <input
                type="search"
                name="q"
                aria-label="Caută produse"
                placeholder="Caută produse"
                class="w-full min-w-0 text-sm outline-none">

            <button type="submit"
                aria-label="Caută"
                class="text-xl transition-colors hover:text-orange-500 focus-visible:text-orange-500">

                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <!-- Taburi Catalog / Branduri -->
        <div class="grid grid-cols-2 bg-gray-100 font-condensed text-sm font-semibold">

            <button type="button"
                id="catalog-tab"
                aria-selected="true"
                class="border-b-2 border-orange-500 py-4 transition-colors hover:text-orange-500 focus-visible:text-orange-500 active:text-orange-600">
                CATALOG
            </button>

            <button type="button"
                id="brands-tab"
                aria-selected="false"
                class="border-b-2 border-transparent py-4 text-gray-400 transition-colors hover:text-orange-500 focus-visible:text-orange-500 active:text-orange-600">
                BRANDURI
            </button>
        </div>

        <!-- Catalog mobil: generat prin JavaScript -->
        <div id="catalog-content" class="font-condensed text-sm"></div>

        <!-- Branduri -->
        <nav id="brands-content"
            aria-label="Branduri"
            class="hidden font-condensed text-sm">

            <a href="#"
                class="block border-b border-gray-200 px-5 py-4 transition-colors hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500">
                Brand 1
            </a>

            <a href="#"
                class="block border-b border-gray-200 px-5 py-4 transition-colors hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500">
                Brand 2
            </a>

            <a href="#"
                class="block border-b border-gray-200 px-5 py-4 transition-colors hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500">
                Brand 3
            </a>
        </nav>

    </aside>
</header>
