<?php
defined('BASEPATH') or die('No direct script access allowed');

class Pendataan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->username === NULL)
        {
            redirect(site_url('login'));
        }
    }

    public function load()
    {
        $page = array(
            'head' => $this->load->view('template/head', false, true),
            'navside' => $this->load->view('template/navside', false, true),
            'navtop' => $this->load->view('template/navtop', false, true),
            'footer' => $this->load->view('template/footer', false, true),
            'control_sidebar' => $this->load->view('template/control_sidebar', false, true),
            'main_js' => $this->load->view('template/main_js', false, true)
        );
        return $page;
    }

    public function juragan()
    {
        switch ($this->session->username)
        {
            case 'admin':
                #allowed
                break;
            case 'hrd':
                #allowed
                break;
            case 'sekretaris':
                #allowed
                break;
            default:
                echo "<script>
                alert('Maaf Anda tidak punya akses untuk melakukan ini');
                ".redirect(site_url('dashboard'))."
                </script>";
                break;
        }

        $data['title'] = ucfirst('Juragan');
        $data['datapath'] = ucfirst('Home / Olah Data / Juragan');

        $this->load->model('m_olah_data');
        $data['data_juragan'] = $this->m_olah_data->get('juragan');

        if ($this->input->get('id_detail', TRUE))
        {
            $data['detail'] = $this->m_olah_data->get('juragan', array('id_juragan',$this->input->get('id_detail')));
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/view_juragan', $data, true)
        );
        $this->load->view('template/base_template', $view, false); 
    }

    public function supir()
    {
        switch ($this->session->username)
        {
            case 'admin':
                #allowed
                break;
            case 'hrd':
                #allowed
                break;
            case 'manager':
                #allowed
                break;
            default:
                echo "<script>
                alert('Maaf Anda tidak punya akses untuk melakukan ini');
                ".redirect(site_url('dashboard'))."
                </script>";
                break;
        }

        $data['title'] = ucfirst('Supir');
        $data['datapath'] = ucfirst('Home / Olah Data / Supir');

        $this->load->model('m_olah_data');
        $data['data_supir'] = $this->m_olah_data->get('supir');

        if ($this->input->get('id_detail', TRUE))
        {
            $data['detail'] = $this->m_olah_data->get('supir', array('nip',$this->input->get('id_detail')));
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/view_supir', $data, true)
        );
        $this->load->view('template/base_template', $view, false); 
    }

    public function angkot()
    {
        switch ($this->session->username)
        {
            case 'admin':
                #allowed
                break;
            case 'sekretaris':
                #allowed
                break;
            case 'manager':
                #allowed
                break;
            default:
                echo "<script>
                alert('Maaf Anda tidak punya akses untuk melakukan ini');
                ".redirect(site_url('dashboard'))."
                </script>";
                break;
        }

        $data['title'] = ucfirst('Angkot');
        $data['datapath'] = ucfirst('Home / Olah Data / Angkot');

        $this->load->model('m_olah_data');
        $table = array(
            "data_angkot",
            "kepemilikan_angkot",
            "juragan",
        );
        $on = array(
            "data_angkot.kode_angkot = kepemilikan_angkot.kode_angkot",
            "kepemilikan_angkot.id_juragan =  juragan.id_juragan",
        );
        $data['data_angkot'] = $this->m_olah_data->get_inner_join($table, '*', $on);

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/view_angkot', $data, true)
        );
        $this->load->view('template/base_template', $view, false);
    }

}
?>