<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link Preview  -->
    <meta property="og:title" content="<?= $this->e($title) ?>">
    <meta property="og:description" content="<?= $this->e($description) ?>">
    <meta property="og:image" content="<?= $this->e($image) ?>">
    <meta property="og:url" content="<?= $this->e($url) ?>">
    <meta property="og:type" content="<?= $this->e($type) ?>">

    <!--  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $this->e($description) ?>">
    <title><?= $this->e($title) ?> Empresa</title>

    <!-- Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Sen:wght@400..800&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="/assets/css/root.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/MediaQ.css">
    <link rel="stylesheet" href="/assets/css/object.css">

</head>
<body class="light-mode">
    <?= $this->insert('components/empresa/header') ?>
    
    <main>
        <ul class="notifications-list" id="notifications-list">
            
        </ul>
        <?= $this->section('content') ?>
    </main>

    <?= $this->insert('components/footer') ?>
    <script src="/assets/js/index.js"></script>
</body>
</html>