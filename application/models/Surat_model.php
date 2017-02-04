<?php

/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/24/2017
 * Time: 9:44 AM
 */
defined("BASEPATH") OR exit("Akses ditolak!");
class Surat_model extends CI_model{

    public function kirim($post) {
        unset($post["btnSubmit"]);
        $to_user = $post["penerima"];
        if(count($to_user) == 0) return false;
        unset($post["penerima"]);
        $insert = $this->db->insert("pesan",$post);
        $id_pesan = $this->db->insert_id();
        if($insert) {
            foreach($to_user as $user) {
                $relasi = array(
                    "id_pesan" => $id_pesan,
                    "dari_user" => $this->session->userdata("id_pengguna"),
                    "ke_user" => $user
                );
                $this->db->insert("relasi_pesan",$relasi);
            }
            return true;
        } else return false;
    }

    public function ambil_daftar_surat_masuk() {
        $id_user = $this->session->userdata("id_pengguna");
        $this->db->select("relasi_pesan.dibaca,pesan.id_pesan,pesan.subjek,pesan.isi_pesan,pesan.waktu_kirim,pengguna.nama_lengkap AS pengirim");
        $this->db->join("pesan","relasi_pesan.id_pesan = pesan.id_pesan","left");
        $this->db->join("pengguna","relasi_pesan.dari_user = pengguna.id_pengguna","left");
//        $this->db->join("pengguna","relasi_pesan.ke_user = pengguna.id_pengguna AS ke","left");
        $this->db->from("relasi_pesan");
        $this->db->where("relasi_pesan.ke_user",$id_user);
        $this->db->order_by("pesan.waktu_kirim","desc");
        $inbox = $this->db->get()->result();
        return $inbox;
    }

    public function ambil_surat_berdasarkan_id($id_pesan,$type = "ke_user") {
        $id_user = $this->session->userdata("id_pengguna");
        $this->db->select("relasi_pesan.dari_user,relasi_pesan.dibaca,pesan.id_pesan,pesan.subjek,pesan.isi_pesan,pesan.waktu_kirim,pesan.lampiran,pengguna.nama_lengkap AS pengirim");
        $this->db->join("pesan","relasi_pesan.id_pesan = pesan.id_pesan","left");
        $this->db->join("pengguna","relasi_pesan.dari_user = pengguna.id_pengguna","left");
//        $this->db->join("pengguna","relasi_pesan.ke_user = pengguna.id_pengguna AS ke","left");
        $this->db->from("relasi_pesan");
        $this->db->where("relasi_pesan.".$type,$id_user);
        $this->db->where("relasi_pesan.id_pesan",$id_pesan);
        $this->db->order_by("pesan.waktu_kirim","desc");
        $pesan = $this->db->get()->row();
        return $pesan;
    }

    public function baca_surat($id_pesan) {
        $this->db->where("id_pesan",$id_pesan);
        $this->db->where("ke_user",$this->session->userdata("id_pengguna"));
        $this->db->from("relasi_pesan");
        $this->db->update("relasi_pesan",array("dibaca"=>1));
    }

    public function ambil_data_surat_dikirim() {
        $id_user = $this->session->userdata("id_pengguna");
        $daftar_pesan = $this->db->select("pesan.subjek,pesan.isi_pesan,pesan.waktu_kirim,relasi_pesan.id_pesan")->from("pesan")->join("relasi_pesan","pesan.id_pesan = relasi_pesan.id_pesan")->where("dari_user",$id_user)->group_by("id_pesan")->order_by("waktu_kirim","desc")->get()->result();
        foreach($daftar_pesan as $key=>$pesan) {
            $id = $pesan->id_pesan;
            $this->db->select("relasi_pesan.dibaca,pengguna.nama_lengkap");
            $this->db->from("relasi_pesan");
            $this->db->join("pengguna","relasi_pesan.ke_user = pengguna.id_pengguna","left");
            $this->db->where("relasi_pesan.id_pesan",$id);
            $daftar_pesan[$key]->dikirim = $this->db->get()->result();
        }
        return $daftar_pesan;
    }

    public function baca_data_surat_dikirim($id_pesan) {
        $id_user = $this->session->userdata("id_pengguna");
        $pesan = $this->db->select("pesan.subjek,pesan.isi_pesan,pesan.waktu_kirim,pesan.lampiran,relasi_pesan.id_pesan")->from("pesan")->join("relasi_pesan","pesan.id_pesan = relasi_pesan.id_pesan")->where("relasi_pesan.dari_user",$id_user)->where("pesan.id_pesan",$id_pesan)->group_by("id_pesan")->order_by("waktu_kirim","desc")->get()->row();

        $this->db->select("relasi_pesan.dibaca,pengguna.nama_lengkap");
        $this->db->from("relasi_pesan");
        $this->db->join("pengguna","relasi_pesan.ke_user = pengguna.id_pengguna","left");
        $this->db->where("relasi_pesan.id_pesan",$id_pesan);
        $pesan->dikirim = $this->db->get()->result();
        return $pesan;
    }

}