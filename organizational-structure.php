<?php
$pageTitle = 'Organizational Structure';
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/includes/organizational-structure.php';
require __DIR__ . '/includes/header.php';

$orgData = organizational_structure_load();
$orgRows = $orgData['rows'];
$childrenMap = organizational_structure_children_map($orgRows);
$rootNode = organizational_structure_root($orgRows);
?>

<div class="stac-org-page">
    <section class="stac-org-page__hero">
        <div class="stac-org-page__hero-inner">
            <div class="stac-org-page__hero-copy">
                <span class="stac-org-page__eyebrow">Institutional Structure</span>
                <h1>Organizational structure</h1>
                <p>This dynamic structure is seeded from the common patterns used by private and Catholic colleges: executive leadership, academic affairs, registrar, student affairs, administration and finance, human resources, and campus ministry.</p>
            </div>
            <div class="stac-org-page__hero-panel">
                <span class="stac-org-page__hero-label">Admin-Managed</span>
                <strong>Update this chart from one editor page</strong>
                <p>All units, reporting lines, titles, and names are rendered from a single editable data file.</p>
            </div>
        </div>
    </section>

    <section class="stac-org-page__summary">
        <div class="stac-org-page__summary-grid">
            <article class="stac-org-page__summary-card">
                <span class="stac-section-kicker">Pattern</span>
                <h2>Executive leadership</h2>
                <p>Private college structures typically place a governing board above the school director, president, or dean, with academic, student, and administrative divisions reporting underneath.</p>
            </article>
            <article class="stac-org-page__summary-card">
                <span class="stac-section-kicker">Catholic Identity</span>
                <h2>Mission and formation</h2>
                <p>Catholic campuses commonly maintain a distinct ministry or formation office alongside student support and academic operations.</p>
            </article>
            <article class="stac-org-page__summary-card">
                <span class="stac-section-kicker">Operations</span>
                <h2>Registrar and student services</h2>
                <p>Registrar, guidance, scholarships, and health services usually sit as support functions under academic or student-affairs leadership rather than standing alone.</p>
            </article>
        </div>
    </section>

    <section class="stac-org-page__chart">
        <div class="stac-org-page__chart-header">
            <span class="stac-section-kicker">Live Chart</span>
            <h2>STAC organizational model</h2>
            <p>Use the admin page to change labels, titles, people, and reporting relationships without editing templates.</p>
        </div>
        <div class="stac-org-tree">
            <?php if ($rootNode): ?>
                <article class="stac-org-tree__root">
                    <div class="stac-org-tree__card stac-org-tree__card--root">
                        <?php if ($rootNode['unit_type'] !== ''): ?>
                            <span class="stac-org-tree__type"><?= htmlspecialchars($rootNode['unit_type'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?php endif; ?>
                        <h3><?= htmlspecialchars($rootNode['unit_name'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <?php if ($rootNode['lead_title'] !== '' || $rootNode['lead_name'] !== ''): ?>
                            <p>
                                <?php if ($rootNode['lead_title'] !== ''): ?>
                                    <strong><?= htmlspecialchars($rootNode['lead_title'], ENT_QUOTES, 'UTF-8') ?></strong>
                                <?php endif; ?>
                                <?php if ($rootNode['lead_name'] !== ''): ?>
                                    <span><?= htmlspecialchars($rootNode['lead_name'], ENT_QUOTES, 'UTF-8') ?></span>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?= organizational_structure_render_nodes($childrenMap, $rootNode['id']) ?>
                </article>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
require __DIR__ . '/includes/footer.php';
?>
