<?php

function get_posts_by_slug($slug)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('posts', array('post_slug' => $slug));
    $result = $query->result_array();

    if (is_array($result))
    {
        return $result[0];
    }
    else 
    {
        return $result;
    }
}

function get_promo_posts_data()
{
    $CI =& get_instance();
    $query = $CI->db->get('posts_promo');
    $result = $query->result_array();
    $posts = array();
    $counter = 0;

    foreach ($result as $res)
    {
        $posts[$counter]['id'] = get_posts_by_slug($res['post_slug'])['id'];
        $posts[$counter]['title'] = get_posts_by_slug($res['post_slug'])['title'];
        $posts[$counter]['post_slug'] = get_posts_by_slug($res['post_slug'])['post_slug'];
        $posts[$counter]['body'] = get_posts_by_slug($res['post_slug'])['body'];
        $posts[$counter]['created_at'] = get_posts_by_slug($res['post_slug'])['created_at'];
        $posts[$counter]['seo_title'] = get_posts_by_slug($res['post_slug'])['seo_title'];
        $posts[$counter]['seo_description'] = get_posts_by_slug($res['post_slug'])['seo_description'];
        $posts[$counter]['category'] = get_category_name(get_posts_by_slug($res['post_slug'])['category_id']);
        $posts[$counter]['full_link'] = get_posts_by_slug($res['post_slug'])['full_link'];
        $posts[$counter]['image'] = get_posts_by_slug($res['post_slug'])['image'];
        $counter++;
    }

    return $posts;
}

function get_random_posts_data($num = 0)
{
    $CI =& get_instance();
    $query = $CI->db->get('posts_rand');
    $result = $query->result_array();
    $posts = array();
    $counter = 0;

    foreach ($result as $res)
    {
        $posts[$counter]['id'] = get_posts_by_slug($res['post_slug'])['id'];
        $posts[$counter]['title'] = get_posts_by_slug($res['post_slug'])['title'];
        $posts[$counter]['post_slug'] = get_posts_by_slug($res['post_slug'])['post_slug'];
        $posts[$counter]['body'] = get_posts_by_slug($res['post_slug'])['body'];
        $posts[$counter]['created_at'] = get_posts_by_slug($res['post_slug'])['created_at'];
        $posts[$counter]['seo_title'] = get_posts_by_slug($res['post_slug'])['seo_title'];
        $posts[$counter]['seo_description'] = get_posts_by_slug($res['post_slug'])['seo_description'];
        $posts[$counter]['category'] = get_category_name(get_posts_by_slug($res['post_slug'])['category_id']);
        $posts[$counter]['full_link'] = get_posts_by_slug($res['post_slug'])['full_link'];
        $posts[$counter]['image'] = get_posts_by_slug($res['post_slug'])['image'];
        if ($counter == $num) {
            break;
        } else {
            $counter++;
        }
    }

    return $posts;
}