<?php

/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/24/2017
 * Time: 3:09 PM
 */
defined("BASEPATH") OR exit("Akses ditolak!");
class Jabatan_model extends CI_Model {

    public function ambil_semua() {
        $data = $this->db->get("jabatan")->result();
        return $data;
    }

    public function tambah() {
        $post = $this->input->post();
        unset($post["btnSubmit"]);

        if(isset($post["nama_jabatan"])) {
            $num = $this->db->insert("jabatan",$post);
            return $num;
        } else return false;
    }

    public function edit() {
        $post = $this->input->post();
        unset($post["btnSubmit"]);

        if(isset($post["nama_jabatan"])) {
            $this->db->where("id_jabatan",$post["id_jabatan"]);
            unset($post["id_jabatan"]);
            $num = $this->db->update("jabatan",$post);
            return $num;
        } else return false;
    }

    public function ambil_berdasarkan_id($id) {
        $data = $this->db->where("id_jabatan",$id)->get("jabatan")->row();
        return $data;
    }

}