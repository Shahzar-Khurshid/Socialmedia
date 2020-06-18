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

    private function getStatus($unique_key) {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('unique_key', $unique_key);
        $this->db->join('users', 'users.id = owner_id', 'left');
        $query = $this->db->get();
        if ($query->result()) {
            $query_result = (array) $query->result()[0];
            return $query_result;
        }
        return FALSE;
    }

    public function update_user($data, $user_data) {
        $this->load->database();
        $user = $this->get_user($this->getUserId($data['email']));
        if (!$user || !$user_data) {
            $this->error = "Enter a correct email";
            return;
        }
        if ($data['name']) {
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('name' => $data['name']));
        }
        if ($data['old-password'] and $data['new-password']) {
            $entered_password = sha1($data['old-password']);
            $stored_password = $user['password'];
            if ($entered_password != $stored_password) {
                $this->error = "You seem to have entered an incorrect current password";
                return;
            }
            $this->db->where('email', $data['email']);
            $this->db->update('users', array('password' => sha1($data['new-password'])));
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
        return $this->get_user($this->getUserId($data['email']));
    }

    public function insert_post($data, $user) {
        $this->load->database();
        if (!$user) {
            $this->error = "Some unknown error! Please contact Admin";
            return;
        }
        $status = trim($data['status']);
        if (!$status) {
            $this->error = "Enter some data";
            return;
        }

        $this->load->helper('string');
        $unique_id = random_string('alnum', 13);
        $date = date('Y-m-d H:i:s');

        $insert_post_data = [
            'content' => $data['status'],
            'unique_key' => $unique_id,
            'owner_id' => $user['id'],
            'created_at' => $date
        ];
        $this->db->insert("posts", $insert_post_data);

        return $this->getStatus($unique_id);
    }

    function fetch_data($limit, $start, $user, $id=0) {
        if(!$user){
            $this->error = "Some unknown error! Please contact admin";
            return;
        }
        
        if($id == 0){
            $where_statement = 'posts.id is not null';
        }
        else{
            $where_statement = 'owner_id';
        }
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->where($where_statement, $id);
        $this->db->order_by("posts.id", "DESC");
        $this->db->limit($limit, $start);
        $this->db->join('users', 'users.id = owner_id', 'left');
        $query = $this->db->get();
        return $query;
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
