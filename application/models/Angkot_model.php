<?php
defined('BASEPATH') or die('No Direct Script Access Allowed');

class Angkot_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('data_angkot');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('data_angkot',array('kode_angkot' => $slug));
        return $query->result_array();
    }
}
?>