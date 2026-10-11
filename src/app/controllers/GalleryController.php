<?php
declare(strict_types=1);

require_once __DIR__ . '/../utils/view.php';

final class GalleryController {
    public static function index(): void {
        //fake seed data for now
        //for practice UI/JS before DB wiring
        $images = [
            ['id' => 1, 'author' => 'alice', 'caption' => 'First image'],
            ['id' => 2, 'author' => 'bob', 'caption' => 'Second image'],
        ];

        render('gallery/index', [
            'title' => 'Gallery',
            'currentPath' => '/gallery',
            'images' => $images,
        ]);
    }
}