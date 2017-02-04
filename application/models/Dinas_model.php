<?php

/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/24/2017
 * Time: 3:10 PM
 */
defined("BASEPATH") OR exit("Akses ditolak!");
class Dinas_model extends CI_Model {

    public function ambil_semua() {
        $data = $this->db->get("dinas")->result();
        return $data;
    }

    public function tambah() {
        $post = $this->input->post();
        unset($post["btnSubmit"]);

        if(isset($post["nama_dinas"])) {
            $num = $this->db->insert("dinas",$post);
            return $num;
        } else return false;
    }
    public function edit() {
        $post = $this->input->post();
        unset($post["btnSubmit"]);

        if(isset($post["nama_dinas"])) {
            $this->db->where("id_dinas",$post["id_dinas"]);
            unset($post["id_dinas"]);
            $num = $this->db->update("dinas",$post);
            return $num;
        } else return false;
    }

    public function ambil_berdasarkan_id($id) {
        $data = $this->db->where("id_dinas",$id)->get("dinas")->row();
        return $data;
    }


}