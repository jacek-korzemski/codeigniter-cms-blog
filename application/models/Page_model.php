<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_pages()
    {
        $query = $this->db->get('pages');
        return $query->result_array();
    }

    public function get_page($slug = false)
    {   
        if ($slug == false) {
            $slug = 'home';
        }

        $query = $this->db->get_where('pages', array('slug' => $slug));
 
        return $query->row_array(); 
    }

    public function get_page_by_id($id) 
    {
        $query = $this->db->get_where('pages', array('id' => $id));
 
        return $query->row_array(); 
    }

    public function add_page()
    {
        $data = [
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'template' => $this->input->post('template'),
            'body' => $this->input->post('body'),
            'seo_title' => $this->input->post('seo_title'),
            'seo_desc' => $this->input->post('seo_desc'),
            'seo_robots' => $this->input->post('seo_robots')
        ];

        if ($data['slug'] == '' || $data['slug'] == false) 
        {
            $data['slug'] = url_title($data['title']);
        }

        return $this->db->insert('pages', $data);
    }

    public function update_page()
    {
        $data = [
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'template' => $this->input->post('template'),
            'body' => $this->input->post('body'),
            'seo_title' => $this->input->post('seo_title'),
            'seo_desc' => $this->input->post('seo_desc'),
            'seo_robots' => $this->input->post('seo_robots')
        ];

        if ($data['slug'] == '' || $data['slug'] == false) 
        {
            $data['slug'] = url_title($data['title']);
        }

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('pages', $data);
    }

    public function delete_page($id) { 
        $this->db->where('id', $id);
        $this->db->delete('pages');
        return true; 
    }
} 