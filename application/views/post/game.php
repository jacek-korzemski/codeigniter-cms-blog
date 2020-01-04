<div style="max-width: 760px; margin: 64px auto; border: black; box-shadow: 2px 2px 5px black; padding: 32px;">
<h1> Post - Game </h1>
<hr>
<h2> <?= $title; ?> </h2>
<hr>
<?= $body; ?>
<hr>
<?= $date; ?>
<hr>
<?= $category; ?>
<hr>
Tagi: 
<?php foreach($tags as $tag) { ?>
<br>
<?php echo $tag; ?>
<?php } ?>
</div>