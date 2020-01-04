<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{
    function start_searching()
    {
        $data = [
            'seo_title' => 'Wyszukiwanie w FajnaSprawa.pl',
            'seo_desc' => 'Jeśli szukasz czegoś fajnego, to jest duża szansa że coś tu znajdziesz - z pomocą naszej wyszukiwarki!',
            'seo_robots' => 'index'
        ];

        $this->load->view('page/header',$data);
        $this->load->view('special/search');
        $this->load->view('page/footer');
    }

    function search_keyword()
    {
        $data = [
            'seo_title' => 'Wyszukiwanie w FajnaSprawa.pl',
            'seo_desc' => 'Wyniki wyszukiwania w FajnaSprawa.pl',
            'seo_robots' => 'noindex'
        ];

        $keyword = $this->input->post('keyword');
        $data['results_by_title'] = $this->search_model->search_title($keyword);
        $data['results_by_body'] = $this->search_model->search_body($keyword);

        $this->load->view('page/header',$data);
        $this->load->view('special/search_result', $data);
        $this->load->view('page/footer');
    }
}