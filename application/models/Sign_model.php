<?php
defined('BASEPATH') or die('No direct Script Access Allowed');

class Sign_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->db->protect_identifiers('mysql.user');
    }

    public function sign_in()
    {
        $username = $this->db->escape_str($this->input->post('username'));
        $password = $this->db->escape_str($this->input->post('password'));

        $sql = "SELECT user, password FROM mysql.user WHERE user = ? AND password=password(?)";
        $query = $this->db->query($sql, array($username,$password));

        if ($query)
        {
            return $query->result();
        }
        else 
        {
            return $this->db->error();
        }
    }
}
?>