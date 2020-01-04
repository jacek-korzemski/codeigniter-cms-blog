<?php if ($image != '') { ?>
<header class="header-home" style="background: url('<?= $image; ?>'); background-size: cover; background-position: center bottom;">
    <h1><?= $name; ?></h1>
    <?= $description; ?>
</header>
<?php } else { ?>
<header class="header-home">
    <h1><?= $name; ?></h1>
    <?= $description; ?>
</header>
<?php } ?>
<div class="container">
<?php include __DIR__.'/loop.php'; ?>
</div>

<div style="clear: both;"></div>