<?php

function get_category_name($id) 
{
    $CI =& get_instance();
    $query = $CI->db->get_where('categories', array('id' => $id));
    $result = $query->row_array();

    return $result['name'];
}

function get_category_slug($id) 
{
    $CI =& get_instance();
    $query = $CI->db->get_where('categories', array('id' => $id));
    $result = $query->row_array();

    return $result['cat_slug'];
}

function get_category_id_by_slug($slug) 
{
    $CI =& get_instance();
    $query = $CI->db->get_where('categories', array('cat_slug' => $slug));
    $result = $query->row_array();

    return $result['id'];
}

function get_post_tags($id) 
{
    $CI =& get_instance();
    $query = $CI->db->get_where('posts', array('id' => $id));
    $result = $query->row_array();
    $tags = explode(',', $result['tags']);
    $counter = 0;
    foreach ($tags as $tag) {
        $query = $CI->db->get_where('tags', array('id' => $tag));
        $result = $query->row_array();
        $output[$counter] = $result['tag'];
        $counter++;
    }

    return $output;
}

function get_post_category($id) 
{
    $CI =& get_instance();
    $query = $CI->db->get_where('posts', array('id' => $id));
    $result = $query->result_array();

    return $result[0]['category_id'];
}

function convert_tag_id_to_tag_name($id)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tags', array('id' => $id));
    $result = $query->result_array();

    return $result[0]['tag'];
}

function convert_tag_name_to_tag_id($tag)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tags', array('tag' => $tag));
    $result = $query->result_array();

    return $result[0]['tag'];
}

//
// Media helpers
//
function build_media_folder_list()
{
    $html = '';
    $folder = scandir(__DIR__.'/../../assets/uploads/');
    if (empty($folder))
    {
        $html = '<input type="text" disabled value="Jeszcze nie ma żadnych folderów" />';
        return $html;
    }
    else
    {
        $html = '<select name="media_folder">';
        foreach ($folder as $dir) {
            if ($dir == '.' || $dir == '..')
            {
                // Do nothing
            }
            else
            {
                $html .= '<option value='.$dir.'>'.$dir.'</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }
}

function dir_to_array($dir) // stolen from php.net/manual/en/function.scandri.php
{
    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
             $result[$value] = dir_to_array($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }
   
    return $result;
}

//
// Templates Helper
//
function list_templates($selected = false) 
{
    $templates = array(
        'home',
        'page',
        'category',
        'post',
        'contact'
    );

    $html = '<select name="template">';

    if ($selected == false) 
    {
        foreach ($templates as $template) 
        {
            $html.= '<option value="'.$template.'">'.$template.'</option>';
        }
    } else 
    {
        foreach ($templates as $template) 
        {
            if ($template != $selected)
            {
                $html.= '<option value="'.$template.'">'.$template.'</option>';
            } else 
            {
                $html.= '<option value="'.$template.'" selected>'.$template.'</option>';
            }
        }
    }


    $html .= '</select>';

    echo $html;
}

function list_post_templates($selected = false) 
{
    $templates = array(
        'basic',
        'book',
        'game',
        'movie',
        'event'
    );

    $html = '<select name="post_template">';

    if ($selected == false) 
    {
        foreach ($templates as $template) 
        {
            $html.= '<option value="'.$template.'">'.$template.'</option>';
        }
    } else 
    {
        foreach ($templates as $template) 
        {
            if ($template != $selected)
            {
                $html.= '<option value="'.$template.'">'.$template.'</option>';
            } else 
            {
                $html.= '<option value="'.$template.'" selected>'.$template.'</option>';
            }
        }
    }


    $html .= '</select>';

    echo $html;
}

function list_category_templates($selected = false) 
{
    $templates = array(
        'basic',
        'book',
        'game',
        'movie',
        'event'
    );

    $html = '<select name="template">';

    if ($selected == false) 
    {
        foreach ($templates as $template) 
        {
            $html.= '<option value="'.$template.'">'.$template.'</option>';
        }
    } else 
    {
        foreach ($templates as $template) 
        {
            if ($template != $selected)
            {
                $html.= '<option value="'.$template.'">'.$template.'</option>';
            } else 
            {
                $html.= '<option value="'.$template.'" selected>'.$template.'</option>';
            }
        }
    }


    $html .= '</select>';

    echo $html;
}

function list_categories($selected = false)
{
    $CI =& get_instance();
    $query = $CI->db->get('categories');
    $result = $query->result_array();

    $html = '<select name="category_id">';
    foreach($result as $category) 
    {
        if ($selected == false)
        {
            $html .= '<option value="'.$category['id'].'">'.$category['name'].'</option>';
        } 
        else
        {
            if ($selected == $category['id']) 
            {
                $html .= '<option value="'.$category['id'].'" selected>'.$category['name'].'</option>';
            }
            else
            {
                $html .= '<option value="'.$category['id'].'">'.$category['name'].'</option>';
            }
        }
    }
    $html .= '</select>';

    return $html;
}

function list_blocks_ids($block_id = false) 
{
    $blocks = array(
        'logo',
        'main-nav',
        'hero',
        'ad-1',
        'ad-2',
        'ad-3',
        'over-content',
        'under-content',
        'footer-top',
        'footer-bottom',
        'copyright'
    );

    $html = '<select name="block_id">';

    if ($block_id == false) 
    {
        foreach ($blocks as $block) 
        {
            $html.= '<option value="'.$block.'">'.$block.'</option>';
        }
    } else 
    {
        foreach ($blocks as $block) 
        {
            if ($block != $block_id)
            {
                $html.= '<option value="'.$block.'">'.$block.'</option>';
            } else 
            {
                $html.= '<option value="'.$block.'" selected>'.$block.'</option>';
            }
        }
    }


    $html .= '</select>';

    echo $html;
}

function build_tags_select_list()
{
    $CI =& get_instance();
    $query = $CI->db->get('tags');
    $result = $query->result_array();
    $html = '<ul class="tags-list">';
    foreach ($result as $tag) 
    {
        $html.= '<li onclick="addTagToPost('.$tag['id'].')" data-tag='.$tag['id'].' data-tag-enabled="false">'.$tag['tag'].'</li>';
    }
    $html .= '</ul>';

    return $html;
}

function select_post_list($type, $num)
{
    $CI =& get_instance();
    $query = $CI->db->get('posts');
    $result = $query->result_array();
    arsort($result);
    $html = '';
    for ($i = 0; $i < $num; $i++) 
    {
        $html.= '<select name="'.$type.'['.$i.']">';
        foreach ($result as $post)
        {
            $html.='<option value="'.$post['id'].'">'.$post['id'] .' - ' . $post['title'].'</option>';
        }
        $html.= '</select><br/>';
    }
    $query = $CI->db->query('SELECT count(*) FROM `settings`');
    if ($query == 0) {
        $html = 'niema';
    }
    return $html;
}

function get_setting()
{
    $CI =& get_instance();
    $query = $CI->db->get('posts');
    $result = $query->result_array();
}