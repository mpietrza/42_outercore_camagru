<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= e($title ?? 'Camagru') ?></title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="/" aria-current="<?= ($currentPath ?? '') === '/' ? 'page' : 'false' ?>">Home</a>
                <a href="/gallery" aria-current="<?= ($currentPath ?? '') === '/gallery' ? 'page' : 'false' ?>">Gallery</a>
            </nav>
        </header>

        <main>
            <?= $content ?? '' ?>
        </main>

        <footer>
            <small>Camagru training build</small>
        </footer>

        <script src="/js/app.js" defer></script>
    </body>
</html>
