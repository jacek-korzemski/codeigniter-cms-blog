<div class="content">
    <h1> Dodaj zdjęcia </h1>
    <div  style="padding: 15px; border: 1px solid red; max-width: 480px;">
        <p> Zdjęcia powinny być zoptyamlizowane:</p>
        <ul>
            <li> zaleca się rozdzielczości nie większe niż 1920 x 1080</li>
            <li> zdjęcia powinny być w formacie jpg/jpeg/png/gif</li>
            <li> za jednym razem, można dodać maksymalnie <strong> 20 zdjęć </strong>
        </ul>
    </div>
    <div class="default-form">
        <?php echo form_open_multipart('admin/do_upload');?>
        <div class="form-fields">
            <?php echo build_media_folder_list(); ?>
            <p> Wybierz folder do któego ma trafić grafika </p>
        </div>
        <div class="form-fields">
            <input type="file" name="files[]" multiple />
            <p> Wybierz grafikę </p>
        </div>
        <input type="submit" value="dodaj" name="upload" />
        </form>
    </div>
</div>