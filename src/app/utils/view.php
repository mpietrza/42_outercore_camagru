<?php
declare(strict_types=1);

/** HTML escaping helper for all dynamic output
 * to prevent reflected/stored XSS in templates
 */
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/** view renderer with a shared layout
 * one layout to keep page structure consistent
 */
function render(string $view, array $data = []): void {
    $viewFile = __DIR__ . '/../views/' . $view . '.php';

    if (!file_exists($viewFile)) {
        http_response_code(500);
        echo 'View not found';
        return;
    }

    $title = $data['title'] ?? 'Camagru';
    $currentPath = $data['currentPath'] ?? '/';

    //buffer view content first, then inject into layout
    //so views stay focused on content only
    ob_start();
    extract($data, EXTR_SKIP);
    require $viewFile;
    $content = ob_get_clean();

    require __DIR__ . '/../views/layout.php';
}
