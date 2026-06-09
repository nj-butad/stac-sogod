<?php

function stac_departments_nodes(): array
{
    static $nodes = null;

    if ($nodes !== null) {
        return $nodes;
    }

    $base = 'https://sites.google.com/view/stacs-izn/departments';

    $nodes = [
        'college-department' => [
            'title' => 'College Department',
            'source_heading' => 'College Department',
            'href' => 'department-college.php',
            'source_url' => $base . '/college-department?authuser=0',
            'content' => [],
            'children' => [
                'bsba',
                'bscrim',
                'bsis',
                'bsoa',
                'beed',
            ],
        ],
        'bsba' => [
            'title' => 'Bachelor of Science in Business Administration',
            'source_heading' => 'Bachelor of Science in Business Administration',
            'href' => 'program-bsba-hrm.php',
            'source_url' => $base . '/college-department/bachelor-of-science-in-business-administration?authuser=0',
            'parent' => 'college-department',
            'hero_image' => 'upload/bsba-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A 4 year undergraduate degree program that focuses on equipping the students with the skills and knowledge to pursue careers in various fields of business and management roles, operation and administration.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'PROGRAM CURRICULUM COVERS',
                    'items' => [
                        'A. Business principles and practices',
                        'B. Accounting and finance',
                        'C. Marketing and management',
                        'D. Operation Management and Logistics',
                        'E. Business Law and Ethics',
                        'F. International Business and Trade',
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'CAREER/JOB OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Management and Leadership',
                            'image' => 'upload/bsba-management-and-leadership-card.png',
                        ],
                        [
                            'title' => 'Marketing and Sales',
                            'image' => 'upload/bsba-marketing-and-sales-card.png',
                        ],
                        [
                            'title' => 'Financial and Accounting',
                            'image' => 'upload/bsba-financial-and-accounting-card.png',
                        ],
                        [
                            'title' => 'Human Resource and Recruitment',
                            'image' => 'upload/bsba-human-resource-and-recruitment-card.png',
                        ],
                        [
                            'title' => 'Operations and Logistics',
                            'image' => 'upload/bsba-operations-and-logistics-card.png',
                        ],
                        [
                            'title' => 'Entrepreneurship and Business Development',
                            'image' => 'upload/bsba-entrepreneurship-and-business-development-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC College of Business Education provides future ready graduates the global skills and knowledge of business administration, innovation, management, and operations.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'bscrim' => [
            'title' => 'Bachelor of Science in Criminology',
            'source_heading' => 'Bachelor of Science in Criminology',
            'href' => 'program-bscrim.php',
            'source_url' => $base . '/college-department/bachelor-of-science-in-criminology?authuser=0',
            'parent' => 'college-department',
            'hero_image' => 'upload/bscrim-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A 4 year undergraduate degree program that equips the students with the skills and knowledge to pursue careers in various fields of business and management roles, operation and administration. (TO EDIT)',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'PROGRAM CURRICULUM COVERS',
                    'items' => [
                        'A. Business principles and practices',
                        'B. Accounting and finance',
                        'C. Marketing and management',
                        'D. Operation Management and Logistics',
                        'E. Business Law and Ethics',
                        'F. International Business and Trade',
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'CAREER/JOB OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Manangement and Leadership',
                            'image' => 'upload/bsba-management-and-leadership-card.png',
                        ],
                        [
                            'title' => 'Marketing and Sales',
                            'image' => 'upload/bsba-marketing-and-sales-card.png',
                        ],
                        [
                            'title' => 'Financial and Accounting',
                            'image' => 'upload/bsba-financial-and-accounting-card.png',
                        ],
                        [
                            'title' => 'Human Resource and Recruitment',
                            'image' => 'upload/bsba-human-resource-and-recruitment-card.png',
                        ],
                        [
                            'title' => 'Operations and Logistics',
                            'image' => 'upload/bsba-operations-and-logistics-card.png',
                        ],
                        [
                            'title' => 'Entrepreneurship and Business Development',
                            'image' => 'upload/bsba-entrepreneurship-and-business-development-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC College of Business Education provides future ready graduates the global skills and knowledge of business administration, innovation, management, and operations.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'bsis' => [
            'title' => 'Bachelor of Science in Information System',
            'source_heading' => 'Bachelor of Science in Information System',
            'href' => 'program-bsis.php',
            'source_url' => $base . '/college-department/bachelor-of-science-in-information-system?authuser=0',
            'parent' => 'college-department',
            'hero_image' => 'upload/bsis-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'The Bachelor of Science in Information System program focuses on the study, design and management of information systems to support business and organizational operations.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'PROGRAM CURRICULUM COVERS',
                    'items' => [
                        'A. Programming',
                        'B. Data-Based Management',
                        'C. System Analysis',
                        'D. Cybersecurity',
                        'E. Project Management',
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'CAREER/JOB OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Problem - Solving',
                            'image' => 'upload/bsis-problem-solving-card.png',
                        ],
                        [
                            'title' => 'Data Handling',
                            'image' => 'upload/bsis-data-handling-card.png',
                        ],
                        [
                            'title' => 'IT Solutions Development',
                            'image' => 'upload/bsis-it-solutions-development-card.png',
                        ],
                        [
                            'title' => 'Human Resource and Recruitment',
                            'image' => 'upload/bsis-human-resource-and-recruitment-card.png',
                        ],
                        [
                            'title' => 'Operations and Logistics',
                            'image' => 'upload/bsis-operations-and-logistics-card.png',
                        ],
                        [
                            'title' => 'Entrepreneurship and Business Development',
                            'image' => 'upload/bsis-entrepreneurship-and-business-development-card.png',
                        ],
                    ],
                ],
            ],
            'children' => [],
        ],
        'bsoa' => [
            'title' => 'Bachelor of Science in Office Administration',
            'source_heading' => 'Bachelor of Science in Office Administration',
            'href' => 'program-bsoa.php',
            'source_url' => $base . '/college-department/bachelor-of-science-in-office-administration?authuser=0',
            'parent' => 'college-department',
            'hero_image' => 'upload/bsoa-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A 4 year degree program that prepares students for careers in office administration. It covers the competencies such as: office procedures, communication skills, office administration and computer procedures.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'PROGRAM CURRICULUM COVERS',
                    'items' => [
                        'A. Office Administrations',
                        'B. Business Management',
                        'C. Information Technology',
                        'D. Legal and Medical Transcriptions',
                        'D. Legal and Medical Transcriptions',
                        'E. Human Relations and Communications',
                        'F. Writing Routine Reports and Correspondence',
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'CAREER/JOB OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Executive Assistant',
                            'image' => 'upload/bsoa-executive-assistant-card.png',
                        ],
                        [
                            'title' => 'Office Administrator',
                            'image' => 'upload/bsoa-office-administrator-card.png',
                        ],
                        [
                            'title' => 'Book Keeper and Document Officer',
                            'image' => 'upload/bsoa-book-keeper-and-document-officer-card.png',
                        ],
                        [
                            'title' => 'Costumer Service Officer',
                            'image' => 'upload/bsoa-costumer-service-officer-card.png',
                        ],
                        [
                            'title' => 'Office Worker',
                            'image' => 'upload/bsoa-office-worker-card.png',
                        ],
                        [
                            'title' => 'Office Conference Planner',
                            'image' => 'upload/bsoa-office-conference-planner-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC College of Business Education provides future ready graduates the global skills and knowledge of business administration, innovation, management, and operations.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'beed' => [
            'title' => 'Bachelor in Elementary Education',
            'source_heading' => 'Bachelor in Elementary Education',
            'href' => 'program-beed.php',
            'source_url' => $base . '/college-department/bachelor-in-elementary-education?authuser=0',
            'parent' => 'college-department',
            'content' => [
                '"Teaching Today, Transforming Tomorrow"',
                'The Bachelor in Elementary Education Program is a four - year degree designed to prepare students for teaching in the elementary level. It provides training in pedagogy, classroom management, and subject - specific teaching strategies.',
            ],
            'hero_image' => 'upload/beed-hero.png',
            'hero_min_height' => '680px',
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'PROGRAM CURRICULUM COVERS',
                    'items' => [
                        'A. Child Development',
                        'B. Educational Psychology',
                        'C. Curriculum Planning',
                        'D. Instructional Technology',
                        'D. Pedagogical Trainings',
                        'E. Facilitating Learning',
                        'F. Classroom Management',
                        'G. Research and Education',
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'CAREER/JOB OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Training Developer',
                            'image' => 'upload/beed-training-developer-card.png',
                        ],
                        [
                            'title' => 'Early Childhood Formators',
                            'image' => 'upload/beed-early-childhood-formators-card.png',
                        ],
                        [
                            'title' => 'Academic Consultants',
                            'image' => 'upload/beed-academic-consultants-card.png',
                        ],
                        [
                            'title' => 'Career Experts',
                            'image' => 'upload/beed-career-experts-card.png',
                        ],
                        [
                            'title' => 'Holistic Enhancement Specialist',
                            'image' => 'upload/beed-holistic-enhancement-specialist-card.png',
                        ],
                        [
                            'title' => 'Education Booster',
                            'image' => 'upload/beed-education-booster-card.png',
                        ],
                        [
                            'title' => 'Research Innovators',
                            'image' => 'upload/beed-research-innovators-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC College of Teacher Education equips future educators with the global knowledge and competencies needed to create engaging and effective learning experiences for learners.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'tesda' => [
            'title' => 'TESDA',
            'source_heading' => 'TESDA',
            'href' => 'program-tesda.php',
            'source_url' => $base . '/tesda?authuser=0',
            'hero_image' => 'upload/tesda-hero.png',
            'hero_min_height' => '680px',
            'content' => [],
            'children' => [
                'caregiving',
                'cookery',
                'food-and-beverage-services',
                'health-care-services',
            ],
        ],
        'caregiving' => [
            'title' => 'Caregiving',
            'source_heading' => 'Caregiving',
            'href' => 'tesda-caregiving.php',
            'source_url' => $base . '/tesda/caregiving?authuser=0',
            'parent' => 'tesda',
            'hero_image' => 'upload/tesda-caregiving-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A TESDA-aligned training program that prepares learners to provide quality care and support to infants, children, older persons, and individuals with special care needs in home-based or institutional settings.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PROGRAM TRAINING COVERS',
                    'items' => [
                        'A. Basic caregiving principles and values formation',
                        'B. Personal care and hygiene assistance',
                        'C. Nutrition, meal preparation, and feeding support',
                        'D. Bed making, infection control, and household upkeep',
                        'E. Safe mobility assistance and transfer techniques',
                        'F. Monitoring vital signs and observing client condition',
                        'G. Communication, empathy, and client companionship',
                        'H. Emergency response awareness and first-aid readiness',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PRACTICAL LEARNING FOCUS',
                    'paragraphs' => [
                        'Learners are introduced to hands-on caregiving routines that build confidence in assisting clients with dignity, patience, and professionalism.',
                        'Training emphasizes safety, cleanliness, proper documentation, and responsive care practices that are useful in both home care and facility-based settings.',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'CAREER / WORK OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Home-based Caregiver',
                            'image' => 'upload/caregiving-home-based-caregiver-card.png',
                        ],
                        [
                            'title' => 'Elderly Care Assistant',
                            'image' => 'upload/caregiving-elderly-care-assistant-card.png',
                        ],
                        [
                            'title' => 'Childcare Support Worker',
                            'image' => 'upload/caregiving-childcare-support-worker-card.png',
                        ],
                        [
                            'title' => 'Patient Care Aide',
                            'image' => 'upload/caregiving-patient-care-aide-card.png',
                        ],
                        [
                            'title' => 'Residential Care Support Staff',
                            'image' => 'upload/caregiving-residential-care-support-staff-card.png',
                        ],
                        [
                            'title' => 'Wellness and Companionship Assistant',
                            'image' => 'upload/caregiving-wellness-and-companionship-assistant-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC TESDA Caregiving program develops compassionate and capable caregivers equipped with practical skills, proper work values, and a strong sense of service for community and family care settings.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'cookery' => [
            'title' => 'Cookery',
            'source_heading' => 'Cookery',
            'href' => 'tesda-cookery.php',
            'source_url' => $base . '/tesda/cookery?authuser=0',
            'parent' => 'tesda',
            'hero_image' => 'upload/tesda-cookery-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A TESDA-aligned training program that develops foundational culinary skills in food preparation, kitchen operations, sanitation, and presentation for entry-level work in commercial and institutional food service settings.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PROGRAM TRAINING COVERS',
                    'items' => [
                        'A. Kitchen safety and sanitation practices',
                        'B. Proper use and maintenance of kitchen tools and equipment',
                        'C. Basic knife skills and ingredient preparation',
                        'D. Stock, soup, sauce, and basic dish preparation',
                        'E. Menu mise en place and workstation organization',
                        'F. Food plating, portioning, and presentation',
                        'G. Time management and teamwork in the kitchen',
                        'H. Basic inventory awareness and food cost consciousness',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PRACTICAL LEARNING FOCUS',
                    'paragraphs' => [
                        'Learners practice real kitchen routines that strengthen discipline, speed, cleanliness, and consistency in food preparation.',
                        'Training highlights hands-on culinary work, proper workflow, and professional kitchen behavior suited for restaurants, catering operations, and food production environments.',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'CAREER / WORK OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Line Cook',
                            'image' => 'upload/cookery-line-cook-card.png',
                        ],
                        [
                            'title' => 'Prep Cook',
                            'image' => 'upload/cookery-prep-cook-card.png',
                        ],
                        [
                            'title' => 'Kitchen Assistant',
                            'image' => 'upload/cookery-kitchen-assistant-card.png',
                        ],
                        [
                            'title' => 'Catering Staff',
                            'image' => 'upload/cookery-catering-staff-card.png',
                        ],
                        [
                            'title' => 'Pastry and Bakery Assistant',
                            'image' => 'upload/cookery-pastry-and-bakery-assistant-card.png',
                        ],
                        [
                            'title' => 'Food Production Worker',
                            'image' => 'upload/cookery-food-production-worker-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC TESDA Cookery program builds skilled and work-ready culinary trainees equipped with practical kitchen competence, professional discipline, and a strong commitment to food quality and service.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'food-and-beverage-services' => [
            'title' => 'Food and Beverage Services',
            'source_heading' => 'Food and Beverage Services',
            'href' => 'tesda-food-and-beverage-services.php',
            'source_url' => $base . '/tesda/food-and-beverage-services?authuser=0',
            'parent' => 'tesda',
            'hero_image' => 'upload/tesda-food-and-beverage-services-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A TESDA-aligned training program that prepares learners for restaurant and hospitality service through practical instruction in table service, guest relations, beverage preparation, and dining area operations.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PROGRAM TRAINING COVERS',
                    'items' => [
                        'A. Dining room setup and table arrangement',
                        'B. Guest greeting, communication, and service etiquette',
                        'C. Order taking and accurate service coordination',
                        'D. Food and beverage serving procedures',
                        'E. Basic bar and beverage preparation support',
                        'F. Cash handling awareness and point-of-service discipline',
                        'G. Sanitation, cleanliness, and safety in service areas',
                        'H. Teamwork, professionalism, and customer satisfaction',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PRACTICAL LEARNING FOCUS',
                    'paragraphs' => [
                        'Learners practice real service routines that strengthen confidence in guest interaction, timing, attentiveness, and professional presentation.',
                        'Training emphasizes hospitality standards, organized workflow, and responsive service in restaurants, cafes, hotels, and event-based dining environments.',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'CAREER / WORK OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Dining Server',
                            'image' => 'upload/fbs-dining-server-card.png',
                        ],
                        [
                            'title' => 'Restaurant Service Crew',
                            'image' => 'upload/fbs-restaurant-service-crew-card.png',
                        ],
                        [
                            'title' => 'Banquet Service Staff',
                            'image' => 'upload/fbs-banquet-service-staff-card.png',
                        ],
                        [
                            'title' => 'Beverage Attendant',
                            'image' => 'upload/fbs-beverage-attendant-card.png',
                        ],
                        [
                            'title' => 'Food Runner',
                            'image' => 'upload/fbs-food-runner-card.png',
                        ],
                        [
                            'title' => 'Host or Hostess',
                            'image' => 'upload/fbs-host-or-hostess-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC TESDA Food and Beverage Services program develops service-oriented trainees equipped with hospitality skills, workplace discipline, and a strong commitment to excellent guest experience.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'health-care-services' => [
            'title' => 'Health Care Services',
            'source_heading' => 'Health Care Services',
            'href' => 'tesda-health-care-services.php',
            'source_url' => $base . '/tesda/health-care-services?authuser=0',
            'parent' => 'tesda',
            'hero_image' => 'upload/tesda-health-care-services-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'A TESDA-aligned training program that prepares learners for entry-level health support work through practical instruction in patient care assistance, basic clinical tasks, sanitation, safety, and compassionate service.',
            ],
            'sections' => [
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PROGRAM TRAINING COVERS',
                    'items' => [
                        'A. Basic patient care assistance and bedside support',
                        'B. Vital signs monitoring and observation procedures',
                        'C. Infection prevention, sanitation, and safety practices',
                        'D. Mobility assistance and patient positioning',
                        'E. Basic documentation and reporting awareness',
                        'F. Preparing care areas, tools, and clinical materials',
                        'G. Professional communication and teamwork in care settings',
                        'H. Compassion, ethics, and patient-centered service',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'PRACTICAL LEARNING FOCUS',
                    'paragraphs' => [
                        'Learners practice healthcare routines that build confidence in assisting patients safely, respectfully, and efficiently in supervised care environments.',
                        'Training emphasizes clinical discipline, observation skills, hygiene standards, and supportive care practices relevant to hospitals, clinics, and community health settings.',
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'CAREER / WORK OPPORTUNITIES',
                    'cards' => [
                        [
                            'title' => 'Nursing Aide',
                            'image' => 'upload/healthcare-nursing-aide-card.png',
                        ],
                        [
                            'title' => 'Patient Care Assistant',
                            'image' => 'upload/healthcare-patient-care-assistant-card.png',
                        ],
                        [
                            'title' => 'Clinical Support Staff',
                            'image' => 'upload/healthcare-clinical-support-staff-card.png',
                        ],
                        [
                            'title' => 'Ward Assistant',
                            'image' => 'upload/healthcare-ward-assistant-card.png',
                        ],
                        [
                            'title' => 'Community Health Support Worker',
                            'image' => 'upload/healthcare-community-health-support-worker-card.png',
                        ],
                        [
                            'title' => 'Home Health Aide',
                            'image' => 'upload/healthcare-home-health-aide-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Generated Initial Content',
                    'title' => 'Closing Statement',
                    'paragraphs' => [
                        'The STAC TESDA Health Care Services program develops responsible and compassionate trainees equipped with practical healthcare support skills, professional discipline, and a strong commitment to patient welfare.',
                    ],
                ],
            ],
            'children' => [],
        ],
        'basic-education-department' => [
            'title' => 'Basic Education Department',
            'source_heading' => 'Basic Education Department',
            'href' => 'department-basic-education.php',
            'source_url' => $base . '/basic-education-department?authuser=0',
            'content' => [],
            'children' => [
                'senior-high-school',
                'junior-high-school',
                'elementary',
            ],
        ],
        'senior-high-school' => [
            'title' => 'Senior High School',
            'source_heading' => 'SENIOR HIGH SCHOOL DEPARTMENT',
            'href' => 'program-senior-high-school.php',
            'source_url' => $base . '/basic-education-department/senior-high-school?authuser=0',
            'parent' => 'basic-education-department',
            'hero_image' => 'upload/beed-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'The Senior High School (SHS) program under the K to 12 curriculum of the Department of Education (DepEd) covers Grades 11 and 12 and is designed to prepare students for higher education, entrepreneurship, employment and middle-level skills development. STAC offers the following:',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'ACADEMIC TRACK',
                    'cards' => [
                        [
                            'title' => 'Science, Technology, Engineering, Mathematics',
                            'image' => 'upload/bsis-problem-solving-card.png',
                        ],
                        [
                            'title' => 'Humanities and Social Sciences',
                            'image' => 'upload/beed-academic-consultants-card.png',
                        ],
                        [
                            'title' => 'Accountancy, Business, Management',
                            'image' => 'upload/bsba-financial-and-accounting-card.png',
                        ],
                        [
                            'title' => 'General Education',
                            'image' => 'upload/beed-holistic-enhancement-specialist-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'TECHNICAL VOCATIONAL LIVELIHOOD (TVL) TRACK',
                    'cards' => [
                        [
                            'title' => 'Cookery',
                            'image' => 'upload/cookery-line-cook-card.png',
                        ],
                        [
                            'title' => 'Food and Beverages Services',
                            'image' => 'upload/fbs-dining-server-card.png',
                        ],
                        [
                            'title' => 'Housekeeping',
                            'image' => 'upload/fbs-restaurant-service-crew-card.png',
                        ],
                        [
                            'title' => 'Bartending',
                            'image' => 'upload/fbs-beverage-attendant-card.png',
                        ],
                        [
                            'title' => 'Caregiving',
                            'image' => 'upload/caregiving-home-based-caregiver-card.png',
                        ],
                        [
                            'title' => 'Electrical Installation Maintenance',
                            'image' => 'upload/bsis-operations-and-logistics-card.png',
                        ],
                        [
                            'title' => 'Shielded Metal Arc Welding',
                            'image' => 'upload/tesda-hero.png',
                        ],
                        [
                            'title' => 'Computer System Servicing',
                            'image' => 'upload/bsis-it-solutions-development-card.png',
                        ],
                        [
                            'title' => 'SMAW I and SMAW II',
                            'image' => 'upload/tesda-cookery-hero.png',
                        ],
                    ],
                ],
            ],
            'children' => [],
        ],
        'junior-high-school' => [
            'title' => 'Junior High School',
            'source_heading' => 'JUNIOR HIGH SCHOOL DEPARTMENT',
            'href' => 'program-junior-high-school.php',
            'source_url' => $base . '/basic-education-department/junior-high-school?authuser=0',
            'parent' => 'basic-education-department',
            'hero_image' => 'upload/beed-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'Saint Thomas Aquinas College (STAC) offers a complete Junior High School program covering Grade 7 to Grade 10 with special feature on FLI (Fast Learner Individual) sections, computer subjects and robotics.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'ACADEMIC TRACK',
                    'cards' => [
                        [
                            'title' => 'Science, Technology, Engineering, Mathematics',
                            'image' => 'upload/bsis-problem-solving-card.png',
                        ],
                        [
                            'title' => 'Humanities and Social Sciences',
                            'image' => 'upload/beed-academic-consultants-card.png',
                        ],
                        [
                            'title' => 'Accountancy, Business, Management',
                            'image' => 'upload/bsba-financial-and-accounting-card.png',
                        ],
                        [
                            'title' => 'General Education',
                            'image' => 'upload/beed-holistic-enhancement-specialist-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'TECHNICAL VOCATIONAL LIVELIHOOD (TVL) TRACK',
                    'cards' => [
                        [
                            'title' => 'Cookery',
                            'image' => 'upload/cookery-line-cook-card.png',
                        ],
                        [
                            'title' => 'Food and Beverages Services',
                            'image' => 'upload/fbs-dining-server-card.png',
                        ],
                        [
                            'title' => 'Housekeeping',
                            'image' => 'upload/fbs-restaurant-service-crew-card.png',
                        ],
                        [
                            'title' => 'Bartending',
                            'image' => 'upload/fbs-beverage-attendant-card.png',
                        ],
                        [
                            'title' => 'Caregiving',
                            'image' => 'upload/caregiving-home-based-caregiver-card.png',
                        ],
                        [
                            'title' => 'Electrical Installation Maintenance',
                            'image' => 'upload/bsis-operations-and-logistics-card.png',
                        ],
                        [
                            'title' => 'Shielded Metal Arc Welding',
                            'image' => 'upload/tesda-hero.png',
                        ],
                        [
                            'title' => 'Computer System Servicing',
                            'image' => 'upload/bsis-it-solutions-development-card.png',
                        ],
                        [
                            'title' => 'SMAW I and SMAW II',
                            'image' => 'upload/tesda-cookery-hero.png',
                        ],
                    ],
                ],
            ],
            'children' => [],
        ],
        'elementary' => [
            'title' => 'Elementary',
            'source_heading' => 'ELEMENTARY DEPARTMENT',
            'href' => 'program-elementary-education.php',
            'source_url' => $base . '/basic-education-department/elementary?authuser=0',
            'parent' => 'basic-education-department',
            'hero_image' => 'upload/beed-hero.png',
            'hero_min_height' => '680px',
            'content' => [
                'The Elementary Department embraces a dynamic, values-driven education by integrating foundational academic subjects with interactive, technology-enhanced learning and faith-based character formation.',
            ],
            'sections' => [
                [
                    'label' => 'Google Site Section',
                    'title' => 'PRE-ELEMENTARY',
                    'cards' => [
                        [
                            'title' => 'Toddler',
                            'image' => 'upload/beed-early-childhood-formators-card.png',
                        ],
                        [
                            'title' => 'Nursery',
                            'image' => 'upload/beed-holistic-enhancement-specialist-card.png',
                        ],
                        [
                            'title' => 'Kindergarten',
                            'image' => 'upload/beed-education-booster-card.png',
                        ],
                    ],
                ],
                [
                    'label' => 'Google Site Section',
                    'title' => 'ELEMENTARY',
                    'cards' => [
                        [
                            'title' => 'Grade 1',
                            'image' => 'upload/beed-training-developer-card.png',
                        ],
                        [
                            'title' => 'Grade 2',
                            'image' => 'upload/beed-academic-consultants-card.png',
                        ],
                        [
                            'title' => 'Grade 3',
                            'image' => 'upload/beed-career-experts-card.png',
                        ],
                        [
                            'title' => 'Grade 4',
                            'image' => 'upload/beed-research-innovators-card.png',
                        ],
                        [
                            'title' => 'Grade 5',
                            'image' => 'upload/beed-holistic-enhancement-specialist-card.png',
                        ],
                        [
                            'title' => 'Grade 6',
                            'image' => 'upload/beed-education-booster-card.png',
                        ],
                    ],
                ],
            ],
            'children' => [],
        ],
    ];

    return $nodes;
}

function stac_departments_top_level_keys(): array
{
    return ['college-department', 'tesda', 'basic-education-department'];
}

function stac_departments_node(string $key): array
{
    $nodes = stac_departments_nodes();

    if (!isset($nodes[$key])) {
        throw new InvalidArgumentException('Unknown department key: ' . $key);
    }

    return $nodes[$key];
}
