<?php
defined('BASEPATH') or die('No direct Script Access Allowed');

class M_olah_data extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get($table, $id = NULL)
    {
        if ($id === NULL)
        {
            $result = $this->db->get($table);
            return $result->result_array();
        }
        $result = $this->db->get_where($table, array($id[0] => $id[1]));
        return $result->result_array();
    }

    public function check($table, $id)
    {
        $result = $this->db->get_where($table, array($id[0] => $id[1]));
        if ($result->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function store($table, $data)
    {
        if ($this->db->insert($table, $data))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit($table, $data, $id)
    {
        if ($this->db->update($table, $data, array($id[0] => $id[1])))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function del($table, $id)
    {
        if ($this->db->delete($table, array($id[0] => $id[1])))
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function get_inner_join($table, $select, $on, $condition = NULL)
    {
        $query = 'SELECT '.$select.' FROM '.$table[0].' ';
        
        $join = "";
        for ($i=1; $i<count($table); $i++)
        {
            $join .= 'INNER JOIN '.$table[$i].' ON '.$on[$i-1].' ';
        }

        if ($condition === NULL)
        {
            $res = $this->db->query($query.$join);
            if ($res)
            {
                return $res->result_array();
            }
            else
            {
                return $res->result_array();
            }
        }
        else
        {
            $res = $this->db->query($query.$join.'WHERE '.$condition[0].' = "'.$condition[1].'"');
            if ($res)
            {
                return $res->result_array();
            }
            else
            {
                return $res->result_array();
            }
        }
    }

    public function multi_store($table, $column, $values)
    {
        $this->db->trans_start();
        for ($i=0; $i<count($table); $i++)
        {
            $res[] = $this->db->query('INSERT INTO '.$table[$i].' '.$column[$i].' VALUES '.$values[$i].'; ');
            // $res[] = $this->db->insert($table[$i], $data[$i]);
        }
        $this->db->trans_complete();
        
        if ($res[0])
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function multi_edit($table, $set, $id)
    {
        $this->db->trans_start();
        for ($i=0; $i<count($table); $i++)
        {
            $res[] = $this->db->query('UPDATE '.$table[$i].' SET '.$set[$i].' WHERE '.$id[0].' = "'.$id[1].'";');
            // $this->db->update($table[$i], $data[$i], array($id[0] => $id[1]));
        }
        $this->db->trans_complete();

        if ($res[0])
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function multi_del($table, $id)
    {
        $this->db->trans_start();
        for ($i=0; $i<count($table); $i++)
        {
            $res[] = $this->db->query('DELETE FROM '.$table[$i].' WHERE '.$id[$i].'; ');
            // $this->db->del($table[$i], $id[$i]);
        }
        $this->db->trans_complete();

        if ($res[0])
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
?>