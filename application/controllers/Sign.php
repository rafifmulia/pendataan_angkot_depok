<?php
defined('BASEPATH') or die('No Direct Script Access Allowed');

class Sign extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!file_exists(APPPATH.'/views/single_page/sign.php'))
        {
            show_404();
        }

        $this->load->view('single_page/sign');
    }

    public function check()
    {

        $set_rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($set_rules);

        if ($this->form_validation->run() === FALSE)
        {
            // $data['empty_form'] = "Isikan Data Dengan Lengkap";
        }
        else
        {
            $this->load->model('sign_model');
            $sign_in = $this->sign_model->sign_in();

            if ($sign_in)
            {
                $this->session->username = $sign_in[0]->user;
                $data['form_success'] = isset($this->session->username) ? "Login Berhasil":"Session error" ;
            }
            else
            {
                $data['data_error'] = "Username / Password Yang Anda Masukan Salah";
            }
        }

        $this->load->view('single_page/sign', $data);
    }

    public function logout()
    {
        session_unset($this->session->username);
        sleep(1);
        redirect(site_url('login'));
    }
}
?>