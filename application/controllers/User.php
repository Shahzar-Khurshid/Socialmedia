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
            'old-password' => $this->input->post('old-password'),
            'new-password' => $this->input->post('new-password'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'college' => $this->input->post('college'),
            'phone_number' => $this->input->post('phone_number')
        );

        $new_data = $this->user_model->update_user($post_input, $this->user);
        $new_data['password'] = " ";
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
        $this->load->view('json_response', array('data' => $data));
    }

    public function insert_status_submit() {
        $this->load->model('user_model');
        $post_input = array(
            'id' => $this->input->post('id'),
            'unique_id' => $this->input->post('unique_id'),
            'status' => $this->input->post('status')
        );

        $status_data = $this->user_model->insert_post($post_input, $this->user);
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
            "status_data" => $status_data
        );
//        print_r($status_data);
        $this->load->view('json_response', array('data' => $data));
    }

    function fetch() {
        $this->load->model('user_model');
        $post_input = array(
            'limit' => $this->input->post('limit'),
            'start' => $this->input->post('start'),
            'user_id' => $this->input->post('user_id')
        );
        //pass is through session too, find a way to implement fetch personal post and all post through this function
        $query_result = $this->user_model->fetch_data($post_input['limit'], $post_input['start'], $this->user, $post_input['user_id']);
        if ($this->user_model->has_error()) {
            $data = array(
                "success" => false,
                "errorMessage" => $this->user_model->error()
            );
            $this->load->view('json_response', array('data' => $data));
            return;
        }
        $status_data = '';
        if ($query_result->num_rows() > 0) {
            $status_data = (array) $query_result->result();
        }
        $data = array(
            "success" => true,
            "status_data" => $status_data
        );
        $this->load->view('json_response', array('data' => $data));
    }

}
