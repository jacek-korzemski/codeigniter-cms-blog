<div class="content">
    <h1> Edytuj post </h1>

    <?php echo validation_errors(); ?>

    <div class="default-form edit-page">
    <?php echo form_open('admin/posts/edit/'.$id); ?>
    <input type="hidden" name="id" value="<?= $id; ?>" />
    <input type="hidden" name="created_at" value="<?= $date; ?>" />

        <div class="flex-between flex-wrap">
            <div class="form-fields w-50">
                <input type="text" name="title" value="<?= $post_title; ?>" required />
                <p>Tytuł</p>
            </div>
            <div class="form-fields w-40">
                <?php echo list_categories($category_id); ?>
                <p>Kategoria ID</p>
            </div>
            <div class="form-fields w-100">
                <input type="text" name="post_slug" value="<?= $post_slug; ?>" readonly />
                <p>Url</p>
            </div>
        </div>
        <div class="form-fields text-editor">
            <textarea id="ckeditor" name="body"><?= $body; ?></textarea>
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
            <input type="text" name="image" value="<?= $image; ?>" />
            <p>Grafika reprezentująca post</p>
        </div>

        <div class="form-fields">
            <?php echo build_tags_select_list(); ?>
            <p>Tagi</p>
        </div>
        <input type="hidden" name="tags" id="tagsInput" value="<?= $tags; ?>" />
        
        <div class="flex-between">
            <div class="form-fields w-70">
                <input type="text" name="seo_title" value="<?= $seo_title; ?>" required />
                <p>SEO - Tytuł</p>
            </div>
            <div class="form-fields">
                <input type="text" name="seo_robots" value="<?= $seo_robots; ?>" required />
                <p>SEO - robots</p>
            </div>
        </div>
        <div class="form-fields">
            <input type="text" name="seo_description" value="<?= $seo_desc; ?>" required />
            <p>SEO - Opis</p>
        </div>
        <div class="flex-between">
            <div class="form-fields w-50">
                <select name="is_promo">
                    <option value="false">Nie</option>
                    <option value="true">Tak</option>
                </select>
                <p>Czy post ma być promowany?</p>
            </div>
            <div class="form-fields w-40">
                <select name="is_random">
                    <option value="false">Nie</option>
                    <option value="true">Tak</option>
                </select>
                <p>Czy post ma być wyróżniony w losowych postach?</p>
            </div>
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