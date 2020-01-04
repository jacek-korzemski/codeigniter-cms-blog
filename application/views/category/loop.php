<?php // Posts loop start ?>
<?php if ($posts != null) { ?>
<?php foreach ($posts as $post) { ?>


<?php // Post Template start ?>
<div class="article">
    <h2><a href="/<?= $post['full_link']; ?>"><?= $post['title']; ?></a></h2>
    <img src="<?= $post['image']; ?>" alt="<?= $post['title']; ?>" style="max-width: 100%; height: auto;" />
    <p style="text-align: center;"><a href="/<?= $post['full_link']; ?>">Czytaj więcej</a></p>
</div>
<?php // END Post template ?>


<?php } ?>
<?php } ?>
<?php // END Posts loop ?>