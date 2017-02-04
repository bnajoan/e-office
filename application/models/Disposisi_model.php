<?php

/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/26/2017
 * Time: 4:53 PM
 */
defined("BASEPATH") OR exit("Akses ditolak!");
class Disposisi_model extends CI_Model {

    public function kirim($post,$id_pesan) {
        unset($post["btnSubmit"]);
        $to_user = $post["penerima"];
        if(count($to_user) == 0) return false;
        unset($post["penerima"]);
        $insert = $this->db->insert("disposisi",$post);
        $id_disposisi = $this->db->insert_id();
        $kode_disposisi = sha1(uniqid("ID_")."-".$id_disposisi);
        if($insert) {
            foreach($to_user as $user) {
                $relasi = array(
                    "id_disposisi" => $id_disposisi,
                    "id_pesan" => $id_pesan,
                    "dari_user" => $this->session->userdata("id_pengguna"),
                    "ke_user" => $user,
                    "kode_disposisi" => $kode_disposisi
                );
                $this->db->insert("relasi_disposisi",$relasi);
            }
            return true;
        } else return false;
    }

    public function ambil_disposisi_keluar() {
        $this->db->select("relasi_disposisi.*");
        $this->db->select("disposisi.*");
        $this->db->from("relasi_disposisi");
        $this->db->join("disposisi","relasi_disposisi.id_disposisi = disposisi.id_disposisi","left");
        $this->db->where("relasi_disposisi.dari_user",$this->session->userdata("id_pengguna"));
        $this->db->group_by("relasi_disposisi.kode_disposisi");

        $data = $this->db->get()->result();
        return $data;
    }

    public function ambil_satu_disposisi($id_disposisi,$kode_disposisi) {
        $this->db->select("disposisi.*");
        $this->db->where("disposisi.id_disposisi",$id_disposisi);
        $this->db->from("disposisi");

        $data = $this->db->get()->row();

        $this->db->select("pengguna.nama_lengkap,relasi_disposisi.kode_disposisi,relasi_disposisi.dibaca,relasi_disposisi.selesai AS selesai_ditangani,relasi_disposisi.catatan_selesai");
        $this->db->from("pengguna");
        $this->db->join("relasi_disposisi","relasi_disposisi.ke_user = pengguna.id_pengguna","left");
        $this->db->where("relasi_disposisi.id_disposisi",$id_disposisi);
        $this->db->where("relasi_disposisi.kode_disposisi",$kode_disposisi);

        $pengguna = $this->db->get()->result();

        $id_pesan = $this->db->select("id_pesan")->from("relasi_disposisi")->where("kode_disposisi",$kode_disposisi)
            ->limit(1)->get()->row()->id_pesan;

        $lampiran_pesan = $this->db->where("id_pesan",$id_pesan)->get("pesan")->row();

        $data->penerima = $pengguna;
        $data->lampiran_surat = $lampiran_pesan;

        return $data;
    }

    public function ambil_satu_disposisi_masuk($id_disposisi,$kode_disposisi) {
        $this->db->select("disposisi.*");
        $this->db->where("disposisi.id_disposisi",$id_disposisi);
        $this->db->from("disposisi");

        $data = $this->db->get()->row();

        $this->db->select("pengguna.nama_lengkap AS pengirim,relasi_disposisi.kode_disposisi,relasi_disposisi.dibaca,relasi_disposisi.selesai AS selesai_ditangani,relasi_disposisi.catatan_selesai");
        $this->db->from("pengguna");
        $this->db->join("relasi_disposisi","relasi_disposisi.dari_user = pengguna.id_pengguna","left");
        $this->db->where("relasi_disposisi.id_disposisi",$id_disposisi);
        $this->db->where("relasi_disposisi.kode_disposisi",$kode_disposisi);
        $this->db->where("relasi_disposisi.ke_user",$this->session->userdata("id_pengguna"));

        $pengguna = $this->db->get()->row();

        $id_pesan = $this->db->select("id_pesan")->from("relasi_disposisi")->where("kode_disposisi",$kode_disposisi)
            ->limit(1)->get()->row()->id_pesan;

        $lampiran_pesan = $this->db->where("id_pesan",$id_pesan)->get("pesan")->row();

        $data->penerima = $pengguna;
        $data->lampiran_surat = $lampiran_pesan;

        return $data;
    }

    public function ambil_disposisi_masuk() {
        $this->db->select("relasi_disposisi.*");
        $this->db->select("relasi_disposisi.selesai AS pengguna_selesai");
        $this->db->select("disposisi.*");
        $this->db->select("disposisi.selesai AS disposisi_selesai");
        $this->db->select("pengguna.nama_lengkap");
        $this->db->from("relasi_disposisi");
        $this->db->join("disposisi","relasi_disposisi.id_disposisi = disposisi.id_disposisi");
        $this->db->join("pengguna","relasi_disposisi.dari_user = pengguna.id_pengguna","left");
        $this->db->where("relasi_disposisi.ke_user",$this->session->userdata("id_pengguna"));
        $this->db->group_by("relasi_disposisi.kode_disposisi");
        $this->db->order_by("disposisi.waktu_kirim","desc");

        $data = $this->db->get()->result();
        return $data;
    }

    public function baca_disposisi($id_disposisi,$kode_disposisi) {
        $this->db->where("id_disposisi",$id_disposisi)
            ->where("kode_disposisi",$kode_disposisi)
            ->where("ke_user",$this->session->userdata("id_pengguna"))
            ->update("relasi_disposisi",array("dibaca"=>1));
        return true;
    }

    public function selesai($catatan,$id_disposisi,$kode_disposisi) {
        $this->db->where("id_disposisi",$id_disposisi)
            ->where("kode_disposisi",$kode_disposisi)
            ->where("ke_user",$this->session->userdata("id_pengguna"))
            ->update("relasi_disposisi",array("selesai"=>1,"catatan_selesai"=>$catatan));
        return true;
    }

}