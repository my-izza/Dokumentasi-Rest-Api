<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Categories extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model', 'categories');
    }

    // menambahkan data
    public function index_post()
    {
        $data = [
            'name' => $this->post('name')
        ];

        if ($this->categories->createCategories($data) > 0) {
            // Data success
            $this->response([
                'status' => TRUE,
                'message' => 'new category  has been created!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            // Data Error
            $this->response([
                'status' => FALSE,
                'massage' => 'failed to created new category!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // menampilkan data
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $categories = $this->categories->getCategories();
        } else {
            $categories = $this->categories->getCategories($id);
        }

        if ($categories) {
            $this->response([
                'status' => TRUE,
                'data' => $categories
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
            'name' => $this->put('name')
        ];

        if ($this->categories->updateCategories($data, $id) > 0) {
            // Data success
            $this->response([
                'status' => TRUE,
                'message' => 'category has been updated!'
            ], REST_Controller::HTTP_OK);
        } else {
            // Data Error
            $this->response([
                'status' => FALSE,
                'massage' => 'failed to update category!'
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
            if ($this->categories->deleteCategories($id) > 0) {
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
