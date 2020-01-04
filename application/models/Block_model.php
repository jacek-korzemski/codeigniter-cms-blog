<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Block_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_blocks()
    {
        $query = $this->db->get('blocks');
        return $query->result_array();
    }

    public function get_block($id)
    {   
        $query = $this->db->get_where('blocks', array('id' => $id));
 
        return $query->row_array(); 
    }

    public function add_block()
    {
        $display_on = '';
        if (!in_array('!all!', $this->input->post('check_list'))) {
            foreach($this->input->post('check_list') as $selected){
                $display_on .=$selected.'|';
                substr($display_on, 0, -1);
            }
        } else {
            $display_on = '!all!';
        }

        $data = [
            'name' => $this->input->post('name'),
            'block_id' => $this->input->post('block_id'),
            'body' => $this->input->post('body'),
            'order_place' => $this->input->post('order_place'),
            'display_on' => $display_on
        ];

        return $this->db->insert('blocks', $data);
    }

    public function update_block()
    {
        $display_on = '';
        if (!in_array('!all!', $this->input->post('check_list'))) {
            foreach($this->input->post('check_list') as $selected){
                $display_on .=$selected.'|';
                substr($display_on, 0, -1);
            }
        } else {
            $display_on = '!all!';
        }

        $data = [
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'block_id' => $this->input->post('block_id'),
            'body' => $this->input->post('body'),
            'order_place' => $this->input->post('order_place'),
            'display_on' => $display_on
        ];

        $this->db->where('id', $this->input->post('id')); 

        return $this->db->update('blocks', $data);
    }

    public function delete_block($id) { 
        $this->db->where('id', $id);
        $this->db->delete('blocks');
        return true; 
    } 
} 