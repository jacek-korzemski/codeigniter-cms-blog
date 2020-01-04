<div class="content">
    <h1> Dodaj nowy blok </h1>
    <div class="default-form edit-page">
        <?php echo form_open('admin/add_block'); ?>
            <div class="form-fields">
                <input type="text" name="name" required />
                <p>Nazwa</p>
            </div>
            <div class="form-fields">
                <?php list_blocks_ids(); ?>
                <p>ID - lokalizacja</p>
            </div>
            <div class="form-fields text-editor">
                <textarea id="ckeditor" name="body"></textarea>
            </div>
            <div class="media-panel">
                <div class="button-cont">
                        <a href="javascript:void(0);" onclick="showMediaBar('open');" id="mediaButton">Podejrzyj link grafiki</a>
                </div>
                <div class="content">
                    <div class="buttons_image">
                        <input type="disabled" id="image_link"><a id="imageLink" onclick="addImage();">Dodaj wybraną grafikę</a>
                    </div>
                </div>
                <div class="media-gallery" id="mediaList">
                    <!-- ajax content -->
                </div>
            </div>
            <hr>
            <h2> Wyświetla na stronach </h2>
            <ul class="checkbox-list">
                <li><input type="checkbox" name="check_list[]" value="!all!"> WSZYSTKICH</li>
                <?php foreach ($list as $elem) { ?>
                <li><input type="checkbox" name="check_list[]" value="<?php echo $elem['slug']; ?>" /> <?php echo $elem['title']; ?></li>
                <?php } ?>
            </ul>
            <br/>
            <div class="form-fields">
                <input type="number" name="order_place" value="0" required />
                <p>Kolejność (od 0 do 255)</p>
            </div>
            
            <input type="submit" value="Zapisz" style="display: block; width: fit-content; margin: 16px auto;" />
        </form>
    </div>
</div>

<script src="assets/admin/cke/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'ckeditor' );
</script>

<script src="assets/js/admin.js"></script>

<script>
$(document).ready(function(){
    $( "#mediaList" ).load( "ajax/list_folder", function() {
        console.log( "Wczytano poprawnie media." );

        let folder = document.querySelectorAll('.folder li');
        for (let i = 0; i < folder.length; i++) {
            folder[i].addEventListener('click', function(){
                load_folder(folder[i].innerText);
            });
        }
    });
});

function load_folder(dir) {
    $("#mediaList").load("ajax/list_folder/"+dir, function() {
        console.log ('Wczytano poprawnie podfolder.');
        run_image_picker();
    });
}
function go_back_media() {
    $( "#mediaList" ).load( "ajax/list_folder", function() {
        console.log( "Wczytano poprawnie media." );

        let folder = document.querySelectorAll('.folder li');
        for (let i = 0; i < folder.length; i++) {
            folder[i].addEventListener('click', function(){
                load_folder(folder[i].innerText);
            });
        }
    });
}
</script>