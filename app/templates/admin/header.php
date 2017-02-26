<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
    <?php require('_head.php'); ?>
</head>

<body>
	 <div class="application">
        <header class="application_tob-bar">
            <div class="row">
                <div class="col_4">
                    <div class="application_name">
                        Juno
                    </div>
                </div>
                <div class="col_8">
                    <div class="top-bar_actions">
                        <a href=""><i class="material-icons">help_outline</i></a>
                        <a href=""><i class="material-icons">person</i></a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="application_main">
			  <aside class="application_side-nav">
                <nav class="application_navigation">
                    <ul class="main_nav">
                        <li class="main_nav_item"><a href="/qadmin">Dashboard</a></li>
                        <li class="main_nav_item"><a>Articles </a><span class="sub-nav-dropdown"><i class="material-icons">keyboard_arrow_down</i></span>
                            <ul class="main_nav_sub">
                                <li class="main_nav_sub__item"><a href="/qadmin/articles">View Articles</a></li>
                                <li class="main_nav_sub__item"><a href="/qadmin/articles/add">New Article</a></li>
                                <li class="main_nav_sub__item"><a href="/qadmin/categories">Categories</a></li>
                            </ul>
                        </li>
                        <li class="main_nav_item"><a href="/qadmin/pages">Pages</a></li>
                        <li class="main_nav_item"><a href="/qadmin/media">Media</a></li>
                        <li class="main_nav_item"><a href="/qadmin/menu">Menu</a></li>
                        <li class="main_nav_item"><a href="/qadmin/content-area">Content Area</a></li>
                        <li class="main_nav_item"><a>Settings </a><span class="sub-nav-dropdown"><i class="material-icons">keyboard_arrow_down</i></span>
                            <ul class="main_nav_sub">
                                <li class="main_nav_sub__item"><a href="/qadmin/theme-settings">Theme Settings</a></li>
                                <li class="main_nav_sub__item"><a href="/qadmin/site-settings">Site Settings</a></li>
                                <li class="main_nav_sub__item"><a href="/qadmin/email-settings">Email Settings</a></li>
                                <li class="main_nav_sub__item"><a href="/qadmin/user-settings">User Settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </aside>
            <div class="application_content-area">
                <div class="loading">
                    <div class="loading_background_full">
                        <div class="loading_bar"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="wrapper">
                        