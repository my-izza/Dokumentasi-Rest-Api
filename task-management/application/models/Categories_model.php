<?php

class Categories_model extends CI_Model
{

    // function tambah data
    public function createCategories($data)
    {
        $this->db->insert('task_categories', $data);
        return $this->db->affected_rows();
    }

    // menampilkan data
    public function getCategories($id = null)
    {
        if ($id === null) {
            return $this->db->get('task_categories')->result_array();
        } else {
            return $this->db->get_where('task_categories', ['id' => $id])->result_array();
        }
    }

    // function update
    public function updateCategories($data, $id)
    {
        $this->db->update('task_categories', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // function hapus
    public function deleteCategories($id)
    {
        $this->db->delete('task_categories', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
