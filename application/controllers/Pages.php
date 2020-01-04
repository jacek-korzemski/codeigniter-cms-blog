<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function view($slug = false) 
    {
        if ($slug == false) 
        {
            $slug = 'home';
        }
        $data = $this->page_model->get_page($slug); 

        $formatted_data = [
            'seo_title' => $data['seo_title'],
            'seo_desc' => $data['seo_title'],
            'seo_robots' => $data['seo_robots'],
            'title' => $data['title'],
            'content' => $data['body'],
            'date' => $data['created_at']
        ];

        $template = $data['template'];

        $this->load->view('page/header', $formatted_data);
        $this->load->view('page/'.$template, $formatted_data);
        $this->load->view('page/footer');
    }

    public function contact_page()
    {
        $data = [
            'seo_title' => 'Kontakt z Fajnasprawa.pl',
            'seo_desc' => 'Chcesz nam powiedzieć o czymś na prawdę fajnym? Napisz!',
            'seo_robots' => 'index',
            'title' => 'Napisz do nas! Fajnasprawa.pl'
        ];

        $this->load->view('page/header', $data);
        $this->load->view('special/contact', $data);
        $this->load->view('page/footer');
    }

    public function all_page()
    {
        $pages = $this->page_model->get_pages();
        $categories = $this->category_model->get_categories();
        $posts = $this->post_model->get_posts();

        $data = [
            'pages' => $pages,
            'categories' => $categories,
            'posts' => $posts
        ];

        $this->load->view('special/all', $data);
    }
}
