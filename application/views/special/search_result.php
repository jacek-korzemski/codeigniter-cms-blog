<?php if (!$results_by_title || $results_by_title == false) { ?>
    <div class="container" style="margin-bottom: 64px; margin-top: 64px;">
        <p> Niestety, w tytułach postów nie znaleźliśmy szukanej frazy. </p>
    </div>
<?php } else { ?>
    <h1 style="padding: 16px 0; text-align: center; background: orange; color: white; margin-bottom: 32px; margin-top: 0;"> Szukanie po tytułach postów: </h1>
    <div class="container">
        <?php foreach($results_by_title as $res) { ?>
            <h2> <?php echo $res['title']; ?> </h2>
            <p style="font-size: 10px; margin: -16px 0 0 0;"><strong>Meta: </strong>ID: <?php echo $res['id']; ?> | slug: <?php echo $res['post_slug']; ?> | date: <?php echo $res['created_at']; ?></p>
            <div style="padding-bottom: 32px; border-bottom: 1px solid rgba(0,0,0,0.5);">
                <?php echo $res['body']; ?>
                <a style="padding: 8px 16px; border: 1px solid black; display: inline-block; color: black; text-decoration: none;" href="/<?php echo $res['full_link']; ?>">
                    Czytaj więcej
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<?php if (!$results_by_body || $results_by_body == false) { ?>
    <div class="container" style="margin-bottom: 164px;">
        <p style="margin-top: 32px;"> Niestety, w treści postów nie znaleźliśmy szukanej frazy. </p>
    </div>
<?php } else { ?>
    <h1 style="padding: 16px 0; text-align: center; background: blueviolet; color: white; margin-bottom: 32px; margin-top: 0;"> Szukanie w treści postów </h1>
    <div class="container">
        <?php foreach($results_by_body as $res) { ?>
            <h2> <?php echo $res['title']; ?> </h2>
            <p style="font-size: 10px; margin: -16px 0 0 0;"><strong>Meta: </strong>ID: <?php echo $res['id']; ?> | slug: <?php echo $res['post_slug']; ?> | date: <?php echo $res['created_at']; ?></p>
            <div style="padding-bottom: 32px; border-bottom: 1px solid rgba(0,0,0,0.5);">
                <?php echo $res['body']; ?>
                <a style="padding: 8px 16px; border: 1px solid black; display: inline-block; color: black; text-decoration: none;" href="/<?php echo $res['full_link']; ?>">
                    Czytaj więcej
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>