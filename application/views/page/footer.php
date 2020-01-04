<?php if (has_block('footer-top') || has_block('footer-bottom')) { ?>
<footer>
    <div class="container">
        <?php if(has_block('footer-top')) { ?>
        <div class="footer-top">
            <?php load_block('footer-top'); ?>
        </div>
        <?php } ?>
        <?php if(has_block('footer-bottom')) { ?>
        <div class="footer-bottom">
            <?php load_block('footer-bottom'); ?>
        </div>
        <?php } ?>
    </div>
</footer>
<?php } ?>
<?php if(has_block('copyright')) { ?>
<div class="copyright">
    <?php load_block('copyright'); ?>
</div>
<?php } ?>
<script src="assets/js/gradients.js"></script>
</body>
</html>