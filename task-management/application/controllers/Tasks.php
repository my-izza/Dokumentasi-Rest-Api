<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //untuk semua method pemangilan database menggunakan $this->load->database();
        $this->load->model('Tasks_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        //untuk satu method pemangilan database menggunakan $this->load->database();
        $data['judul'] = 'Daftar Tasks';

        $data['tasks'] = $this->Tasks_model->getAllTasks();
        $this->load->view('templates/header', $data);
        $this->load->view('tasks/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Tasks';

        $this->form_validation->set_rules('categori_id', 'Categori');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('finish_date', 'Categori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('tasks/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Tasks_model->tambahDataTask();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('tasks');
        }
    }

    public function hapus($id)
    {
        $this->Tasks_model->hapusTask($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('tasks');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Task';

        $data['tasks'] = $this->Tasks_model->getTasksById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('tasks/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Tasks';
        $data['tasks'] = $this->Tasks_model->getTasksById($id);

        $this->form_validation->set_rules('categori_id', 'Categori');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('finish_date', 'Categori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('tasks/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tasks_model->ubahDataTask();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('tasks');
        }
    }
}
