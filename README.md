# Codeigniter based CMS with blog features

## Main features

### Pages

Default route for pages is /p-?page-slug?
Pages can be added and modified in admin panel. Each page can have it's own template selected.

### Categories

Default route for categories is /c-?category-slug?
Categories can be added and modified in admin panel. Each category can have it's own template. You can also select post template for every post in the category. Categories can have it's own featured image.

### Posts

Default route for posts is /c-?category-slug?/?post-slug?
Posts can be added and modified in admin panel. Each post can have it's own featured image. Each post must have at least one tag. 

### Tags

Default route for tags is /t-?tag?
Each tag should be only one word, with no spaces. Before adding a post, you should have at least one tag declared.

### Media

Media doesn't has it's own route. It's only some kind of file manager for images.
First, you have to add a folder, then you cand add images to a folder. In one form sending, you can send up to 20 images (of course, at least one).


