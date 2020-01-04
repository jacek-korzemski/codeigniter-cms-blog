<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_tags()
    {
        $query = $this->db->get('tags');
        return $query->result_array();
    }

    public function get_tag($id)
    {   
        $query = $this->db->get_where('tags', array('id' => $id));
 
        return $query->row_array(); 
    }

    public function add_tag()
    {
        $data = [
            'tag' => $this->input->post('tags'),
        ];

        if (strpos($data['tag'], ',') !== false) 
        {
            $data['tag'] = str_replace(' ', '', $data['tag']);
            $tags = explode(',', $data['tag']);
            foreach ($tags as $tag) 
            {
                $this->db->insert('tags', array('tag' => $tag));
            }
            return true;
        }
        else
        {
            return $this->db->insert('tags', $data);
        }
    }

    public function delete_tag($id) { 
        $this->db->where('id', $id);
        $this->db->delete('tags');
        return true; 
    }
} 