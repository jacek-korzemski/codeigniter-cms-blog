<?php
 
 function load_block($block_id) {
    $CI =& get_instance();
    $query = $CI->db->get_where('blocks', array('block_id' => $block_id));
    $result = $query->result_array();

    $slug = $_SERVER['REQUEST_URI'];
    if (FIXPATH != false) {
        if ($slug == '/'.FIXPATH.'/') {
            $slug = 'home'; 
        } else {
            $slug = str_replace('/'.FIXPATH.'/', '', $slug);
        }
    } else {
        if ($slug == '/') {
            $slug = 'home'; 
        } else {
            $slug = ltrim($slug, '/');
        }
    }
    
    usort($result, function ($one, $two) {
        if ($one['order_place'] === $two['order_place']) {
            return 0;
        }
        return $one['order_place'] < $two['order_place'] ? -1 : 1;
    });  

    foreach($result as $res) {
        $is_display = explode('|', $res['display_on']);
        if (in_array($slug, $is_display) || in_array('!all!', $is_display)) {
            echo $res['body'];
        }
    }
} 

function has_block($block_id) { 
    $CI =& get_instance();
    $query = $CI->db->get_where('blocks', array('block_id' => $block_id));
    $result = $query->result_array();

    $slug = $_SERVER['REQUEST_URI'];
    if (FIXPATH != false) {
        if ($slug == '/'.FIXPATH.'/') {
            $slug = 'home'; 
        } else {
            $slug = str_replace('/'.FIXPATH.'/', '', $slug);
        }
    } else {
        if ($slug == '/') {
            $slug = 'home'; 
        } else {
            $slug = ltrim($slug, '/');
        }
    }

    foreach($result as $res) {
        $is_display = explode('|', $res['display_on']);
        if (in_array($slug, $is_display) || in_array('!all!', $is_display)) {
            return true;
        }
    }
}   

function check_if_selected($id, $slug){
    $CI =& get_instance();
    $query = $CI->db->get_where('blocks', array('id' => $id));
    $result = $query->row_array();

    $is_display = explode('|', $result['display_on']);

    if (in_array($slug, $is_display)) {
        echo 'checked';
    }
} 
