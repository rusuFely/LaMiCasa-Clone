<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaMiCasa</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;800&family=Roboto+Condensed:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/css/output.css">
    <!-- JavaScript -->
    <script src="/js/header.js" defer></script>
    <script src="/js/back-to-top.js" defer></script>
    <script src="/js/home.js" defer></script>
</head>

<body class="bg-white font-sans">
    <!-- Header -->
    <?php require __DIR__ . '/../components/header.php'; ?>
    <!-- Conținut principal -->
    <main class="mx-auto max-w-[1100px] px-4 py-6 lg:py-[45px]">

        <!-- Banner principal -->
        <?php require __DIR__ . '/../components/banner-slider.php'; ?>

        <!-- Produse noi -->

        <!-- Top categorii -->

        <!-- Banner promoțional -->

        <!-- Produse recomandate -->

        <!-- Reduceri -->
    </main>

    <!-- Newsletter și informații -->

    <!-- Footer -->
    <?php require __DIR__ . '/../components/footer.php'; ?>

    <!-- Navigare mobilă -->
    <?php require __DIR__ . '/../components/bottom-nav.php'; ?>

    <!-- Înapoi sus -->
    <button type="button" id="back-to-top" aria-label="Înapoi sus" class="fixed bottom-20 right-4 z-30 hidden h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-600 shadow-md transition-colors hover:bg-orange-500 hover:text-white focus-visible:outline-2 focus-visible:outline-orange-500 lg:bottom-5">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- Spațiu pentru navigarea fixă mobilă -->
    <div class="h-16 lg:hidden" aria-hidden="true"></div>

</body>

</html>