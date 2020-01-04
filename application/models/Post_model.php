<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_posts()
    {
        $query = $this->db->get('posts');
        return $query->result_array();
    }

    public function get_post($post_slug)
    {   
        $query = $this->db->get_where('posts', array('post_slug' => $post_slug));
 
        return $query->row_array(); 
    }

    public function get_posts_from_category($id)
    {
        $query = $this->db->get_where('posts', array('category_id' => $id));
        
        return $query->result_array();
    }

    public function get_post_by_id($id) 
    {
        $query = $this->db->get_where('posts', array('id' => $id));
 
        return $query->row_array(); 
    }

    public function get_posts_by_tag($tag)
    {
        $query = $this->db->get_where('posts_tags', array('tag' => $tag));
        $query = $query->result_array();
        $counter = 0;
        foreach ($query as $post) {
            $results[$counter] = $post['post_slug'];
            $counter++;
        }
        $counter = 0;
        if (isset($results)) 
        {        
            foreach ($results as $post) 
            {
                $result[$counter] = $this->db->get_where('posts', array('post_slug' => $post));
                $result[$counter] = $result[$counter]->row_array();
                $counter++;
            }
        }
        if (isset($result)) 
        {
            return $result;
        } 
        else 
        {
            return false;
        }
    }

    public function add_post()
    {
        $data = [
            'title' => $this->input->post('title'),
            'post_slug' => $this->input->post('post_slug'),
            'body' => $this->input->post('body'),
            'seo_title' => $this->input->post('seo_title'),
            'seo_description' => $this->input->post('seo_description'),
            'seo_robots' => $this->input->post('seo_robots'),
            'category_id' => $this->input->post('category_id'),
            'tags' => $this->input->post('tags'),
            'image' => $this->input->post('image'),
            'full_link' => 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . $this->input->post('post_slug')
        ];

        if ($data['post_slug'] == '' || $data['post_slug'] == false) 
        {
            $data['post_slug'] = url_title($data['title']);
            $data['full_link'] = 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . url_title($data['title']);
        }

        if ($this->input->post('is_promo') == 'true')
        {
            $promo_data = [
                'post_slug' => $this->input->post('slug'),
                'full_link' =>  'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . $this->input->post('post_slug')
            ];

            if ($promo_data['post_slug'] == '' || $promo_data['post_slug'] == false) 
            {
                $promo_data['post_slug'] = url_title($this->input->post('title'));
                $promo_data['full_link'] = 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . url_title($this->input->post('title'));
            }

            $this->db->insert('posts_promo', $promo_data);
        }

        if ($this->input->post('is_random') == 'true')
        {
            $rand_data = [
                'post_slug' => $this->input->post('slug'),
                'full_link' =>  'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . $this->input->post('post_slug')
            ];

            if ($rand_data['post_slug'] == '' || $rand_data['post_slug'] == false) 
            {
                $rand_data['post_slug'] = url_title($this->input->post('title'));
                $rand_data['full_link'] = 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . url_title($this->input->post('title'));
            }

            $this->db->insert('posts_rand', $rand_data);
        }

        $this->db->insert('posts', $data);

        $tags = $this->input->post('tags');
        $tags = explode(',', $tags);

        foreach ($tags as $tag) {
            $tag_id = $this->db->get_where('tags', array('id' => $tag));
            $tag_id = $tag_id->row_array();
            $tag_id = $tag_id['tag'];

            $data_tags = [
                'post_slug' => $data['post_slug'],
                'tag_id' => $tag,
                'tag' => $tag_id
            ];

            $this->db->insert('posts_tags', $data_tags); 
        }

        return true;
    }

    public function update_post()
    {
        $data = [
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'post_slug' => $this->input->post('post_slug'),
            'body' => $this->input->post('body'),
            'seo_title' => $this->input->post('seo_title'),
            'seo_description' => $this->input->post('seo_description'),
            'seo_robots' => $this->input->post('seo_robots'),
            'category_id' => $this->input->post('category_id'),
            'tags' => $this->input->post('tags'),
            'image' => $this->input->post('image'),
            'full_link' => 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . $this->input->post('post_slug')
        ];

        if ($data['post_slug'] == '' || $data['post_slug'] == false) 
        {
            $data['post_slug'] = url_title($data['title']);
            $data['full_link'] = 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . url_title($data['title']);
        }

        $this->db->where('post_slug', $data['post_slug']);
        $this->db->delete('posts_promo');
        $this->db->where('post_slug', $data['post_slug']);
        $this->db->delete('posts_rand');

        if ($this->input->post('is_promo') == 'true')
        {
            $promo_data = [
                'post_slug' => $this->input->post('slug'),
                'full_link' =>  'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . $this->input->post('post_slug')
            ];

            if ($promo_data['post_slug'] == '' || $promo_data['post_slug'] == false) 
            {
                $promo_data['post_slug'] = url_title($this->input->post('title'));
                $promo_data['full_link'] = 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . url_title($this->input->post('title'));
            }

            $this->db->insert('posts_promo', $promo_data);
        }

        if ($this->input->post('is_random') == 'true')
        {
            $rand_data = [
                'post_slug' => $this->input->post('slug'),
                'full_link' =>  'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . $this->input->post('post_slug')
            ];

            if ($rand_data['post_slug'] == '' || $rand_data['post_slug'] == false) 
            {
                $rand_data['post_slug'] = url_title($this->input->post('title'));
                $rand_data['full_link'] = 'c-' . url_title(get_category_name($this->input->post('category_id'))) . '/' . url_title($this->input->post('title'));
            }

            $this->db->insert('posts_rand', $rand_data);
        }

        $posts_tags = $this->db->get_where('posts_tags', array('post_slug' => $data['post_slug']));
        $posts_tags = $posts_tags->result_array();

        foreach ($posts_tags as $post_tag) {
            $this->db->where('post_slug', $post_tag['post_slug']);
            $this->db->delete('posts_tags');
        }

        $this->db->where('id', $this->input->post('id'));

        $this->db->update('posts', $data);

        $tags = $this->input->post('tags');
        $tags = explode(',', $tags);

        foreach ($tags as $tag) {
            $tag_id = $this->db->get_where('tags', array('id' => $tag));
            $tag_id = $tag_id->row_array();
            $tag_id = $tag_id['tag'];

            $data_tags = [
                'post_slug' => $data['post_slug'],
                'tag_id' => $tag,
                'tag' => $tag_id
            ];

            $this->db->insert('posts_tags', $data_tags); 
        }

        return true;
    }

    public function delete_post($id) { 
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true; 
    }
} 