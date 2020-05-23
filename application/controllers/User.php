<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $user = Null;

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'])) {
            header('Location: ' . base_url() . 'index.php/Login');
            return;
        }

        $this->load->model('user_model');
        $this->user = $this->user_model->get_user($_SESSION['user_id']);

        if (!$this->user) {
            header('Location: ' . base_url() . 'index.php/Login');
            return;
        }
    }

    public function index() {
        $this->load->view('home', array('user' => $this->user));
    }

    public function profile() {
        $this->load->view('edit_profile', array('user' => $this->user));
    }

    public function submit_post() {
        
    }

    public function update_info_submit() {
        $this->load->model('user_model');
        $post_input = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'college' => $this->input->post('college'),
            'phone_number' => $this->input->post('phone_number')
        );
        
        $new_data = $this->user_model->update_user($post_input);
        if ($this->user_model->has_error()) {
            $data = array(
                "success" => false,
                "errorMessage" => $this->user_model->error()
            );
            $this->load->view('json_response', array('data' => $data));
            return;
        }

        $data = array(
            "success" => true,
            "successMessage" => 'Information updated',
            "new_data" => $new_data
        );
        echo "Post input:";
        print_r($post_input);
        $this->load->view('json_response', array('data' => $data));
    }

}
