<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang' . $data['user']['name'];
        $this->load->view('templates/header.php');
        $this->load->view('templates/penyelenggara_navbar.php', $data);
        $this->load->view('home');
        $this->load->view('templates/footer.php');
    }
}
