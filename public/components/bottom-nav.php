<!-- Navigare fixă pentru mobil și tabletă -->
<nav class="fixed inset-x-0 bottom-0 z-30 grid grid-cols-4 border-t border-gray-200 bg-white shadow-lg lg:hidden">

    <a href="/pages/index.php"
       class="flex flex-col items-center gap-1 py-2 text-gray-700 hover:text-orange-500">
        <i class="fa-solid fa-store text-lg"></i>
        <span class="text-[10px]">Magazin</span>
    </a>

    <a href="#"
       class="flex flex-col items-center gap-1 py-2 text-gray-700 hover:text-orange-500">
        <span class="relative">
            <i class="fa-regular fa-heart text-lg"></i>
            <span id="mobile-favorites-count"
                  class="absolute -right-2 -top-1 rounded-full bg-[#80b82a] px-1 text-[9px] text-white">0</span>
        </span>
        <span class="text-[10px]">Lista de dorințe</span>
    </a>

    <a href="#"
       class="flex flex-col items-center gap-1 py-2 text-gray-700 hover:text-orange-500">
        <span class="relative">
            <i class="fa-solid fa-bag-shopping text-lg"></i>
            <span id="bottom-cart-count"
                  class="absolute -right-2 -top-1 rounded-full bg-[#80b82a] px-1 text-[9px] text-white">0</span>
        </span>
        <span class="text-[10px]">Coș</span>
    </a>

    <a href="#"
       class="flex flex-col items-center gap-1 py-2 text-gray-700 hover:text-orange-500">
        <i class="fa-regular fa-user text-lg"></i>
        <span class="text-[10px]">Contul meu</span>
    </a>

</nav>