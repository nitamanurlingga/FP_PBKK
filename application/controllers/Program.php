<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function create()
    {
        $dataa['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('place', 'Place', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        // $this->form_validation->set_rules('image', 'Image', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('program/create.php');
            $this->load->view('templates/auth_footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/program/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $data = [
                'penyelenggara_id' => $dataa['user']['id'],
                'name' => htmlspecialchars($this->input->post('name', true)),
                'place' => htmlspecialchars($this->input->post('place', true)),
                'description' => htmlspecialchars($this->input->post('description', true)),
                'status' => 1,
                'image' => $new_image,
                'date_created' => time()
            ];
            $this->db->insert('program', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Your program has been created.</div>');
            redirect('user');
        }
    }
}
