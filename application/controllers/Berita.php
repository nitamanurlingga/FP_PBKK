<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function create()
    {
        $id_program = $this->input->post('id_program');
        $program['program'] = $this->db->get_where('program', ['id' => $id_program])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        // $this->form_validation->set_rules('image', 'Image', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('berita/create.php', $program);
            $this->load->view('templates/auth_footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'program_id' => htmlspecialchars($this->input->post('id_program', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'description' => htmlspecialchars($this->input->post('description', true)),
                'image' => $new_image,
                'date_created' => time()
            ];
            $this->db->insert('berita', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Your berita acara has been created.</div>');
            redirect('program/list');
        }
    }
}
