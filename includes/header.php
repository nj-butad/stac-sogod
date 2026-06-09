<!DOCTYPE html>
<html lang="en-US" class="no-js">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($pageTitle ?? "Saint Thomas Aquinas College", ENT_QUOTES, "UTF-8") ?></title>
    <link rel="icon" type="image/jpeg" href="images/stac%20logo.jpg">
    <link rel="apple-touch-icon" href="images/stac%20logo.jpg">

    <link rel='stylesheet' href='plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style-core.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/kingster-style-custom.css' type='text/css' media='all' />

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />

</head>

<body class="<?= htmlspecialchars($bodyClass ?? "home page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full kingster-with-sticky-navigation kingster-blockquote-style-1 gdlr-core-link-to-lightbox", ENT_QUOTES, "UTF-8") ?>">
    <?php
    require_once __DIR__ . '/departments-data.php';
    require_once __DIR__ . '/offices-data.php';
    require_once __DIR__ . '/research-data.php';
    require_once __DIR__ . '/sdg-gad-data.php';
    require_once __DIR__ . '/about-data.php';
    $currentPage = basename(parse_url($_SERVER["REQUEST_URI"] ?? "", PHP_URL_PATH) ?: ($_SERVER["SCRIPT_NAME"] ?? "index.php"));
    $isHome = ($currentPage === "" || $currentPage === "index.php");
    $aboutCurrentKey = null;
    foreach (stac_about_nodes() as $aboutKey => $aboutNode) {
        if (basename($aboutNode['href']) === $currentPage) {
            $aboutCurrentKey = $aboutKey;
            break;
        }
    }
    $isAbout = ($aboutCurrentKey !== null || in_array($currentPage, ["thomasian-identity.php", "organizational-structure.php"], true));
    $isContact = in_array($currentPage, ["contact.php", "contact-2.php", "contact-3.php"], true);
    if (!function_exists('stac_header_render_about_menu_items')) {
        function stac_header_render_about_menu_items(string $parentKey, ?string $aboutCurrentKey, bool $desktop = false): void
        {
            $parentNode = stac_about_node($parentKey);
            foreach ($parentNode['children'] as $childKey) {
                $childNode = stac_about_node($childKey);
                $hasChildren = !empty($childNode['children']);
                $isCurrent = ($aboutCurrentKey === $childKey) || ($aboutCurrentKey !== null && stac_about_is_descendant($aboutCurrentKey, $childKey));
                $classes = 'menu-item' . ($hasChildren ? ' menu-item-has-children' : '') . ($desktop ? ' kingster-normal-menu' : '') . ($isCurrent ? ' current-menu-item current-menu-ancestor' : '');
                $dataSize = $desktop ? ' data-size="60"' : '';
                $linkClass = ($desktop && $hasChildren) ? ' class="sf-with-ul-pre"' : '';
                echo '<li class="' . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . '"' . $dataSize . '><a href="' . htmlspecialchars($childNode['href'], ENT_QUOTES, 'UTF-8') . '"' . $linkClass . '>' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a>';
                if ($hasChildren) {
                    echo '<ul class="sub-menu">';
                    stac_header_render_about_menu_items($childKey, $aboutCurrentKey, $desktop);
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }
    $departmentsUrl = "program-offerings.php";
    $departmentsTopLevelKeys = stac_departments_top_level_keys();
    $departmentCurrentKey = null;
    foreach (stac_departments_nodes() as $departmentKey => $departmentNode) {
        if (basename($departmentNode['href']) === $currentPage) {
            $departmentCurrentKey = $departmentKey;
            break;
        }
    }
    $isDepartments = ($currentPage === basename($departmentsUrl) || $departmentCurrentKey !== null);
    $officesUrl = "offices.php";
    $officeCurrentKey = null;
    foreach (stac_offices_nodes() as $officeKey => $officeNode) {
        if (basename($officeNode['href']) === $currentPage) {
            $officeCurrentKey = $officeKey;
            break;
        }
    }
    $isOffices = ($currentPage === basename($officesUrl) || $officeCurrentKey !== null);
    $researchUrl = "research-publication-and-innovation.php";
    $researchCurrentKey = null;
    foreach (stac_research_nodes() as $researchKey => $researchNode) {
        if (basename($researchNode['href']) === $currentPage) {
            $researchCurrentKey = $researchKey;
            break;
        }
    }
    $isResearch = ($currentPage === basename($researchUrl) || $researchCurrentKey !== null);
    $sdgGadUrl = "sdg-and-gad-office.php";
    $sdgGadCurrentKey = null;
    foreach (stac_sdg_gad_nodes() as $sdgGadKey => $sdgGadNode) {
        if (basename($sdgGadNode['href']) === $currentPage) {
            $sdgGadCurrentKey = $sdgGadKey;
            break;
        }
    }
    $isSdgGad = ($currentPage === basename($sdgGadUrl) || $sdgGadCurrentKey !== null);

    if (!function_exists('stac_header_render_office_menu_items')) {
        function stac_header_render_office_menu_items(string $parentKey, ?string $officeCurrentKey, bool $desktop = false): void
        {
            $parentNode = stac_offices_node($parentKey);
            foreach ($parentNode['children'] as $childKey) {
                $childNode = stac_offices_node($childKey);
                $hasChildren = !empty($childNode['children']);
                $isCurrent = ($officeCurrentKey === $childKey) || ($officeCurrentKey !== null && stac_offices_is_descendant($officeCurrentKey, $childKey));
                $classes = 'menu-item' . ($hasChildren ? ' menu-item-has-children' : '') . ($desktop ? ' kingster-normal-menu' : '') . ($isCurrent ? ' current-menu-item current-menu-ancestor' : '');
                $dataSize = $desktop ? ' data-size="60"' : '';
                $linkClass = ($desktop && $hasChildren) ? ' class="sf-with-ul-pre"' : '';
                echo '<li class="' . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . '"' . $dataSize . '><a href="' . htmlspecialchars($childNode['href'], ENT_QUOTES, 'UTF-8') . '"' . $linkClass . '>' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a>';
                if ($hasChildren) {
                    echo '<ul class="sub-menu">';
                    stac_header_render_office_menu_items($childKey, $officeCurrentKey, $desktop);
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }
    if (!function_exists('stac_header_render_sdg_gad_menu_items')) {
        function stac_header_render_sdg_gad_menu_items(string $parentKey, ?string $sdgGadCurrentKey, bool $desktop = false): void
        {
            $parentNode = stac_sdg_gad_node($parentKey);
            foreach ($parentNode['children'] as $childKey) {
                $childNode = stac_sdg_gad_node($childKey);
                $hasChildren = !empty($childNode['children']);
                $isCurrent = ($sdgGadCurrentKey === $childKey) || ($sdgGadCurrentKey !== null && stac_sdg_gad_is_descendant($sdgGadCurrentKey, $childKey));
                $classes = 'menu-item' . ($hasChildren ? ' menu-item-has-children' : '') . ($desktop ? ' kingster-normal-menu' : '') . ($isCurrent ? ' current-menu-item current-menu-ancestor' : '');
                $dataSize = $desktop ? ' data-size="60"' : '';
                $linkClass = ($desktop && $hasChildren) ? ' class="sf-with-ul-pre"' : '';
                echo '<li class="' . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . '"' . $dataSize . '><a href="' . htmlspecialchars($childNode['href'], ENT_QUOTES, 'UTF-8') . '"' . $linkClass . '>' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</a>';
                if ($hasChildren) {
                    echo '<ul class="sub-menu">';
                    stac_header_render_sdg_gad_menu_items($childKey, $sdgGadCurrentKey, $desktop);
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }
    ?>
    <div class="kingster-mobile-header-wrap">
        <div class="kingster-mobile-header kingster-header-background kingster-style-slide kingster-sticky-mobile-navigation " id="kingster-mobile-header">
            <div class="kingster-mobile-header-container kingster-container clearfix">
                <div class="kingster-logo  kingster-item-pdlr">
                    <div class="kingster-logo-inner">
                        <a class="stac-brand-lockup" href="index.php"><img src="images/stac logo.jpg" alt="Saint Thomas Aquinas College seal" /><span class="stac-brand-copy"><span class="stac-brand-text">SAINT THOMAS AQUINAS COLLEGE</span><span class="stac-brand-subtext">Sogod, So. Leyte</span></span></a>
                    </div>
                </div>
                <div class="kingster-mobile-menu-right">
                    <div class="kingster-main-menu-search" id="kingster-mobile-top-search"><i class="fa fa-search"></i></div>
                    <div class="kingster-top-search-wrap">
                        <div class="kingster-top-search-close"></div>
                        <div class="kingster-top-search-row">
                            <div class="kingster-top-search-cell">
                                <form role="search" method="get" class="search-form" action="#">
                                    <input type="text" class="search-field kingster-title-font" placeholder="Search..." value="" name="s">
                                    <div class="kingster-top-search-submit"><i class="fa fa-search"></i></div>
                                    <input type="submit" class="search-submit" value="Search">
                                    <div class="kingster-top-search-close"><i class="icon_close"></i></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="kingster-mobile-menu"><a class="kingster-mm-menu-button kingster-mobile-menu-button kingster-mobile-button-hamburger" href="#kingster-mobile-menu"><span></span></a>
                        <div class="kingster-mm-menu-wrap kingster-navigation-font" id="kingster-mobile-menu" data-slide="right">
                            <ul id="menu-main-navigation" class="m-menu">
                                <li class="menu-item menu-item-home<?= $isHome ? " current-menu-item" : "" ?>"><a href="index.php">Home</a>
                                </li>
                                <li class="menu-item menu-item-has-children<?= $isAbout ? " current-menu-item" : "" ?>"><a href="about-us.php">About</a>
                                    <ul class="sub-menu">
                                        <?php stac_header_render_about_menu_items('about-us', $aboutCurrentKey, false); ?>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children<?= $isDepartments ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($departmentsUrl, ENT_QUOTES, "UTF-8") ?>">Departments</a>
                                    <ul class="sub-menu">
                                        <?php foreach ($departmentsTopLevelKeys as $topLevelKey): ?>
                                            <?php $topLevelNode = stac_departments_node($topLevelKey); ?>
                                            <?php $isTopLevelCurrent = ($departmentCurrentKey === $topLevelKey) || ($departmentCurrentKey !== null && in_array($departmentCurrentKey, $topLevelNode['children'], true)); ?>
                                            <li class="menu-item menu-item-has-children<?= $isTopLevelCurrent ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($topLevelNode['href'], ENT_QUOTES, "UTF-8") ?>"><?= htmlspecialchars($topLevelNode['title'], ENT_QUOTES, "UTF-8") ?></a>
                                                <?php if (!empty($topLevelNode['children'])): ?>
                                                    <ul class="sub-menu">
                                                        <?php foreach ($topLevelNode['children'] as $childKey): ?>
                                                            <?php $childNode = stac_departments_node($childKey); ?>
                                                            <li class="menu-item<?= $departmentCurrentKey === $childKey ? " current-menu-item" : "" ?>"><a href="<?= htmlspecialchars($childNode['href'], ENT_QUOTES, "UTF-8") ?>"><?= htmlspecialchars($childNode['title'], ENT_QUOTES, "UTF-8") ?></a></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children<?= $isOffices ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($officesUrl, ENT_QUOTES, "UTF-8") ?>">Offices</a>
                                    <ul class="sub-menu">
                                        <?php stac_header_render_office_menu_items('offices', $officeCurrentKey, false); ?>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children<?= $isResearch ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($researchUrl, ENT_QUOTES, "UTF-8") ?>">Research</a>
                                    <ul class="sub-menu">
                                        <?php foreach (stac_research_node('research-publication-and-innovation')['children'] as $childKey): ?>
                                            <?php $childNode = stac_research_node($childKey); ?>
                                            <li class="menu-item<?= $researchCurrentKey === $childKey ? " current-menu-item" : "" ?>"><a href="<?= htmlspecialchars($childNode['href'], ENT_QUOTES, "UTF-8") ?>"><?= htmlspecialchars($childNode['title'], ENT_QUOTES, "UTF-8") ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children<?= $isSdgGad ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($sdgGadUrl, ENT_QUOTES, "UTF-8") ?>">SDG/GAD</a>
                                    <ul class="sub-menu">
                                        <?php stac_header_render_sdg_gad_menu_items('sdg-gad-office', $sdgGadCurrentKey, false); ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kingster-body-outer-wrapper ">
        <div class="kingster-body-wrapper clearfix  kingster-with-frame">
            <div class="kingster-top-bar">
                <div class="kingster-top-bar-background"></div>
                <div class="kingster-top-bar-container kingster-container ">
                    <div class="kingster-top-bar-container-inner clearfix">
                        <div class="kingster-top-bar-left kingster-item-pdlr"><i class="fa fa-envelope-open-o" id="i_983a_0"></i> Email: admin@stacsogod.edu.ph <i class="fa fa-phone" id="i_983a_1"></i> Phone: 0953 560 8222</div>
                        <div class="kingster-top-bar-right kingster-item-pdlr">
                            <ul id="kingster-top-bar-menu" class="sf-menu kingster-top-bar-menu kingster-top-bar-right-menu">
                                <li class="menu-item kingster-normal-menu"><a href="#">Alumni</a></li>
                                <li class="menu-item kingster-normal-menu"><a href="#">Calendar</a></li>
                                <li class="menu-item kingster-normal-menu"><a href="#">Portal</a></li>
                                <li class="menu-item kingster-normal-menu<?= $isContact ? " current-menu-item" : "" ?>"><a href="contact.php">Contact</a></li>
                            </ul>
                            <div class="kingster-top-bar-right-social"></div><a class="kingster-top-bar-right-button" href="#" target="_blank">Support Us</a></div>
                    </div>
                </div>
            </div>
            <header class="kingster-header-wrap kingster-header-style-plain  kingster-style-menu-right kingster-sticky-navigation kingster-style-fixed" data-navigation-offset="75px">
                <div class="kingster-header-background"></div>
                <div class="kingster-header-container  kingster-container">
                    <div class="kingster-header-container-inner clearfix">
                        <div class="kingster-logo  kingster-item-pdlr">
                            <div class="kingster-logo-inner">
                                <a class="stac-brand-lockup" href="index.php"><img src="images/stac logo.jpg" alt="Saint Thomas Aquinas College seal" /><span class="stac-brand-copy"><span class="stac-brand-text">SAINT THOMAS AQUINAS COLLEGE</span><span class="stac-brand-subtext">Sogod, So. Leyte</span></span></a>
                            </div>
                        </div>
                        <div class="kingster-navigation kingster-item-pdlr clearfix ">
                            <div class="kingster-main-menu" id="kingster-main-menu">
                                <ul id="menu-main-navigation-1" class="sf-menu">
                                    <li class="menu-item menu-item-home kingster-normal-menu<?= $isHome ? " current-menu-item" : "" ?>"><a href="index.php">Home</a>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu<?= $isAbout ? " current-menu-item" : "" ?>"><a href="about-us.php" class="sf-with-ul-pre">About</a>
                                        <ul class="sub-menu">
                                            <?php stac_header_render_about_menu_items('about-us', $aboutCurrentKey, true); ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu<?= $isDepartments ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($departmentsUrl, ENT_QUOTES, "UTF-8") ?>" class="sf-with-ul-pre">Departments</a>
                                        <ul class="sub-menu">
                                            <?php foreach ($departmentsTopLevelKeys as $topLevelKey): ?>
                                                <?php $topLevelNode = stac_departments_node($topLevelKey); ?>
                                                <?php $isTopLevelCurrent = ($departmentCurrentKey === $topLevelKey) || ($departmentCurrentKey !== null && in_array($departmentCurrentKey, $topLevelNode['children'], true)); ?>
                                                <li class="menu-item menu-item-has-children kingster-normal-menu<?= $isTopLevelCurrent ? " current-menu-item current-menu-ancestor" : "" ?>" data-size="60"><a href="<?= htmlspecialchars($topLevelNode['href'], ENT_QUOTES, "UTF-8") ?>" class="sf-with-ul-pre"><?= htmlspecialchars($topLevelNode['title'], ENT_QUOTES, "UTF-8") ?></a>
                                                    <?php if (!empty($topLevelNode['children'])): ?>
                                                        <ul class="sub-menu">
                                                            <?php foreach ($topLevelNode['children'] as $childKey): ?>
                                                                <?php $childNode = stac_departments_node($childKey); ?>
                                                                <li class="menu-item<?= $departmentCurrentKey === $childKey ? " current-menu-item" : "" ?>" data-size="60"><a href="<?= htmlspecialchars($childNode['href'], ENT_QUOTES, "UTF-8") ?>"><?= htmlspecialchars($childNode['title'], ENT_QUOTES, "UTF-8") ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu<?= $isOffices ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($officesUrl, ENT_QUOTES, "UTF-8") ?>" class="sf-with-ul-pre">Offices</a>
                                        <ul class="sub-menu">
                                            <?php stac_header_render_office_menu_items('offices', $officeCurrentKey, true); ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu<?= $isResearch ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($researchUrl, ENT_QUOTES, "UTF-8") ?>" class="sf-with-ul-pre">Research</a>
                                        <ul class="sub-menu">
                                            <?php foreach (stac_research_node('research-publication-and-innovation')['children'] as $childKey): ?>
                                                <?php $childNode = stac_research_node($childKey); ?>
                                                <li class="menu-item<?= $researchCurrentKey === $childKey ? " current-menu-item" : "" ?>" data-size="60"><a href="<?= htmlspecialchars($childNode['href'], ENT_QUOTES, "UTF-8") ?>"><?= htmlspecialchars($childNode['title'], ENT_QUOTES, "UTF-8") ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu<?= $isSdgGad ? " current-menu-item current-menu-ancestor" : "" ?>"><a href="<?= htmlspecialchars($sdgGadUrl, ENT_QUOTES, "UTF-8") ?>" class="sf-with-ul-pre">SDG/GAD</a>
                                        <ul class="sub-menu">
                                            <?php stac_header_render_sdg_gad_menu_items('sdg-gad-office', $sdgGadCurrentKey, true); ?>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="kingster-navigation-slide-bar" id="kingster-navigation-slide-bar"></div>
                            </div>
                            <div class="kingster-main-menu-right-wrap clearfix ">
                                <div class="kingster-main-menu-search" id="kingster-top-search"><i class="icon_search"></i></div>
                                <div class="kingster-top-search-wrap">
                                    <div class="kingster-top-search-close"></div>
                                    <div class="kingster-top-search-row">
                                        <div class="kingster-top-search-cell">
                                            <form role="search" method="get" class="search-form" action="#">
                                                <input type="text" class="search-field kingster-title-font" placeholder="Search..." value="" name="s">
                                                <div class="kingster-top-search-submit"><i class="fa fa-search"></i></div>
                                                <input type="submit" class="search-submit" value="Search">
                                                <div class="kingster-top-search-close"><i class="icon_close"></i></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="gdlr-core-page-builder-body">
