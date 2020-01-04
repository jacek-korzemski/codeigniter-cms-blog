<div class="content">
    <h1> Kategorie </h1>
    <p><a href="admin/categories/add" class="button">Dodaj kategorię +</a></span></p>
    <table style="margin-top: 32px; border: 1px solid black;">
        <tr>
            <td>ID</td>
            <td>Nazwa</td>
            <td colspan=2>Akcja</td>
        </tr>
    <?php foreach ($list as $elem) { ?>
        <tr>
            <td><?php echo $elem['id']; ?></td>
            <td><?php echo $elem['name']; ?></td>
            <td>
                <a href="/c-<?= $elem['cat_slug']; ?>" target="_blank">Podgląd</a> | 
                <a href="admin/categories/edit/<?= $elem['id']; ?>">Edytuj</a>
            </td>
            <td>
            <?php echo form_open('admin/categories/delete/'.$elem['id']); ?>
                <input type="submit" value="Usuń" />
            </form>
            </td>
        </tr>
    <?php } ?>
    </table> 
</div>