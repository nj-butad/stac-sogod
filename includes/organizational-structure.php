<?php

function organizational_structure_data_path(): string
{
    return dirname(__DIR__) . '/data/organizational-structure.json';
}

function organizational_structure_seed_rows(): array
{
    return [
        ['id' => 'board', 'parent_id' => '', 'unit_name' => 'Board of Trustees', 'unit_type' => 'Governing Body', 'lead_title' => 'Chairperson', 'lead_name' => '', 'sort_order' => 10],
        ['id' => 'president', 'parent_id' => 'board', 'unit_name' => 'Office of the School Director / College President', 'unit_type' => 'Executive Office', 'lead_title' => 'School Director / College President', 'lead_name' => '', 'sort_order' => 20],
        ['id' => 'campus_ministry', 'parent_id' => 'president', 'unit_name' => 'Campus Ministry and Catholic Formation', 'unit_type' => 'Mission Office', 'lead_title' => 'Director / Coordinator', 'lead_name' => '', 'sort_order' => 30],
        ['id' => 'academic_affairs', 'parent_id' => 'president', 'unit_name' => 'Academic Affairs', 'unit_type' => 'Academic Division', 'lead_title' => 'Vice President / College Dean', 'lead_name' => '', 'sort_order' => 40],
        ['id' => 'student_affairs', 'parent_id' => 'president', 'unit_name' => 'Student Affairs and Services', 'unit_type' => 'Student Services Division', 'lead_title' => 'Dean / Director', 'lead_name' => '', 'sort_order' => 50],
        ['id' => 'admin_finance', 'parent_id' => 'president', 'unit_name' => 'Administration and Finance', 'unit_type' => 'Administrative Division', 'lead_title' => 'Vice President / Director', 'lead_name' => '', 'sort_order' => 60],
        ['id' => 'registrar', 'parent_id' => 'academic_affairs', 'unit_name' => 'Office of the Registrar', 'unit_type' => 'Academic Support Office', 'lead_title' => 'Registrar', 'lead_name' => '', 'sort_order' => 10],
        ['id' => 'college_programs', 'parent_id' => 'academic_affairs', 'unit_name' => 'College Programs', 'unit_type' => 'Academic Unit', 'lead_title' => 'Program Heads / Coordinators', 'lead_name' => '', 'sort_order' => 20],
        ['id' => 'basic_education', 'parent_id' => 'academic_affairs', 'unit_name' => 'Basic Education Department', 'unit_type' => 'Academic Unit', 'lead_title' => 'Principal / Academic Head', 'lead_name' => '', 'sort_order' => 30],
        ['id' => 'library', 'parent_id' => 'academic_affairs', 'unit_name' => 'Library and Learning Resource Center', 'unit_type' => 'Academic Support Office', 'lead_title' => 'Librarian', 'lead_name' => '', 'sort_order' => 40],
        ['id' => 'guidance', 'parent_id' => 'student_affairs', 'unit_name' => 'Guidance and Counseling', 'unit_type' => 'Student Support Office', 'lead_title' => 'Guidance Counselor / Coordinator', 'lead_name' => '', 'sort_order' => 10],
        ['id' => 'student_orgs', 'parent_id' => 'student_affairs', 'unit_name' => 'Student Organizations and Campus Activities', 'unit_type' => 'Student Support Office', 'lead_title' => 'Coordinator', 'lead_name' => '', 'sort_order' => 20],
        ['id' => 'scholarships', 'parent_id' => 'student_affairs', 'unit_name' => 'Scholarships and Student Assistance', 'unit_type' => 'Student Support Office', 'lead_title' => 'Coordinator', 'lead_name' => '', 'sort_order' => 30],
        ['id' => 'health', 'parent_id' => 'student_affairs', 'unit_name' => 'Health Services', 'unit_type' => 'Student Support Office', 'lead_title' => 'Nurse / Health Coordinator', 'lead_name' => '', 'sort_order' => 40],
        ['id' => 'accounting', 'parent_id' => 'admin_finance', 'unit_name' => 'Accounting and Finance', 'unit_type' => 'Administrative Office', 'lead_title' => 'Accountant / Finance Officer', 'lead_name' => '', 'sort_order' => 10],
        ['id' => 'cashier', 'parent_id' => 'admin_finance', 'unit_name' => 'Cashier', 'unit_type' => 'Administrative Office', 'lead_title' => 'Cashier', 'lead_name' => '', 'sort_order' => 20],
        ['id' => 'hr', 'parent_id' => 'admin_finance', 'unit_name' => 'Human Resources', 'unit_type' => 'Administrative Office', 'lead_title' => 'HR Officer', 'lead_name' => '', 'sort_order' => 30],
        ['id' => 'it', 'parent_id' => 'admin_finance', 'unit_name' => 'Information Technology', 'unit_type' => 'Administrative Office', 'lead_title' => 'IT Officer / Coordinator', 'lead_name' => '', 'sort_order' => 40],
        ['id' => 'property', 'parent_id' => 'admin_finance', 'unit_name' => 'Property, Supply, and General Services', 'unit_type' => 'Administrative Office', 'lead_title' => 'Property / Supply Officer', 'lead_name' => '', 'sort_order' => 50],
    ];
}

