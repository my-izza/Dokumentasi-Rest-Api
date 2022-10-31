<?php

class Tasks_model extends CI_Model
{

    public function getAllTasks()
    {
        return $this->db->get('tasks')->result_array();
    }

    public function tambahDataTask()
    {
        $data = [
            'category_id' => $this->input->post('category_id'),
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'start_date' => $this->input->post('start_date', true),
            'finish_date' => $this->input->post('finish_date', true),
            'status' => $this->input->post('status', true)
        ];

        $this->db->insert('tasks', $data);
    }

    public function hapusTask($id)
    {
        $this->db->delete('tasks', ['id' => $id]);
    }

    public function getTasksById($id)
    {
        return $this->db->get_where('tasks', ['id' => $id])->row_array();
    }




    // function tambah data
    public function createTasks($data)
    {
        $this->db->insert('tasks', $data);
        return $this->db->affected_rows();
    }


    // menampilkan data
    public function getTasks($id = null)
    {
        if ($id === null) {
            return $this->db->get('tasks')->result_array();
        } else {
            return $this->db->get_where('tasks', ['id' => $id])->result_array();
        }
    }


    // function update
    public function updateTasks($data, $id)
    {
        $this->db->update('tasks', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }


    // function hapus
    public function deleteTasks($id)
    {
        $this->db->delete('tasks', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
