<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaMiCasa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Google Fonts - Roboto --><!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;800&family=Roboto+Condensed:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/output.css"></head>
    <script src="/js/header.js" defer></script>
    <script src="/js/back-to-top.js" defer></script>

<body>
    <?php include __DIR__ . '/../components/header.php'; ?>
    <?php require_once __DIR__ . '/../components/bottom-nav.php'; ?>

    <button
    type="button"
    id="back-to-top"
    aria-label="Înapoi sus"
    class="fixed bottom-20 right-4 z-30 hidden h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-600 shadow-md transition-colors hover:bg-orange-500 hover:text-white focus-visible:outline-2 focus-visible:outline-orange-500 lg:bottom-5"
>
    <i class="fa-solid fa-chevron-up"></i>
</button>

<?php require_once __DIR__ . '/../components/footer.php'; ?>
<div class="h-16 lg:hidden" aria-hidden="true"></div>
</body>

</html>