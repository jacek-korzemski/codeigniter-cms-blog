<?php
 
 function loop_categories() {
    $CI =& get_instance();
    $query = $CI->db->get('categories');
    $result = $query->result_array();

    return $result;
} 

function loop_post($category_id = false) { 
    $CI =& get_instance();
    $result = $query->result_array();

    if ($category = false) {
        $query = $CI->db->get('posts');
    } else {
        $query = $CI->db->get_where('posts', array('category_id' => $category_id));
    }

    return $result;
}   

