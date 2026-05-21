<?php
$pageTitle = $pageTitle ?? 'Academic Program';
$programName = $programName ?? 'Academic Program';
$programKicker = $programKicker ?? 'Academic Program';
$programLevel = $programLevel ?? 'Program Offering';
$programListingText = $programListingText ?? '';
$programContextText = $programContextText ?? '';
$programNoteText = $programNoteText ?? '';
$programRelatedLinks = $programRelatedLinks ?? [];
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/header.php';
?>

<div class="stac-program-page">
    <section class="stac-program-page__hero">
        <div class="stac-program-page__hero-inner">
            <div class="stac-program-page__hero-copy">
                <span class="stac-program-page__eyebrow"><?= htmlspecialchars($programKicker, ENT_QUOTES, 'UTF-8') ?></span>
                <h1><?= htmlspecialchars($programName, ENT_QUOTES, 'UTF-8') ?></h1>
                <p><?= htmlspecialchars($programListingText, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <div class="stac-program-page__hero-panel">
                <span class="stac-program-page__hero-label">Program Classification</span>
                <strong><?= htmlspecialchars($programLevel, ENT_QUOTES, 'UTF-8') ?></strong>
                <p>Presented from the official program offerings listed in the STAC resource document.</p>
            </div>
        </div>
    </section>

    <section class="stac-program-page__content">
        <div class="stac-program-page__grid">
            <article class="stac-program-page__card">
                <span class="stac-section-kicker">Official Listing</span>
                <h2>Program entry</h2>
                <p><?= htmlspecialchars($programListingText, ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <article class="stac-program-page__card">
                <span class="stac-section-kicker">STAC Context</span>
                <h2>Institutional placement</h2>
                <p><?= htmlspecialchars($programContextText, ENT_QUOTES, 'UTF-8') ?></p>
            </article>
        </div>
    </section>

    <section class="stac-program-page__details">
        <div class="stac-program-page__details-grid">
            <article class="stac-program-page__card stac-program-page__card--accent">
                <span class="stac-section-kicker">Note</span>
                <h2>Accuracy boundary</h2>
                <p><?= htmlspecialchars($programNoteText, ENT_QUOTES, 'UTF-8') ?></p>
            </article>
            <article class="stac-program-page__card">
                <span class="stac-section-kicker">Explore</span>
                <h2>Related sections</h2>
                <ul class="stac-program-page__links">
                    <?php foreach ($programRelatedLinks as $label => $href): ?>
                        <li><a href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        </div>
    </section>
</div>

<?php
require __DIR__ . '/footer.php';
?>
