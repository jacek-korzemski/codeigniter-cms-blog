<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /*
     *
     * * * * DASHBOARD
     * 
     */
	public function dashboard()
	{
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = ['title' => 'Strona główna - admin'];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
    }

    /*
     *
     * * * * PAGES
     * 
     */
    public function pages()
	{
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Zakładki - admin',
            'list' => $this->page_model->get_pages()               
        ];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/pages', $data);
		$this->load->view('admin/footer');
    }
    
    public function add()
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Edytuj stronę - admin',
            'images' => list_images()
        ];

        $this->form_validation->set_rules('title', 'Tytuł', 'required');
        $this->form_validation->set_rules('body', 'Treść', 'required');

        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/add');
            $this->load->view('admin/footer');
        } else 
        {
            $this->page_model->add_page();
            redirect('/admin/pages');
        }

    }

    public function delete($id) 
    {  
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->page_model->delete_page($id);
        redirect('/admin/pages');
    }

    public function edit($id) 
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->form_validation->set_rules('title', 'Tytuł', 'required');
        $this->form_validation->set_rules('body', 'Treść', 'required');

        $data = $this->page_model->get_page_by_id($id);

        $formatted_data = [
            'title' => $data['title'],

            'id' => $data['id'],

            'page_title' => $data['title'],
            'slug' => $data['slug'],
            'template' => $data['template'],
            'content' => $data['body'],
            
            'seo_title' => $data['seo_title'],
            'seo_robots' => $data['seo_robots'],
            'seo_desc' => $data['seo_title'],
            
            'date' => $data['created_at'],
            'images' => list_images()
        ];


        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $formatted_data);
            $this->load->view('admin/edit', $formatted_data);
            $this->load->view('admin/footer'); 
        } else 
        {
            $this->page_model->update_page();
            redirect('/admin/pages');
        }
    }

    /*
     *
     * * * * CATEGORIES
     * 
     */
    public function categories()
	{
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Kategorie - admin',
            'list' => $this->category_model->get_categories()               
        ];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/categories', $data);
		$this->load->view('admin/footer');
    }
    
    public function add_category()
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Dodaj kategorię - admin',
            'images' => list_images()
        ];

        $this->form_validation->set_rules('name', 'Nazwa', 'required');

        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/add_category');
            $this->load->view('admin/footer');
        } else 
        {
            $this->category_model->add_category();
            redirect('/admin/categories');
        }

    }

    public function delete_category($id) 
    {  
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->category_model->delete_category($id);
        redirect('/admin/categories');
    }

    public function edit_category($id) 
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->form_validation->set_rules('name', 'Tytuł', 'required');

        $data = $this->category_model->get_category_by_id($id);

        $formatted_data = [
            'title' => 'Edytuj kategorię - admin',

            'id' => $data['id'],

            'name' => $data['name'],
            'cat_slug' => $data['cat_slug'],
            'seo_title' => $data['seo_title'],
            'seo_robots' => $data['seo_robots'],
            'seo_desc' => $data['seo_title'],

            'display_description' => $data['display_description'],

            'template' => $data['template'],
            'post_template' => $data['post_template'],
            'image' => $data['image'],
            
            'images' => list_images()
        ];


        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $formatted_data);
            $this->load->view('admin/edit_category', $formatted_data);
            $this->load->view('admin/footer'); 
        } else 
        {
            $this->category_model->update_category();
            redirect('/admin/categories');
        }
    }

    /*
     *
     * * * * POSTS
     * 
     */
    public function posts()
	{
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Posty - admin',
            'list' => $this->post_model->get_posts()            
        ];

        arsort($data['list']);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/posts', $data);
		$this->load->view('admin/footer');
    }
    
    public function add_post()
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Dodaj post - admin',
            'images' => list_images()
        ];

        $this->form_validation->set_rules('title', 'Title', 'required');

        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/add_post');
            $this->load->view('admin/footer');
        } else 
        {
            $this->post_model->add_post();
            redirect('/admin/posts');
        }
    }

    public function delete_post($id) 
    {  
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->post_model->delete_post($id);
        redirect('/admin/posts');
    }

    public function edit_post($id) 
    {
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->form_validation->set_rules('title', 'Tytuł', 'required');

        $data = $this->post_model->get_post_by_id($id);

        $formatted_data = [
            'title' => 'Edytuj post - admin',

            'id' => $data['id'],

            'post_title' => $data['title'],
            'post_slug' => $data['post_slug'],
            'category_id' => $data['category_id'],
            
            'body' => $data['body'],
            
            'seo_title' => $data['seo_title'],
            'seo_robots' => $data['seo_robots'],
            'seo_desc' => $data['seo_description'],

            'date' => $data['created_at'],
            'tags' => $data['tags'],
            'image' => $data['image'],
            
            'images' => list_images()
        ];


        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $formatted_data);
            $this->load->view('admin/edit_post', $formatted_data);
            $this->load->view('admin/footer'); 
        } else 
        {
            $this->post_model->update_post();
            redirect('/admin/posts');
        }
    }


    /*
     *
     * * * * TAGS
     * 
     */
    public function tags()
	{
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Tagi - admin',
            'list' => $this->tag_model->get_tags()
        ];

        $this->form_validation->set_rules('tags', 'Tag', 'required');

        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/tags', $data);
            $this->load->view('admin/footer');
        } else 
        {
            $this->tag_model->add_tag();
            redirect('/admin/tags');
        }
    }

    public function delete_tag($id) 
    {  
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('admin/login');
        }
        $this->tag_model->delete_tag($id);
        redirect('/admin/tags');
    }

    /*
     *
     * * * * BLOCKS
     * 
     */
    public function blocks() 
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Bloki - admin',
            'list' => $this->block_model->get_blocks()   
        ];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/blocks', $data);
        $this->load->view('admin/footer'); 
    }

    public function add_block()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $data = [
            'title' => 'Edytuj stronę - admin',
            'images' => list_images(),
            'list' => $this->page_model->get_pages()
        ];

        $this->form_validation->set_rules('name', 'Nazwa', 'required');
        $this->form_validation->set_rules('block_id', 'Id', 'required');
        $this->form_validation->set_rules('body', 'Treść', 'required');

        if($this->form_validation->run() === FALSE) 
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/add_block', $data);
            $this->load->view('admin/footer');
        } else 
        {
            $this->block_model->add_block();
            redirect('/admin/blocks');
        }

    }

    public function delete_block($id) 
    {  
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $this->block_model->delete_block($id);
        redirect('/admin/blocks');
    }


    public function edit_block($id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $this->form_validation->set_rules('name', 'Tytuł', 'required');
        $this->form_validation->set_rules('block_id', 'Id', 'required');
        $this->form_validation->set_rules('body', 'Treść', 'required');

        $data = $this->block_model->get_block($id);

        $formatted_data = [
            'title' => 'Edytuj blok',

            'id' => $data['id'],

            'name' => $data['name'],
            'block_id' => $data['block_id'],
            'body' => $data['body'],
            'order_place' => $data['order_place'],

            'images' => list_images(),
            'list' => $this->page_model->get_pages()
        ];


        if($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $formatted_data);
            $this->load->view('admin/edit_block', $formatted_data);
            $this->load->view('admin/footer'); 
        } else {
            $this->block_model->update_block();
            redirect('/admin/blocks');
        }
    }

    /*
     *
     * * * * MEDIA
     * 
     */
    public function media() 
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $data = ['title' => 'Media - admin', 'images' => list_images()];
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/media', $data);
        $this->load->view('admin/footer');
    }

    public function add_media() 
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }

        $data = ['title' => 'Dodaj medium - admin'];
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_media');
        $this->load->view('admin/footer');
    }
    public function add_multiple_media()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }

        $data = ['title' => 'Dodaj wiele grafik - admin'];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_multiple_media');
        $this->load->view('admin/footer');
    }
    public function add_folder_media()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('folder_name', 'Nazwa folderu', 'required');

        $data = ['title' => 'Dodaj folder na grafiki - admin'];

        if($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/add_media_folder');
            $this->load->view('admin/footer'); 
        } else {
            $folder_name = $this->input->post('folder_name');
            $folder_name = url_title($folder_name);
            mkdir(__DIR__.'/../../assets/uploads/'.$folder_name);
            redirect('admin/media');
        }
    }

    public function do_upload()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }

        $dir = $this->input->post('media_folder');

        if ($this->input->post('upload') != NULL)
        {
            $data = array();

            $countfiles = count($_FILES['files']['name']);

            for($i = 0; $i < $countfiles; $i++)
            {
                if(!empty($_FILES['files']['name'][$i]))
                {
                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                    $config['upload_path'] = './assets/uploads/'.$dir.'/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '50000000';
                    $config['file_name'] = $_FILES['files']['name'][$i];

                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('file'))
                    {
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];

                        $data['filenames'][] = $filename;
                    }
                }
            }
        }

        redirect('/admin/media');
    }

    public function show_docs()
    {
        $data = [
            'title' => 'Dokumentacja - admin'
        ];
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/docs');
        $this->load->view('admin/footer');
    }

    public function settings()
    {
        $data = [
            'title' => 'Ustawienia główne - admin'
        ];

        $this->load->view('admin/header', $data);
        $this->load->view('admin/settings');
        $this->load->view('admin/footer');
    }
}
