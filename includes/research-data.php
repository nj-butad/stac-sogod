<?php

function stac_research_nodes(): array
{
    static $nodes = null;

    if ($nodes !== null) {
        return $nodes;
    }

    $base = 'https://sites.google.com/view/stacs-izn/research-publication-and-innovation';
    $hero = 'upload/about-bg-1.jpg';

    $nodes = [
        'research-publication-and-innovation' => [
            'title' => 'Research, Publication and Innovation',
            'source_heading' => 'RESEARCH, PUBLICATION AND INNOVATION',
            'href' => 'research-publication-and-innovation.php',
            'source_url' => $base . '?authuser=0',
            'hero_image' => $hero,
            'hero_min_height' => '560px',
            'content' => [
                'Research, Publication and Innovation at Saint Thomas Aquinas College supports inquiry, knowledge sharing, creative problem-solving, and community-responsive projects that strengthen academic excellence and institutional service.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Core Functions',
                    'items' => [
                        'Encourage faculty, staff, and student engagement in research and evidence-based practice.',
                        'Support publication, documentation, and dissemination of scholarly and institutional outputs.',
                        'Promote innovation projects that respond to academic, social, environmental, and community needs.',
                        'Build a culture of ethical inquiry, collaboration, and continuous improvement.',
                    ],
                ],
            ],
            'children' => ['journals', 'research', 'innovation'],
        ],
        'journals' => [
            'title' => 'Journals',
            'source_heading' => 'Journals',
            'href' => 'research-journals.php',
            'source_url' => $base . '/journals?authuser=0',
            'parent' => 'research-publication-and-innovation',
            'hero_image' => $hero,
            'content' => [
                'The Journals page serves as the publication space for scholarly, institutional, and community-based outputs developed by the STAC academic community.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Publication Scope',
                    'items' => [
                        'Faculty and student research papers, action research, and institutional studies.',
                        'Community extension documentation and practice-based reports.',
                        'Conference papers, abstracts, proceedings, and presentation outputs.',
                        'Innovation notes, project briefs, and scholarly reflections aligned with STAC priorities.',
                    ],
                ],
                [
                    'label' => 'Generated Content',
                    'title' => 'Editorial Standards',
                    'paragraphs' => [
                        'Journal outputs should follow academic integrity, proper citation, ethical review where applicable, and clear documentation of methods, findings, and institutional relevance.',
                        'The publication process supports quality assurance through review, revision, and alignment with the school’s commitment to faith, virtue, excellence, and service.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'research' => [
            'title' => 'Research',
            'source_heading' => 'Research',
            'href' => 'research.php',
            'source_url' => $base . '/research?authuser=0',
            'parent' => 'research-publication-and-innovation',
            'hero_image' => $hero,
            'content' => [
                'The Research page supports the development, review, implementation, documentation, and dissemination of studies that contribute to academic improvement and community development.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Research Priorities',
                    'items' => [
                        'Instructional improvement, learner development, and educational innovation.',
                        'Business, technology, criminology, teacher education, and TESDA-related practice studies.',
                        'Community engagement, social responsibility, sustainability, and local development.',
                        'Institutional effectiveness, student services, formation, and school operations.',
                    ],
                ],
                [
                    'label' => 'Generated Content',
                    'title' => 'Research Support Process',
                    'items' => [
                        'Concept development and alignment with department or institutional priorities.',
                        'Proposal preparation, ethics review coordination, and approval routing.',
                        'Data gathering, analysis, documentation, and technical review support.',
                        'Presentation, publication, utilization, and archiving of completed research outputs.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'innovation' => [
            'title' => 'Innovation',
            'source_heading' => 'TABO 2025',
            'href' => 'research-innovation.php',
            'source_url' => $base . '/innovation?authuser=0',
            'parent' => 'research-publication-and-innovation',
            'hero_image' => $hero,
            'content' => [
                '(E  S  T  U  A  R  Y)',
                '"A bridge between people and nature"',
                'ESTUARY is dedicated platform to empowering coastal communities for sustainable livelihood opportunities, environmental education, and conservation initiatives. It aims to create a balance between economic growth and ecological preservation, ensuring that both people and nature thrive together for generations to come.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'EDUCATE (Pagtudlo)',
                    'paragraphs' => ['Educating and uplifting coastal communities with knowledge and sustainable livelihood opportunities.'],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'SUSTAIN (Pagluntad)',
                    'paragraphs' => ['Promoting eco-friendly practices to ensure long-term environmental and economic stability.'],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'TRANSFORM (Pagbag-o)',
                    'paragraphs' => ['Providing skills and resources for sustainable fishing, eco-tourism, and livelihood programs.'],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'UNITE (Paghiusa)',
                    'paragraphs' => ['Strengthening the bond between people and nature for a balanced, thriving ecosystem.'],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'ADVANCE (Paglambo)',
                    'paragraphs' => ['Raising environmental consciousness to protect and restore coastal habitats.'],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'REMEMBER (Paghandum)',
                    'paragraphs' => ['Building strong communities that can adapt to environmental and economic challenges.'],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'YIELD (Pagpamunga)',
                    'paragraphs' => ['Ensuring a productive future where both nature and people prosper together.'],
                ],
            ],
            'children' => [],
        ],
    ];

    return $nodes;
}

function stac_research_node(string $key): array
{
    $nodes = stac_research_nodes();

    if (!isset($nodes[$key])) {
        throw new InvalidArgumentException('Unknown research key: ' . $key);
    }

    return $nodes[$key];
}
