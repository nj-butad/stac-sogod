<?php

function stac_sdg_gad_generated_sections(string $title, array $focusAreas): array
{
    return [
        [
            'label' => 'Generated Content',
            'title' => 'Focus Areas',
            'items' => $focusAreas,
        ],
        [
            'label' => 'Generated Content',
            'title' => 'Programs and Activities',
            'items' => [
                'Student-led activities that promote awareness, participation, leadership, and service.',
                'Campaigns, workshops, performances, exhibits, or competitions aligned with the group’s purpose.',
                'Collaborative activities with faculty advisers, departments, campus offices, and partner communities.',
                'Documentation of outputs, reflections, and contributions to student formation and community life.',
            ],
        ],
        [
            'label' => 'Generated Content',
            'title' => 'Contribution to SDG and GAD',
            'paragraphs' => [
                $title . ' supports the school’s commitment to sustainable development, gender awareness, inclusion, responsible citizenship, and holistic Thomasian formation.',
                'Through organized activities, the group helps learners practice respect, collaboration, creativity, leadership, and service within the campus and the wider community.',
            ],
        ],
    ];
}

function stac_sdg_gad_nodes(): array
{
    static $nodes = null;

    if ($nodes !== null) {
        return $nodes;
    }

    $base = 'https://sites.google.com/view/stacs-izn/sdg-and-gad-office';
    $hero = 'upload/about-bg-2.jpg';

    $nodes = [
        'sdg-gad-office' => [
            'title' => 'SDG and GAD Office',
            'source_heading' => 'SUSTAINABLE DEVELOPMENT GOALS',
            'href' => 'sdg-and-gad-office.php',
            'source_url' => $base . '?authuser=0',
            'hero_image' => $hero,
            'hero_min_height' => '560px',
            'content' => [
                'The SDG and GAD Office promotes sustainable development, gender awareness, student participation, inclusive formation, and community-responsive activities across Saint Thomas Aquinas College.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Office Commitments',
                    'items' => [
                        'Promote awareness of the Sustainable Development Goals through school-based programs.',
                        'Strengthen gender and development awareness through inclusive, respectful, and values-driven activities.',
                        'Support student organizations that develop leadership, creativity, service, and social responsibility.',
                        'Encourage collaboration between basic education, college programs, offices, and community partners.',
                    ],
                ],
            ],
            'children' => ['sdg-basic-education', 'sdg-college'],
        ],
        'sdg-basic-education' => [
            'title' => 'Basic Education Department',
            'source_heading' => 'SDG',
            'href' => 'sdg-basic-education.php',
            'source_url' => $base . '/basic-education-department?authuser=0',
            'parent' => 'sdg-gad-office',
            'hero_image' => $hero,
            'content' => [
                'The Basic Education SDG and GAD programs provide learners with opportunities to participate in clubs, arts, culture, sciences, leadership, scouting, and values-based activities.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Basic Education Formation',
                    'paragraphs' => [
                        'The Basic Education Department encourages age-appropriate student participation in activities that build confidence, discipline, teamwork, creativity, academic curiosity, and social awareness.',
                    ],
                ],
            ],
            'children' => [
                'stac-dance-troupe',
                'likhawit-theatre-group',
                'science-club',
                'english-club',
                'filipino-club',
                'social-science-club',
                'math-club',
                'tle-club',
                'stac-drum-and-bugle-corp',
                'boy-cab-scout',
            ],
        ],
        'stac-dance-troupe' => [
            'title' => 'STAC Dance Troupe',
            'source_heading' => 'STAC Dance Troupe',
            'href' => 'sdg-stac-dance-troupe.php',
            'source_url' => $base . '/basic-education-department/stac-dance-troupe?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['STAC Dance Troupe develops student artistry, discipline, cultural appreciation, confidence, and teamwork through dance performance and creative movement.'],
            'sections' => stac_sdg_gad_generated_sections('STAC Dance Troupe', [
                'Cultural and contemporary dance performance.',
                'Physical discipline, stage presence, and creative expression.',
                'School representation during programs, celebrations, and community activities.',
                'Respect for culture, collaboration, and inclusive participation.',
            ]),
            'children' => [],
        ],
        'likhawit-theatre-group' => [
            'title' => 'LIKHAWIT Theatre Group',
            'source_heading' => 'LIKHAWIT',
            'href' => 'sdg-likhawit-theatre-group.php',
            'source_url' => $base . '/basic-education-department/likhawit-theatre-group?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['LIKHAWIT Theatre Group gives learners a space for theater, storytelling, performance, voice, movement, and values-centered creative expression.'],
            'sections' => stac_sdg_gad_generated_sections('LIKHAWIT Theatre Group', [
                'Theater performance, script reading, storytelling, and role interpretation.',
                'Confidence-building through public performance and collaborative production.',
                'Creative presentations on values, social awareness, and school themes.',
                'Teamwork among performers, writers, directors, stage crew, and advisers.',
            ]),
            'children' => [],
        ],
        'science-club' => [
            'title' => 'Science Club',
            'source_heading' => 'Science Club',
            'href' => 'sdg-science-club.php',
            'source_url' => $base . '/basic-education-department/science-club?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['Science Club promotes curiosity, experimentation, environmental care, scientific literacy, and responsible problem-solving among basic education learners.'],
            'sections' => stac_sdg_gad_generated_sections('Science Club', [
                'Science exhibits, experiments, demonstrations, and quiz activities.',
                'Environmental awareness, conservation, and sustainability campaigns.',
                'Student inquiry, observation, documentation, and evidence-based thinking.',
                'Participation in science month and related academic competitions.',
            ]),
            'children' => [],
        ],
        'english-club' => [
            'title' => 'English Club',
            'source_heading' => 'English Club',
            'href' => 'sdg-english-club.php',
            'source_url' => $base . '/basic-education-department/english-club?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['English Club strengthens communication, reading, writing, speaking, listening, confidence, and appreciation for literature and language.'],
            'sections' => stac_sdg_gad_generated_sections('English Club', [
                'Reading, creative writing, speech, debate, storytelling, and journalism activities.',
                'Language confidence through presentations, contests, and peer collaboration.',
                'Literacy campaigns that promote responsible and expressive communication.',
                'Support for school programs requiring hosts, speakers, writers, and communicators.',
            ]),
            'children' => [],
        ],
        'filipino-club' => [
            'title' => 'Filipino Club',
            'source_heading' => 'Filipino Club',
            'href' => 'sdg-filipino-club.php',
            'source_url' => $base . '/basic-education-department/filipino-club?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['Filipino Club promotes Filipino language, culture, literature, identity, nationalism, and appreciation for local heritage.'],
            'sections' => stac_sdg_gad_generated_sections('Filipino Club', [
                'Filipino language, literature, speech, writing, and cultural activities.',
                'Buwan ng Wika programs, performances, exhibits, and contests.',
                'Promotion of respect for Philippine culture, history, and identity.',
                'Student participation in language-based service and awareness campaigns.',
            ]),
            'children' => [],
        ],
        'social-science-club' => [
            'title' => 'Social Science Club',
            'source_heading' => 'Social Science Club',
            'href' => 'sdg-social-science-club.php',
            'source_url' => $base . '/basic-education-department/social-science-club?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['Social Science Club develops civic awareness, historical understanding, cultural sensitivity, leadership, and responsible citizenship.'],
            'sections' => stac_sdg_gad_generated_sections('Social Science Club', [
                'Civics, history, culture, geography, and social awareness activities.',
                'Discussions and campaigns on citizenship, rights, responsibilities, and community life.',
                'Support for national celebrations, commemorations, and values formation.',
                'Student leadership and participation in socially responsive activities.',
            ]),
            'children' => [],
        ],
        'math-club' => [
            'title' => 'Math Club',
            'source_heading' => 'Math Club',
            'href' => 'sdg-math-club.php',
            'source_url' => $base . '/basic-education-department/math-club?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['Math Club encourages logical thinking, numeracy, problem-solving, collaboration, and appreciation for mathematics in everyday life.'],
            'sections' => stac_sdg_gad_generated_sections('Math Club', [
                'Math challenges, quiz activities, puzzles, games, and problem-solving sessions.',
                'Peer support and enrichment for numeracy and analytical skills.',
                'Creative math exhibits and practical applications of mathematics.',
                'Participation in math month and academic competitions.',
            ]),
            'children' => [],
        ],
        'tle-club' => [
            'title' => 'TLE Club',
            'source_heading' => 'TLE Club',
            'href' => 'sdg-tle-club.php',
            'source_url' => $base . '/basic-education-department/tle-club?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['TLE Club builds practical skills, creativity, entrepreneurship, responsible work habits, and appreciation for technology and livelihood education.'],
            'sections' => stac_sdg_gad_generated_sections('TLE Club', [
                'Skills demonstrations in home economics, ICT, entrepreneurship, and practical arts.',
                'Livelihood-oriented projects and simple enterprise activities.',
                'Responsible tool use, workplace discipline, and safety awareness.',
                'Student projects that connect learning with community and sustainability needs.',
            ]),
            'children' => [],
        ],
        'stac-drum-and-bugle-corp' => [
            'title' => 'STAC Drum and Bugle Corp',
            'source_heading' => 'STAC Drum and Bugle Corp',
            'href' => 'sdg-stac-drum-and-bugle-corp.php',
            'source_url' => $base . '/basic-education-department/stac-drum-and-bugle-corp?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['STAC Drum and Bugle Corp develops discipline, rhythm, teamwork, school pride, performance readiness, and responsible representation.'],
            'sections' => stac_sdg_gad_generated_sections('STAC Drum and Bugle Corp', [
                'Musical drills, rhythm training, marching discipline, and performance practice.',
                'School representation during ceremonies, parades, and institutional events.',
                'Team coordination, focus, responsibility, and respect for formation standards.',
                'Development of confidence, discipline, and school spirit through music.',
            ]),
            'children' => [],
        ],
        'boy-cab-scout' => [
            'title' => 'Boy/Cab Scout of the Philippines',
            'source_heading' => 'Boy Scout of the Philippines',
            'href' => 'sdg-boy-cab-scout.php',
            'source_url' => $base . '/basic-education-department/boycab-scout-of-the-philippines?authuser=0',
            'parent' => 'sdg-basic-education',
            'hero_image' => $hero,
            'content' => ['Boy/Cab Scout of the Philippines supports character formation, leadership, service, preparedness, outdoor learning, and responsible citizenship.'],
            'sections' => stac_sdg_gad_generated_sections('Boy/Cab Scout of the Philippines', [
                'Scout values, leadership, teamwork, service, and preparedness activities.',
                'Community service, environmental action, and citizenship formation.',
                'Outdoor learning, safety awareness, and practical life skills.',
                'Participation in school, district, and community scouting activities.',
            ]),
            'children' => [],
        ],
        'sdg-college' => [
            'title' => 'College Department',
            'source_heading' => 'SDG',
            'href' => 'sdg-college.php',
            'source_url' => $base . '/college-department?authuser=0',
            'parent' => 'sdg-gad-office',
            'hero_image' => $hero,
            'content' => [
                'The College Department SDG and GAD programs encourage student leadership, organization-based engagement, creativity, communication, entrepreneurship, and community participation.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'College Student Engagement',
                    'paragraphs' => [
                        'College organizations provide students with opportunities to lead initiatives, develop professional and social skills, and contribute to a more inclusive, creative, and service-oriented campus culture.',
                    ],
                ],
            ],
            'children' => ['d-entrepreneurs', 'indak-ni-tomas', 'thomasian-english-scholars'],
        ],
        'd-entrepreneurs' => [
            'title' => 'D\' Entrepreneurs',
            'source_heading' => 'D\' Entrepreneurs',
            'href' => 'sdg-d-entrepreneurs.php',
            'source_url' => $base . '/college-department/d-entrepreneurs?authuser=0',
            'parent' => 'sdg-college',
            'hero_image' => $hero,
            'content' => ['D\' Entrepreneurs supports business-minded students in developing entrepreneurial thinking, leadership, innovation, financial awareness, and socially responsible enterprise.'],
            'sections' => stac_sdg_gad_generated_sections('D\' Entrepreneurs', [
                'Entrepreneurship talks, product development, marketing, and enterprise activities.',
                'Business planning, financial literacy, teamwork, and leadership formation.',
                'Student-led bazaars, exhibits, campaigns, and community-responsive enterprise projects.',
                'Promotion of ethical, inclusive, and sustainable business practices.',
            ]),
            'children' => [],
        ],
        'indak-ni-tomas' => [
            'title' => 'Indak ni Tomas',
            'source_heading' => 'Indak ni Tomas',
            'href' => 'sdg-indak-ni-tomas.php',
            'source_url' => $base . '/college-department/indak-ni-tomas?authuser=0',
            'parent' => 'sdg-college',
            'hero_image' => $hero,
            'content' => ['Indak ni Tomas promotes dance, culture, performance, fitness, creativity, teamwork, and Thomasian pride among college students.'],
            'sections' => stac_sdg_gad_generated_sections('Indak ni Tomas', [
                'Dance rehearsals, performances, cultural presentations, and creative showcases.',
                'Representation of the College Department in institutional and community events.',
                'Development of confidence, discipline, collaboration, and stage presence.',
                'Promotion of culture, wellness, inclusion, and school spirit through movement.',
            ]),
            'children' => [],
        ],
        'thomasian-english-scholars' => [
            'title' => 'Thomasian English Scholars',
            'source_heading' => 'Thomasian English Scholars',
            'href' => 'sdg-thomasian-english-scholars.php',
            'source_url' => $base . '/college-department/thomasian-english-scholars?authuser=0',
            'parent' => 'sdg-college',
            'hero_image' => $hero,
            'content' => ['Thomasian English Scholars develops college students in communication, literature, writing, public speaking, research presentation, and language-centered service.'],
            'sections' => stac_sdg_gad_generated_sections('Thomasian English Scholars', [
                'Speech, debate, writing, reading, hosting, and communication activities.',
                'Literary appreciation, language enrichment, and academic presentation support.',
                'Peer collaboration for communication confidence and responsible expression.',
                'Service through literacy, documentation, campus communication, and advocacy support.',
            ]),
            'children' => [],
        ],
    ];

    return $nodes;
}

function stac_sdg_gad_node(string $key): array
{
    $nodes = stac_sdg_gad_nodes();

    if (!isset($nodes[$key])) {
        throw new InvalidArgumentException('Unknown SDG/GAD key: ' . $key);
    }

    return $nodes[$key];
}

function stac_sdg_gad_is_descendant(string $possibleDescendantKey, string $ancestorKey): bool
{
    $nodes = stac_sdg_gad_nodes();

    while (!empty($nodes[$possibleDescendantKey]['parent'])) {
        if ($nodes[$possibleDescendantKey]['parent'] === $ancestorKey) {
            return true;
        }

        $possibleDescendantKey = $nodes[$possibleDescendantKey]['parent'];
    }

    return false;
}
