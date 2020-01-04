<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function view($type, $category = false, $numOrTitle = false) {
        //
        // Display theme for category // I'll add loop and pagination later
        //
        if ($type == 'category') 
        {
            $category_data = $this->category_model->get_category($category);
            $posts_data = $this->post_model->get_posts_from_category(get_category_id_by_slug($category));

            $data = [
                'name' => $category_data['name'],
                'cat_slug' => $category_data['cat_slug'],
                'seo_title' => $category_data['seo_title'],
                'seo_desc' => $category_data['seo_desc'],
                'seo_robots' => $category_data['seo_robots'],
                'description' => $category_data['display_description'],
                'posts' => $posts_data,
                'image' => $category_data['image']
            ];

            $template = $category_data['template'];

            $this->load->view('page/header', $data);
            $this->load->view('category/'.$template, $data);
            $this->load->view('page/footer');
        } 

        //
        // Display theme for pagination page
        //
        elseif ($type == 'pagination') 
        {
            echo 'Paginacja';
        } 
        
        //
        // Display theme for post
        //
        elseif ($type == 'post') {

            $data = $this->post_model->get_post($numOrTitle);

            $post_template = $this->category_model->get_category($category);
            $post_template = $post_template['post_template'];

            $formated_data = [
                'seo_title' => $data['seo_title'],
                'seo_desc' => $data['seo_description'],
                'seo_robots' => $data['seo_robots'],
                'title' => $data['title'],
                'body' => $data['body'],
                'date' => $data['created_at'],
                'tags' => get_post_tags($data['id']),
                'category' => get_category_name($data['category_id']),
                'image' => $data['image']
            ];

            $this->load->view('page/header', $formated_data);
            $this->load->view('post/'.$post_template, $formated_data);
            $this->load->view('page/footer');
            
        } else {
            echo 'Undefined Error';
        }
    }

    public function post_by_tag($tag)
    {
        $posts_data = $this->post_model->get_posts_by_tag($tag);

        $data = [
            'name' => $tag,
            'cat_slug' => $tag,
            'seo_title' => 'FajnaSprawa.pl - '.$tag,
            'seo_desc' => 'FajnaSprawa.pl - '.$tag,
            'seo_robots' => 'noindex',
            'description' => '',
            'posts' => $posts_data,
            'image' => ''
        ];

        if (!isset($data['posts'])) 
        {
            $data['posts'] = null;
        }

        $this->load->view('page/header', $data);
        $this->load->view('category/basic', $data);
        $this->load->view('page/footer');
    }
}
