<?php
$pageTitle = 'Organizational Structure Admin';
$bodyClass = 'page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox';
require __DIR__ . '/includes/organizational-structure.php';

$feedback = '';
$orgData = organizational_structure_load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset_default'])) {
        $orgData = organizational_structure_default_data();
        $feedback = organizational_structure_save($orgData)
            ? 'Organizational structure reset to the seeded default.'
            : 'Unable to reset the organizational structure.';
        $orgData = organizational_structure_load();
    } else {
        $rows = $_POST['rows'] ?? [];
        $saved = organizational_structure_save(['rows' => is_array($rows) ? $rows : []]);
        $feedback = $saved
            ? 'Organizational structure saved successfully.'
            : 'Unable to save the organizational structure.';
        $orgData = organizational_structure_load();
    }
}

$rows = $orgData['rows'];
$parentOptions = [];
foreach ($rows as $row) {
    $parentOptions[$row['id']] = $row['unit_name'];
}

require __DIR__ . '/includes/header.php';
?>

<div class="stac-org-admin">
    <section class="stac-org-admin__hero">
        <div class="stac-org-admin__hero-inner">
            <span class="stac-org-admin__eyebrow">Admin Section</span>
            <h1>Organizational structure editor</h1>
            <p>Edit units, reporting lines, titles, and assigned names here. The public chart page reads from this dataset directly.</p>
        </div>
    </section>

    <section class="stac-org-admin__content">
        <div class="stac-org-admin__topbar">
            <div>
                <h2>Editable structure rows</h2>
                <p>Parent Unit controls where each office appears in the chart. Leave Parent Unit blank for the root node.</p>
            </div>
            <a class="stac-org-admin__preview-link" href="organizational-structure.php">Open Public Page</a>
        </div>

        <?php if ($feedback !== ''): ?>
            <div class="stac-org-admin__feedback"><?= htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form method="post" class="stac-org-admin__form">
            <div class="stac-org-admin__actions">
                <button type="button" class="stac-org-admin__button stac-org-admin__button--secondary" id="stac-org-add-row">Add Row</button>
                <button type="submit" class="stac-org-admin__button">Save Structure</button>
                <button type="submit" name="reset_default" value="1" class="stac-org-admin__button stac-org-admin__button--danger" onclick="return confirm('Reset the organizational structure to the seeded default?');">Reset Default</button>
            </div>

            <div class="stac-org-admin__rows" id="stac-org-rows">
                <?php foreach ($rows as $index => $row): ?>
                    <div class="stac-org-admin__row">
                        <input type="hidden" name="rows[<?= $index ?>][id]" value="<?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="stac-org-admin__grid">
                            <label>
                                <span>Unit Name</span>
                                <input type="text" name="rows[<?= $index ?>][unit_name]" value="<?= htmlspecialchars($row['unit_name'], ENT_QUOTES, 'UTF-8') ?>">
                            </label>
                            <label>
                                <span>Unit Type</span>
                                <input type="text" name="rows[<?= $index ?>][unit_type]" value="<?= htmlspecialchars($row['unit_type'], ENT_QUOTES, 'UTF-8') ?>">
                            </label>
                            <label>
                                <span>Parent Unit</span>
                                <select name="rows[<?= $index ?>][parent_id]">
                                    <option value="">No Parent</option>
                                    <?php foreach ($parentOptions as $parentId => $parentLabel): ?>
                                        <?php if ($parentId === $row['id']) { continue; } ?>
                                        <option value="<?= htmlspecialchars($parentId, ENT_QUOTES, 'UTF-8') ?>"<?= $row['parent_id'] === $parentId ? ' selected' : '' ?>><?= htmlspecialchars($parentLabel, ENT_QUOTES, 'UTF-8') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                            <label>
                                <span>Lead Title</span>
                                <input type="text" name="rows[<?= $index ?>][lead_title]" value="<?= htmlspecialchars($row['lead_title'], ENT_QUOTES, 'UTF-8') ?>">
                            </label>
                            <label>
                                <span>Lead Name</span>
                                <input type="text" name="rows[<?= $index ?>][lead_name]" value="<?= htmlspecialchars($row['lead_name'], ENT_QUOTES, 'UTF-8') ?>">
                            </label>
                            <label>
                                <span>Sort Order</span>
                                <input type="number" name="rows[<?= $index ?>][sort_order]" value="<?= htmlspecialchars((string)$row['sort_order'], ENT_QUOTES, 'UTF-8') ?>">
                            </label>
                        </div>
                        <button type="button" class="stac-org-admin__remove-row">Remove</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const rowsContainer = document.getElementById('stac-org-rows');
    const addRowButton = document.getElementById('stac-org-add-row');

    function refreshRemoveButtons() {
        rowsContainer.querySelectorAll('.stac-org-admin__remove-row').forEach(function (button) {
            button.onclick = function () {
                button.closest('.stac-org-admin__row').remove();
            };
        });
    }

    addRowButton.addEventListener('click', function () {
        const index = rowsContainer.querySelectorAll('.stac-org-admin__row').length;
        const wrapper = document.createElement('div');
        wrapper.className = 'stac-org-admin__row';
        wrapper.innerHTML = `
            <input type="hidden" name="rows[${index}][id]" value="">
            <div class="stac-org-admin__grid">
                <label><span>Unit Name</span><input type="text" name="rows[${index}][unit_name]" value=""></label>
                <label><span>Unit Type</span><input type="text" name="rows[${index}][unit_type]" value=""></label>
                <label><span>Parent Unit</span><input type="text" name="rows[${index}][parent_id]" value=""></label>
                <label><span>Lead Title</span><input type="text" name="rows[${index}][lead_title]" value=""></label>
                <label><span>Lead Name</span><input type="text" name="rows[${index}][lead_name]" value=""></label>
                <label><span>Sort Order</span><input type="number" name="rows[${index}][sort_order]" value="999"></label>
            </div>
            <button type="button" class="stac-org-admin__remove-row">Remove</button>
        `;
        rowsContainer.appendChild(wrapper);
        refreshRemoveButtons();
    });

    refreshRemoveButtons();
});
</script>

<?php
require __DIR__ . '/includes/footer.php';
?>
