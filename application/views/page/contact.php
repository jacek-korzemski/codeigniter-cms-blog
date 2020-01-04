<main class="page-page">
    <div class="container">
        <?php if (has_block('over-content')) { ?>
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