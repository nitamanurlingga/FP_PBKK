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
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|is_numeric|trim');
        $this->form_validation->set_rules('target', 'Target', 'required|is_numeric|trim');
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
            if ($this->input->post('status') == 'Berlangsung') {
                $status = 1;
            } else {
                $status = 2;
            }


            $data = [
                'penyelenggara_id' => $dataa['user']['id'],
                'name' => htmlspecialchars($this->input->post('name', true)),
                'place' => htmlspecialchars($this->input->post('place', true)),
                'description' => htmlspecialchars($this->input->post('description', true)),
                'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
                'target' => htmlspecialchars($this->input->post('target', true)),
                'status' => $status,
                'image' => $new_image,
                'date_created' => time()
            ];
            $this->db->insert('program', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Your program has been created.</div>');
            redirect('program/list');
        }
    }

    public function list()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $program['program'] = $this->db->get_where('program', ['penyelenggara_id' => $data['user']['id']])->result();
        // $program['donasi'] = $this->db->get_where('program', ['penyelenggara_id' => $data['user']['id']])->result();
        $this->load->view('templates/auth_header');
        $this->load->view('templates/clear_navbar', $data);
        $this->load->view('program/list.php', $data);
        $this->load->view('templates/program_footer', $program);
    }

    public function edit()
    {
        $id_program = $this->input->post('id_program');
        $program['program'] = $this->db->get_where('program', ['id' => $id_program])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('place', 'Place', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|is_numeric|trim');
        $this->form_validation->set_rules('target', 'Target', 'required|is_numeric|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('program/edit.php', $program);
            $this->load->view('templates/auth_footer');
        } else {
            $id = $this->input->post('id_program');
            $name = $this->input->post('name');
            $place = $this->input->post('place');
            $description = $this->input->post('description');
            $jumlah = $this->input->post('jumlah');
            $target = $this->input->post('target');
            if ($this->input->post('status') == 'Berlangsung') {
                $status = 1;
            } else {
                $status = 2;
            }

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/program/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('place', $place);
            $this->db->set('description', $description);
            $this->db->set('jumlah', $jumlah);
            $this->db->set('target', $target);
            $this->db->set('status', $status);
            $this->db->where('id', $id);
            $this->db->update('program');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! Your program has been edited.</div>');
            redirect('program/list');
        }
    }
}
