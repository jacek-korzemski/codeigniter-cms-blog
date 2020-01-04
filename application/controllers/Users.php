<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function login()
    {
        $this->form_validation->set_rules('username', 'Nazwa użytkownika', 'required');
        $this->form_validation->set_rules('password', 'Hasło', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $user_id = $this->user_model->login($username, $password);

            if ($user_id) {

                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data); 
                
                redirect('/admin/dashboard');
            } else {
                $this->session->set_flashdata('login-failed', 'true');
                redirect('/admin/login'); 
            }
        }
    }

    public function logout() 
    {
        $this->session->unset_userdata('logged_in'); 
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id'); 

        redirect('/admin/login');
    } 
} 