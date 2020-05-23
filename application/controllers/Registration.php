<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function index() {
        $this->load->view('registration');
    }

    public function submit() {
        $this->load->model('user_model');
        $post_input = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'date_of_birth' => $this->input->post('date_of_birth')
        );
        $user_id = $this->user_model->user_registration($post_input);

        if ($this->user_model->has_error()) {
            $data = array(
                "success" => false,
                "errorMessage" => $this->user_model->error()
            );
            $this->load->view('json_response',array('data' => $data));
            return;
        }
        $data = array(
          "is_redirect" => true,
          "redirect_url" => './User'
        );
        $_SESSION['user_id'] = $user_id;
        
        $this->load->view('json_response', array('data' => $data));
    }

}
