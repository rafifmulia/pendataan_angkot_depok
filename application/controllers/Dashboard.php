<?php
defined('BASEPATH') or die('No Direct Script Access Allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->username === NULL)
        {
            redirect(site_url('login'));
        }
        $this->load->helper(array('array'));
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

    public function index()
    {   
        $this->load->model('m_dashboard');
        
        switch ($this->session->username)
        {
            case 'hrd':
            $data['table'] = array("juragan","supir");
            $data['design'] = array(
            "colour"=>array("bg-aqua","bg-red"),
            "icon"=>array("fa fa-user","fa fa-car"),
            );
            break;
        case 'sekretaris':
            $data['table'] = array("juragan","data_angkot");
            $data['design'] = array(
            "colour"=>array("bg-aqua","bg-red"),
            "icon"=>array("fa fa-user","fa fa-car"),
            );
            break;
        case 'dishub':
            $data['table'] = array("data_angkot","perutean");
            $data['design'] = array(
              "colour"=>array("bg-red","bg-green"),
              "icon"=>array("fa fa-car","fa fa-map"),
            );
            break;
        case 'manager':
            $data['table'] = array("supir","penggunaan_angkot","penugasan","jadwal_narik");
            $data['design'] = array(
            "colour"=>array("bg-aqua","bg-red","bg-green","bg-yellow"),
            "icon"=>array("fa fa-user","fa fa-car","fa fa-list-ul","fa fa-list-ul"),
            );
            break;
            case 'admin':
            $data['table'] = array("juragan","supir","data_angkot","rute","jadwal_narik");
            $data['design'] = array(
            "colour"=>array("bg-aqua","bg-red","bg-green","bg-yellow","bg-light-blue"),
            "icon"=>array("fa fa-user","fa fa-user","fa fa-car","fa fa-map","fa fa-list-ul"),
            );
            break;
        default:
            # code...
            break;
        }
        
        $data['count_res'] = $this->m_dashboard->count_data($data['table']);
        $data['title'] = 'Dashboard';
        $data['datapath'] = 'Home';
        
        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/dashboard', $data, true),
            // 'css_inside' => $this->load->view('css_inside/angkot.css', false, true),
            // 'js_inside' => $this->load->view('js_inside/angkot.js', false, true)
        );
        $this->load->view('template/base_template', $view, false);
    }

    public function test_view($slug, $page = 'angkot')
    {
        $this->load->model('angkot_model');
        if (!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            show_404();
        }
        
        $header['title'] = ucfirst('detail '.$page);
        $data['data_angkot'] = $this->angkot_model->get($slug);

        $this->load->view('demo_templates/header', $header);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('demo_templates/footer', $header);
    }
}
?>