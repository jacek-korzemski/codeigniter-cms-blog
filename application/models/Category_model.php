<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_categories()
    {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_category($cat_slug)
    {   
        $query = $this->db->get_where('categories', array('cat_slug' => $cat_slug));
 
        return $query->row_array(); 
    }

    public function get_category_by_id($id) 
    {
        $query = $this->db->get_where('categories', array('id' => $id));
 
        return $query->row_array(); 
    }

    public function add_category()
    {
        $data = [
            'name' => $this->input->post('name'),
            'cat_slug' => $this->input->post('cat_slug'),
            'template' => $this->input->post('template'),
            'post_template' => $this->input->post('post_template'),
            'display_description' => $this->input->post('display_description'),
            'seo_title' => $this->input->post('seo_title'),
            'seo_desc' => $this->input->post('seo_desc'),
            'seo_robots' => $this->input->post('seo_robots'),
            'image' => $this->input->post('image')
        ];

        if ($data['cat_slug'] == '' || $data['cat_slug'] == false) 
        {
            $data['cat_slug'] = url_title($data['name']);
        }

        return $this->db->insert('categories', $data);
    }

    public function update_category()
    {
        $data = [
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'cat_slug' => $this->input->post('cat_slug'),
            'template' => $this->input->post('template'),
            'post_template' => $this->input->post('post_template'),
            'display_description' => $this->input->post('display_description'),
            'seo_title' => $this->input->post('seo_title'),
            'seo_desc' => $this->input->post('seo_desc'),
            'seo_robots' => $this->input->post('seo_robots'),
            'image' => $this->input->post('image')
        ];

        if ($data['cat_slug'] == '' || $data['cat_slug'] == false) 
        {
            $data['cat_slug'] = url_title($data['name']);
        }

        $this->db->where('id', $this->input->post('id'));

        return $this->db->update('categories', $data);
    }

    public function delete_category($id) { 
        $this->db->where('id', $id);
        $this->db->delete('categories');
        return true; 
    }
} 