<div class="content">
    <h1> Posty </h1>
    <p><a href="admin/posts/add" class="button">Dodaj post +</a></span></p>
    <table style="margin-top: 32px; border: 1px solid black;">
        <tr>
            <td>ID</td>
            <td>Tytuł</td>
            <td>Kategoria</td>
            <td colspan=2>Akcja</td>
        </tr>
    <?php foreach ($list as $elem) { ?>
        <?php if (get_category_name($elem['category_id']) == '' || get_category_name($elem['category_id']) == false || get_category_name($elem['category_id']) == null) { ?>
        <tr style="background: rgba(255,120,0,0.4);">
        <?php } else { ?>
        <tr>
        <?php } ?>
            <td><?php echo $elem['id']; ?></td>
            <td><?php echo $elem['title']; ?></td>
            <td><?php echo get_category_name($elem['category_id']);  ?></td>
            <td>
                <a href="/<?php echo $elem['full_link']; ?>" target="_blank">Podgląd</a> | 
                <a href="admin/posts/edit/<?= $elem['id']; ?>">Edytuj</a>
            </td>
            <td>
                <?php echo form_open('admin/posts/delete/'.$elem['id']); ?>
                    <input type="submit" value="Usuń" />
                </form>
            </td>
        </tr>
    <?php } ?>
    </table> 
</div>