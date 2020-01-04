<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Search_model Extends CI_Model
{
    function search_title($keyword)
    {
        $this->db->like('title',$keyword);
        $query = $this->db->get('posts');
        $results = $query->result_array();
        return $results;
    }

    function search_body($keyword)
    {
        $this->db->like('body',$keyword);
        $query = $this->db->get('posts');
        $results = $query->result_array();
        return $results;
    }
}   
