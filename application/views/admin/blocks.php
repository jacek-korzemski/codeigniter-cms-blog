<div class="content">
    <h1> Bloki </h1>
    <p> Zarządzaj blokami wyświetlany globalnie w obrębie witryny. </p>
    <p><a href="admin/blocks/add" class="button">Dodaj blok +</a></span></p>
    <table style="margin-top: 32px; border: 1px solid black;">
        <tr>
            <td>ID</td>
            <td>Tytuł</td>
            <td colspan=2>Akcja</td>
        </tr>
    <?php foreach ($list as $elem) { ?>
        <tr>
            <td><?php echo $elem['id']; ?></td>
            <td><?php echo $elem['name']; ?></td>
            <td><a href="admin/blocks/edit/<?= $elem['id']; ?>">Edytuj</a></td>
            <td>

                <?php echo form_open('admin/blocks/delete/'.$elem['id']); ?>
                    <input type="submit" value="Usuń" />
                </form>

            </td>
        </tr>
    <?php } ?>
    </table> 
</div>