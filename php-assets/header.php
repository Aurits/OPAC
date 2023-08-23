<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>OPAC</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
    <!-- third party css -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->

    <!-- <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" /> -->

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.php"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-right">
                         <div class="search-style-1">
                        <form action="search-results.php" method="GET">
                            <input type="text" name="search" placeholder="Search for books...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="booking.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="9" cy="21" r="1" />
                                            <circle cx="20" cy="21" r="1" />
                                            <path d="M1 1h4l2.1 10.6a2 2 0 002 1.6h11" />
                                        </svg>


                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.php"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    <?php
                                    require_once "config.php";

                                    // Query to get all categories
                                    $sql = "SELECT * FROM Category";
                                    $result = mysqli_query($link, $sql);

                                    while ($category = mysqli_fetch_assoc($result)) {
                                        echo '<li><a href="categories.php?category=' . $category['Slug'] . '"><i class="surfsidemedia-font-desktop"></i>' . $category['CategoryName'] . '</a></li>';
                                    }
                                    ?>
                                </ul>


                                <div class="more_categories">Show more...</div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav class="ml-200">
                                <ul class="ml-100">
                                    <li><a class="active" href="index.php">Home </a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="book.php">Books</a></li>

                                    <li><a href="blog.php">Blog </a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <?php

                                            if ($_SESSION != NULL) {
                                                if ($_SESSION['role'] == 1) {
                                                    echo '<li><a href="my-account.php">Dashboard</a></li>';
                                                }
                                            }

                                            // Dump the session data
                                            // var_dump($_SESSION);
                                            ?>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>

                                    </li>
                                     <div class="header-info header-info-right">
                            <ul>
                                <li><i class="fi-rs-key"></i><a href="login.php">Log In </a> / <a href="register.php">Sign Up</a></li>
                            </ul>
                        </div>
                                </ul>

                            </nav>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="9" cy="21" r="1" />
                                        <circle cx="20" cy="21" r="1" />
                                        <path d="M1 1h4l2.1 10.6a2 2 0 002 1.6h11" />
                                    </svg>

                                   
                                </a>
                            </div>

                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.php"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                   
                        <form action="search-results.php" method="GET">
                            <input type="text" name="search" placeholder="Search for books...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <?php
                                require_once "config.php";

                                // Query to get all categories
                                $sql = "SELECT * FROM Category";
                                $result = mysqli_query($link, $sql);

                                while ($category = mysqli_fetch_assoc($result)) {
                                    echo '<li><a href="categories.php?category=' . $category['Slug'] . '"><i class="surfsidemedia-font-desktop"></i>' . $category['CategoryName'] . '</a></li>';
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.php">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="book.php">Books</a></li>

                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.php">Blog</a></li>
                        </ul>
                         <div class="header-info header-info-right">
                            <ul>
                                <li><i class="fi-rs-key"></i><a href="login.php">Log In </a> / <a href="register.php">Sign Up</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">

                    <div class="single-mobile-header-info">
                        <a href="login.php">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="register.php">Sign Up</a>
                    </div>

                </div>

            </div>
        </div>
    </div>