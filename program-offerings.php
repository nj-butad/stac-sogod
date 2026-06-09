<?php
$pageTitle = 'Departments';
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/departments-data.php';

$topLevelNodes = [];
foreach (stac_departments_top_level_keys() as $topLevelKey) {
    $topLevelNodes[] = stac_departments_node($topLevelKey);
}
?>

<div class="stac-program-page">
    <section class="stac-program-page__hero">
        <div class="stac-program-page__hero-inner">
            <div class="stac-program-page__hero-copy">
                <span class="stac-program-page__eyebrow">Departments</span>
                <h1>DEPARTMENTS</h1>
            </div>
            <div class="stac-program-page__hero-panel">
                <span class="stac-program-page__hero-label">Source Page</span>
                <strong>STAC IZN - DEPARTMENTS</strong>
                <p><a href="https://sites.google.com/view/stacs-izn/departments?authuser=0" target="_blank" rel="noopener noreferrer">Open Google Site Source</a></p>
            </div>
        </div>
    </section>

    <section class="stac-program-page__content">
        <div class="stac-program-page__catalog">
            <?php foreach ($topLevelNodes as $node): ?>
                <article class="stac-program-page__catalog-card">
                    <span class="stac-section-kicker">Departments</span>
                    <h2><?= htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <ul class="stac-program-page__links">
                        <?php foreach ($node['children'] as $childKey): ?>
                            <?php $childNode = stac_departments_node($childKey); ?>
                            <li><a href="<?= htmlspecialchars($childNode['href'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= htmlspecialchars($node['href'], ENT_QUOTES, 'UTF-8') ?>">Open <?= htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php
require __DIR__ . '/includes/footer.php';
?>