function organizational_structure_default_data(): array
{
    return ['updated_at' => date(DATE_ATOM), 'rows' => organizational_structure_seed_rows()];
}

function organizational_structure_load(): array
{
    $path = organizational_structure_data_path();
    if (!is_file($path)) {
        return organizational_structure_default_data();
    }

    $json = file_get_contents($path);
    $data = json_decode($json ?: '', true);

    if (!is_array($data) || !isset($data['rows']) || !is_array($data['rows'])) {
        return organizational_structure_default_data();
    }

    $data['rows'] = organizational_structure_normalize_rows($data['rows']);

    return $data;
}

function organizational_structure_save(array $data): bool
{
    $payload = [
        'updated_at' => date(DATE_ATOM),
        'rows' => organizational_structure_normalize_rows($data['rows'] ?? []),
    ];

    return file_put_contents(
        organizational_structure_data_path(),
        json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    ) !== false;
}

function organizational_structure_normalize_rows(array $rows): array
{
    $normalized = [];

    foreach ($rows as $row) {
        $unitName = trim((string)($row['unit_name'] ?? ''));
        if ($unitName === '') {
            continue;
        }

        $id = trim((string)($row['id'] ?? ''));
        if ($id === '') {
            $id = 'node_' . bin2hex(random_bytes(4));
        }

        $normalized[] = [
            'id' => preg_replace('/[^a-zA-Z0-9_-]/', '', $id) ?: ('node_' . bin2hex(random_bytes(4))),
            'parent_id' => preg_replace('/[^a-zA-Z0-9_-]/', '', trim((string)($row['parent_id'] ?? ''))),
            'unit_name' => $unitName,
            'unit_type' => trim((string)($row['unit_type'] ?? '')),
            'lead_title' => trim((string)($row['lead_title'] ?? '')),
            'lead_name' => trim((string)($row['lead_name'] ?? '')),
            'sort_order' => (int)($row['sort_order'] ?? 999),
        ];
    }

    usort($normalized, static function (array $left, array $right): int {
        if ($left['sort_order'] === $right['sort_order']) {
            return strcmp($left['unit_name'], $right['unit_name']);
        }

        return $left['sort_order'] <=> $right['sort_order'];
    });

    return $normalized;
}

function organizational_structure_children_map(array $rows): array
{
    $map = [];
    foreach ($rows as $row) {
        $parentId = $row['parent_id'] ?? '';
        $map[$parentId][] = $row;
    }

    return $map;
}

function organizational_structure_root(array $rows): ?array
{
    foreach ($rows as $row) {
        if (($row['parent_id'] ?? '') === '') {
            return $row;
        }
    }

    return $rows[0] ?? null;
}

function organizational_structure_render_nodes(array $childrenMap, string $parentId = ''): string
{
    $nodes = $childrenMap[$parentId] ?? [];
    if ($nodes === []) {
        return '';
    }

    $html = '<div class="stac-org-tree__level">';
    foreach ($nodes as $node) {
        $html .= '<article class="stac-org-tree__node">';
        $html .= '<div class="stac-org-tree__card">';
        if ($node['unit_type'] !== '') {
            $html .= '<span class="stac-org-tree__type">' . htmlspecialchars($node['unit_type'], ENT_QUOTES, 'UTF-8') . '</span>';
        }
        $html .= '<h3>' . htmlspecialchars($node['unit_name'], ENT_QUOTES, 'UTF-8') . '</h3>';
        if ($node['lead_title'] !== '' || $node['lead_name'] !== '') {
            $html .= '<p>';
            if ($node['lead_title'] !== '') {
                $html .= '<strong>' . htmlspecialchars($node['lead_title'], ENT_QUOTES, 'UTF-8') . '</strong>';
            }
            if ($node['lead_name'] !== '') {
                $html .= '<span>' . htmlspecialchars($node['lead_name'], ENT_QUOTES, 'UTF-8') . '</span>';
            }
            $html .= '</p>';
        }
        $html .= '</div>';
        $html .= organizational_structure_render_nodes($childrenMap, $node['id']);
        $html .= '</article>';
    }
    $html .= '</div>';

    return $html;
}
