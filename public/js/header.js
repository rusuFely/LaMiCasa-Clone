
document.addEventListener("DOMContentLoaded", () => {

    // ==========================================
    // 1. DATE TEMPORARE
    // ==========================================

    const categories = [
        {
            name: "Igiena personală",
            children: [
                { name: "Corp" },
                { name: "Deodorante/Antiperspirante" },
                { name: "Diverse" },
                { name: "Gel de duș" },
                { name: "Igiena copii" },
                { name: "Igiena intimă" },
                {
                    name: "Igiena orală",
                    children: [
                        { name: "Apă de gură" },
                        { name: "Pastă de dinți" },
                        { name: "Periuță de dinți" }
                    ]
                },
                {
                    name: "Îngrijire păr",
                    children: [
                        { name: "Balsam/Conditioner" },
                        { name: "Șampon" }
                    ]
                },
                { name: "Parfumerie" },
                { name: "Pentru/după bărbierit" },
                { name: "Săpun" },
                { name: "Săpun lichid" },
                { name: "Seturi" }
            ]
        },
        {
            name: "Produse pentru casă",
            children: [
                {
                    name: "Bucătărie",
                    children: [
                        { name: "Bureți" },
                        { name: "Degresanți" },
                        { name: "Detergenți pentru mașina de spălat vase" },
                        { name: "Detergenți pentru vase" },
                        { name: "Folie și pungi alimentare" }
                    ]
                },
                { name: "Detergenți universali" },
                { name: "Diverse" },
                { name: "Lavete/Mop" },
                { name: "Odorizante" },
                { name: "Pisici" },
                {
                    name: "Produse din hârtie",
                    children: [
                        { name: "Hârtie igienică" },
                        { name: "Prosoape pentru bucătărie" }
                    ]
                },
                { name: "Saci menajeri" },
                { name: "Soluții desfundat țevi" },
                { name: "Soluții îngrijire baie și WC" },
                { name: "Soluții îngrijire mobilă" }
            ]
        },
        {
            name: "Spălarea și întreținerea rufelor",
            children: [
                { name: "Aditivi" },
                { name: "Clătitor rufe" },
                { name: "Detergenți" },
                { name: "Înălbitor" },
                { name: "Parfum rufe" }
            ]
        },
        { name: "Transport pentru copii" }
    ];

    const extraLinks = [
        { name: "TOP VÂNZĂRI", badge: "PRODUSE POPULARE", badgeClass: "bg-cyan-500" },
        { name: "REDUCERI", badge: "CEL MAI BUN PREȚ", badgeClass: "bg-green-500" },
        { name: "RECOMANDATE", badge: "ÎȚI VA PLĂCEA ASTA", badgeClass: "bg-red-600" },
        { name: "PRODUSE ALIMENTARE" },
        { name: "LISTA DE DORINȚE", icon: "fa-regular fa-heart" },
        { name: "COMPARĂ", icon: "fa-solid fa-arrow-right-arrow-left" },
        { name: "AUTENTIFICARE / ÎNREGISTRARE", icon: "fa-regular fa-user" }
    ];

    // ==========================================
    // 2. ELEMENTE HTML
    // ==========================================

    const header = document.querySelector("#site-header");
    const overlay = document.querySelector("#menu-overlay");

    const desktopWrap = document.querySelector("#desktop-catalog-wrap");
    const desktopBtn = document.querySelector("#desktop-catalog-btn");
    const desktopMenu = document.querySelector("#desktop-catalog");
    const desktopCategories = document.querySelector("#desktop-categories");
    const desktopSub = document.querySelector("#desktop-subcategories");
    const desktopThird = document.querySelector("#desktop-third-level");

    const mobileBtn = document.querySelector("#mobile-menu-btn");
    const mobileMenu = document.querySelector("#mobile-menu");

    const catalogTab = document.querySelector("#catalog-tab");
    const brandsTab = document.querySelector("#brands-tab");
    const catalogContent = document.querySelector("#catalog-content");
    const brandsContent = document.querySelector("#brands-content");

    if (
        !header || !overlay || !desktopWrap || !desktopBtn ||
        !desktopMenu || !desktopCategories || !desktopSub ||
        !desktopThird || !mobileBtn || !mobileMenu ||
        !catalogTab || !brandsTab || !catalogContent || !brandsContent
    ) {
        return;
    }

    let activeMenu = null;
    let mobilePath = [];
    let closeTimer = null;

    // ==========================================
    // 3. FUNCȚII COMUNE
    // ==========================================

    function itemLink(name, classes = "") {
        const link = document.createElement("a");
        link.href = "#";
        link.textContent = name;
        link.className = classes;
        return link;
    }

    function arrow() {
        const icon = document.createElement("i");
        icon.className = "fa-solid fa-chevron-right text-[10px] text-gray-300";
        return icon;
    }

    function positionOverlay() {
        overlay.style.top = `${header.getBoundingClientRect().bottom}px`;
    }

    function setActiveItem(container, activeLink) {
        container.querySelectorAll(":scope > a").forEach(link => {
            link.classList.remove("text-orange-500", "bg-gray-100");
        });

        activeLink.classList.add("text-orange-500", "bg-gray-100");
    }

    function clearCloseTimer() {
        if (closeTimer) {
            clearTimeout(closeTimer);
            closeTimer = null;
        }
    }

    function closeMenus() {
        clearCloseTimer();

        desktopMenu.classList.add("hidden");
        desktopSub.classList.add("hidden");
        desktopThird.classList.add("hidden");

        mobileMenu.classList.add("-translate-x-full");
        mobileMenu.setAttribute("aria-hidden", "true");

        desktopBtn.setAttribute("aria-expanded", "false");
        mobileBtn.setAttribute("aria-expanded", "false");

        overlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");

        activeMenu = null;
    }

    // ==========================================
    // 4. DESKTOP - NIVELUL 3
    // ==========================================

    function renderDesktopThird(items, selectedLink) {
        desktopThird.replaceChildren();

        if (!items?.length) {
            desktopThird.classList.add("hidden");
            return;
        }

        // Aliniere verticală cu subcategoria selectată
        const menuRect = desktopMenu.getBoundingClientRect();
        const linkRect = selectedLink.getBoundingClientRect();

        desktopThird.style.top = `${linkRect.top - menuRect.top}px`;

        items.forEach(item => {
            const link = itemLink(
                item.name,
                "block px-5 py-3 text-gray-500 transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600"
            );

            desktopThird.append(link);
        });

        desktopThird.classList.remove("hidden");
    }

    // ==========================================
    // 5. DESKTOP - NIVELUL 2
    // ==========================================

    function renderDesktopSub(items) {
        desktopSub.replaceChildren();
        desktopThird.classList.add("hidden");

        if (!items?.length) {
            desktopSub.classList.add("hidden");
            return;
        }

        items.forEach(item => {
            const link = itemLink(
                item.name,
                "flex items-center justify-between gap-3 px-5 py-2.5 text-gray-500 transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600"
            );

            if (item.children?.length) {
                link.append(arrow());
            }

            // HOVER: deschide nivelul 3
            function activate() {
                setActiveItem(desktopSub, link);
                renderDesktopThird(item.children, link);
            }

            link.addEventListener("mouseenter", activate);
            link.addEventListener("focus", activate);

            // Clickul nu deschide submeniul
            link.addEventListener("click", event => {
                event.preventDefault();
            });

            desktopSub.append(link);
        });

        desktopSub.classList.remove("hidden");
    }

    // ==========================================
    // 6. DESKTOP - NIVELUL 1
    // ==========================================

    categories.forEach(category => {
        const link = itemLink(
            category.name,
            "flex items-center justify-between gap-3 border-b border-gray-200 px-4 py-3 font-semibold transition-colors duration-150 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600"
        );

        if (category.children?.length) {
            link.append(arrow());
        }

        // HOVER: deschide nivelul 2
        function activate() {
            setActiveItem(desktopCategories, link);
            renderDesktopSub(category.children);
        }

        link.addEventListener("mouseenter", activate);
        link.addEventListener("focus", activate);

        link.addEventListener("click", event => {
            event.preventDefault();
        });

        desktopCategories.append(link);
    });

    // ==========================================
    // 7. DESKTOP - DESCHIDERE CATALOG
    // ==========================================

    function openDesktopCatalog() {
        if (window.innerWidth < 1024) return;
        if (activeMenu === "desktop") return;

        closeMenus();
        positionOverlay();

        desktopMenu.classList.remove("hidden");
        overlay.classList.remove("hidden");

        desktopBtn.setAttribute("aria-expanded", "true");
        activeMenu = "desktop";
    }

    // Deschidere la hover
    desktopWrap.addEventListener("mouseenter", () => {
        clearCloseTimer();
        openDesktopCatalog();
    });

    // Menține meniul deschis când mouse-ul este peste el
    desktopMenu.addEventListener("mouseenter", clearCloseTimer);
    desktopSub.addEventListener("mouseenter", clearCloseTimer);
    desktopThird.addEventListener("mouseenter", clearCloseTimer);

    // Închidere cu o mică întârziere
    desktopWrap.addEventListener("mouseleave", () => {
        clearCloseTimer();

        closeTimer = setTimeout(() => {
            if (activeMenu === "desktop") {
                closeMenus();
            }
        }, 200);
    });

    // Navigare cu tastatura
    desktopWrap.addEventListener("focusin", () => {
        clearCloseTimer();
        openDesktopCatalog();
    });

    desktopWrap.addEventListener("focusout", event => {
        if (!desktopWrap.contains(event.relatedTarget)) {
            closeMenus();
        }
    });

    // Click pe butonul principal
    desktopBtn.addEventListener("click", () => {
        if (activeMenu === "desktop") {
            closeMenus();
        } else {
            openDesktopCatalog();
        }
    });

    // ==========================================
    // 8. MOBIL - NAVIGARE CATEGORII
    // ==========================================

    function renderMobile() {
        catalogContent.replaceChildren();

        let items = categories;

        for (const index of mobilePath) {
            items = items[index].children || [];
        }

        // Buton Înapoi
        if (mobilePath.length > 0) {
            const back = document.createElement("button");

            back.type = "button";
            back.className =
                "w-full border-b border-gray-200 bg-gray-100 px-5 py-4 text-left font-semibold hover:text-orange-500 focus-visible:text-orange-500";

            back.textContent = "‹ ÎNAPOI";

            back.addEventListener("click", () => {
                mobilePath.pop();
                renderMobile();
            });

            catalogContent.append(back);
        }

        // Categorii și subcategorii
        items.forEach((item, index) => {
            const row = document.createElement("div");

            row.className =
                "flex min-h-12 items-stretch border-b border-gray-200";

            const link = itemLink(
                item.name.toLocaleUpperCase("ro-RO"),
                "flex flex-1 items-center px-5 py-3 font-semibold transition-colors hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600"
            );

            row.append(link);

            if (item.children?.length) {
                const next = document.createElement("button");

                next.type = "button";
                next.className =
                    "w-12 shrink-0 border-l border-gray-200 hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500";

                next.setAttribute(
                    "aria-label",
                    `Deschide subcategoriile: ${item.name}`
                );

                next.append(arrow());

                next.addEventListener("click", () => {
                    mobilePath.push(index);
                    renderMobile();
                    mobileMenu.scrollTop = 0;
                });

                link.addEventListener("click", event => {
                    event.preventDefault();
                    next.click();
                });

                row.append(next);
            }

            catalogContent.append(row);
        });

        // Linkuri suplimentare doar la nivelul principal
        if (mobilePath.length === 0) {
            extraLinks.forEach((item, index) => {
                const link = itemLink(
                    item.name,
                    `flex min-h-12 items-center gap-2 border-b border-gray-200 px-5 py-3 font-semibold transition-colors hover:bg-gray-100 hover:text-orange-500 focus-visible:bg-gray-100 focus-visible:text-orange-500 active:text-orange-600 ${index === 4 ? "border-t" : ""}`
                );

                if (item.icon) {
                    const icon = document.createElement("i");
                    icon.className = `${item.icon} text-sm`;
                    link.prepend(icon);
                }

                if (item.badge) {
                    const badge = document.createElement("span");

                    badge.className =
                        `${item.badgeClass} rounded-full px-2 py-0.5 text-[9px] font-bold text-white`;

                    badge.textContent = item.badge;
                    link.append(badge);
                }

                catalogContent.append(link);
            });
        }
    }

    // ==========================================
    // 9. MOBIL - TABURI
    // ==========================================

    function showTab(tab) {
        const isCatalog = tab === "catalog";

        catalogContent.classList.toggle("hidden", !isCatalog);
        brandsContent.classList.toggle("hidden", isCatalog);

        catalogTab.classList.toggle("border-orange-500", isCatalog);
        catalogTab.classList.toggle("border-transparent", !isCatalog);

        brandsTab.classList.toggle("border-orange-500", !isCatalog);
        brandsTab.classList.toggle("border-transparent", isCatalog);

        catalogTab.classList.toggle("text-gray-400", !isCatalog);
        brandsTab.classList.toggle("text-gray-400", isCatalog);

        catalogTab.setAttribute("aria-selected", String(isCatalog));
        brandsTab.setAttribute("aria-selected", String(!isCatalog));
    }

    // ==========================================
    // 10. MOBIL - DESCHIDERE MENIU
    // ==========================================

    mobileBtn.addEventListener("click", () => {
        if (activeMenu === "mobile") {
            closeMenus();
            return;
        }

        closeMenus();

        mobilePath = [];
        renderMobile();
        showTab("catalog");

        mobileMenu.classList.remove("-translate-x-full");
        mobileMenu.setAttribute("aria-hidden", "false");

        mobileBtn.setAttribute("aria-expanded", "true");

        overlay.style.top = "0px";
        overlay.classList.remove("hidden");

        document.body.classList.add("overflow-hidden");
        activeMenu = "mobile";
    });

    catalogTab.addEventListener("click", () => {
        mobilePath = [];
        renderMobile();
        showTab("catalog");
    });

    brandsTab.addEventListener("click", () => {
        showTab("brands");
    });

    // ==========================================
    // 11. ÎNCHIDERE ȘI RESPONSIVE
    // ==========================================

    overlay.addEventListener("click", closeMenus);

    document.addEventListener("keydown", event => {
        if (event.key === "Escape") {
            closeMenus();
        }
    });

    window.addEventListener("resize", () => {
        if (
            (window.innerWidth >= 1024 && activeMenu === "mobile") ||
            (window.innerWidth < 1024 && activeMenu === "desktop")
        ) {
            closeMenus();
        } else if (activeMenu === "desktop") {
            positionOverlay();
        }
    });

    // Inițializare mobil
    renderMobile();
});
