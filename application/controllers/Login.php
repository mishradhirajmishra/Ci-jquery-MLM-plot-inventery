<?php

if (!defined('BASEPATH'))
    exit('Ohhh... This is Cheating you are not suppose to do this.Cheater :)');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('session');
    }

    function index()
    {
        $this->load->view('login/login');
    }

    function login()
    {
        $user = $this->input->post('username');
        $password = $this->input->post('pass');

        $result = $this->login_model->validate_login($user, $password);

        if ($result) {
            if($result['user_role']=='admin') {
                $newdata = array(
                    'user_id' => $result['user_id'],
                    'username' => $result['user_name'],
                    'email' => $result['user_email'],
                    'user_role' => $result['user_role'],
                    'mobile_no' => $result['user_phone'],
                    'profile_image' => $result['profile_image'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('item', 'login Successfully.');
                redirect(base_url() . "admin");

            }
            else{
                $newdata = array(
                    'user_id' => $result['user_id'],
                    'username' => $result['user_name'],
                    'email' => $result['user_email'],
                    'position' => $result['user_role'],
                    'user_role' => 'user',
                    'mobile_no' => $result['user_phone'],
                    'profile_image' => $result['profile_image'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                $this->session->set_flashdata('item', 'login Successfully.');
                redirect(base_url() . "user");

            }



        } else {
            $this->session->set_flashdata('item', 'Wrong username or password.');
            redirect(base_url() . "login");
        }

    }
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('item', 'Log Out  Successfully .');
        redirect(base_url() . "login");
    }

}
