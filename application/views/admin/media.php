<div class="content">
    <h1> Media </h1>
    <p> Lista obrazków, i miejsce gdzie możesz dodać nowe. </p>
    <p><a href="admin/media/add" class="button">Dodaj grafikę +</a></span> &nbsp; <a href="admin/media/add_folder" class="button">Dodaj folder +</a></span></p>
    <h2> Przeglądaj </h2>
    <div class="media-gallery" id="mediaList">
    </div>
</div>

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