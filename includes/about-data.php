<?php

function stac_about_nodes(): array
{
    static $nodes = null;

    if ($nodes !== null) {
        return $nodes;
    }

    $base = 'https://sites.google.com/view/stacs-izn/about-us';
    $hero = 'upload/about-hero-overview.png';

    $nodes = [
        'about-us' => [
            'title' => 'About Us',
            'source_heading' => 'ABOUT US',
            'href' => 'about-us.php',
            'source_url' => $base . '?authuser=0',
            'hero_image' => $hero,
            'content' => [
                'Saint Thomas Aquinas College (STAC), located at the heart of Sogod, Southern Leyte, is the only private Catholic Institution established on January 6, 1946. STAC offers programs from Kindergarten to Tertiary Education, including degrees in Office and Business Administration, Information System, Criminology and Elementary Education. Guided by the motto "We educate to evangelize. We evangelize to educate", the college emphasizes both academic excellence and spiritual development.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'EXPLORE MORE',
                    'items' => ['HISTORY', 'PHILOSOPHY', 'VISION', 'MISSION', 'CORE VALUES', 'STAC SEAL', 'VIRTUAL TOUR', 'MILESTONES'],
                ],
            ],
            'children' => ['who-we-are', 'history', 'philosophy', 'vision', 'mission', 'core-values', 'virtual-tour', 'stacs-seal', 'milestones'],
        ],
        'who-we-are' => [
            'title' => 'Who We Are',
            'source_heading' => 'WHO WE ARE',
            'href' => 'about-who-we-are.php',
            'source_url' => $base . '/who-we-are?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-who-we-are.png',
            'content' => [
                'Saint Thomas Aquinas College (STAC), situated at the heart of Sogod, Southern Leyte, stands as the premier private Catholic institution since its establishment on January 6, 1946. As a beacon of holistic education, STAC offers a seamless academic journey from Kindergarten to Tertiary Education, fostering a dynamic learning environment that harmonizes intellectual rigor with deep-rooted spiritual growth. Committed to excellence, the college nurtures future leaders who embody both wisdom and faith, equipping them to make meaningful contributions to global society.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'Administration',
                    'paragraphs' => ['The Google Site places Administration under Who We Are.'],
                ],
            ],
            'children' => ['administration'],
        ],
        'administration' => [
            'title' => 'Administration',
            'source_heading' => 'BOARD OF TRUSTEES',
            'href' => 'about-administration.php',
            'source_url' => $base . '/who-we-are/administration?authuser=0',
            'parent' => 'who-we-are',
            'hero_image' => 'upload/about-hero-administration.png',
            'content' => [],
            'administration_groups' => [
                [
                    'title' => 'BOARD OF TRUSTEES',
                    'people' => [
                        ['name' => 'MOST REV. PRECIOSO D. CANTILLAS, S.DB., D.D', 'role' => 'CHAIRMAN', 'image' => 'images/bod/cantillas.jpg'],
                        ['name' => 'REV. MSGR. OSCAR A. CADAYONA, P.C., Ph.D., SThL-MA', 'role' => 'SECRETARY', 'image' => 'images/stac logo.jpg'],
                        ['name' => 'REV. MSGR. MARNIE BANSIG, P.C.', 'role' => 'MEMBER', 'image' => 'images/stac logo.jpg'],
                        ['name' => 'REV. MSGR. NESTOR A. ASTILLO, P.C.', 'role' => 'MEMBER', 'image' => 'images/bod/astillo.jpg'],
                        ['name' => 'REV. FR. MERWIN L. KANGLEON, M.P.M.', 'role' => 'MEMBER', 'image' => 'images/bod/kangleon.jpg'],
                    ],
                ],
                [
                    'title' => 'ADMINISTRATIVE COUNCIL',
                    'people' => [
                        ['name' => 'MOST REV. PRECIOSO D. CANTILLAS, S.DB., D.D', 'role' => 'SCHOOL PRESIDENT', 'image' => 'images/bod/cantillas.jpg'],
                        ['name' => 'REV. FR. MERWIN L. KANGLEON, M.P.M.', 'role' => 'SCHOOL DIRECTOR', 'image' => 'images/bod/kangleon.jpg'],
                        ['name' => 'RESSA A. PIGTE, LPT', 'role' => 'ASST. SCHOOL DIRECTOR', 'image' => 'images/bod/pigte.png'],
                        ['name' => 'ROLANDO F. AMPO, Ph.D.', 'role' => 'OIC, COLLEGE DEAN', 'image' => 'images/bod/ampo.jpg'],
                        ['name' => 'RESSA A. PIGTE, LPT', 'role' => 'BASIC EDUCATION PRINCIPAL', 'image' => 'images/bod/pigte.png'],
                        ['name' => 'RITO P. MANGYAO', 'role' => 'TESDA COORDINATOR', 'image' => 'images/stac logo.jpg'],
                    ],
                ],
                [
                    'title' => 'ACADEMIC COUNCIL',
                    'people' => [
                        ['name' => 'REV. FR. MERWIN L. KANGLEON, M.P.M.', 'role' => 'SCHOOL DIRECTOR', 'image' => 'images/bod/kangleon.jpg'],
                        ['name' => 'ROLANDO F. AMPO, Ph.D.', 'role' => 'OIC, COLLEGE DEAN', 'image' => 'images/bod/ampo.jpg'],
                        ['name' => 'RESSA A. PIGTE, LPT', 'role' => 'BASIC EDUCATION PRINCIPAL', 'image' => 'images/bod/pigte.png'],
                        ['name' => 'RITO P. MANGYAO', 'role' => 'TESDA COORDINATOR', 'image' => 'images/stac logo.jpg'],
                        ['name' => 'GENEROSA G. RUBIO, M.M.', 'role' => 'HEAD, BUSINESS EDUCATION DEPARTMENT', 'image' => 'images/bod/rubio.png'],
                        ['name' => 'AVELINO ALERIA, M.C.J.E.', 'role' => 'HEAD, CRIMINAL JUSTICE EDUCATION DEPARTMENT', 'image' => 'images/stac logo.jpg'],
                        ['name' => 'GENEVEVE C. FALCON, M.I.T.', 'role' => 'HEAD, INFORMATION TECHNOLOGY EDUCATION DEPARTMENT', 'image' => 'images/stac logo.jpg'],
                        ['name' => 'EDITA O. CANABE, MAEd', 'role' => 'HEAD, TEACHER EDUCATION DEPARTMENT', 'image' => 'images/stac logo.jpg'],
                        ['name' => 'MARICAR B. DE ONTOY, LPT', 'role' => 'ASST. PRINCIPAL, ELEMENTARY DEPARTMENT', 'image' => 'images/bod/de ontoy.png'],
                        ['name' => 'GLENDYL T. BUTRON, LPT', 'role' => 'ASST. PRINCIPAL, JUNIOR HIGH SCHOOL', 'image' => 'images/bod/butron.png'],
                        ['name' => 'JOSEPHINE A. ACEBO, LPT', 'role' => 'ASST. PRINCIPAL, SENIOR HIGH SCHOOL', 'image' => 'images/bod/acebo.png'],
                    ],
                ],
                [
                    'title' => 'STAC EXTERNAL AND ENGAGEMENT DEVELOPMENT (SEED) OFFICE',
                    'people' => [
                        ['name' => 'ALBERT P. FLORES, LPT', 'role' => 'HEAD, SEED OFFICE', 'image' => 'images/bod/flores.png'],
                        ['name' => 'DAVE L. RELLANOS, LPT', 'role' => 'COORDINATOR, THOMASIAN INTERNATIONAL AND LOCAL LINKAGES (TILL) OFFICE', 'image' => 'images/bod/rellanos.jpg'],
                        ['name' => 'JOHN CARLO J. RIMA, LPT', 'role' => 'COORDINATOR, STRATEGIC OPPURTUNITIES FOR WORLD CLASS EDUCATION AND RESARCH (SOWER) OFFICE', 'image' => 'images/bod/rima.jpg'],
                        ['name' => 'JUPITH MARK R. TELIN', 'role' => 'COORDINATOR, RECALIBRATING EDUCATION FOR ADVANCEMENT AND PROMOTION (REAP) OFFICE', 'image' => 'images/bod/telin.png'],
                    ],
                ],
            ],
            'sections' => [],
            'children' => [],
        ],
        'history' => [
            'title' => 'History',
            'source_heading' => 'History',
            'href' => 'about-history.php',
            'source_url' => $base . '/history?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-history.png',
            'content' => ['STAC opened on January 6, 1946 through the initiative of Rev. Fr. Luis D. Caintic and grew from a secondary school into a college serving learners across multiple levels and programs.'],
            'sections' => [
                [
                    'label' => 'Existing Local Content',
                    'title' => 'From postwar academy to diocesan college',
                    'items' => [
                        '1946 - Foundation of Saint Thomas Aquinas Academy in Sogod, Southern Leyte.',
                        '1951 - Campus recovery after major infrastructure loss caused by Typhoon Amy.',
                        '1997 - Transition from academy to college through SEC registration.',
                        'Today - Continuing Catholic education from pre-elementary to college and TESDA programs.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'philosophy' => [
            'title' => 'Philosophy',
            'source_heading' => 'Philosophy',
            'href' => 'about-philosophy.php',
            'source_url' => $base . '/philosophy?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-philosophy-mission-vision.png',
            'content' => ['STAC believes that education must instill love for work, love for his fellowmen and country, respect for the right of others, love for peace, and the practice of Christian values: Faith, Hope and Charity.'],
            'sections' => [
                [
                    'label' => 'Existing Local Content',
                    'title' => 'Motto',
                    'paragraphs' => ['"We Educate through Evangelization, We Evangelize through Education."'],
                ],
                [
                    'label' => 'Existing Local Content',
                    'title' => 'Goal',
                    'paragraphs' => ['To make the Thomasian Family an evangelizing and educative community in which all members participate harmoniously in the attainment of its Vision, Mission and Objectives.'],
                ],
            ],
            'children' => [],
        ],
        'vision' => [
            'title' => 'Vision',
            'source_heading' => 'Vision',
            'href' => 'about-vision.php',
            'source_url' => $base . '/vision?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-philosophy-mission-vision.png',
            'content' => ['Emboldened by the teachings of St. Thomas Aquinas, we envisioned to become a globally recognized institution, which fosters transformative leadership through academic innovation, technological advancement, and stewardship for sustainable development in 2030.'],
            'sections' => [],
            'children' => [],
        ],
        'mission' => [
            'title' => 'Mission',
            'source_heading' => 'Mission',
            'href' => 'about-mission.php',
            'source_url' => $base . '/mission?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-philosophy-mission-vision.png',
            'content' => ['Inspired by the spirit of Fides, Virtus, Excellentia, and Servitium, Saint Thomas Aquinas College is commissioned to form learners through faith, virtue, academic excellence, and service.'],
            'sections' => [
                [
                    'label' => 'Existing Local Content',
                    'title' => 'Mission Pillars',
                    'items' => [
                        'Fides - Develop a firm foundation on the teachings of Christ and the Church for the fullness of life.',
                        'Virtus - Teach and exemplify faith, hope, and love, together with justice, fortitude, prudence, and temperance for social transformation.',
                        'Excellentia - Form habits that reflect Thomasian values in the fulfillment of life\'s purpose and apostolic mission with excellence.',
                        'Servitium - Cultivate selfless service and social responsibility through servant-leadership, care for the poor, and active participation in the life of the Church and society.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'core-values' => [
            'title' => 'Core Values',
            'source_heading' => 'Core Values',
            'href' => 'about-core-values.php',
            'source_url' => $base . '/core-values?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-core-values.png',
            'content' => ['The Thomasian core values are presented through the T.H.O.M.A.S.I.A.N acrostic.'],
            'sections' => [
                [
                    'label' => 'Existing Local Content',
                    'title' => 'T.H.O.M.A.S.I.A.N',
                    'items' => ['Truthful', 'Happy', 'Optimistic', 'Magnanimous', 'Apostolic', 'Scholarly', 'Inspiring', 'Accountable', 'Nurturing'],
                ],
            ],
            'children' => [],
        ],
        'virtual-tour' => [
            'title' => 'Virtual Tour',
            'source_heading' => 'Virtual Tour',
            'href' => 'about-virtual-tour.php',
            'source_url' => $base . '/virtual-tour?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-virtual-tour.png',
            'content' => ['The Virtual Tour page introduces visitors to the learning spaces, offices, formation areas, and campus environment of Saint Thomas Aquinas College.'],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Campus Areas to Explore',
                    'items' => ['Classrooms and learning spaces', 'Administrative and student service offices', 'Prayer and formation spaces', 'Laboratories and skills training areas', 'Activity and gathering spaces'],
                ],
            ],
            'children' => [],
        ],
        'stacs-seal' => [
            'title' => 'STACS Seal',
            'source_heading' => 'STACS Seal',
            'href' => 'about-stacs-seal.php',
            'source_url' => $base . '/stacs-seal?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-stacs-seal.png',
            'content' => ['The college seal represents STAC as a diocesan Catholic school of the Diocese of Maasin in the Province of Southern Leyte, founded in 1946 under the patronage of St. Thomas Aquinas and located at Zone 4, Sogod, Southern Leyte.'],
            'sections' => [
                [
                    'label' => 'Existing Local Content',
                    'title' => 'Seal Elements',
                    'items' => ['Diocesan Catholic identity', 'Patronage and foundation', 'Place and community'],
                ],
            ],
            'children' => [],
        ],
        'milestones' => [
            'title' => 'Milestones',
            'source_heading' => 'Milestones',
            'href' => 'about-milestones.php',
            'source_url' => $base . '/milestones?authuser=0',
            'parent' => 'about-us',
            'hero_image' => 'upload/about-hero-history.png',
            'content' => ['The Milestones page highlights major moments in STAC history, from its postwar foundation to its continuing development as a Catholic institution in Sogod.'],
            'sections' => [
                [
                    'label' => 'Existing Local Content',
                    'title' => 'Institutional Milestones',
                    'items' => [
                        'January 6, 1946 - Saint Thomas Aquinas Academy opened in Sogod.',
                        '1951 - The institution recovered from damage caused by Typhoon Amy.',
                        'August 7, 1997 - The academy moved toward collegiate status through SEC registration.',
                        'Recent years - Facilities, TESDA laboratories, academic programs, and technology spaces continued to expand.',
                    ],
                ],
            ],
            'children' => [],
        ],
    ];

    return $nodes;
}

function stac_about_node(string $key): array
{
    $nodes = stac_about_nodes();

    if (!isset($nodes[$key])) {
        throw new InvalidArgumentException('Unknown about key: ' . $key);
    }

    return $nodes[$key];
}

function stac_about_is_descendant(string $possibleDescendantKey, string $ancestorKey): bool
{
    $nodes = stac_about_nodes();

    while (!empty($nodes[$possibleDescendantKey]['parent'])) {
        if ($nodes[$possibleDescendantKey]['parent'] === $ancestorKey) {
            return true;
        }

        $possibleDescendantKey = $nodes[$possibleDescendantKey]['parent'];
    }

    return false;
}
