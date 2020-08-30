<?php

class Fruit_model extends CI_Model {

    public function getAll() {
        return $this->db->get('fruits')->result();
    }

    public function getById($id) {
        return $this->db->get_where('fruits', ['id' => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->name = $post['name'];
        $this->price = $post['price'];
        $this->image = $this->_uploadImage();

        return $this->db->insert('fruits', $this);
        
    }

    private function _uploadImage() {
        $config['upload_path']      = './assets/img/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['file_name']        = $this->id;
        $config['overwrite']        = true;
        $config['max_size']         = '10000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

}