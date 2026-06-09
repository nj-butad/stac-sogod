<?php
require_once __DIR__ . '/departments-data.php';

$node = stac_departments_node($departmentKey ?? '');
$pageTitle = $node['title'];
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/header.php';

$parentNode = null;
if (!empty($node['parent'])) {
    $parentNode = stac_departments_node($node['parent']);
}

$siblingNodes = [];
if ($parentNode) {
    foreach ($parentNode['children'] as $siblingKey) {
        if ($siblingKey === ($departmentKey ?? '')) {
            continue;
        }
        $siblingNodes[] = stac_departments_node($siblingKey);
    }
}

$childNodes = [];
foreach ($node['children'] as $childKey) {
    $childNodes[] = stac_departments_node($childKey);
}
$sourceHeading = $node['source_heading'] ?? $node['title'];
$contentBlocks = $node['content'] ?? [];
$contentSections = $node['sections'] ?? [];
$heroImage = $node['hero_image'] ?? 'upload/about-bg-1.jpg';
$heroMinHeight = $node['hero_min_height'] ?? '420px';
$heroStyle = sprintf(
    "--stac-program-hero-min-height:%s;background-image:linear-gradient(135deg,rgba(5,22,56,.48) 0%%,rgba(12,42,96,.40) 52%%,rgba(23,152,218,.28) 100%%),url('%s');",
    htmlspecialchars($heroMinHeight, ENT_QUOTES, 'UTF-8'),
    htmlspecialchars($heroImage, ENT_QUOTES, 'UTF-8')
);
?>

<div class="stac-program-page">
    <section class="stac-program-page__hero" style="<?= $heroStyle ?>">
        <div class="stac-program-page__hero-inner">
            <div class="stac-program-page__hero-copy">
                <span class="stac-program-page__eyebrow"><?= htmlspecialchars($parentNode['title'] ?? 'Departments', ENT_QUOTES, 'UTF-8') ?></span>
                <h1><?= htmlspecialchars($sourceHeading, ENT_QUOTES, 'UTF-8') ?></h1>
                <?php if ($contentBlocks): ?>
                    <?php foreach ($contentBlocks as $block): ?>
                        <p><?= htmlspecialchars($block, ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endforeach; ?>
                <?php elseif ($childNodes): ?>
                    <p><?= htmlspecialchars(implode(' • ', array_map(static fn(array $child): string => $child['title'], $childNodes)), ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if ($childNodes): ?>
        <section class="stac-program-page__content">
            <div class="stac-program-page__catalog">
                <?php foreach ($childNodes as $child): ?>
                    <article class="stac-program-page__catalog-card">
                        <span class="stac-section-kicker"><?= htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        <h2><?= htmlspecialchars($child['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <a href="<?= htmlspecialchars($child['href'], ENT_QUOTES, 'UTF-8') ?>">Open Page</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($contentSections): ?>
        <?php foreach ($contentSections as $section): ?>
            <section class="stac-program-page__content">
                <?php if (!empty($section['cards'])): ?>
                    <div class="stac-program-page__section-header">
                        <h2><?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    </div>
                    <div class="stac-program-page__gallery">
                        <?php foreach ($section['cards'] as $card): ?>
                            <article class="stac-program-page__gallery-card">
                                <img src="<?= htmlspecialchars($card['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?>">
                                <h3><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <article class="stac-program-page__card">
                        <h2><?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <?php if (!empty($section['paragraphs'])): ?>
                            <?php foreach ($section['paragraphs'] as $paragraph): ?>
                                <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (!empty($section['items'])): ?>
                            <ul class="stac-program-page__links">
                                <?php foreach ($section['items'] as $item): ?>
                                    <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (!$childNodes && !$contentSections && $parentNode): ?>
        <section class="stac-program-page__content">
            <div class="stac-program-page__section-header">
                <h2>More under <?= htmlspecialchars($parentNode['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            </div>
            <div class="stac-program-page__catalog">
                <article class="stac-program-page__catalog-card">
                    <span class="stac-section-kicker">Department Page</span>
                    <h2><?= htmlspecialchars($parentNode['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <a href="<?= htmlspecialchars($parentNode['href'], ENT_QUOTES, 'UTF-8') ?>">Open Page</a>
                </article>
                <?php foreach ($siblingNodes as $sibling): ?>
                    <article class="stac-program-page__catalog-card">
                        <span class="stac-section-kicker"><?= htmlspecialchars($parentNode['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        <h2><?= htmlspecialchars($sibling['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <a href="<?= htmlspecialchars($sibling['href'], ENT_QUOTES, 'UTF-8') ?>">Open Page</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php
require __DIR__ . '/footer.php';
?>
