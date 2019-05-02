<?php
defined('BASEPATH') or die('No direct script access allowed');

class M_dashboard extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function count_data($table)
    {
        $result = array();
        $this->db->trans_start();
        for ($i=0; $i<count($table); $i++)
        {
            $result[] = $this->db->count_all($table[$i]);
        }
        $this->db->trans_complete();
        
        if ($result[0])
        {
            return $result;
        }
        else
        {
            return $this->db->error();
        }
    }
}
?>