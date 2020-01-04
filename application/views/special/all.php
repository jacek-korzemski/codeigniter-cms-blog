<h2> Strony </h2>

<ul>
<?php foreach ($pages as $page) { ?>
    <li><a href="/p-<?= $page['slug']; ?>"><?= $page['title']; ?></a></li>
<?php } ?>
</ul>

<h2> Kategorie </h2>

<ul>
<?php foreach ($categories as $category) { ?>
    <li><a href="/c-<?= $category['cat_slug']; ?>"><?= $category['name']; ?></a></li>
<?php } ?>
</ul>

<h2> Posty </h2>

<ul>
<?php foreach ($posts as $post) { ?>

    <li><a href="/c-<?php echo get_category_slug($post['category_id']); ?>/<?= $post['post_slug']; ?>"><?= $post['title']; ?></a></li>

<?php } ?>
</ul>