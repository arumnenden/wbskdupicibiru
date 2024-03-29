<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_admin();
        $this->load->helper('tglindo');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['count_user'] = $this->admin->countJmlUser();
        $data['count_komplain_belum'] = $this->admin->countBelum();
        $data['count_komplain_proses'] = $this->admin->countProses();
        $data['count_clear'] = $this->admin->countClear();
        $data['list_komplain'] = $this->admin->getKomplain();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['count_user'] = $this->admin->countJmlUser();
            $data['count_komplain_belum'] = $this->admin->countBelum();
            $data['count_komplain_proses'] = $this->admin->countProses();
            $data['count_clear'] = $this->admin->countClear();
            $data['list_komplain'] = $this->admin->getKomplain();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/dist/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_user = $this->input->post('id', true);
                    $data['mst_user'] = $this->db->get_where('mst_user', ['id' => $id_user])->row_array();
                    $old_image = $data['mst_user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Ubah Profile Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('admin/index');
                }
            }
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/index');
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['count_user'] = $this->admin->countJmlUser();
            $data['count_komplain_belum'] = $this->admin->countBelum();
            $data['count_komplain_proses'] = $this->admin->countProses();
            $data['count_clear'] = $this->admin->countClear();
            $data['list_komplain'] = $this->admin->getKomplain();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('admin/index');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('mst_user');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('admin/index');
            }
        }
    }

    public function list_user()
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

            $data['title'] = 'List User';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_user'] = $this->db->get('mst_user')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'level' => $this->input->post('level', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => date('Y/m/d'),
                'image' => 'default.jpg',
                'is_active' => 1,
                'activated' => 1
            );
            $this->db->insert('mst_user', $data);
            $this->session->set_flashdata('message', 'Tambah user');
            redirect('admin/list_user');
        }
    }

    public function edit_user()
    {
        echo json_encode($this->admin->getUserEdit($_POST['id']));
    }

    public function proses_edit_user()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $level = $this->input->post('level');
        $is_active = $this->input->post('is_active');

        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('level', $level);
        $this->db->set('is_active', $is_active);

        $this->db->where('id', $id);
        $this->db->update('mst_user');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/list_user');
    }

    public function edit_password()
    {
        $id = $this->input->post('id_user');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->db->set('password', $password);

        $this->db->where('id', $id);
        $this->db->update('mst_user');
        $this->session->set_flashdata('message', 'Reset Password');
        redirect('admin/list_user');
    }

// pertama
//     public function del_user($id)
//     {
//         $data['member'] = $this->db->get_where('mst_member', ['sess_id' => $id])->row_array();

