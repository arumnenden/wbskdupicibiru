<?php
defined('BASEPATH') or exit('No direct script access allowed');

error_reporting (E_ALL ^ E_NOTICE);


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_user();
        $this->load->helper('tglindo');
        $this->load->model('User_model', 'user');
    }




    public function index()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_komplain'] = $this->db->get_where('tb_komplain', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['list_sspindah'] = $this->db->get_where('tb_sspindah', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'sess_id' => $sess_id
            );
            $this->db->insert('mst_member', $data);
            $id = $this->input->post('id');
            $activated = $this->input->post('activated');
            $this->db->set('activated', $activated);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/index');
        }
    }

    public function sspindah()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sspindah'] = $this->db->get_where('tb_sspindah', ['sess_id' => $this->session->userdata('id')])->result_array();
            
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/sspindah', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'sess_id' => $sess_id
            );
            $this->db->insert('mst_member', $data);
            $id = $this->input->post('id');
            $activated = $this->input->post('activated');
            $this->db->set('activated', $activated);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/sspindah');
        }
    }

    
    public function ssktm()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktm'] = $this->db->get_where('tb_ssktm', ['sess_id' => $this->session->userdata('id')])->result_array();
            
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssktm', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'sess_id' => $sess_id
            );
            $this->db->insert('mst_member', $data);
            $id = $this->input->post('id');
            $activated = $this->input->post('activated');
            $this->db->set('activated', $activated);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/ssktm');
        }
    }


    public function ssdispensasi()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssdispensasi'] = $this->db->get_where('tb_ssdispensasi', ['sess_id' => $this->session->userdata('id')])->result_array();
            
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssdispensasi', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'sess_id' => $sess_id
            );
            $this->db->insert('mst_member', $data);
            $id = $this->input->post('id');
            $activated = $this->input->post('activated');
            $this->db->set('activated', $activated);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/ssdispensasi');
        }
    }



    public function sskbd()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sskbd'] = $this->db->get_where('tb_sskbd', ['sess_id' => $this->session->userdata('id')])->result_array();
            
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/sskbd', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'sess_id' => $sess_id
            );
            $this->db->insert('mst_member', $data);
            $id = $this->input->post('id');
            $activated = $this->input->post('activated');
            $this->db->set('activated', $activated);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/sskbd');
        }
    }


    public function ssktp()
    {
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktp'] = $this->db->get_where('tb_ssktp', ['sess_id' => $this->session->userdata('id')])->result_array();
            
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssktp', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = array(
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'sess_id' => $sess_id
            );
            $this->db->insert('mst_member', $data);
            $id = $this->input->post('id');
            $activated = $this->input->post('activated');
            $this->db->set('activated', $activated);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('user/ssktp');
        }
    }




    public function edit_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_komplain'] = $this->db->get_where('tb_komplain', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
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
                    redirect('user/index');
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
            redirect('user/index');
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_komplain'] = $this->db->get_where('tb_komplain', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/index');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('mst_user');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('user/index');
            }
        }
    }

    public function add_komplain()
    {
        $this->form_validation->set_rules('keluhan', 'Komplain', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_komplain'] = $this->db->get_where('tb_komplain', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_komplain']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'ticket' => $this->input->post('ticket', true),
                        'area_keluhan' => $this->input->post('area_keluhan', true),
                        'keluhan' => $this->input->post('keluhan', true),
                        'saran' => $this->input->post('saran', true),
                        'date_komplain' => $this->input->post('date_komplain', true),
                        'sess_id' => $sess_id,
                        'status_komplain' => 1,
                        'image' => $new_image
                    );
                    $this->db->insert('tb_komplain', $data);
                    $this->session->set_flashdata('message', 'Kirim data');
                    redirect('user/index');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/index');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/index');
            }
        }
    }

    public function get_edit_komplain()
    {
        echo json_encode($this->user->getEditKomplain($_POST['id_komplain']));
    }

    public function edit_komplain()
    {
        $this->form_validation->set_rules('id_komplain', 'id_komplain', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_komplain'] = $this->db->get_where('tb_komplain', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_komplain = $this->input->post('id_komplain', true);
                    $data['komplain'] = $this->db->get_where('tb_komplain', ['id_komplain' => $id_komplain])->row_array();
                    $old_image = $data['komplain']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/index');
                }
            }
            $id_komplain = $this->input->post('id_komplain', true);
            $area_keluhan = $this->input->post('area_keluhan', true);
            $keluhan = $this->input->post('keluhan', true);
            $saran = $this->input->post('saran', true);
            $date_komplain = $this->input->post('date_komplain', true);
            $this->db->set('area_keluhan', $area_keluhan);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('saran', $saran);
            $this->db->set('date_komplain', $date_komplain);
            $this->db->where('id_komplain', $id_komplain);
            $this->db->update('tb_komplain');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/index');
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
        redirect('user/index');
    }



    public function add_sspindah()
    {
        $this->form_validation->set_rules('sspindah', 'Sspindah', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sspindah'] = $this->db->get_where('tb_sspindah', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/sspindah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sspindah']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sspindah']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }
        {
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sspindah']['file2'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file3 = $_FILES['file3']['name'];
            if ($upload_file3) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file3')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sspindah']['file3'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_file3 = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'ticket' => $this->input->post('ticket', true),
                        'area_keluhan' => $this->input->post('area_keluhan', true),
                        'keluhan' => $this->input->post('keluhan', true),
                        'saran' => $this->input->post('saran', true),
                        'date_sspindah' => $this->input->post('date_sspindah', true),
                        'sess_id' => $sess_id,
                        'status_sspindah' => 1,
                        'image' => $new_image,
                        'file2' => $new_file2,
                        'file3' => $new_file3
                    );
                    $this->db->insert('tb_sspindah', $data);
                    $this->session->set_flashdata('message', 'Kirim data');
                    redirect('user/sspindah');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/sspindah');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/sspindah');
            }
        }
    }


    public function get_edit_sspindah()
    {
        echo json_encode($this->user->getEditSspindah($_POST['id_sspindah']));
    }

    public function edit_sspindah()
    {
        $this->form_validation->set_rules('id_sspindah', 'id_sspindah', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sspindah'] = $this->db->get_where('tb_sspindah', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/sspindah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_sspindah = $this->input->post('id_sspindah', true);
                    $data['sspindah'] = $this->db->get_where('tb_sspindah', ['id_sspindah' => $id_sspindah])->row_array();
                    $old_image = $data['sspindah']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $id_sspindah = $this->input->post('id_sspindah', true);
                    $data['sspindah'] = $this->db->get_where('tb_sspindah', ['id_sspindah' => $id_sspindah])->row_array();
                    $old_file2 = $data['sspindah']['file2'];
                    if ($old_file2 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file2);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $this->db->set('file2', $new_file2);
                }
            }
        }{
            $upload_file3 = $_FILES['file3']['name'];
            if ($upload_file3) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file3')) {
                    $id_sspindah = $this->input->post('id_sspindah', true);
                    $data['sspindah'] = $this->db->get_where('tb_sspindah', ['id_sspindah' => $id_sspindah])->row_array();
                    $old_file3 = $data['sspindah']['file3'];
                    if ($old_file3 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file3);
                    }
                    $new_file3 = $this->upload->data('file_name');
                    $this->db->set('file3', $new_file3);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/sspindah');
                }
            }
            $id_sspindah = $this->input->post('id_sspindah', true);
            $area_keluhan = $this->input->post('area_keluhan', true);
            $keluhan = $this->input->post('keluhan', true);
            $saran = $this->input->post('saran', true);
            $date_sspindah = $this->input->post('date_sspindah', true);
            $this->db->set('area_keluhan', $area_keluhan);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('saran', $saran);
            $this->db->set('date_sspindah', $date_sspindah);
            $this->db->where('id_sspindah', $id_sspindah);
            $this->db->update('tb_sspindah');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/sspindah');
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
        redirect('user/sspindah');
    }






    public function add_ssktm()
    {
        $this->form_validation->set_rules('ssktm', 'Ssktm', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktm'] = $this->db->get_where('tb_ssktm', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssktm', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssktm']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssktm']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }
        {
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssktm']['file2'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file3 = $_FILES['file3']['name'];
            if ($upload_file3) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file3')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssktm']['file3'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_file3 = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'ticket' => $this->input->post('ticket', true),
                        'area_keluhan' => $this->input->post('area_keluhan', true),
                        'keluhan' => $this->input->post('keluhan', true),
                        'saran' => $this->input->post('saran', true),
                        'date_ssktm' => $this->input->post('date_ssktm', true),
                        'sess_id' => $sess_id,
                        'status_ssktm' => 1,
                        'image' => $new_image,
                        'file2' => $new_file2,
                        'file3' => $new_file3
                    );
                    $this->db->insert('tb_ssktm', $data);
                    $this->session->set_flashdata('message', 'Kirim data');
                    redirect('user/ssktm');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/ssktm');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/ssktm');
            }
        }
    }


    public function get_edit_ssktm()
    {
        echo json_encode($this->user->getEditSsktm($_POST['id_ssktm']));
    }

    public function edit_ssktm()
    {
        $this->form_validation->set_rules('id_ssktm', 'id_ssktm', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktm'] = $this->db->get_where('tb_ssktm', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssktm', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_ssktm = $this->input->post('id_ssktm', true);
                    $data['ssktm'] = $this->db->get_where('tb_ssktm', ['id_ssktm' => $id_ssktm])->row_array();
                    $old_image = $data['ssktm']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $id_ssktm = $this->input->post('id_ssktm', true);
                    $data['ssktm'] = $this->db->get_where('tb_ssktm', ['id_ssktm' => $id_ssktm])->row_array();
                    $old_file2 = $data['ssktm']['file2'];
                    if ($old_file2 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file2);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $this->db->set('file2', $new_file2);
                }
            }
        }{
            $upload_file3 = $_FILES['file3']['name'];
            if ($upload_file3) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file3')) {
                    $id_ssktm = $this->input->post('id_ssktm', true);
                    $data['ssktm'] = $this->db->get_where('tb_ssktm', ['id_ssktm' => $id_ssktm])->row_array();
                    $old_file3 = $data['ssktm']['file3'];
                    if ($old_file3 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file3);
                    }
                    $new_file3 = $this->upload->data('file_name');
                    $this->db->set('file3', $new_file3);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/ssktm');
                }
            }
            $id_ssktm = $this->input->post('id_ssktm', true);
            $area_keluhan = $this->input->post('area_keluhan', true);
            $keluhan = $this->input->post('keluhan', true);
            $saran = $this->input->post('saran', true);
            $date_ssktm = $this->input->post('date_ssktm', true);
            $this->db->set('area_keluhan', $area_keluhan);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('saran', $saran);
            $this->db->set('date_ssktm', $date_ssktm);
            $this->db->where('id_ssktm', $id_ssktm);
            $this->db->update('tb_ssktm');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/ssktm');
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
        redirect('user/ssktm');
    }
    
    public function add_ssdispensasi()
    {

    // $this->form_validation->set_rules('ssdispensasi', 'Ssdispensasi', 'required|trim');
        
        // $this->form_validation->set_rules('ssdispensasi', 'Ssdispensasi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssdispensasi'] = $this->db->get_where('tb_ssdispensasi', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssdispensasi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssdispensasi']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                   $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    

                      if (isset($data['list_ssdispensasi']) && !empty($data['list_ssdispensasi'])) {
                        $old_file = $data['list_ssdispensasi'][0]['image']; 
                        if ($old_file != 'default.jpg') {
                          unlink(FCPATH . 'assets/images/' . $old_file);
                        }
                      } 
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    
                    $old_file = $data['id_ssdispensasi']['file2'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'ticket' => $this->input->post('ticket', true),
                        'area_keluhan' => $this->input->post('area_keluhan', true),
                        'keluhan' => $this->input->post('keluhan', true),
                        'saran' => $this->input->post('saran', true),
                        'date_ssdispensasi' => $this->input->post('date_ssdispensasi', true),
                        'sess_id' => $sess_id,
                        'status_ssdispensasi' => 1,
                        'image' => $new_image,
                        'file2' => $new_file2
                        
                    );
                    $this->db->insert('tb_ssdispensasi', $data);
                    $this->session->set_flashdata('message', 'Kirim data');
                    redirect('user/ssdispensasi');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/ssdispensasi');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/ssdispensasi');
            }
        }
    }
    
    
   

    public function get_edit_ssdispensasi()
    {
        echo json_encode($this->user->getEditSsdispensasi($_POST['id_ssdispensasi']));
    }

    public function edit_ssdispensasi()
    {
        $this->form_validation->set_rules('id_ssdispensasi', 'id_ssdispensasi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssdispensasi'] = $this->db->get_where('tb_ssdispensasi', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssdispensasi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_ssdispensasi = $this->input->post('id_ssdispensasi', true);
                    $data['ssdispensasi'] = $this->db->get_where('tb_ssdispensasi', ['id_ssdispensasi' => $id_ssdispensasi])->row_array();
                    $old_image = $data['ssdispensasi']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $id_ssdispensasi = $this->input->post('id_ssdispensasi', true);
                    $data['ssdispensasi'] = $this->db->get_where('tb_ssdispensasi', ['id_ssdispensasi' => $id_ssdispensasi])->row_array();
                    $old_file2 = $data['ssdispensasi']['file2'];
                    if ($old_file2 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file2);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $this->db->set('file2', $new_file2);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/ssdispensasi');
                }
            }
            $id_ssdispensasi = $this->input->post('id_ssdispensasi', true);
            $area_keluhan = $this->input->post('area_keluhan', true);
            $keluhan = $this->input->post('keluhan', true);
            $saran = $this->input->post('saran', true);
            $date_ssdispensasi = $this->input->post('date_ssdispensasi', true);
            $this->db->set('area_keluhan', $area_keluhan);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('saran', $saran);
            $this->db->set('date_ssdispensasi', $date_ssdispensasi);
            $this->db->where('id_ssdispensasi', $id_ssdispensasi);
            $this->db->update('tb_ssdispensasi');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/ssdispensasi');
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
        redirect('user/ssdispensasi');
    }



    public function add_sskbd()
    {
        $this->form_validation->set_rules('sskbd', 'Sskbd', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sskbd'] = $this->db->get_where('tb_sskbd', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/sskbd', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sskbd']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sskbd']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_sskbd']['file2'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'ticket' => $this->input->post('ticket', true),
                        'area_keluhan' => $this->input->post('area_keluhan', true),
                        'keluhan' => $this->input->post('keluhan', true),
                        'saran' => $this->input->post('saran', true),
                        'date_sskbd' => $this->input->post('date_sskbd', true),
                        'sess_id' => $sess_id,
                        'status_sskbd' => 1,
                        'image' => $new_image,
                        'file2' => $new_file2
                        
                    );
                    $this->db->insert('tb_sskbd', $data);
                    $this->session->set_flashdata('message', 'Kirim data');
                    redirect('user/sskbd');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/sskbd');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/sskbd');
            }
        }
    }


    public function get_edit_sskbd()
    {
        echo json_encode($this->user->getEditSskbd($_POST['id_sskbd']));
    }

    public function edit_sskbd()
    {
        $this->form_validation->set_rules('id_sskbd', 'id_sskbd', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_sskbd'] = $this->db->get_where('tb_sskbd', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/sskbd', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_sskbd = $this->input->post('id_sskbd', true);
                    $data['sskbd'] = $this->db->get_where('tb_sskbd', ['id_sskbd' => $id_sskbd])->row_array();
                    $old_image = $data['sskbd']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $id_sskbd = $this->input->post('id_sskbd', true);
                    $data['sskbd'] = $this->db->get_where('tb_sskbd', ['id_sskbd' => $id_sskbd])->row_array();
                    $old_file2 = $data['sskbd']['file2'];
                    if ($old_file2 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file2);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $this->db->set('file2', $new_file2);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/sskbd');
                }
            }
            $id_sskbd = $this->input->post('id_sskbd', true);
            $area_keluhan = $this->input->post('area_keluhan', true);
            $keluhan = $this->input->post('keluhan', true);
            $saran = $this->input->post('saran', true);
            $date_sskbd = $this->input->post('date_sskbd', true);
            $this->db->set('area_keluhan', $area_keluhan);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('saran', $saran);
            $this->db->set('date_sskbd', $date_sskbd);
            $this->db->where('id_sskbd', $id_sskbd);
            $this->db->update('tb_sskbd');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/sskbd');
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
        redirect('user/sskbd');
    }



    public function add_ssktp()
    {
        $this->form_validation->set_rules('ssktp', 'Ssktp', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktp'] = $this->db->get_where('tb_ssktp', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssktp', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssktp']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                }
            }
        }{
            $upload_file = $_FILES['image']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
                    $old_file = $data['id_ssktp']['image'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file);
                    }
                    $new_image = $this->upload->data('file_name');
                    $sess_id = $this->session->userdata('id');
                    $data = array(
                        'ticket' => $this->input->post('ticket', true),
                        'area_keluhan' => $this->input->post('area_keluhan', true),
                        'keluhan' => $this->input->post('keluhan', true),
                        'saran' => $this->input->post('saran', true),
                        'date_ssktp' => $this->input->post('date_ssktp', true),
                        'sess_id' => $sess_id,
                        'status_ssktp' => 1,
                        'image' => $new_image
                        
                    );
                    $this->db->insert('tb_ssktp', $data);
                    $this->session->set_flashdata('message', 'Kirim data');
                    redirect('user/ssktp');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/ssktp');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/ssktp');
            }
        }
    }


    public function get_edit_ssktp()
    {
        echo json_encode($this->user->getEditSsktp($_POST['id_ssktp']));
    }

    public function edit_ssktp()
    {
        $this->form_validation->set_rules('id_ssktp', 'id_ssktp', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_ssktp'] = $this->db->get_where('tb_ssktp', ['sess_id' => $this->session->userdata('id')])->result_array();
            $data['ticket'] = $this->user->getTicket();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/ssktp', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $id_ssktp = $this->input->post('id_ssktp', true);
                    $data['ssktp'] = $this->db->get_where('tb_ssktp', ['id_ssktp' => $id_ssktp])->row_array();
                    $old_image = $data['ssktp']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            }
        }{
            $upload_file2 = $_FILES['file2']['name'];
            if ($upload_file2) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5120';
                $config['upload_path'] = './assets/images/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file2')) {
                    $id_ssktp = $this->input->post('id_ssktp', true);
                    $data['ssktp'] = $this->db->get_where('tb_ssktp', ['id_ssktp' => $id_ssktp])->row_array();
                    $old_file2 = $data['ssktp']['file2'];
                    if ($old_file2 != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/' . $old_file2);
                    }
                    $new_file2 = $this->upload->data('file_name');
                    $this->db->set('file2', $new_file2);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal !!.. Ekstensi atau ukuran file tidak sesuai</div>');
                    redirect('user/ssktp');
                }
            }
            $id_ssktp = $this->input->post('id_ssktp', true);
            $area_keluhan = $this->input->post('area_keluhan', true);
            $keluhan = $this->input->post('keluhan', true);
            $saran = $this->input->post('saran', true);
            $date_ssktp = $this->input->post('date_ssktp', true);
            $this->db->set('area_keluhan', $area_keluhan);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('saran', $saran);
            $this->db->set('date_ssktp', $date_ssktp);
            $this->db->where('id_ssktp', $id_ssktp);
            $this->db->update('tb_ssktp');
            $this->session->set_flashdata('message', 'Ubah data');
            redirect('user/ssktp');
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
        redirect('user/ssktp');
    }














    

    public function laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_komplain'] = $this->db->get_where('tb_komplain', ['sess_id' => $this->session->userdata('id')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('user/laporan', $data);
        $this->load->view('templates/footer');
    }
}
