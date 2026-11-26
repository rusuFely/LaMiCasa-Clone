<footer class="bg-[#efefef] font-roboto text-black">
    <!-- Conținutul principal al footer-ului -->
    <div class="mx-auto grid max-w-[1100px] grid-cols-1 gap-8 px-5 py-12 md:grid-cols-3 md:gap-8 md:px-6 md:py-14 lg:gap-16 lg:py-16">
        <!-- 1. OBȚINEȚI COMUNICARE -->
        <section>
            <h2 class="mb-4 font-condensed text-xl font-bold">
                Obțineți comunicare
            </h2>

            <p class="mb-5 text-sm leading-7">
                Alătură-te grupului nostru și fii primul care află toate
                promoțiile și ofertele!
            </p>

            <!-- Rețele sociale -->
            <div class="flex flex-wrap items-center gap-1.5">

                <a href="#"
                    aria-label="Facebook"
                    class="flex h-7 w-7 items-center justify-center rounded bg-[#3b5998] text-sm text-white transition-opacity hover:opacity-75">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#"
                    aria-label="Instagram"
                    class="flex h-7 w-7 items-center justify-center rounded bg-[#8a4937] text-sm text-white transition-opacity hover:opacity-75">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#"
                    aria-label="WhatsApp"
                    class="flex h-7 w-7 items-center justify-center rounded bg-[#1fbea5] text-sm text-white transition-opacity hover:opacity-75">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="#"
                    aria-label="TikTok"
                    class="flex h-7 w-7 items-center justify-center rounded bg-black text-sm text-white transition-opacity hover:opacity-75">
                    <i class="fa-brands fa-tiktok"></i>
                </a>

                <a href="#"
                    aria-label="Telegram"
                    class="flex h-7 w-7 items-center justify-center rounded bg-[#36aee2] text-sm text-white transition-opacity hover:opacity-75">
                    <i class="fa-brands fa-telegram"></i>
                </a>

                <a href="#"
                    aria-label="Viber"
                    class="flex h-7 w-7 items-center justify-center rounded bg-[#80509b] text-sm text-white transition-opacity hover:opacity-75">
                    <i class="fa-brands fa-viber"></i>
                </a>
            </div>
        </section>

        <!-- 2. DESPRE LAMICASA -->
        <section>
            <h2 class="mb-4 font-condensed text-xl font-bold">
                Despre LaMiCasa
            </h2>
            <p class="text-sm leading-7">
                LaMiCasa este un magazin online din Republica Moldova activ din
                2024, specializat pe produse pentru casa și produse pentru igiena.
                Aici găsești peste 1000 de produse de la cele mai renumite
                branduri (Colgate, Palmolive, Fairy, Finish, Tesori d’Oriente,
                Dove, Cif etc.), produse de calitate la preț de distribuitor.
                Comenzile sunt procesate de o echipă locală din Chișinău.
                <strong>LaMiCasa</strong> este un magazin online care vine mai
                aproape de tine cu cele mai utile și practice soluții de
                curățare, cu ajutorul cărora casa ta va avea un aspect proaspăt
                și curat, iar atmosfera din ea va fi una care va aduce lumină
                și liniște interioară.

                <a href="#"
                    class="italic text-orange-500 hover:text-orange-600 hover:underline">
                    Arată mai mult..
                </a>
            </p>
        </section>

        <!-- 3. MODALITĂȚI DE PLATĂ -->
        <section>
            <h2 class="mb-4 font-condensed text-xl font-bold">
                Modalități de plată
            </h2>

            <p class="mb-5 text-sm leading-7">
                Comenzile pot fi achitate cu cardul bancar Visa, MasterCard sau numerar la livrare
            </p>

            <!-- Metode de plată -->
            <div class="grid grid-cols-4 items-center gap-3 sm:gap-4">
                <img src="/assets/visa.svg" alt="Visa" class="h-10 w-full rounded bg-white object-contain p-1.5">
                <img src="/assets/mastercard.svg" alt="Mastercard" class="h-10 w-full rounded bg-white object-contain p-1.5">
                <img src="/assets/american-express.svg" alt="American Express" class="h-10 w-full rounded bg-white object-contain p-1.5">
                <img src="/assets/maib.svg" alt="maib" class="h-10 w-full rounded bg-white object-contain p-1.5">
            </div>
        </section>
    </div>

    <!-- Bara inferioară -->
    <div class="bg-[#484c56] text-white">
        <div class="mx-auto flex max-w-[1100px] flex-col items-center justify-between gap-2 px-5 py-5 text-center text-xs sm:flex-row sm:text-left">
            <p>&copy; 2026 LaMiCasa | Toate drepturile sunt rezervate.</p>
            <p>Transformă cumpărăturile în plăcere<span class="text-red-500">♥</span>
            </p>
        </div>
    </div>
</footer>
<!-- npx.cmd @tailwindcss/cli -i ./public/css/styles.css -o ./public/css/output.css --watch -->