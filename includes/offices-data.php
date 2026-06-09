<?php

function stac_office_generated_sections(string $officeTitle, array $services, array $processes = []): array
{
    return [
        [
            'label' => 'Generated Content',
            'title' => 'Primary Services',
            'items' => $services,
        ],
        [
            'label' => 'Generated Content',
            'title' => 'How the Office Supports the Community',
            'paragraphs' => [
                $officeTitle . ' supports students, parents, faculty, personnel, alumni, and external partners by providing clear assistance, organized records, responsive communication, and service aligned with the mission of Saint Thomas Aquinas College.',
                'The office coordinates with other units when concerns require academic, administrative, financial, pastoral, or student-support action so that requests are handled properly and consistently.',
            ],
        ],
        [
            'label' => 'Generated Content',
            'title' => 'Common Transactions',
            'items' => $processes ?: [
                'Receive and evaluate inquiries or requests submitted by students, parents, personnel, or partners.',
                'Verify required information, records, forms, or supporting documents.',
                'Coordinate with the concerned department or office when additional action is needed.',
                'Release updates, guidance, documents, or endorsements through the appropriate communication channel.',
            ],
        ],
    ];
}

function stac_offices_nodes(): array
{
    static $nodes = null;

    if ($nodes !== null) {
        return $nodes;
    }

    $base = 'https://sites.google.com/view/stacs-izn/offices';
    $hero = 'upload/about-bg-2.jpg';

    $nodes = [
        'offices' => [
            'title' => 'Offices',
            'source_heading' => 'OFFICES',
            'href' => 'offices.php',
            'source_url' => $base . '?authuser=0',
            'hero_image' => $hero,
            'hero_min_height' => '560px',
            'content' => [
                'Saint Thomas Aquinas College offices provide the administrative, student, academic support, formation, partnership, and general services that keep campus operations responsive and mission-centered.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Office Directory',
                    'paragraphs' => [
                        'Use this directory to find the office responsible for student records, financial transactions, inquiries, personnel concerns, technology support, external partnerships, student welfare, campus ministry, and general services.',
                    ],
                ],
            ],
            'children' => [
                'accounting-office',
                'finance-office',
                'student-inquiries',
                'human-resource-management-office',
                'information-and-communication-technology-office',
                'seed-office',
                'property-custodian',
                'registrar',
                'campus-ministry',
                'general-services',
                'student-affairs-office',
            ],
        ],
        'accounting-office' => [
            'title' => 'Accounting Office',
            'source_heading' => 'Accounting Office',
            'href' => 'office-accounting.php',
            'source_url' => $base . '/accounting-office?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Accounting Office safeguards financial records and supports accurate school transactions, payment documentation, account monitoring, and financial reporting.'],
            'sections' => stac_office_generated_sections('Accounting Office', [
                'Student account assessment and balance verification.',
                'Official receipt, billing, and payment record assistance.',
                'Financial record reconciliation and reporting support.',
                'Coordination with the Finance Office for payment-related concerns.',
            ]),
            'children' => [],
        ],
        'finance-office' => [
            'title' => 'Finance Office',
            'source_heading' => 'Finance Office',
            'href' => 'office-finance.php',
            'source_url' => $base . '/finance-office?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Finance Office manages payment services, cashiering concerns, financial clearances, and student or stakeholder assistance related to school fees.'],
            'sections' => stac_office_generated_sections('Finance Office', [
                'Tuition, fee, and other school-payment processing.',
                'Cashier assistance and payment channel guidance.',
                'Financial clearance coordination.',
                'Payment inquiry support for students, parents, and guardians.',
            ]),
            'children' => [],
        ],
        'student-inquiries' => [
            'title' => 'Student Inquiries',
            'source_heading' => 'Student Inquiries',
            'href' => 'office-student-inquiries.php',
            'source_url' => $base . '/student-inquiries?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['Student Inquiries serves as a front-line assistance point for general questions, campus directions, enrollment concerns, and referrals to the correct office.'],
            'sections' => stac_office_generated_sections('Student Inquiries', [
                'General student and parent inquiry assistance.',
                'Referral to the proper academic or administrative office.',
                'Basic enrollment, schedule, and document guidance.',
                'Follow-up support for unresolved or cross-office concerns.',
            ]),
            'children' => [],
        ],
        'human-resource-management-office' => [
            'title' => 'Human Resource Management Office',
            'source_heading' => 'Human Resource Management Office',
            'href' => 'office-human-resource-management.php',
            'source_url' => $base . '/human-resource-management-office?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Human Resource Management Office supports recruitment, personnel records, employee relations, professional conduct, and institutional workforce development.'],
            'sections' => stac_office_generated_sections('Human Resource Management Office', [
                'Recruitment, onboarding, and personnel documentation.',
                'Employee records and service certification assistance.',
                'Faculty and staff attendance, leave, and policy coordination.',
                'Personnel development, welfare, and compliance support.',
            ]),
            'children' => [],
        ],
        'information-and-communication-technology-office' => [
            'title' => 'Information and Communication Technology Office',
            'source_heading' => 'Information and Communication Technology Office',
            'href' => 'office-ict.php',
            'source_url' => $base . '/information-and-communication-technology-office?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Information and Communication Technology Office maintains digital systems, campus technology support, network assistance, and responsible use of school ICT resources.'],
            'sections' => stac_office_generated_sections('Information and Communication Technology Office', [
                'Campus network, device, and technical support.',
                'School system account and access assistance.',
                'Classroom and office technology coordination.',
                'Data privacy, cybersecurity, and responsible ICT use support.',
            ]),
            'children' => [],
        ],
        'seed-office' => [
            'title' => 'STAC External and Engagement Development (SEED) Office',
            'source_heading' => 'STAC External and Engagement Development (SEED) Office',
            'href' => 'office-seed.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => [
                'The SEED serves as the primary OFFICE for fostering strategic partnerships, institutional linkages and community engagement initiatives. guided by principles of quality education, collaboration of strategic partners, innovation of ideas and sustainability of programs, SEED ensures that all external engagement align with STAC’s vision, mission and core pillars - Academic Excellence, Character Formation, and Christian Formation, located at the third floor of the Sacred Heart Building.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'SEED Offices',
                    'items' => ['TILL OFFICE', 'SOWER OFFICE', 'REAP OFFICE'],
                ],
            ],
            'children' => [
                'till-office',
                'sower-office',
                'reap-office',
                'alumni',
                'parents',
                'industry-partnership',
            ],
        ],
        'till-office' => [
            'title' => 'Thomasian International and Local Linkages (TILL) Office',
            'source_heading' => 'Thomasian International and Local Linkages (TILL) Office',
            'href' => 'office-till.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office?authuser=0',
            'parent' => 'seed-office',
            'hero_image' => $hero,
            'content' => [
                'The TILL office, established on March 27, 2025, is a branch of the SEED office that fosters global and local partnerships to enhance academic, cultural, and professional opportunities. It plays a crucial role in promoting collaboration, exchange programs, and research initiatives, empowering students and faculty to engage with diverse communities.',
                'Aligned with this vision, the office facilitates linkages that enrich educational experiences, contribute to a more interconnected and innovative world, and equip students and faculty with global competencies in accordance with the standards envisioned by the institution.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Content',
                    'title' => 'Linkage Programs',
                    'items' => ['Student Mobility', 'Faculty Mobility', 'Research Collaboration', 'Special Programs'],
                ],
            ],
            'children' => ['student-mobility', 'faculty-mobility', 'research-collaboration', 'special-programs'],
        ],
        'student-mobility' => [
            'title' => 'Student Mobility',
            'source_heading' => 'Student Mobility',
            'href' => 'office-student-mobility.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility?authuser=0',
            'parent' => 'till-office',
            'hero_image' => $hero,
            'content' => ['Student Mobility coordinates learning opportunities that allow qualified students to participate in partner-based academic, cultural, professional, or community engagement activities.'],
            'sections' => stac_office_generated_sections('Student Mobility', [
                'Orientation on mobility opportunities and partner requirements.',
                'Application screening and endorsement coordination.',
                'Pre-departure or pre-program guidance for participating students.',
                'Post-program documentation, reflection, and reporting support.',
            ]),
            'children' => ['mobility-rationale', 'partner-institutions', 'mobility-eligibility', 'mobility-requirements', 'program-period', 'application-process', 'non-partner-students'],
        ],
        'mobility-rationale' => [
            'title' => 'Rationale',
            'source_heading' => 'Rationale',
            'href' => 'office-student-mobility-rationale.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/rationale?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['Student mobility strengthens academic formation by exposing learners to partner communities, institutions, disciplines, and practices beyond their regular classroom environment.'],
            'sections' => stac_office_generated_sections('Rationale', [
                'Develop students’ intercultural awareness, adaptability, and professional confidence.',
                'Support academic excellence through partner-based learning experiences.',
                'Strengthen character formation through service, collaboration, and responsible representation of STAC.',
                'Build pathways for future local and international academic engagement.',
            ]),
            'children' => [],
        ],
        'partner-institutions' => [
            'title' => 'Partner Institutions',
            'source_heading' => 'Partner Institutions',
            'href' => 'office-partner-institutions.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/partner-institutions?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['Partner Institutions are schools, organizations, agencies, industries, and community partners that work with STAC to provide meaningful academic and formation opportunities.'],
            'sections' => stac_office_generated_sections('Partner Institutions', [
                'Maintain active communication with approved partner institutions.',
                'Coordinate memoranda of agreement, program terms, and implementation details.',
                'Match student mobility activities with appropriate partner capacities.',
                'Monitor partner feedback and program outcomes.',
            ]),
            'children' => [],
        ],
        'mobility-eligibility' => [
            'title' => 'Eligibility',
            'source_heading' => 'Eligibility',
            'href' => 'office-student-mobility-eligibility.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/eligibility?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['Eligibility guidelines help ensure that students who join mobility programs are academically prepared, properly endorsed, and ready to represent the institution responsibly.'],
            'sections' => stac_office_generated_sections('Eligibility', [
                'Currently enrolled STAC student in good academic and disciplinary standing.',
                'Meets the academic, health, document, and program-specific requirements.',
                'Endorsed by the appropriate academic department or office.',
                'Able to comply with partner institution rules and program expectations.',
            ]),
            'children' => [],
        ],
        'mobility-requirements' => [
            'title' => 'Requirements',
            'source_heading' => 'Requirements',
            'href' => 'office-student-mobility-requirements.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/requirements?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['Student mobility requirements may vary by program, partner, and destination, but each application must be complete, verified, and endorsed before participation.'],
            'sections' => stac_office_generated_sections('Requirements', [
                'Completed mobility application form or endorsement form.',
                'Copy of student identification and updated academic records when required.',
                'Parent or guardian consent for applicable activities.',
                'Health, insurance, travel, or partner-specific documents when required.',
            ]),
            'children' => [],
        ],
        'program-period' => [
            'title' => 'Program Period',
            'source_heading' => 'Program Period',
            'href' => 'office-student-mobility-program-period.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/program-period?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['The program period defines the approved schedule for orientation, participation, documentation, and completion of a student mobility activity.'],
            'sections' => stac_office_generated_sections('Program Period', [
                'Short-term activities such as visits, immersion, seminars, or cultural exchanges.',
                'Course-linked or department-approved activities within an academic term.',
                'Partner-defined schedules subject to institutional approval.',
                'Completion timelines for reports, certificates, and post-program requirements.',
            ]),
            'children' => [],
        ],
        'application-process' => [
            'title' => 'Application Process',
            'source_heading' => 'Application Process',
            'href' => 'office-student-mobility-application-process.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/application-process?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['The Student Mobility application process guides interested students from initial inquiry to endorsement, preparation, participation, and completion.'],
            'sections' => stac_office_generated_sections('Application Process', [
                'Inquire with the TILL Office or designated department coordinator.',
                'Submit the required forms and supporting documents.',
                'Complete screening, orientation, and partner-specific preparation.',
                'Participate in the approved mobility activity and submit completion requirements.',
            ]),
            'children' => [],
        ],
        'non-partner-students' => [
            'title' => 'Students from Non-Partner Institutions',
            'source_heading' => 'Students from Non-Partner Institutions',
            'href' => 'office-students-from-non-partner-institutions.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/student-mobility/students-from-non-partner-institutions?authuser=0',
            'parent' => 'student-mobility',
            'hero_image' => $hero,
            'content' => ['Students from non-partner institutions may be considered for approved activities when proper coordination, documentation, and institutional clearance are completed.'],
            'sections' => stac_office_generated_sections('Students from Non-Partner Institutions', [
                'Initial inquiry and intent letter from the student or sending institution.',
                'Review of proposed activity, schedule, and academic purpose.',
                'Coordination of clearances, waivers, and institutional approvals.',
                'Monitoring of participation and completion documentation.',
            ]),
            'children' => [],
        ],
        'faculty-mobility' => [
            'title' => 'Faculty Mobility',
            'source_heading' => 'Faculty Mobility',
            'href' => 'office-faculty-mobility.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/faculty-mobility?authuser=0',
            'parent' => 'till-office',
            'hero_image' => $hero,
            'content' => ['Faculty Mobility supports opportunities for teachers and academic personnel to participate in partner-based teaching, training, research, exposure, and professional exchange activities.'],
            'sections' => stac_office_generated_sections('Faculty Mobility', [
                'Faculty exchange, guest lecture, and teaching collaboration coordination.',
                'Professional development and partner-hosted training support.',
                'Research, extension, and academic exposure facilitation.',
                'Documentation of participation, outputs, and institutional learnings.',
            ]),
            'children' => [],
        ],
        'research-collaboration' => [
            'title' => 'Research Collaboration',
            'source_heading' => 'Research Collaboration',
            'href' => 'office-research-collaboration.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/research-collaboration?authuser=0',
            'parent' => 'till-office',
            'hero_image' => $hero,
            'content' => ['Research Collaboration promotes partnerships that strengthen inquiry, publication, innovation, community engagement, and evidence-based academic development.'],
            'sections' => stac_office_generated_sections('Research Collaboration', [
                'Coordinate partner research interests and institutional research priorities.',
                'Support collaborative proposal development and ethical coordination.',
                'Facilitate seminars, presentations, publication efforts, and research sharing.',
                'Document outputs, partner contributions, and institutional impact.',
            ]),
            'children' => [],
        ],
        'special-programs' => [
            'title' => 'Special Programs',
            'source_heading' => 'Special Programs',
            'href' => 'office-special-programs.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/thomasian-international-and-local-linkages-till-office/special-programs?authuser=0',
            'parent' => 'till-office',
            'hero_image' => $hero,
            'content' => ['Special Programs cover unique partner-based initiatives that support academic enrichment, leadership development, cultural learning, service, and institutional engagement.'],
            'sections' => stac_office_generated_sections('Special Programs', [
                'Short courses, seminars, workshops, and enrichment activities.',
                'Community, cultural, leadership, or service-learning programs.',
                'Partner-hosted events and collaborative institutional projects.',
                'Monitoring and documentation of special program outcomes.',
            ]),
            'children' => [],
        ],
        'sower-office' => [
            'title' => 'Strategic Opportunities for World Class Education and Research (SOWER)',
            'source_heading' => 'Strategic Opportunities for World Class Education and Research (SOWER) Office',
            'href' => 'office-sower.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/strategic-opportunities-for-world-class-education-and-research-sower?authuser=0',
            'parent' => 'seed-office',
            'hero_image' => $hero,
            'content' => [
                'The TILL office, established on March 27, 2025, is a branch of the SEED office that fosters global and local partnerships to enhance academic, cultural, and professional opportunities. It plays a crucial role in promoting collaboration, exchange programs, and research initiatives, empowering students and faculty to engage with diverse communities.',
                'Aligned with this vision, the office facilitates linkages that enrich educational experiences, contribute to a more interconnected and innovative world, and equip students and faculty with global competencies in accordance with the standards envisioned by the institution.',
            ],
            'sections' => stac_office_generated_sections('Strategic Opportunities for World Class Education and Research (SOWER)', [
                'Identify strategic opportunities for instruction, research, innovation, and institutional growth.',
                'Coordinate world-class education and research partnerships.',
                'Support proposal development for strategic academic initiatives.',
                'Track collaboration outcomes and institutional benefits.',
            ]),
            'children' => [],
        ],
        'reap-office' => [
            'title' => 'Recalibration of Education for Advancement and Promotion (REAP) Office',
            'source_heading' => 'Recalibration of Education for Advancement and Promotion (REAP) Office',
            'href' => 'office-reap.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/recalibration-of-education-for-advancement-and-promotion-reap-office?authuser=0',
            'parent' => 'seed-office',
            'hero_image' => $hero,
            'content' => [
                'The TILL office, established on March 27, 2025, is a branch of the SEED office that fosters global and local partnerships to enhance academic, cultural, and professional opportunities. It plays a crucial role in promoting collaboration, exchange programs, and research initiatives, empowering students and faculty to engage with diverse communities.',
                'Aligned with this vision, the office facilitates linkages that enrich educational experiences, contribute to a more interconnected and innovative world, and equip students and faculty with global competencies in accordance with the standards envisioned by the institution.',
            ],
            'sections' => stac_office_generated_sections('Recalibration of Education for Advancement and Promotion (REAP) Office', [
                'Support program improvement, recalibration, and academic advancement initiatives.',
                'Coordinate promotion of institutional programs and development activities.',
                'Gather feedback and evidence for program enhancement.',
                'Assist departments in aligning initiatives with institutional priorities.',
            ]),
            'children' => [],
        ],
        'alumni' => [
            'title' => 'Alumni',
            'source_heading' => 'Alumni',
            'href' => 'office-alumni.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/alumni?authuser=0',
            'parent' => 'seed-office',
            'hero_image' => $hero,
            'content' => [
                'The TILL office, established on March 27, 2025, is a branch of the SEED office that fosters global and local partnerships to enhance academic, cultural, and professional opportunities. It plays a crucial role in promoting collaboration, exchange programs, and research initiatives, empowering students and faculty to engage with diverse communities.',
                'Aligned with this vision, the office facilitates linkages that enrich educational experiences, contribute to a more interconnected and innovative world, and equip students and faculty with global competencies in accordance with the standards envisioned by the institution.',
            ],
            'sections' => stac_office_generated_sections('Alumni', [
                'Maintain alumni records, communication, and engagement channels.',
                'Coordinate alumni participation in school activities and partnerships.',
                'Support alumni recognition, networking, and service initiatives.',
                'Connect graduates with institutional development and community projects.',
            ]),
            'children' => [],
        ],
        'parents' => [
            'title' => 'Parents',
            'source_heading' => 'Parents',
            'href' => 'office-parents.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/parents?authuser=0',
            'parent' => 'seed-office',
            'hero_image' => $hero,
            'content' => [
                'The TILL office, established on March 27, 2025, is a branch of the SEED office that fosters global and local partnerships to enhance academic, cultural, and professional opportunities. It plays a crucial role in promoting collaboration, exchange programs, and research initiatives, empowering students and faculty to engage with diverse communities.',
                'Aligned with this vision, the office facilitates linkages that enrich educational experiences, contribute to a more interconnected and innovative world, and equip students and faculty with global competencies in accordance with the standards envisioned by the institution.',
            ],
            'sections' => stac_office_generated_sections('Parents', [
                'Support parent communication, orientation, and institutional engagement.',
                'Coordinate parent participation in relevant school activities.',
                'Refer parent concerns to the appropriate academic or administrative office.',
                'Promote shared responsibility for student formation and welfare.',
            ]),
            'children' => [],
        ],
        'industry-partnership' => [
            'title' => 'Industry Partnership',
            'source_heading' => 'Industry Partnership',
            'href' => 'office-industry-partnership.php',
            'source_url' => $base . '/stac-external-and-engagement-development-seed-office/industry-partnership?authuser=0',
            'parent' => 'seed-office',
            'hero_image' => $hero,
            'content' => [
                'The TILL office, established on March 27, 2025, is a branch of the SEED office that fosters global and local partnerships to enhance academic, cultural, and professional opportunities. It plays a crucial role in promoting collaboration, exchange programs, and research initiatives, empowering students and faculty to engage with diverse communities.',
                'Aligned with this vision, the office facilitates linkages that enrich educational experiences, contribute to a more interconnected and innovative world, and equip students and faculty with global competencies in accordance with the standards envisioned by the institution.',
            ],
            'sections' => stac_office_generated_sections('Industry Partnership', [
                'Develop partnerships for training, immersion, internship, and employment pathways.',
                'Coordinate industry visits, lectures, and skills-development opportunities.',
                'Support program alignment with workplace expectations and community needs.',
                'Document partner engagement, feedback, and student development outcomes.',
            ]),
            'children' => [],
        ],
        'property-custodian' => [
            'title' => 'Property Custodian',
            'source_heading' => 'Property Custodian',
            'href' => 'office-property-custodian.php',
            'source_url' => $base . '/property-custodian?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Property Custodian manages school property records, asset accountability, inventory monitoring, issuance, inspection, and coordination for institutional supplies and equipment.'],
            'sections' => stac_office_generated_sections('Property Custodian', [
                'Maintain inventory records for school assets, equipment, and supplies.',
                'Process property issuance, return, transfer, and accountability forms.',
                'Coordinate inspection, tagging, and monitoring of institutional property.',
                'Support procurement and disposal documentation when required.',
            ]),
            'children' => [],
        ],
        'registrar' => [
            'title' => 'Registrar',
            'source_heading' => 'Registrar',
            'href' => 'office-registrar.php',
            'source_url' => $base . '/registrar?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Registrar maintains official academic records and supports enrollment, transfer, certification, graduation, and student record services.'],
            'sections' => stac_office_generated_sections('Registrar', [
                'Enrollment records, student information, and academic document processing.',
                'Transcript, certification, and school-record request assistance.',
                'Graduation, transfer, and completion record coordination.',
                'Academic policy and records compliance support.',
            ]),
            'children' => ['college-registrar', 'basic-education-registrar'],
        ],
        'college-registrar' => [
            'title' => 'College Registrar',
            'source_heading' => 'College Registrar',
            'href' => 'office-college-registrar.php',
            'source_url' => $base . '/registrar/college-registrar?authuser=0',
            'parent' => 'registrar',
            'hero_image' => $hero,
            'content' => ['The College Registrar handles official records, enrollment support, certifications, and academic documentation for students in college-level programs.'],
            'sections' => stac_office_generated_sections('College Registrar', [
                'College enrollment, subject registration, and student record assistance.',
                'Transcript of Records, certifications, and academic document processing.',
                'Graduation evaluation and completion record coordination.',
                'Transfer credential and scholastic standing documentation.',
            ]),
            'children' => [],
        ],
        'basic-education-registrar' => [
            'title' => 'Basic Education Registrar',
            'source_heading' => 'Basic Education Registrar',
            'href' => 'office-basic-education-registrar.php',
            'source_url' => $base . '/registrar/basic-education-registrar?authuser=0',
            'parent' => 'registrar',
            'hero_image' => $hero,
            'content' => ['The Basic Education Registrar handles official records, enrollment support, certifications, and student documentation for elementary, junior high school, and senior high school learners.'],
            'sections' => stac_office_generated_sections('Basic Education Registrar', [
                'Learner enrollment, grade-level records, and school form assistance.',
                'Report card, good moral certificate, and school certification requests.',
                'Transfer-in and transfer-out documentation.',
                'Completion and promotion record coordination for basic education learners.',
            ]),
            'children' => [],
        ],
        'campus-ministry' => [
            'title' => 'Campus Ministry',
            'source_heading' => 'Campus Ministry',
            'href' => 'office-campus-ministry.php',
            'source_url' => $base . '/campus-ministry?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['Campus Ministry nurtures the Catholic identity of STAC through worship, prayer, pastoral support, values formation, retreats, outreach, and faith-centered school activities.'],
            'sections' => stac_office_generated_sections('Campus Ministry', [
                'Masses, liturgical celebrations, prayer services, and spiritual activities.',
                'Retreats, recollections, values formation, and pastoral guidance.',
                'Community outreach and faith-in-action programs.',
                'Coordination of Catholic identity initiatives across the campus.',
            ]),
            'children' => [],
        ],
        'general-services' => [
            'title' => 'General Services',
            'source_heading' => 'General Services',
            'href' => 'office-general-services.php',
            'source_url' => $base . '/general-services?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['General Services supports campus readiness through facilities coordination, maintenance, cleanliness, logistics, safety assistance, and operational support.'],
            'sections' => stac_office_generated_sections('General Services', [
                'Facilities maintenance, repair coordination, and campus upkeep.',
                'Logistical support for institutional activities and events.',
                'Classroom, office, and common-area readiness assistance.',
                'Coordination of safety, sanitation, and general campus service needs.',
            ]),
            'children' => [],
        ],
        'student-affairs-office' => [
            'title' => 'Student Affairs Office',
            'source_heading' => 'Student Affairs',
            'href' => 'office-student-affairs.php',
            'source_url' => $base . '/student-affairs-office?authuser=0',
            'parent' => 'offices',
            'hero_image' => $hero,
            'content' => ['The Student Affairs Office promotes student welfare, leadership, discipline, engagement, wellness, scholarships, sports, guidance, health services, and co-curricular formation.'],
            'sections' => stac_office_generated_sections('Student Affairs Office', [
                'Student welfare, discipline, leadership, and activity coordination.',
                'Scholarship, sports, guidance, and health service referrals.',
                'Support for student organizations and student body initiatives.',
                'Campus life programs that promote responsibility, service, and holistic formation.',
            ]),
            'children' => ['scholarship-office', 'sports', 'guidance-and-counseling', 'health-services', 'student-body-organization'],
        ],
        'scholarship-office' => [
            'title' => 'Scholarship Office',
            'source_heading' => 'Scholarship Office',
            'href' => 'office-scholarship.php',
            'source_url' => $base . '/student-affairs-office/scholarship-office?authuser=0',
            'parent' => 'student-affairs-office',
            'hero_image' => $hero,
            'content' => ['The Scholarship Office assists qualified students with scholarship information, application guidance, renewal monitoring, documentation, and coordination with relevant offices or sponsors.'],
            'sections' => stac_office_generated_sections('Scholarship Office', [
                'Scholarship inquiry, application, and eligibility guidance.',
                'Document screening and endorsement coordination.',
                'Scholarship renewal, monitoring, and compliance reminders.',
                'Coordination with sponsors, departments, and financial offices.',
            ]),
            'children' => [],
        ],
        'sports' => [
            'title' => 'Sports',
            'source_heading' => 'Sports',
            'href' => 'office-sports.php',
            'source_url' => $base . '/student-affairs-office/sports?authuser=0',
            'parent' => 'student-affairs-office',
            'hero_image' => $hero,
            'content' => ['The Sports unit supports athletics, physical development, teamwork, school representation, fitness activities, and responsible participation in sports programs.'],
            'sections' => stac_office_generated_sections('Sports', [
                'Sports program coordination and student-athlete support.',
                'Training, tryout, tournament, and competition assistance.',
                'Coordination of athletic facilities, equipment, and schedules.',
                'Promotion of discipline, teamwork, wellness, and sportsmanship.',
            ]),
            'children' => [],
        ],
        'guidance-and-counseling' => [
            'title' => 'Guidance and Counseling',
            'source_heading' => 'Guidance and Counseling',
            'href' => 'office-guidance-and-counseling.php',
            'source_url' => $base . '/student-affairs-office/guidance-and-counseling?authuser=0',
            'parent' => 'student-affairs-office',
            'hero_image' => $hero,
            'content' => ['Guidance and Counseling supports student growth through counseling, academic guidance, career awareness, personal development, referral assistance, and wellness-centered programs.'],
            'sections' => stac_office_generated_sections('Guidance and Counseling', [
                'Individual and group guidance services.',
                'Academic, career, personal, and social development support.',
                'Wellness, prevention, and student adjustment programs.',
                'Referral coordination for concerns requiring specialized assistance.',
            ]),
            'children' => [],
        ],
        'health-services' => [
            'title' => 'Health Services',
            'source_heading' => 'Health Services',
            'href' => 'office-health-services.php',
            'source_url' => $base . '/student-affairs-office/health-services?authuser=0',
            'parent' => 'student-affairs-office',
            'hero_image' => $hero,
            'content' => ['Health Services provides basic health assistance, first aid, health monitoring, wellness guidance, and coordination for student and personnel health concerns.'],
            'sections' => stac_office_generated_sections('Health Services', [
                'First aid and basic health assessment assistance.',
                'Health record monitoring and wellness reminders.',
                'Coordination with parents, guardians, or medical professionals when needed.',
                'Support for health, safety, and emergency-response protocols.',
            ]),
            'children' => [],
        ],
        'student-body-organization' => [
            'title' => 'Student Body Organization',
            'source_heading' => 'Student Body Organization',
            'href' => 'office-student-body-organization.php',
            'source_url' => $base . '/student-affairs-office/student-body-organization?authuser=0',
            'parent' => 'student-affairs-office',
            'hero_image' => $hero,
            'content' => ['The Student Body Organization develops student leadership, representation, service, and campus engagement through responsible student-led programs and activities.'],
            'sections' => stac_office_generated_sections('Student Body Organization', [
                'Student leadership formation and officer coordination.',
                'Student activity planning, consultation, and implementation support.',
                'Representation of student concerns through proper channels.',
                'Promotion of service, participation, accountability, and school spirit.',
            ]),
            'children' => [],
        ],
    ];

    return $nodes;
}

function stac_offices_top_level_keys(): array
{
    return ['offices'];
}

function stac_offices_node(string $key): array
{
    $nodes = stac_offices_nodes();

    if (!isset($nodes[$key])) {
        throw new InvalidArgumentException('Unknown office key: ' . $key);
    }

    return $nodes[$key];
}

function stac_offices_is_descendant(string $possibleDescendantKey, string $ancestorKey): bool
{
    $nodes = stac_offices_nodes();

    while (!empty($nodes[$possibleDescendantKey]['parent'])) {
        if ($nodes[$possibleDescendantKey]['parent'] === $ancestorKey) {
            return true;
        }

        $possibleDescendantKey = $nodes[$possibleDescendantKey]['parent'];
    }

    return false;
}
