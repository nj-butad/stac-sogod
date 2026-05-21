<?php
$pageTitle = 'Program Offerings';
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/includes/header.php';

$programPages = [
    ['title' => 'Bachelor of Science in Office Administration (BSOA)', 'href' => 'program-bsoa.php', 'type' => 'College Program'],
    ['title' => 'Bachelor in Elementary Education (BEEd)', 'href' => 'program-beed.php', 'type' => 'College Program'],
    ['title' => 'Bachelor of Science in Business Administration (BSBA-HRM)', 'href' => 'program-bsba-hrm.php', 'type' => 'College Program'],
    ['title' => 'Bachelor of Science in Information Systems (BSIS)', 'href' => 'program-bsis.php', 'type' => 'College Program'],
    ['title' => 'Bachelor of Science in Criminology (BSCrim)', 'href' => 'program-bscrim.php', 'type' => 'College Program'],
    ['title' => 'Senior High School', 'href' => 'program-senior-high-school.php', 'type' => 'Basic Education'],
    ['title' => 'Junior High School', 'href' => 'program-junior-high-school.php', 'type' => 'Basic Education'],
    ['title' => 'Elementary Education', 'href' => 'program-elementary-education.php', 'type' => 'Basic Education'],
    ['title' => 'Pre-Elementary Education', 'href' => 'program-pre-elementary-education.php', 'type' => 'Basic Education'],
    ['title' => 'TESDA Programs', 'href' => 'program-tesda.php', 'type' => 'Technical-Vocational'],
];
?>

<div class="stac-program-page">
    <section class="stac-program-page__hero">
        <div class="stac-program-page__hero-inner">
            <div class="stac-program-page__hero-copy">
                <span class="stac-program-page__eyebrow">Academic Menu</span>
                <h1>Program offerings</h1>
                <p>This listing follows the official program offerings found in the STAC resource document and now serves as the landing page for the header menu.</p>
            </div>
            <div class="stac-program-page__hero-panel">
                <span class="stac-program-page__hero-label">Official Scope</span>
                <strong>College, basic education, and TESDA</strong>
                <p>Each item opens its own page so labels, people, and details can grow without overloading one section.</p>
            </div>
        </div>
    </section>

    <section class="stac-program-page__content">
        <div class="stac-program-page__catalog">
            <?php foreach ($programPages as $program): ?>
                <article class="stac-program-page__catalog-card">
                    <span class="stac-section-kicker"><?= htmlspecialchars($program['type'], ENT_QUOTES, 'UTF-8') ?></span>
                    <h2><?= htmlspecialchars($program['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <a href="<?= htmlspecialchars($program['href'], ENT_QUOTES, 'UTF-8') ?>">Open Program Page</a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php
require __DIR__ . '/includes/footer.php';
?>
