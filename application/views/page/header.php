<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $seo_title; ?></title>
    <meta name="description" content="<?= $seo_desc; ?>" />
    <meta name="robots" content="<?= $seo_robots; ?>" />

    <base href="/" />
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CMouse+Memoirs&display=swap" rel="stylesheet">
    <style>
        * {font-family: "Fira Sans", sans-serif;}
        h1, h2, h3, h4, h5, h6 {font-family: "Mouse Memoirs", sans-serif; font-weight: 100;}
    </style>


    <link rel="stylesheet" href="assets/css/framework.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <div class="top-bar">
        <div class="container flex-row flex-justify-between flex-align-center">
            <?php if(has_block('logo')) { ?>
            <div class="logo">
                <?php load_block('logo'); ?>
            </div>
            <?php } ?>
            <div class="navigation">
                <?php if(has_block('main-nav')) { ?>
                <nav>
                    <?php load_block('main-nav'); ?>
                </nav>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if(has_block('hero')) { ?>
    <div class="hero">
        <?php load_block('hero'); ?>
    </div>
    <?php } ?>