<?php
require_once __DIR__ . '/sdg-gad-data.php';

$node = stac_sdg_gad_node($sdgGadKey ?? '');
$pageTitle = $node['title'];
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/header.php';

$parentNode = null;
if (!empty($node['parent'])) {
    $parentNode = stac_sdg_gad_node($node['parent']);
}

$childNodes = [];
foreach ($node['children'] as $childKey) {
    $childNodes[] = stac_sdg_gad_node($childKey);
}

$heroImage = $node['hero_image'] ?? 'upload/about-bg-2.jpg';
$heroMinHeight = $node['hero_min_height'] ?? '560px';
$heroStyle = sprintf(
    "--stac-program-hero-min-height:%s;background-image:linear-gradient(135deg,rgba(5,22,56,.54) 0%%,rgba(12,42,96,.46) 52%%,rgba(23,152,218,.28) 100%%),url('%s');",
    htmlspecialchars($heroMinHeight, ENT_QUOTES, 'UTF-8'),
    htmlspecialchars($heroImage, ENT_QUOTES, 'UTF-8')
);
?>

<div class="stac-program-page">
    <section class="stac-program-page__hero" style="<?= $heroStyle ?>">
        <div class="stac-program-page__hero-inner">
            <div class="stac-program-page__hero-copy">
                <span class="stac-program-page__eyebrow"><?= htmlspecialchars($parentNode['title'] ?? 'SDG and GAD Office', ENT_QUOTES, 'UTF-8') ?></span>
                <h1><?= htmlspecialchars($node['source_heading'] ?? $node['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                <?php foreach (($node['content'] ?? []) as $block): ?>
                    <p><?= htmlspecialchars($block, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if ($childNodes): ?>
        <section class="stac-program-page__content">
            <div class="stac-program-page__section-header">
                <h2><?= htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') ?> Pages</h2>
            </div>
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

    <?php foreach (($node['sections'] ?? []) as $section): ?>
        <section class="stac-program-page__content">
            <article class="stac-program-page__card">
                <span class="stac-section-kicker"><?= htmlspecialchars($section['label'] ?? 'SDG/GAD Information', ENT_QUOTES, 'UTF-8') ?></span>
                <h2><?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                <?php foreach (($section['paragraphs'] ?? []) as $paragraph): ?>
                    <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
                <?php if (!empty($section['items'])): ?>
                    <ul class="stac-program-page__links">
                        <?php foreach ($section['items'] as $item): ?>
                            <li><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </article>
        </section>
    <?php endforeach; ?>
</div>

<?php
require __DIR__ . '/footer.php';
?>
