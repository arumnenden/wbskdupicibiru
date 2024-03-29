<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('tglindo');
        $this->load->model('Landing_model', 'landing');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title'] = 'Helpdesk';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['berita'] = $this->landing->getBeritaLimit();
        $data['promkes'] = $this->landing->getPromkesLimit();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function add_user()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[mst_user.username]', array(
            'is_unique' => 'SIMPAN GAGAL !!.. Username sudah ada'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
            'matches' => 'Password tidak sama',
            'min_length' => 'password min 3 karakter'
        ));
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header');
            $this->load->view('landing/index');
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => 'User',
                'date_created' => date('Y/m/d'),
                'image' => 'default.jpg',
                'is_active' => 1,
                'activated' => 1
            );
            $this->db->insert('mst_user', $data);
            $this->session->set_flashdata('message', 'Pendaftaran');
            $this->session->set_flashdata('msg',  '<div class="alert alert-success text-center" role="alert">Silahkan Login dengan Akun yang telah dibuat</div>');
            redirect('auth/index');
        }
    }

    public function artikel()
    {
        $data['title'] = 'Artikel';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['berita'] = $this->landing->getBerita();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/artikel', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detail($id_berita)
    {
        $data['title'] = 'News';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id_berita])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/detail', $data);
        $this->load->view('layout/footer', $data);
    }

    public function all_berita()
    {
        $data['title'] = 'Semua Berita';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();

        $total_rows = $this->landing->getBeritaAllSingle()->num_rows();
        $config['base_url'] = base_url('landing/all_berita');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['berita'] = $this->landing->getBeritaAll($config["per_page"], $data['page'])->result_array();
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/all_berita', $data);
        $this->load->view('layout/footer', $data);
    }

    public function promosi()
    {
        $data['title'] = 'Promosi';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['promkes'] = $this->landing->getpromkes();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/promosi', $data);
        $this->load->view('layout/footer', $data);
    }


    public function pkk()
    {
        $data['title'] = 'PKK';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['pkk'] = $this->landing->getpkk();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/pkk', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detail3($id_pkk)
    {
        $data['title'] = 'pkk';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['pkk'] = $this->db->get_where('tb_pkk', ['id_pkk' => $id_pkk])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/detail3', $data);
        $this->load->view('layout/footer', $data);
    }

    public function all_pkk()
    {
        $data['title'] = 'Semua pkk';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();

        $total_rows = $this->landing->getpkkAllSingle()->num_rows();
        $config['base_url'] = base_url('landing/all_pkk');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pkk'] = $this->landing->getpkkAll($config["per_page"], $data['page'])->result_array();
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/all_pkk', $data);
        $this->load->view('layout/footer', $data);
    }
    public function detail2($id_promkes)
    {
        $data['title'] = 'prks';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();
        $data['promkes'] = $this->db->get_where('tb_promkes', ['id_promkes' => $id_promkes])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/detail2', $data);
        $this->load->view('layout/footer', $data);
    }

    public function all_promkes()
    {
        $data['title'] = 'Semua promkes';
        $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();

        $total_rows = $this->landing->getpromkesAllSingle()->num_rows();
        $config['base_url'] = base_url('landing/all_promkes');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['promkes'] = $this->landing->getpromkesAll($config["per_page"], $data['page'])->result_array();
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layout/header', $data);
        $this->load->view('landing/all_promkes', $data);
        $this->load->view('layout/footer', $data);
    }
}
