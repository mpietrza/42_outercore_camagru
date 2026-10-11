<section>
    <h1>Gallery</h1>

    <button type="button" data-ping-button>Test Fetch</button>
    <p data-status aria-live="polite"></p>

    <?php if (!empty($images)): ?>
        <ul>
            <?php foreach ($images as $image): ?>
                <li>
                    <strong><?= e($image['author']) ?></strong>
                    <span><?= e($image['caption']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No images yet.</p>
    <?php endif; ?>
</section>