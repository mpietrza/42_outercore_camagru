<?php
declare(strict_types=1);

require_once __DIR__ . '/../utils/view.php';

final class HomeController {
    public static function index(): void {
        //Thin controller: only route-to-view orchestration
        //to keep business logic separated for later growth

        render('home/index', [
            'title' => 'Home',
            'currentPath' => '/',
        ]);
    }
}