<?php $promo_posts = get_promo_posts_data(); ?>
<?php $rando_posts = get_random_posts_data(); ?>

<header class="header-home" style="background: url('/assets/images/cloud.jpg'); background-size: cover; background-position: center bottom;">
    <h1> FajnaSprawa.pl </h1>
    <h2> Portal o wszystkim co fajne! </h2>
    <p> Można powiedzieć że planuję sobie tutaj zrobić fajny portal, o tym co lubię i co chciałbym polecić bliskim, a także dalekim. </p>
</header>
<main class="page-home">
    <div class="container">
        <?php if (has_block('over-content')) { ?>
            <div class="over-content">
                <?php load_block('over-content'); ?>
            </div>
        <?php } ?>
        <div class="home-content">
            <?= $content; ?>
        </div>
    </div>
    <?php if(has_block('under-content')) { ?>
        <div class="under-content">
            <?php load_block('under-content'); ?>
        </div>
    <?php } ?>
</main>