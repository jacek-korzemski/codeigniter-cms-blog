<div class="content">
    <h1> Tagi </h1>
    <div class="default-form">
        <?php echo form_open('admin/tags'); ?>
            <div class="form-fields">
                <input type="text" name="tags"  />
                <p>Dodaj tag lub wiele tagów, oddzielając je przecinkiem (bez spacji).</p>
            </div>
            <input type="submit" value="Zapisz" class="button" />
        </form>
    </div>
    <table style="margin-top: 32px; border: 1px solid black;">
        <tr>
            <td>ID</td>
            <td>Tag</td>
            <td>Akcja</td>
        </tr>
    <?php foreach ($list as $elem) { ?>
        <tr>
            <td><?php echo $elem['id']; ?></td>
            <td><?php echo $elem['tag']; ?></td>
            <td>
                <a href="/t-<?= $elem['tag']; ?>" target="_blank" style="float: left;">Podgląd</a>
                <div style="float: right; width: fit-content;">
                    <?php echo form_open('admin/tags/delete/'.$elem['id']); ?>
                        <input type="submit" value="Usuń" />
                    </form>
                </div>
            </td>
        </tr>
    <?php } ?>
    </table> 
</div>