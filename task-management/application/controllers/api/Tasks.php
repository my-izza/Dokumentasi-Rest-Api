<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Tasks extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tasks_model', 'tasks');
    }


    // menambahkan data
    public function index_post()
    {
        $data = [
            'category_id' => $this->post('category_id'),
            'title' => $this->post('title'),
            'description' => $this->post('description'),
            'start_date' => $this->post('start_date'),
            'finish_date' => $this->post('finish_date'),
            'status' => $this->post('status')
        ];

        if ($this->tasks->createTasks($data) > 0) {
            // Data success
            $this->response([
                'status' => TRUE,
                'message' => 'new task  has been created!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            // Data Error
            $this->response([
                'status' => FALSE,
                'massage' => 'failed to created new task!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    // menampilkan data
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $tasks = $this->tasks->getTasks();
        } else {
            $tasks = $this->tasks->getTasks($id);
        }

        if ($tasks) {
            $this->response([
                'status' => TRUE,
                'data' => $tasks
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'massage' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    // mengubah data
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'category_id' => $this->put('category_id'),
            'title' => $this->put('title'),
            'description' => $this->put('description'),
            'start_date' => $this->put('start_date'),
            'finish_date' => $this->put('finish_date'),
            'status' => $this->put('status')
        ];

        if ($this->tasks->updateTasks($data, $id) > 0) {
            // Data success
            $this->response([
                'status' => TRUE,
                'message' => 'task has been updated!'
            ], REST_Controller::HTTP_OK);
        } else {
            // Data Error
            $this->response([
                'status' => FALSE,
                'massage' => 'failed to update task!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    // menghapus data
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => FALSE,
                'massage' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->tasks->deleteTasks($id) > 0) {
                // Delete success
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'deleted!'
                ], REST_Controller::HTTP_OK);
            } else {
                // id not found
                $this->response([
                    'status' => FALSE,
                    'massage' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
