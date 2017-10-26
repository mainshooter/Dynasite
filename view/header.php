<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Home | Demo Site</title>
    <link rel="stylesheet" href="<?php echo $GLOBALS['config']['base_url'] ?>view/style/style.css">
</head>
<body class="home-page sidebar-layout">
    <header id="header">
        <h2 class="site-title">Demo Site</h2>
    </header>

    <nav id="main-nav">
        <ul>
            <li class="active"><a href="<?php echo $GLOBALS['config']['base_url'] ?>">Home</a></li>
            <li><a href="<?php echo $GLOBALS['config']['base_url'] ?>page/goto/about">About</a></li>
            <li><a href="<?php echo $GLOBALS['config']['base_url'] ?>page/goto/contact">Contact</a></li>
        </ul>
    </nav>
