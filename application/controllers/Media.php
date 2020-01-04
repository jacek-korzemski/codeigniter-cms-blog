<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
    
    public function list_media_files($dir = false)
    {   
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        if ($dir == false)
        {
            $list_files = scandir(__DIR__.'/../../assets/uploads/');
            echo '<ul class="folder">';
            foreach ($list_files as $file)
            {
                if ($file == '.' || $file == '..')
                {
                    // do nothing
                }
                else
                {
                    echo '<li>'.$file.'</li>';
                }
            }
            echo '</ul>';
        }
        else
        {
            $list_files = scandir(__DIR__.'/../../assets/uploads/'.$dir.'/');
            echo '<ul class="images">';
            echo '<li class="back" onclick="go_back_media();">Powrót</li>';
            foreach ($list_files as $file)
            {
                if ($file == '.' || $file == '..')
                {
                    // do nothing
                }
                else
                {
                    echo '<li><img src="/assets/uploads/'.$dir.'/'.$file.'" alt="admin" style="max-width: 128px; height: auto;"/></li>';
                }
            }
            echo '</ul>';
        }
    }
}