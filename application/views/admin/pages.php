<div class="content">
    <h1> Strony informacyjne </h1>
    <p> Możesz w tym panelu edytować oraz dodawać nowe strony. Pamiętaj, że po dodaniu nowej strony, należy ją ręcznie dodać do menu, lub podlinkować w treści. </p>
    <p><a href="admin/pages/add" class="button">Dodaj stronę +</a></span></p>
    <table style="margin-top: 32px; border: 1px solid black;">
        <tr>
            <td>ID</td>
            <td>Tytuł</td>
            <td colspan=2>Akcja</td>
        </tr>
    <?php foreach ($list as $elem) { ?>
        <tr>
            <td><?php echo $elem['id']; ?></td>
            <td><?php echo $elem['title']; ?></td>
            <td>
                <a href="/p-<?= $elem['slug']; ?>" target="_blank">Podgląd</a> | 
                <a href="admin/pages/edit/<?= $elem['id']; ?>">Edytuj</a>
            </td>
            <td>
                <?php if ($elem['slug'] != 'home') { ?>
                <?php echo form_open('admin/pages/delete/'.$elem['id']); ?>
                    <input type="submit" value="Usuń" />
                </form>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </table> 
</div>