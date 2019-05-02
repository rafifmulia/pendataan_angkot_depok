<?php
defined('BASEPATH') or die('No Direct Script Access Allowed');

class Olah_data extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->username === NULL)
        {
            redirect(site_url('login'));
        }
        $this->load->library(array('form_validation','upload'));
        $this->load->helper(array('form'));
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

        $rules_form = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ),
            array(
                'field' => 'umur',
                'label' => 'Umur',
                'rules' => 'required'
            ),
            array(
                'field' => 'jk',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ),
            array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required'
            ),
            array(
                'field' => 'kode_pos',
                'label' => 'Kode Pos',
                'rules' => 'required'
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ) 
        );

        if ($this->input->post('tambah_data') !== NULL)
        {
            $this->form_validation->set_rules($rules_form);
    
            if ($this->form_validation->run() === FALSE)
            {
                $data['form_false'] = validation_errors();
            }
            else {
                $rules_file = array(
                    'upload_path' => 'assets/img/users',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => 1000,
                    'file_name' => time(),
                    'file_ext_tolower' => TRUE
                );
                $this->upload->initialize($rules_file);
                if (!$this->upload->do_upload('foto'))
                {
                    $data['upload_error'] = $this->upload->display_errors('','');
                }
                else
                {
                    $ins_data = array(
                        'foto_juragan' => $this->upload->data('file_name'),
                        'nama_juragan' => $this->input->post('nama'),
                        'umur' => $this->input->post('umur'),
                        'jenis_kelamin' => $this->input->post('jk'),
                        'agama' => $this->input->post('agama'),
                        'kode_pos' => $this->input->post('kode_pos'),
                        'alamat' => $this->input->post('alamat'),
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    if ($this->m_olah_data->store('juragan', $ins_data))
                    {
                        $data['success'] = "Data Berhasil Ditambahkan";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Ditambahkan';
                    }
                }
            }
        }
        else if ($this->input->get('id_detail', TRUE))
        {
            $data['detail'] = $this->m_olah_data->get('juragan', array('id_juragan',$this->input->get('id_detail')));
        }
        else if ($this->input->get('id_edit', TRUE))
        {
            $data['edit'] = $this->m_olah_data->get('juragan', array('id_juragan',$this->input->get('id_edit')));
            if ($this->input->post('edit_data', TRUE) !== NULL)
            {
                $this->form_validation->set_rules($rules_form);
        
                if ($this->form_validation->run() === FALSE)
                {
                    $data['form_false'] = validation_errors();
                }
                else {
                    if ($_FILES['foto']['error'] === 0)
                    {
                        $rules_file = array(
                            'upload_path' => 'assets/img/users',
                            'allowed_types' => 'gif|jpg|png',
                            'max_size' => 1000,
                            'file_name' => time(),
                            'file_ext_tolower' => TRUE
                        );
                        $this->upload->initialize($rules_file);
                        if (!$this->upload->do_upload('foto'))
                        {
                            $data['upload_error'] = $this->upload->display_errors('','');
                        }
                        else
                        {
                            $up_data = array(
                                'foto_juragan' => $this->upload->data('file_name'),
                                'nama_juragan' => $this->input->post('nama'),
                                'umur' => $this->input->post('umur'),
                                'jenis_kelamin' => $this->input->post('jk'),
                                'agama' => $this->input->post('agama'),
                                'kode_pos' => $this->input->post('kode_pos'),
                                'alamat' => $this->input->post('alamat')
                            );
                            if ($this->m_olah_data->edit('juragan', $up_data, array('id_juragan', $this->input->post('id')))
                            && unlink(APPPATH.'../assets/img/users/'.$data['edit'][0]['foto_juragan']))
                            {
                                $data['success'] = "Data Berhasil Diupdate";
                            }
                            else
                            {
                                $data['mistake'] = 'Data Gagal Diupdate';
                            }
                        }
                    }
                    else
                    {
                        $up_data = array(
                            'nama_juragan' => $this->input->post('nama'),
                            'umur' => $this->input->post('umur'),
                            'jenis_kelamin' => $this->input->post('jk'),
                            'agama' => $this->input->post('agama'),
                            'kode_pos' => $this->input->post('kode_pos'),
                            'alamat' => $this->input->post('alamat')
                        );
                        if ($this->m_olah_data->edit('juragan', $up_data, array('id_juragan', $this->input->post('id'))))
                        {
                            $data['success'] = "Data Berhasil Diupdate";
                        }
                        else
                        {
                            $data['mistake'] = 'Data Gagal Diupdate';
                        }
                    }
                }
            }
        }
        else if ($this->input->get('id_del', TRUE))
        {
            if ($this->m_olah_data->del('juragan', array('id_juragan',$this->input->get('id_del'))))
            {
                $data['success'] = "Data Berhasil Dihapus";
            }
            else
            {
                $data['mistake'] = "Data Gagal Dihapus";
            }
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/juragan', $data, true)
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

        $rules_form = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ),
            array(
                'field' => 'umur',
                'label' => 'Umur',
                'rules' => 'required'
            ),
            array(
                'field' => 'jk',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ),
            array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required'
            ),
            array(
                'field' => 'kode_pos',
                'label' => 'Kode Pos',
                'rules' => 'required'
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ) 
        );

        if ($this->input->post('tambah_data') !== NULL)
        {
            $this->form_validation->set_rules($rules_form);
    
            if ($this->form_validation->run() === FALSE)
            {
                $data['form_false'] = validation_errors();
            }
            else {
                $rules_file = array(
                    'upload_path' => 'assets/img/users',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => 1000,
                    'file_name' => time(),
                    'file_ext_tolower' => TRUE
                );
                $this->upload->initialize($rules_file);
                if (!$this->upload->do_upload('foto'))
                {
                    $data['upload_error'] = $this->upload->display_errors('','');
                }
                else
                {
                    $ins_data = array(
                        'foto_supir' => $this->upload->data('file_name'),
                        'nama_supir' => $this->input->post('nama'),
                        'umur' => $this->input->post('umur'),
                        'jenis_kelamin' => $this->input->post('jk'),
                        'agama' => $this->input->post('agama'),
                        'kode_pos' => $this->input->post('kode_pos'),
                        'alamat' => $this->input->post('alamat'),
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    if ($this->m_olah_data->store('supir', $ins_data))
                    {
                        $data['success'] = "Data Berhasil Ditambahkan";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Ditambahkan';
                    }
                }
            }
        }
        else if ($this->input->get('id_detail', TRUE))
        {
            $data['detail'] = $this->m_olah_data->get('supir', array('nip',$this->input->get('id_detail')));
        }
        else if ($this->input->get('id_edit', TRUE))
        {
            $data['edit'] = $this->m_olah_data->get('supir', array('nip',$this->input->get('id_edit')));
            if ($this->input->post('edit_data', TRUE) !== NULL)
            {
                $this->form_validation->set_rules($rules_form);
        
                if ($this->form_validation->run() === FALSE)
                {
                    $data['form_false'] = validation_errors();
                }
                else {
                    if ($_FILES['foto']['error'] === 0)
                    {
                        $rules_file = array(
                            'upload_path' => 'assets/img/users',
                            'allowed_types' => 'gif|jpg|png',
                            'max_size' => 1000,
                            'file_name' => time(),
                            'file_ext_tolower' => TRUE
                        );
                        $this->upload->initialize($rules_file);
                        if (!$this->upload->do_upload('foto'))
                        {
                            $data['upload_error'] = $this->upload->display_errors('','');
                        }
                        else
                        {
                            $up_data = array(
                                'foto_supir' => $this->upload->data('file_name'),
                                'nama_supir' => $this->input->post('nama'),
                                'umur' => $this->input->post('umur'),
                                'jenis_kelamin' => $this->input->post('jk'),
                                'agama' => $this->input->post('agama'),
                                'kode_pos' => $this->input->post('kode_pos'),
                                'alamat' => $this->input->post('alamat')
                            );
                            if ($this->m_olah_data->edit('supir', $up_data, array('nip', $this->input->post('id')))
                            && unlink(APPPATH.'../assets/img/users/'.$data['edit'][0]['foto_supir']))
                            {
                                $data['success'] = "Data Berhasil Diupdate";
                            }
                            else
                            {
                                $data['mistake'] = 'Data Gagal Diupdate';
                            }
                        }
                    }
                    else
                    {
                        $up_data = array(
                            'nama_supir' => $this->input->post('nama'),
                            'umur' => $this->input->post('umur'),
                            'jenis_kelamin' => $this->input->post('jk'),
                            'agama' => $this->input->post('agama'),
                            'kode_pos' => $this->input->post('kode_pos'),
                            'alamat' => $this->input->post('alamat')
                        );
                        if ($this->m_olah_data->edit('supir', $up_data, array('nip', $this->input->post('id'))))
                        {
                            $data['success'] = "Data Berhasil Diupdate";
                        }
                        else
                        {
                            $data['mistake'] = 'Data Gagal Diupdate';
                        }
                    }
                }
            }
        }
        else if ($this->input->get('id_del', TRUE))
        {
            if ($this->m_olah_data->del('supir', array('nip',$this->input->get('id_del'))))
            {
                $data['success'] = "Data Berhasil Dihapus";
            }
            else
            {
                $data['mistake'] = "Data Gagal Dihapus";
            }
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/supir', $data, true)
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

        if ($this->input->post('tambah_data') !== NULL)
        {
            $rules_form = array(
                array(
                    'field' => 'kode_angkot',
                    'label' => 'Kode Angkot',
                    'rules' => 'required|is_unique[data_angkot.kode_angkot]'
                ),
                array(
                    'field' => 'jumlah_angkot',
                    'label' => 'Jumlah Angkot',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'pemilik',
                    'label' => 'Pemilik',
                    'rules' => 'required|callback_check_pemilik'
                )
            );
            $this->form_validation->set_rules($rules_form);
    
            if ($this->form_validation->run() === FALSE)
            {
                $data['form_false'] = validation_errors();
            }
            else {
                $table = array(
                    'data_angkot','kepemilikan_angkot'
                );
                $column = array(
                    "(`kode_angkot`,`total_angkot`,`angkot_tersedia`,`angkot_terpakai`,`created_at`)",
			        "(`kode_angkot`,`id_juragan`)"
                );
                $values = array(
                    "(
                        '".$this->input->post('kode_angkot')."',".
                        $this->input->post('jumlah_angkot').",".
                        $this->input->post('jumlah_angkot').",
                        0, '".
                        date('Y-m-d H:i:s')."'
                    )",
                    "(
                        '".$this->input->post('kode_angkot')."', '".
                        $this->input->post('pemilik')."'
                    )"
                    
                );
                if ($this->m_olah_data->multi_store($table, $column, $values))
                {
                    $data['success'] = "Data Berhasil Ditambahkan";
                }
                else
                {
                    $data['mistake'] = 'Data Gagal Ditambahkan';
                }
            }
        }
        else if ($this->input->get('id_edit', TRUE))
        {
            $data['edit'] = $this->m_olah_data->get_inner_join($table, '*', $on, array('data_angkot.kode_angkot', $this->input->get('id_edit')));
            
            if ($this->input->post('edit_data', TRUE) !== NULL)
            {
                $rules_form = array(
                    array(
                        'field' => 'kode_angkot',
                        'label' => 'Kode Angkot',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'jumlah_angkot',
                        'label' => 'Jumlah Angkot',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'pemilik',
                        'label' => 'Pemilik',
                        'rules' => 'required|callback_check_pemilik'
                    )
                );
                $this->form_validation->set_rules($rules_form);
        
                if ($this->form_validation->run() === FALSE)
                {
                    $data['form_false'] = validation_errors();
                }
                else {
                    $table = array(
                        "data_angkot",
                        "kepemilikan_angkot"
                    );
                    $angkot_tersedia = $this->input->post('jumlah_angkot')-$data['edit'][0]['angkot_terpakai'];
                    $set = array(
                        '`total_angkot`="'.$this->input->post('jumlah_angkot').'",`angkot_tersedia`="'.$angkot_tersedia.'"',
		                '`id_juragan`="'.$this->input->post('pemilik').'"'
                    );
                    
                    if ($this->m_olah_data->multi_edit($table, $set, array('kode_angkot',$this->input->post('kode_angkot'))))
                    {
                        $data['success'] = "Data Berhasil Ditambahkan";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Ditambahkan';
                    }
                }
            }
        }
        else if ($this->input->get('id_del', TRUE))
        {
            $table = array(
                'penggunaan_angkot',
                'perutean',
                'kepemilikan_angkot',
                'data_angkot'
            );
            $id = array(
                'kode_angkot = "'.$this->input->get('id_del', TRUE).'"',
                'kode_angkot = "'.$this->input->get('id_del', TRUE).'"',
                'kode_angkot = "'.$this->input->get('id_del', TRUE).'"',
                'kode_angkot = "'.$this->input->get('id_del', TRUE).'"'
            );
            
            if ($this->m_olah_data->multi_del($table, $id))
            {
                $data['success'] = "Data Berhasil Dihapus";
            }
            else
            {
                $data['mistake'] = "Data Gagal Dihapus";
            }
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/angkot', $data, true)
        );
        $this->load->view('template/base_template', $view, false);
    }

    public function rute()
    {
        switch ($this->session->username)
        {
            case 'admin':
                #allowed
                break;
            case 'dishub':
                #allowed
                break;
            default:
                echo "<script>
                alert('Maaf Anda tidak punya akses untuk melakukan ini');
                ".redirect(site_url('dashboard'))."
                </script>";
                break;
        }

        $data['title'] = ucfirst('Rute');
        $data['datapath'] = ucfirst('Home / Olah Data / Rute');

        $this->load->model('m_olah_data');
        $table = array(
            "rute",
            "perutean",
            "data_angkot",
        );
        $on = array(
            "rute.id_rute = perutean.id_rute",
            "perutean.kode_angkot =  data_angkot.kode_angkot",
        );
        $data['data_rute'] = $this->m_olah_data->get_inner_join($table, '*', $on);

        if ($this->input->post('tambah_data') !== NULL)
        {
            $rules_form = array(
                array(
                    'field' => 'kode_angkot',
                    'label' => 'Kode Angkot',
                    'rules' => 'required|callback_due_ka_rute|callback_check_ka'
                ),
                array(
                    'field' => 'rute',
                    'label' => 'Rute',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($rules_form);
    
            if ($this->form_validation->run() === FALSE)
            {
                $data['form_false'] = str_replace(array('<p>','</p>','"'),' ',validation_errors(),$i);
            }
            else
            { 
                $check_rute = $this->m_olah_data->get('rute',array('rute',$this->input->post('rute')));
                if (!empty($check_rute))
                {
                    $ins_data = array(
                        'id_rute' => $check_rute[0]['id_rute'],
                        'kode_angkot' => $this->input->post('kode_angkot')
                    );
                    if ($this->m_olah_data->store('perutean', $ins_data))
                    {
                        $data['success'] = "Data Berhasil Ditambahkan";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Ditambahkan';
                    }
                }
                else
                {
                    $table = array(
                        'rute','perutean'
                    );
                    $column = array(
                        "(`rute`,`created_at`)",
                        "(`id_rute`,`kode_angkot`)"
                    );
                    $values = array(
                        "(
                            '".$this->input->post('rute')."',
                            '".date('Y-m-d H:i:s')."'
                        )",
                        "(
                            LAST_INSERT_ID(), '".
                            $this->input->post('kode_angkot')."'
                        )"
                        
                    );
                    if ($this->m_olah_data->multi_store($table, $column, $values))
                    {
                        $data['success'] = "Data Berhasil Ditambahkan";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Ditambahkan';
                    }
                }
                
            }
        }
        else if ($this->input->get('id_edit', TRUE))
        {
            $data['edit'] = $this->m_olah_data->get_inner_join($table, '*', $on, array('rute.id_rute', $this->input->get('id_edit')));
            
            if ($this->input->post('edit_data', TRUE) !== NULL)
            {
                $rules_form = array(
                    array(
                        'field' => 'id_rute',
                        'label' => 'Id Rute',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'rute',
                        'label' => 'Rute',
                        'rules' => 'required'
                    )
                );
                $this->form_validation->set_rules($rules_form);
                if ($this->form_validation->run() === FALSE)
                {
                    $data['form_false'] = validation_errors('','');
                }
                else {
                    $set = array(
                        'rute' => $this->input->post('rute')
                    );
                    if ($this->m_olah_data->edit('rute', $set, array('id_rute',$this->input->post('id_rute'))))
                    {
                        $data['success'] = "Data Berhasil Diedit";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Diedit';
                    }
                }
            }
        }
        else if ($this->input->get('id_del', TRUE))
        {
            $table = array(
                'perutean',
                'rute'
            );
            $id = array(
                'id_rute = "'.$this->input->get('id_del', TRUE).'"',
                'id_rute = "'.$this->input->get('id_del', TRUE).'"'
            );
            
            if ($this->m_olah_data->multi_del($table, $id))
            {
                $data['success'] = "Data Berhasil Dihapus";
            }
            else
            {
                $data['mistake'] = "Data Gagal Dihapus";
            }
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/rute', $data, true)
        );
        $this->load->view('template/base_template', $view, false);
    }

    public function jadwal()
    {
        switch ($this->session->username)
        {
            case 'admin':
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

        $data['title'] = ucfirst('Penjadwalan');
        $data['datapath'] = ucfirst('Home / Olah Data / Penugasan');

        $this->load->model('m_olah_data');
        $table = array(
            "jadwal_narik",
            "penugasan",
            "supir",
        );
        $on = array(
            "jadwal_narik.id_jadwal = penugasan.id_jadwal",
			"penugasan.nip =  supir.nip",
        );
        $data['data_jadwal'] = $this->m_olah_data->get_inner_join($table, '*', $on);

        $rules_form = array(
            array(
                'field' => 'awal_narik',
                'label' => 'Awal Narik',
                'rules' => 'required'
            ),
            array(
                'field' => 'akhir_narik',
                'label' => 'Akhir Narik',
                'rules' => 'required'
            ),
            array(
                'field' => 'nip',
                'label' => 'Nip Supir',
                'rules' => 'required|callback_check_supir'
            )
        );

        if ($this->input->post('tambah_data') !== NULL)
        {
            $this->form_validation->set_rules($rules_form);
    
            if ($this->form_validation->run() === FALSE)
            {
                $data['form_false'] = validation_errors();
            }
            else {
                $table = array(
                    'jadwal_narik','penugasan'
                );
                $column = array(
                    "(`awal_narik`,`akhir_narik`,`created_at`)",
			        "(`id_jadwal`,`nip`)"
                );
                $values = array(
                    "(
                        '".$this->input->post('awal_narik')."' , '".
                        $this->input->post('akhir_narik')."' , '".
                        date('Y-m-d H:i:s')."'
                    )",
                    "(
                        LAST_INSERT_ID(), ".
                        $this->input->post('nip')."
                    )"
                    
                );
                if ($this->m_olah_data->multi_store($table, $column, $values))
                {
                    $data['success'] = "Data Berhasil Ditambahkan";
                }
                else
                {
                    $data['mistake'] = 'Data Gagal Ditambahkan';
                }
            }
        }
        else if ($this->input->get('id_edit', TRUE))
        {
            $data['edit'] = $this->m_olah_data->get_inner_join($table, '*', $on, array('jadwal_narik.id_jadwal', $this->input->get('id_edit')));
            
            if ($this->input->post('edit_data', TRUE) !== NULL)
            {
                $this->form_validation->set_rules($rules_form);
        
                if ($this->form_validation->run() === FALSE)
                {
                    $data['form_false'] = validation_errors();
                }
                else {
                    $table = array(
                        "jadwal_narik",
                        "penugasan"
                    );
                    $set = array(
                        '`awal_narik`="'.$this->input->post('awal_narik').'",`akhir_narik`="'.$this->input->post('akhir_narik').'"',
		                '`nip`="'.$this->input->post('nip').'"'
                    );
                    
                    if ($this->m_olah_data->multi_edit($table, $set, array('id_jadwal',$this->input->post('id_jadwal'))))
                    {
                        $data['success'] = "Data Berhasil Diedit";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Diedit';
                    }
                }
            }
        }
        else if ($this->input->get('id_del', TRUE))
        {
            $table = array(
                'penugasan',
                'jadwal_narik'
            );
            $id = array(
                'id_jadwal = "'.$this->input->get('id_del', TRUE).'"',
                'id_jadwal = "'.$this->input->get('id_del', TRUE).'"'
            );
            
            if ($this->m_olah_data->multi_del($table, $id))
            {
                $data['success'] = "Data Berhasil Dihapus";
            }
            else
            {
                $data['mistake'] = "Data Gagal Dihapus";
            }
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/jadwal', $data, true)
        );
        $this->load->view('template/base_template', $view, false);
    }

    public function penggunaan()
    {
        switch ($this->session->username)
        {
            case 'admin':
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

        $data['title'] = ucfirst('Penggunaan Angkot');
        $data['datapath'] = ucfirst('Home / Olah Data / Penugasan');

        $this->load->model('m_olah_data');
        $table = array(
            "penggunaan_angkot",
            "data_angkot",
            "supir",
        );
        $on = array(
            "penggunaan_angkot.kode_angkot = data_angkot.kode_angkot",
			"penggunaan_angkot.nip = supir.nip",
        );
        $data['data_penggunaan'] = $this->m_olah_data->get_inner_join($table, '*', $on);

        $rules_form = array(
            array(
                'field' => 'kode_angkot',
                'label' => 'Awal Narik',
                'rules' => 'required|callback_check_ka'
            ),
            array(
                'field' => 'nip',
                'label' => 'Nip Supir',
                'rules' => 'required|callback_check_supir'
            )
        );

        if ($this->input->post('tambah_data') !== NULL)
        {
            $this->form_validation->set_rules($rules_form);
    
            if ($this->form_validation->run() === FALSE)
            {
                $data['form_false'] = validation_errors();
            }
            else {
                $table = 'penggunaan_angkot';
                $ins_data = array(
                    'kode_angkot'=>$this->input->post('kode_angkot'),
                    'nip'=>$this->input->post('nip')
                );

                if ($this->m_olah_data->check('penggunaan_angkot', array('nip',$ins_data['nip'])) === TRUE)
                {
                    $data['mistake'] = 'Supir sudah mempunyai angkot untuk narik \n Silahkan cari supir yang lain';
                }
                else
                {
                    if ($this->m_olah_data->store($table, $ins_data))
                    {
                        $data['success'] = "Data Berhasil Ditambahkan";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Ditambahkan';
                    }
                }
            }
        }
        else if ($this->input->get('id_edit', TRUE))
        {
            $data['edit'] = $this->m_olah_data->get('penggunaan_angkot', array('id_penggunaan',$this->input->get('id_edit', TRUE)));
            
            if ($this->input->post('edit_data', TRUE) !== NULL)
            {
                $this->form_validation->set_rules($rules_form);
        
                if ($this->form_validation->run() === FALSE)
                {
                    $data['form_false'] = validation_errors();
                }
                else {
                    $table = 'penggunaan_angkot';
                    $data_edit = array(
                        'nip'=>$this->input->post('nip')
                    );
                    
                    if ($this->m_olah_data->edit($table, $data_edit, array('id_penggunaan',$this->input->post('id_penggunaan'))))
                    {
                        $data['success'] = "Data Berhasil Diedit";
                    }
                    else
                    {
                        $data['mistake'] = 'Data Gagal Diedit';
                    }
                }
            }
        }
        else if ($this->input->get('id_del', TRUE))
        {
            $table = array(
                'penugasan',
                'jadwal_narik'
            );
            $id = array(
                'id_jadwal = "'.$this->input->get('id_del', TRUE).'"',
                'id_jadwal = "'.$this->input->get('id_del', TRUE).'"'
            );
            
            if ($this->m_olah_data->multi_del($table, $id))
            {
                $data['success'] = "Data Berhasil Dihapus";
            }
            else
            {
                $data['mistake'] = "Data Gagal Dihapus";
            }
        }

        $view = array(
            'page' => $this->load(),
            'content' => $this->load->view('content/penggunaan', $data, true)
        );
        $this->load->view('template/base_template', $view, false);
    }



    // CALLBACK FORM VALIDATION
    public function check_pemilik($val)
    {
        if ($this->m_olah_data->check('juragan', array('id_juragan',$val)) === TRUE)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_pemilik', 'id_juragan tidak ditemukan');
            return FALSE;
        }
    }

    public function check_supir($val)
    {
        if ($this->m_olah_data->check('supir', array('nip',$val)) === FALSE)
        {
            $this->form_validation->set_message('check_supir', 'nip tidak ditemukan');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function check_ka($val)
    {
        if ($this->m_olah_data->check('data_angkot', array('kode_angkot',$val)) === FALSE)
        {
            $this->form_validation->set_message('check_ka', 'kode angkot tidak ditemukan');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function due_ka_rute($val)
    {
        if ($this->m_olah_data->check('perutean', array('kode_angkot',$val)) === TRUE)
        {
            $this->form_validation->set_message('due_ka_rute', 'kode angkot telah digunakan');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
?>