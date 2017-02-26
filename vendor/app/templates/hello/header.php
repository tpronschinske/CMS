<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<?php use Helpers\Menu; ?>
<head>
	<!-- Site meta -->
	<meta charset="utf-8">
    <?php echo('<title>'. $data['title'].' - '.SITETITLE .'</title>'); ?>
    <?php echo('<meta name="description" content="'.  $data['metaDescription'] .'">'); ?>
    <?php echo('<meta name="keywords" content="'.  $data['metaKeyword'] .'">'); ?>
    <?php require_once('_head.php'); ?>
</head>

<body>

<header>
    <div class="wrapper">
        <?php echo Menu::getMenu(10); ?>
    </div>
</header>

<main class="content">
    <div class="wrapper">
