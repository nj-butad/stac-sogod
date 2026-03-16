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
    $currentPage = basename(parse_url($_SERVER["REQUEST_URI"] ?? "", PHP_URL_PATH) ?: ($_SERVER["SCRIPT_NAME"] ?? "index.php"));
    $isHome = ($currentPage === "" || $currentPage === "index.php");
    $isAbout = ($currentPage === "about-us.php");
    $isContact = in_array($currentPage, ["contact.php", "contact-2.php", "contact-3.php"], true);
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
                                <li class="menu-item<?= $isAbout ? " current-menu-item" : "" ?>"><a href="about-us.php">About</a>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="bachelor-of-science-in-business-administration.php">Academics</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item menu-item-has-children"><a>Undergraduate</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="bachelor-of-science-in-business-administration.php">Business Administration</a></li>
                                                <li class="menu-item"><a href="school-of-law.php">School Of Law</a></li>
                                                <li class="menu-item"><a href="engineering.php">Engineering</a></li>
                                                <li class="menu-item"><a href="medicine.php">Medicine</a></li>
                                                <li class="menu-item"><a href="art-science.php">Art &#038; Science</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children"><a href="#">Graduate Program</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="hospitality-management.php">Hospitality Management</a></li>
                                                <li class="menu-item"><a href="physics.php">Physics</a></li>
                                                <li class="menu-item"><a href="#">Chemistry</a></li>
                                                <li class="menu-item"><a href="#">Music</a></li>
                                                <li class="menu-item"><a href="#">Computer Science</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children"><a href="#">Resources</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a href="bachelor-of-science-in-business-administration.php">Department Page</a></li>
                                                <li class="menu-item"><a href="finance.php">Major Page</a></li>
                                                <li class="menu-item"><a href="finance-faculty.php">Faculty Page</a></li>
                                                <li class="menu-item"><a href="john-hagensy-phd.php">Single Instructor</a></li>
                                                <li class="menu-item"><a href="introduction-to-financial-accounting.php">Single Course</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a href="#">Logo</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="apply-to-kingster.php">Admissions</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="apply-to-kingster.php">Apply Now</a></li>
                                        <li class="menu-item"><a href="campus-tour.php">Campus Tour</a></li>
                                        <li class="menu-item"><a href="scholarships.php">Scholarships</a></li>                                        <li class="menu-item"><a href="give-to-kingster.php">Support Us</a></li>
                                        <li class="menu-item"><a href="index.php">Alumni</a></li>
                                        <li class="menu-item"><a href="index.php">Event Calendar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">Courses</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="index.php">Course List 1</a></li>
                                        <li class="menu-item"><a href="index.php">Course List 2</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item<?= $isContact ? " current-menu-item" : "" ?>"><a href="contact.php">Contact</a></li>
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
                                    <li class="menu-item kingster-normal-menu<?= $isAbout ? " current-menu-item" : "" ?>"><a href="about-us.php">About</a>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-mega-menu"><a href="bachelor-of-science-in-business-administration.php" class="sf-with-ul-pre">Academics</a>
                                        <div class="sf-mega sf-mega-full megaimg">
                                            <ul class="sub-menu">
                                                <li class="menu-item menu-item-has-children" data-size="15"><a class="sf-with-ul-pre">Undergraduate</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="bachelor-of-science-in-business-administration.php">Business Administration</a></li>
                                                        <li class="menu-item"><a href="school-of-law.php">School Of Law</a></li>
                                                        <li class="menu-item"><a href="engineering.php">Engineering</a></li>
                                                        <li class="menu-item"><a href="medicine.php">Medicine</a></li>
                                                        <li class="menu-item"><a href="art-science.php">Art &#038; Science</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children" data-size="15"><a href="#" class="sf-with-ul-pre">Graduate Program</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="hospitality-management.php">Hospitality Management</a></li>
                                                        <li class="menu-item"><a href="physics.php">Physics</a></li>
                                                        <li class="menu-item"><a href="#">Chemistry</a></li>
                                                        <li class="menu-item"><a href="#">Music</a></li>
                                                        <li class="menu-item"><a href="#">Computer Science</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item menu-item-has-children" data-size="15"><a href="#" class="sf-with-ul-pre">Resources</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item"><a href="bachelor-of-science-in-business-administration.php">Department Page</a></li>
                                                        <li class="menu-item"><a href="finance.php">Major Page</a></li>
                                                        <li class="menu-item"><a href="finance-faculty.php">Faculty Page</a></li>
                                                        <li class="menu-item"><a href="john-hagensy-phd.php">Single Instructor</a></li>
                                                        <li class="menu-item"><a href="introduction-to-financial-accounting.php">Single Course</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item" data-size="15">
                                                    <div class="kingster-mega-menu-section-content"><img src="images/stac logo.jpg" id="img_983a_0" alt="" /> <span id="span_983a_0">Academic offerings include 95 majors, 86 minors, and more than 100 in-major specializations</span></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu"><a href="apply-to-kingster.php" class="sf-with-ul-pre">Admissions</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="apply-to-kingster.php">Apply Now</a></li>
                                            <li class="menu-item" data-size="60"><a href="campus-tour.php">Campus Tour</a></li>
                                            <li class="menu-item" data-size="60"><a href="scholarships.php">Scholarships</a></li>
                                            
                                            <li class="menu-item" data-size="60"><a href="give-to-kingster.php">Support Us</a></li>
                                            <li class="menu-item" data-size="60"><a href="index.php">Alumni</a></li>
                                            <li class="menu-item" data-size="60"><a href="index.php">Event Calendar</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Courses</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="index.php">Course List 1</a></li>
                                            <li class="menu-item" data-size="60"><a href="index.php">Course List 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item kingster-normal-menu<?= $isContact ? " current-menu-item" : "" ?>"><a href="contact.php">Contact</a></li>
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
