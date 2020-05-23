<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!isset($_SESSION)) {
            session_start();
        }
        
    }

    public function index() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {
            header('Location: ' . './User');
            return;
        }
        $this->load->view("login");
    }

    public function logout() {
        
        session_destroy();
        header('Location: ' . base_url() . 'index.php/Login');
    }

    public function submit() {
        $this->load->model('user_model');
        $post_input = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];
        $user_id = $this->user_model->validate_email_and_password($post_input);
        if ($this->user_model->has_error()) {
            $data = array(
                "success" => false,
                "errorMessage" => $this->user_model->error()
            );
            $this->load->view('json_response', array('data' => $data));
            return;
        }
        $data = array(
            "is_redirect" => true,
            "redirect_url" => './User/'
        );
        
        $_SESSION['user_id'] = $user_id;
        
        $this->load->view('json_response', array('data' => $data));
    }

}
