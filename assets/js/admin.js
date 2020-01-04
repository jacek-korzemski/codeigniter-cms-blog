function showMediaBar(mode) {
    let panel = document.querySelector('.media-panel .content');
    let button = document.querySelector('#mediaButton');
    if (mode == 'open') {
        panel.style.display='flex';
        button.innerText='Zamknij';
        button.setAttribute('onclick', "showMediaBar('close')");
    } else {
        panel.style.display='none';
        button.innerText='Dodaj media';
        button.setAttribute('onclick', "showMediaBar('open')");
    }
}

function run_image_picker(){
    let images = document.querySelectorAll('#mediaList img');

    for (let i = 0; i < images.length; i++) {
        images[i].addEventListener('click', function(){
            selectImage(images[i].src);
        });
    }
}


function selectImage(src) {
    document.getElementById('image_link').value=src;
}

function addImage() {
    let src = document.getElementById('image_link').value;
    if (document.getElementById('cke_ckeditor') != undefined) {
        $("iframe").contents().find("body").append('<img src="'+src+'" alt="image" />');
    } else {
        document.getElementById('ckeditor').innerHTML+=src;
    }
}

$("iframe").contents().find("head").append('<style>img {max-width: 100%;}</style>');

function addTagToPost(tag){
    let selectedTag = document.querySelector('.tags-list li[data-tag="'+tag+'"]');
    if (selectedTag.getAttribute('data-tag-enabled') == 'false') 
    {
        console.log('to');
        selectedTag.setAttribute('data-tag-enabled', 'true');
    } else 
    {
        console.log('tamto');
        selectedTag.setAttribute('data-tag-enabled', 'false');
    }
    updateTags();
}

function updateTags()
{
    let selectedTags = document.querySelectorAll('.tags-list li[data-tag-enabled="true"]');
    let tags = '';
    for (i = 0; i < selectedTags.length; i++) 
    {
        tags+=selectedTags[i].getAttribute('data-tag')+',';
    }
    let fix = tags.replace(/,$/, "");
    document.querySelector('#tagsInput').value=fix;
}

function updateTagsReverse()
{
    let tagsInput = document.querySelector('#tagsInput').value;
        tagsInput = tagsInput.split(',');

    for (let i = 0; i < tagsInput.length; i++) 
    {
        document.querySelector('.tags-list li[data-tag="'+tagsInput[i]+'"]').setAttribute('data-tag-enabled', 'true');
    }
}

if (document.querySelector('#tagsInput') != undefined && document.querySelector('#tagsInput').value != '') 
{
    updateTagsReverse();
}