//         if ($data['member']['sess_id'] == $id) {
//             $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Data tidak dapat dihapus karena sudah verifikasi</div>');
//             redirect('admin/list_user');
//         } else {
//             $this->db->where('id', $id);
//             $this->db->delete('mst_user');
//             $this->session->set_flashdata('message', 'Hapus data');
//             redirect('admin/list_user');
//         }
//     }
    
    public function del_user($id)
    {
        $data['member'] = $this->db->get_where('mst_member', ['sess_id' => $id])->row_array();

        if ($data['sess_id'] == $id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Data tidak dapat dihapus karena sudah verifikasi</div>');
            redirect('admin/list_user');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('mst_user');
            $this->session->set_flashdata('message', 'Hapus data');
            redirect('admin/list_user');
        }
    }

    public function list_member()
    {
        $data['title'] = 'User Verifikasi';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_member'] = $this->admin->getMember();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_member', $data);
        $this->load->view('templates/footer');
    }

    public function list_komplain()
    {
        $data['title'] = 'List Komplain';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_komplain'] = $this->admin->getKomplain();
        // print_r($data['list_komplain']);
        // die();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_komplain', $data);
        $this->load->view('templates/footer');
    }

    public function get_edit_komplain()
    {
        // Menggunakan $_POST jika data dikirim melalui metode POST
        echo json_encode($this->admin->getEditKomplain($_POST['id_komplain']));
    }

    public function edit_komplain()
    {
        $this->form_validation->set_rules('id_komplain', 'id_komplain', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'List Komplain';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_komplain'] = $this->admin->getKomplain();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_komplain', $data);
            $this->load->view('templates/footer');
        } else {
            $id_komplain = $this->input->post('id_komplain', true);
            $tanggapan = $this->input->post('tanggapan', true);
            $status_komplain = $this->input->post('status_komplain', true);
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status_komplain', $status_komplain);
            $this->db->where('id_komplain', $id_komplain);
            $this->db->update('tb_komplain');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/list_komplain');
        }
    }



    public function del_komplain($id_komplain)
    {
        $_id = $this->db->get_where('tb_komplain', ['id_komplain' => $id_komplain])->row();
        $query = $this->db->delete('tb_komplain', ['id_komplain' => $id_komplain]);
        if ($query) {
            unlink("assets/images/" . $_id->image);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_komplain');
    }


    public function list_sspindah()
    {
        $data['title'] = 'List Permohonan Surat Pindah';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_sspindah'] = $this->admin->getSspindah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_sspindah', $data);
        $this->load->view('templates/footer');
    }

    public function get_edit_sspindah()
    {
        echo json_encode($this->admin->getEditSspindah($_POST['id_sspindah']));
    }

    public function edit_sspindah()
    {
        $this->form_validation->set_rules('id_sspindah', 'id_sspindah', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'List sspindah';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sspindah'] = $this->admin->getSspindah();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_sspindah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_filebalas = $_FILES['filebalas']['name'];
            if ($upload_filebalas) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('filebalas')) {
                    $id_sspindah = $this->input->post('id_sspindah', true);
                    $data['sspindah'] = $this->db->get_where('tb_sspindah', ['id_sspindah' => $id_sspindah])->row_array();
                    $old_filebalas = $data['sspindah']['filebalas'];
                    if ($old_filebalas != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_filebalas);
                    }
                    $new_filebalas = $this->upload->data('file_name');
                    $this->db->set('filebalas', $new_filebalas);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/index');
                }
            }
            $id_sspindah = $this->input->post('id_sspindah', true);
            $tanggapan = $this->input->post('tanggapan', true);
            $status_sspindah = $this->input->post('status_sspindah', true);
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status_sspindah', $status_sspindah);
            $this->db->where('id_sspindah', $id_sspindah);
            $this->db->update('tb_sspindah');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/list_sspindah');
        }
    }

    public function del_sspindah($id_sspindah)
    {
        $_id = $this->db->get_where('tb_sspindah', ['id_sspindah' => $id_sspindah])->row();
        $query = $this->db->delete('tb_sspindah', ['id_sspindah' => $id_sspindah]);
        if ($query) {
            unlink("assets/images/" . $_id->image);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_sspindah');
    }



    public function list_ssktm()
    {
        $data['title'] = 'List Permohonan SKTM';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_ssktm'] = $this->admin->getSsktm();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_ssktm', $data);
        $this->load->view('templates/footer');
    }

    public function get_edit_ssktm()
    {
        echo json_encode($this->admin->getEditSsktm($_POST['id_ssktm']));
    }

    public function edit_ssktm()
    {
        $this->form_validation->set_rules('id_ssktm', 'id_ssktm', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'List ssktm';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktm'] = $this->admin->getSsktm();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_ssktm', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_filebalas = $_FILES['filebalas']['name'];
            if ($upload_filebalas) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('filebalas')) {
                    $id_ssktm = $this->input->post('id_ssktm', true);
                    $data['ssktm'] = $this->db->get_where('tb_ssktm', ['id_ssktm' => $id_ssktm])->row_array();
                    $old_filebalas = $data['ssktm']['filebalas'];
                    if ($old_filebalas != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_filebalas);
                    }
                    $new_filebalas = $this->upload->data('file_name');
                    $this->db->set('filebalas', $new_filebalas);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/index');
                }
            }
            $id_ssktm = $this->input->post('id_ssktm', true);
            $tanggapan = $this->input->post('tanggapan', true);
            $status_ssktm = $this->input->post('status_ssktm', true);
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status_ssktm', $status_ssktm);
            $this->db->where('id_ssktm', $id_ssktm);
            $this->db->update('tb_ssktm');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/list_ssktm');
        }
    }

    public function del_ssktm($id_ssktm)
    {
        $_id = $this->db->get_where('tb_ssktm', ['id_ssktm' => $id_ssktm])->row();
        $query = $this->db->delete('tb_ssktm', ['id_ssktm' => $id_ssktm]);
        if ($query) {
            unlink("assets/images/" . $_id->image);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_ssktm');
    }




    public function list_ssdispensasi()
    {
        $data['title'] = 'List Permohonan Surat Pengaduan';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_ssdispensasi'] = $this->admin->getSsdispensasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_ssdispensasi', $data);
        $this->load->view('templates/footer');
    }

    public function get_edit_ssdispensasi()
    {
        echo json_encode($this->admin->getEditSsdispensasi($_POST['id_ssdispensasi']));
    }

    public function edit_ssdispensasi()
    {
        $this->form_validation->set_rules('id_ssdispensasi', 'id_ssdispensasi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'List Surat Dispensasi Menikah';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssdispensasi'] = $this->admin->getSsdispensasi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_ssdispensasi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_filebalas = $_FILES['filebalas']['name'];
            if ($upload_filebalas) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('filebalas')) {
                    $id_ssdispensasi = $this->input->post('id_ssdispensasi', true);
                    $data['ssdispensasi'] = $this->db->get_where('tb_ssdispensasi', ['id_ssdispensasi' => $id_ssdispensasi])->row_array();
                    $old_filebalas = $data['ssdispensasi']['filebalas'];
                    if ($old_filebalas != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_filebalas);
                    }
                    $new_filebalas = $this->upload->data('file_name');
                    $this->db->set('filebalas', $new_filebalas);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/index');
                }
            }
            $id_ssdispensasi = $this->input->post('id_ssdispensasi', true);
            $tanggapan = $this->input->post('tanggapan', true);
            $status_ssdispensasi = $this->input->post('status_ssdispensasi', true);
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status_ssdispensasi', $status_ssdispensasi);
            $this->db->where('id_ssdispensasi', $id_ssdispensasi);
            $this->db->update('tb_ssdispensasi');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/list_ssdispensasi');
        }
    }

    public function del_ssdispensasi($id_ssdispensasi)
    {
        $_id = $this->db->get_where('tb_ssdispensasi', ['id_ssdispensasi' => $id_ssdispensasi])->row();
        $query = $this->db->delete('tb_ssdispensasi', ['id_ssdispensasi' => $id_ssdispensasi]);
        if ($query) {
            unlink("assets/images/" . $_id->image);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_ssdispensasi');
    }



    public function list_sskbd()
    {
        $data['title'] = 'List Permohonan Surat Keterangan Bersih Diri';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_sskbd'] = $this->admin->getSskbd();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_sskbd', $data);
        $this->load->view('templates/footer');
    }

    public function get_edit_sskbd()
    {
        echo json_encode($this->admin->getEditSskbd($_POST['id_sskbd']));
    }

    public function edit_sskbd()
    {
        $this->form_validation->set_rules('id_sskbd', 'id_sskbd', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'List Surat Keterangan Bersih Diri';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sskbd'] = $this->admin->getSskbd();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_sskbd', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_filebalas = $_FILES['filebalas']['name'];
            if ($upload_filebalas) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('filebalas')) {
                    $id_sskbd = $this->input->post('id_sskbd', true);
                    $data['sskbd'] = $this->db->get_where('tb_sskbd', ['id_sskbd' => $id_sskbd])->row_array();
                    $old_filebalas = $data['sskbd']['filebalas'];
                    if ($old_filebalas != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_filebalas);
                    }
                    $new_filebalas = $this->upload->data('file_name');
                    $this->db->set('filebalas', $new_filebalas);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/index');
                }
            }
            $id_sskbd = $this->input->post('id_sskbd', true);
            $tanggapan = $this->input->post('tanggapan', true);
            $status_sskbd = $this->input->post('status_sskbd', true);
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status_sskbd', $status_sskbd);
            $this->db->where('id_sskbd', $id_sskbd);
            $this->db->update('tb_sskbd');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/list_sskbd');
        }
    }

    public function del_sskbd($id_sskbd)
    {
        $_id = $this->db->get_where('tb_sskbd', ['id_sskbd' => $id_sskbd])->row();
        $query = $this->db->delete('tb_sskbd', ['id_sskbd' => $id_sskbd]);
        if ($query) {
            unlink("assets/images/" . $_id->image);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_sskbd');
    }




    public function list_ssktp()
    {
        $data['title'] = 'List Permohonan Perekaman E-KTP';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_ssktp'] = $this->admin->getSsktp();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/list_ssktp', $data);
        $this->load->view('templates/footer');
    }

    public function get_edit_ssktp()
    {
        echo json_encode($this->admin->getEditSsktp($_POST['id_ssktp']));
    }

    public function edit_ssktp()
    {
        $this->form_validation->set_rules('id_ssktp', 'id_ssktp', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'List Surat Keterangan Bersih Diri';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktp'] = $this->admin->getSsktp();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_ssktp', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_filebalas = $_FILES['filebalas']['name'];
            if ($upload_filebalas) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('filebalas')) {
                    $id_ssktp = $this->input->post('id_ssktp', true);
                    $data['ssktp'] = $this->db->get_where('tb_ssktp', ['id_ssktp' => $id_ssktp])->row_array();
                    $old_filebalas = $data['ssktp']['filebalas'];
                    if ($old_filebalas != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_filebalas);
                    }
                    $new_filebalas = $this->upload->data('file_name');
                    $this->db->set('filebalas', $new_filebalas);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/index');
                }
            }
            $id_ssktp = $this->input->post('id_ssktp', true);
            $tanggapan = $this->input->post('tanggapan', true);
            $status_ssktp = $this->input->post('status_ssktp', true);
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status_ssktp', $status_ssktp);
            $this->db->where('id_ssktp', $id_ssktp);
            $this->db->update('tb_ssktp');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('admin/list_ssktp');
        }
    }

    public function del_ssktp($id_ssktp)
    {
        $_id = $this->db->get_where('tb_ssktp', ['id_ssktp' => $id_ssktp])->row();
        $query = $this->db->delete('tb_ssktp', ['id_ssktp' => $id_ssktp]);
        if ($query) {
            unlink("assets/images/" . $_id->image);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_ssktp');
    }
































    public function setting()
    {
        $this->form_validation->set_rules('email_profile', 'Email', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Setting';
            $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
            $data['profile'] = $this->db->get_where('profile', ['id_profile' => 1])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/setting', $data);
            $this->load->view('templates/footer');
        } else {
            $id_profile = $this->input->post('id_profile');
            $nama_website = $this->input->post('nama_website');
            $alamat_profile = $this->input->post('alamat_profile');
            $email_profile = $this->input->post('email_profile');
            $telp_profile = $this->input->post('telp_profile');
            $map_profile = $this->input->post('map_profile');
            $this->db->set('nama_website', $nama_website);
            $this->db->set('alamat_profile', $alamat_profile);
            $this->db->set('email_profile', $email_profile);
            $this->db->set('telp_profile', $telp_profile);
            $this->db->set('map_profile', $map_profile);
            $this->db->where('id_profile', $id_profile);
            $this->db->update('profile');
            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/setting');
        }
    }

    public function news()
    {
        $this->form_validation->set_rules('tgl_berita', 'Tanggal Berita', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Artikel dan Berita';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_berita'] = $this->db->get_where('tb_berita')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/news', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/gambar/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 10240;
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $file = $this->upload->data('file_name');
            $data = [
                'tgl_berita' => $this->input->post('tgl_berita', true),
                'penulis_berita' => $this->input->post('penulis_berita', true),
                'judul_berita' => $this->input->post('judul_berita', true),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat', true),
                'berita' => $this->input->post('berita', true),
                'gambar' => $file
            ];
            $this->db->insert('tb_berita', $data);
            $this->session->set_flashdata('message', 'Tambah Data');
            redirect('admin/news');
        }
    }

    public function list_news()
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Setting';
            $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
            $data['list_berita'] = $this->admin->getListBerita();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_news', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '10240';
                $config['upload_path'] = './assets/gambar/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $id_berita = $this->input->post('id_berita');
                    $data['apk'] = $this->db->get_where('tb_berita', ['id_berita' => $id_berita])->row_array();
                    $old_image = $data['apk']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './assets/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id_berita = $this->input->post('id_berita');
            $tgl_berita = $this->input->post('tgl_berita');
            $penulis_berita = $this->input->post('penulis_berita');
            $judul_berita = $this->input->post('judul_berita');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $berita = $this->input->post('berita');

            $this->db->set('tgl_berita', $tgl_berita);
            $this->db->set('penulis_berita', $penulis_berita);
            $this->db->set('judul_berita', $judul_berita);
            $this->db->set('deskripsi_singkat', $deskripsi_singkat);
            $this->db->set('berita', $berita);
            $this->db->where('id_berita', $id_berita);
            $this->db->update('tb_berita');

            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/list_news');
        }
    }

    public function get_berita()
    {
        $id_berita = $this->input->post('id_berita');
        echo json_encode($this->db->get_where('tb_berita', ['id_berita' => $id_berita])->row_array());
    }

    public function hapus_berita($id_berita)
    {
        $_id_berita = $this->db->get_where('tb_berita', ['id_berita' => $id_berita])->row();
        $query = $this->db->delete('tb_berita', ['id_berita' => $id_berita]);
        if ($query) {
            unlink("./assets/gambar/" . $_id_berita->gambar);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_news');
    }













    public function prks()
    {
        $this->form_validation->set_rules('tgl_promkes', 'Tanggal promkes', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PROKEM';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_promkes'] = $this->db->get_where('tb_promkes')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/prks', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/gambar/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 10240;
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $file = $this->upload->data('file_name');
            $data = [
                'tgl_promkes' => $this->input->post('tgl_promkes', true),
                'penulis_promkes' => $this->input->post('penulis_promkes', true),
                'judul_promkes' => $this->input->post('judul_promkes', true),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat', true),
                'promkes' => $this->input->post('promkes', true),
                'gambar' => $file
            ];
            $this->db->insert('tb_promkes', $data);
            $this->session->set_flashdata('message', 'Tambah Data');
            redirect('admin/prks');
        }
    }

    public function list_prks()
    {
        $this->form_validation->set_rules('judul_promkes', 'Judul promkes', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Setting';
            $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
            $data['list_promkes'] = $this->admin->getListpromkes();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_prks', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '10240';
                $config['upload_path'] = './assets/gambar/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $id_promkes = $this->input->post('id_promkes');
                    $data['apk'] = $this->db->get_where('tb_promkes', ['id_promkes' => $id_promkes])->row_array();
                    $old_image = $data['apk']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './assets/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id_promkes = $this->input->post('id_promkes');
            $tgl_promkes = $this->input->post('tgl_promkes');
            $penulis_promkes = $this->input->post('penulis_promkes');
            $judul_promkes = $this->input->post('judul_promkes');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $promkes = $this->input->post('promkes');

            $this->db->set('tgl_promkes', $tgl_promkes);
            $this->db->set('penulis_promkes', $penulis_promkes);
            $this->db->set('judul_promkes', $judul_promkes);
            $this->db->set('deskripsi_singkat', $deskripsi_singkat);
            $this->db->set('promkes', $promkes);
            $this->db->where('id_promkes', $id_promkes);
            $this->db->update('tb_promkes');

            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/list_prks');
        }
    }

    public function get_promkes()
    {
        $id_promkes = $this->input->post('id_promkes');
        echo json_encode($this->db->get_where('tb_promkes', ['id_promkes' => $id_promkes])->row_array());
    }

    public function hapus_promkes($id_promkes)
    {
        $_id_promkes = $this->db->get_where('tb_promkes', ['id_promkes' => $id_promkes])->row();
        $query = $this->db->delete('tb_promkes', ['id_promkes' => $id_promkes]);
        if ($query) {
            unlink("./assets/gambar/" . $_id_promkes->gambar);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_prks');
    }





    public function pkk()
    {
        $this->form_validation->set_rules('tgl_pkk', 'Tanggal pkk', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data PKK';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_pkk'] = $this->db->get_where('tb_pkk')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pkk', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/gambar/';
            $config['allowed_types'] = 'jpeg|jpg|pdf|doc|docx|xls|xlsx|png';
            $config['max_size']      = 10240;
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $file = $this->upload->data('file_name');
            $data = [
                'tgl_pkk' => $this->input->post('tgl_pkk', true),
                'penulis_pkk' => $this->input->post('penulis_pkk', true),
                'judul_pkk' => $this->input->post('judul_pkk', true),
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat', true),
                'pkk' => $this->input->post('pkk', true),
                'gambar' => $file
            ];
            $this->db->insert('tb_pkk', $data);
            $this->session->set_flashdata('message', 'Tambah Data');
            redirect('admin/pkk');
        }
    }

    public function list_pkk()
    {
        $this->form_validation->set_rules('judul_pkk', 'Judul pkk', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'List Data PKK';
            $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
            $data['list_pkk'] = $this->admin->getListpkk();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/list_pkk', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|pdf|doc|docx|xls|xlsx|png';
                $config['max_size']     = '10240';
                $config['upload_path'] = './assets/gambar/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $id_pkk = $this->input->post('id_pkk');
                    $data['apk'] = $this->db->get_where('tb_pkk', ['id_pkk' => $id_pkk])->row_array();
                    $old_image = $data['apk']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . './assets/gambar/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id_pkk = $this->input->post('id_pkk');
            $tgl_pkk = $this->input->post('tgl_pkk');
            $penulis_pkk = $this->input->post('penulis_pkk');
            $judul_pkk = $this->input->post('judul_pkk');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $pkk = $this->input->post('pkk');

            $this->db->set('tgl_pkk', $tgl_pkk);
            $this->db->set('penulis_pkk', $penulis_pkk);
            $this->db->set('judul_pkk', $judul_pkk);
            $this->db->set('deskripsi_singkat', $deskripsi_singkat);
            $this->db->set('pkk', $pkk);
            $this->db->where('id_pkk', $id_pkk);
            $this->db->update('tb_pkk');

            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/list_pkk');
        }
    }

    public function get_pkk()
    {
        $id_pkk = $this->input->post('id_pkk');
        echo json_encode($this->db->get_where('tb_pkk', ['id_pkk' => $id_pkk])->row_array());
    }

    public function hapus_pkk($id_pkk)
    {
        $_id_pkk = $this->db->get_where('tb_pkk', ['id_pkk' => $id_pkk])->row();
        $query = $this->db->delete('tb_pkk', ['id_pkk' => $id_pkk]);
        if ($query) {
            unlink("./assets/gambar/" . $_id_pkk->gambar);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/list_pkk');
    }


    function download($lu)
	{
		$data = $this->db->get_where('tb_pkk',['id_pkk'=>$lu])->row();
		force_download('assets/gambar/'.$data->gambar,NULL);
	}











    public function mst_medsos()
    {
        $this->form_validation->set_rules('facebook', 'Facebook', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Media Social';
            $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
            $data['medsos'] = $this->db->get_where('mst_medsos', ['id_medsos' => 1])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/mst_medsos', $data);
            $this->load->view('templates/footer');
        } else {
            $id_medsos = $this->input->post('id_medsos');
            $facebook = $this->input->post('facebook');
            $twitter = $this->input->post('twitter');
            $instagram = $this->input->post('instagram');
            $linkedin = $this->input->post('linkedin');

            $this->db->set('facebook', $facebook);
            $this->db->set('twitter', $twitter);
            $this->db->set('instagram', $instagram);
            $this->db->set('linkedin', $linkedin);

            $this->db->where('id_medsos', $id_medsos);
            $this->db->update('mst_medsos');
            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/mst_medsos');
        }
    }

    public function laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
        $data['list_komplain'] = $this->admin->getKomplain();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function filter_laporan()
    {
        $data['user'] = $this->db->get_where('mst_user', ['id' => $this->session->userdata('id')])->row_array();
        $tanggal1 = $this->input->post('tanggal_awal');
        $tanggal2 = $this->input->post('tanggal_akhir');
        $data['list_komplain'] = $this->admin->getFilterKomplain($tanggal1, $tanggal2);
        $data['title'] = 'Data komplain periode : ' . format_indo($tanggal1) . ' s/d ' . format_indo($tanggal2);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }
}
