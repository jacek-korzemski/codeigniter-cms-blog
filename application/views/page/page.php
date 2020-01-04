<div class="page-header grad-overlay min-height-300" data-grad='grad-1' data-grad-opacity="1">
    <div class="container">
        <h1><?= $title; ?></h1>
    </div>
</div>

<main class="page-page">
    <div class="container">
        <?php if(has_block('over-content')) { ?>
        <div class="over-content">
            <?php load_block('over-content'); ?>
        </div>
        <?php } ?>
        <div class="page-content">
            <?= $content; ?>
        </div>
    </div>
    <?php if(has_block('under-content')) { ?>
    <div class="under-content">
        <?php load_block('under-content'); ?>
    </div>
    <?php } ?>
</main>