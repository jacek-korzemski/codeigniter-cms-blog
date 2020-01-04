<div class="content">
    <h1> Dodaj nową stronę informacyjną </h1>

    <?php echo validation_errors(); ?>

    <div class="default-form edit-page">
    <?php echo form_open('admin/pages/add'); ?>
        <div class="form-fields">
            <input type="text" name="title" required />
            <p>Tytuł</p>
        </div>
        <div class="form-fields">
            <input type="text" name="slug" />
            <p>Url</p>
        </div>
        <div class="form-fields">
            <?php list_templates(); ?>
            <p>Szablon</p>
            <br>
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
        
        <div class="form-fields">
            <input type="text" name="seo_title" required />
            <p>SEO - Tytuł</p>
        </div>
        <div class="form-fields">
            <input type="text" name="seo_desc" required />
            <p>SEO - Opis</p>
        </div>
        <div class="form-fields">
            <input type="text" name="seo_robots" required />
            <p>SEO - robots</p>
        </div>
        <div style="width: 100%; height: 32px;"></div>
        <input type="submit" value="Zapisz" />
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