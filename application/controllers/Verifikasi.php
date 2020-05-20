<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $akun['akun'] = $this->db->get_where('user', ['role_id' => 2])->result();
        $this->load->view('templates/auth_header');
        $this->load->view('templates/clear_admin_navbar', $data);
        $this->load->view('verifikasi/list.php', $akun);
        $this->load->view('templates/auth_footer');
    }

    public function edit()
    {
        $id_user = $this->input->post('id_user');
        $this->db->set('is_active', 1);
        $this->db->where('id', $id_user);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Activation successed!.</div>');
        redirect('verifikasi');
    }
}
