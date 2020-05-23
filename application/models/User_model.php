<?php

/**
 *
 */
class User_model extends CI_Model {

    private $error = NULL;

    public function __construct() {
        parent:: __construct();
    }

    public function error() {
        return $this->error;
    }

    public function has_error() {
        return $this->error != NULL;
    }

    public function user_registration($data) {
        // code...
        $this->load->database();

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $data['email']);
        $query = $this->db->get();
        if ($query->result()) {
            $this->error = "Email already exist please login";
            return;
        }
        $date = date('Y-m-d H:i:s');
        $this->load->helper('string');
        $unique_id = random_string('alnum', 13);
        $insert_user_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => sha1($data['password']),
            'date_of_birth' => $data['date_of_birth'],
            'unique_id' => $unique_id,
            'created_at' => $date
        ];
        $this->db->insert("users", $insert_user_data);
        return $this->getUserId($data['email']);
    }

    public function validate_email_and_password($data) {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $data['email']);
        $query = $this->db->get();
        if (!$query->result()) {
            $this->error = "Email doesn't exist please Login";
            return;
        }

        $entered_password = sha1($data['password']);
        $query_result = (array) $query->result()[0];
        $stored_password = $query_result['password'];
        if ($entered_password != $stored_password) {
            $this->error = "You seem to have entered an incorrect password";
            return;
        }
        return $this->getUserId($data['email']);
    }

    public function get_user($id) {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->result()) {
            $query_result = (array) $query->result()[0];
            return $query_result;
        }
        return FALSE;
    }

    public function update_user($data) {
        $this->load->database();
        $user = $this->get_user($this->getUserId($data['email']));
        print_r($user);
        if (!$user) {
            $this->error = "Enter a correct email";
            return;
        }
        echo "Data ahead:";
        print_r($data);
        if ($data['name']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('name' => $data['name']));
        }
        if ($data['password']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('password' => $data['password']));
        }
        if ($data['date_of_birth']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('date_of_birth' => $data['date_of_birth']));
        }
        if ($data['date_of_birth']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('date_of_birth' => $data['date_of_birth']));
        }
        if ($data['college']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('college' => $data['college']));
        }
        if ($data['phone_number']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('phone_number' => $data['phone_number']));
        }
        return  $this->get_user($this->getUserId($data['email']));
    }

    private function getUserId($email) {
        $this->load->database();
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->result()) {
            $query_result = (array) $query->result()[0];
            $user_id = $query_result['id'];
            return $user_id;
        }
        return FALSE;
    }

}
