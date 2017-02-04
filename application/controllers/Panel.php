<?php

/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/23/2017
 * Time: 9:47 PM
 */
defined("BASEPATH") OR exit("Akses ditolak!");
class Panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("pengalih");
        $this->load->helper("cektipe");
        proteksi_login($this->session->userdata());
        $this->load->model("Pengguna_model","pengguna");
        $this->load->model("Surat_model","surat");
        $this->load->model("Jabatan_model","jabatan");
        $this->load->model("Dinas_model","dinas");
        $this->load->model("Disposisi_model","disposisi");
    }

    public function index() {
        $judul = "DevManado - Dashboard";
        $menu = $this->set_menu("dashboard");
        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/index");
        $this->load->view("panel/frames/footer");
    }

    public function compose() {
        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            if($_FILES["attach"]["name"][0] != "") {
                $gambar = $this->upload_files($_FILES["attach"]);
                if($gambar == false) {
                    redirect(base_url("panel/compose/?err"));
                    exit();
                }
                $post["lampiran"] = json_encode($gambar);
            }
            $kirim = $this->surat->kirim($post);
            if($kirim)
                redirect(base_url("panel/compose/?succ"));
            else
                redirect(base_url("panel/compose/?err"));
        }

        $judul = "Buat Surat";
        $menu = $this->set_menu("buat_surat");
        $daftar_pengguna = $this->pengguna->ambil_per_grup();
        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/compose",compact("daftar_pengguna"));
        $this->load->view("panel/frames/footer");
    }

    public function inbox() {
        $judul = "Surat Masuk";
        $menu = $this->set_menu("surat_masuk");
        $surat = $this->surat->ambil_daftar_surat_masuk();
        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/inbox",compact("surat"));
        $this->load->view("panel/frames/footer");
    }

    public function baca($id_pesan = false) {
        if(!$id_pesan) {
            redirect(base_url("panel/inbox"));
            exit();
        }

        $pesan = $this->surat->ambil_surat_berdasarkan_id($id_pesan);
        if($pesan == null) {
            redirect(base_url("panel/inbox/"));
            exit();
        }

        $judul = $pesan->subjek;
        $menu = $this->set_menu("surat_masuk");
        $this->surat->baca_surat($pesan->id_pesan);
        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/baca",compact("pesan"));
        $this->load->view("panel/frames/footer");
    }

    public function baca_outbox($id_pesan = false) {
        if(!$id_pesan){
            redirect(base_url("panel/outbox/"));
            exit();
        }
        $pesan = $this->surat->baca_data_surat_dikirim($id_pesan,"dari_user");

        if($pesan == null) {
            redirect(base_url("panel/outbox/"));
            exit();
        }

        $judul = $pesan->subjek;
        $menu = $this->set_menu("surat_terkirim");
        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/baca_outbox",compact("pesan"));
        $this->load->view("panel/frames/footer");
    }

    public function outbox() {
        $dikirim = $this->surat->ambil_data_surat_dikirim();
        $judul = "Surat Dikirim";
        $menu = $this->set_menu("surat_terkirim");

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/outbox",compact("dikirim"));
        $this->load->view("panel/frames/footer");
    }

    public function json_inbox() {
        header("Content-Type: application/json;charset=utf-8");
        $pesan = $this->surat->ambil_daftar_surat_masuk();
        echo json_encode($pesan);
    }

    public function pengguna() {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $daftar_pengguna = $this->pengguna->ambil_semua();
        $judul = "Manajemen Pengguna";
        $menu = $this->set_menu("pengguna");

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/pengguna",compact("daftar_pengguna"));
        $this->load->view("panel/frames/footer");
    }

    public function tambahpengguna() {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            $tbh = $this->pengguna->tambah();
            if($tbh != false) {
                redirect(base_url("panel/tambahpengguna/?succ"));
            } else {
                redirect(base_url("panel/tambahpengguna/?err"));
            }
            exit();
        }

        $judul = "Tambah Pengguna";
        $menu = $this->set_menu("pengguna");
        $daftar_jabatan = $this->jabatan->ambil_semua();
        $daftar_dinas = $this->dinas->ambil_semua();

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/tambahpengguna",compact("daftar_jabatan","daftar_dinas"));
        $this->load->view("panel/frames/footer");
    }

    public function editpengguna($id = null) {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $post = $this->input->post();

        if(isset($post["btnSubmit"])) {
            $edt = $this->pengguna->edit();
            if($edt != false) {
                redirect(base_url("panel/editpengguna/".$post["id_pengguna"]."?succ"));
            } else {
                redirect(base_url("panel/editpengguna/".$post["id_pengguna"]."?err"));
            }
            exit();
        }

        if($id == null) redirect(base_url("panel/pengguna/"));
        $judul = "Edit Pengguna";
        $menu = $this->set_menu("pengguna");
        $daftar_jabatan = $this->jabatan->ambil_semua();
        $daftar_dinas = $this->dinas->ambil_semua();

        $pengguna = $this->pengguna->ambil_berdasarkan_id($id);

        if($pengguna) {
            $this->load->view("panel/frames/header",compact("judul","menu"));
            $this->load->view("panel/editpengguna",compact("pengguna","daftar_jabatan","daftar_dinas"));
            $this->load->view("panel/frames/footer");
        } else redirect(base_url("panel/pengguna/"));
    }

    public function blokirpengguna($id = null) {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        if($id == null) redirect(base_url("panel/pengguna"));
        $this->pengguna->blokir($id);
        redirect(base_url("panel/pengguna/?succ=1"));
    }

    public function bukapengguna($id = null) {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        if($id == null) redirect(base_url("panel/pengguna"));
        $this->pengguna->buka($id);
        redirect(base_url("panel/pengguna/?succ=2"));
    }


    public function jabatan() {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $judul = "Manajemen Jabatan";
        $menu = $this->set_menu("jabatan");
        $daftar_jabatan = $this->jabatan->ambil_semua();

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/jabatan",compact("daftar_jabatan"));
        $this->load->view("panel/frames/footer");
    }

    public function tambahjabatan() {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            $tbh = $this->jabatan->tambah();
            if($tbh != false) {
                redirect(base_url("panel/tambahjabatan/?succ"));
            } else {
                redirect(base_url("panel/tambahjabatan/?err"));
            }
            exit();
        }

        $judul = "Tambah Jabatan";
        $menu = $this->set_menu("jabatan");

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/tambahjabatan");
        $this->load->view("panel/frames/footer");
    }

    public function editjabatan($id = null) {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $post = $this->input->post();

        if(isset($post["btnSubmit"])) {
            $edt = $this->jabatan->edit();
            if($edt != false) {
                redirect(base_url("panel/editjabatan/".$post["id_jabatan"]."?succ"));
            } else {
                redirect(base_url("panel/editjabatan/".$post["id_jabatan"]."?err"));
            }
            exit();
        }

        if($id == null) redirect(base_url("panel/jabatan"));

        $judul = "Edit Jabatan";
        $menu = $this->set_menu("jabatan");
        $jabatan = $this->jabatan->ambil_berdasarkan_id($id);

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/editjabatan",compact("jabatan"));
        $this->load->view("panel/frames/footer");
    }

    public function dinas() {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $judul = "Manajemen Dinas";
        $menu = $this->set_menu("dinas");
        $daftar_dinas = $this->dinas->ambil_semua();

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/dinas",compact("daftar_dinas"));
        $this->load->view("panel/frames/footer");
    }

    public function tambahdinas() {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            $tbh = $this->dinas->tambah();
            if($tbh != false) {
                redirect(base_url("panel/tambahdinas/?succ"));
            } else {
                redirect(base_url("panel/tambahdinas/?err"));
            }
            exit();
        }

        $judul = "Tambah Dinas";
        $menu = $this->set_menu("dinas");

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/tambahdinas");
        $this->load->view("panel/frames/footer");
    }

    public function editdinas($id = null) {
        if($this->session->userdata("id_jabatan") != 1)
            redirect(base_url("panel/"));
        $post = $this->input->post();

        if(isset($post["btnSubmit"])) {
            $edt = $this->dinas->edit();
            if($edt != false) {
                redirect(base_url("panel/editdinas/".$post["id_dinas"]."?succ"));
            } else {
                redirect(base_url("panel/editjabatan/".$post["id_dinas"]."?err"));
            }
            exit();
        }

        if($id == null) redirect(base_url("panel/dinas"));

        $judul = "Edit Dinas";
        $menu = $this->set_menu("dinas");
        $dinas = $this->dinas->ambil_berdasarkan_id($id);

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/editdinas",compact("dinas"));
        $this->load->view("panel/frames/footer");
    }

    public function buatdisposisi($id_pesan = null) {
        if($this->session->userdata("disposisi") == 0)
            redirect(base_url("panel/"));

        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            if($_FILES["attach"]["name"][0] != "") {
                $gambar = $this->upload_files($_FILES["attach"]);
                if($gambar == false) {
                    redirect(base_url("panel/baca/".$id_pesan."?err"));
                    exit();
                }
                $post["lampiran"] = json_encode($gambar);
            }
            $kirim = $this->disposisi->kirim($post,$id_pesan);
            if($kirim)
                redirect(base_url("panel/baca/".$id_pesan."?succ"));
            else
                redirect(base_url("panel/baca/".$id_pesan."?err"));
            exit();
        }

        if($id_pesan == null) redirect(base_url("panel/inbox"));
        $pesan = $this->surat->ambil_surat_berdasarkan_id($id_pesan,"ke_user");
        if($pesan == null) redirect(base_url("panel/inbox"));

        $judul = "Buat disposisi : " . $pesan->subjek;
        $menu = $this->set_menu("surat_masuk");

        $daftar_pengguna = $this->pengguna->ambil_per_grup();

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/buatdisposisi",compact("pesan","daftar_pengguna"));
        $this->load->view("panel/frames/footer");
    }

    public function disposisi_keluar() {
        if($this->session->userdata("disposisi") == 0)
            redirect(base_url("panel/"));
        $judul = "Disposisi Keluar";
        $menu = $this->set_menu("disposisi_keluar");

        $disposisi = $this->disposisi->ambil_disposisi_keluar();

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/disposisi_keluar",compact("disposisi"));
        $this->load->view("panel/frames/footer");
    }

    public function baca_disposisi_keluar($id_disposisi,$kode_disposisi) {
        if($this->session->userdata("disposisi") == 0)
            redirect(base_url("panel/"));

        $disposisi = $this->disposisi->ambil_satu_disposisi($id_disposisi,$kode_disposisi);
        if($disposisi == null) redirect(base_url("panel/disposisi_keluar"));

        $judul = "Baca Disposisi";
        $menu = $this->set_menu("disposisi_keluar");

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/baca_disposisi_keluar",compact("disposisi"));
        $this->load->view("panel/frames/footer");
    }

    public function disposisi_masuk() {
        $judul = "Disposisi Masuk";
        $menu = $this->set_menu("disposisi_masuk");

        $disposisi = $this->disposisi->ambil_disposisi_masuk();

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/disposisi_masuk",compact("disposisi"));
        $this->load->view("panel/frames/footer");
    }

    public function baca_disposisi_masuk($id_disposisi,$kode_disposisi) {
        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            unset($post["btnSubmit"]);
            $in = $this->disposisi->selesai($post["catatan_selesai"],$id_disposisi,$kode_disposisi);
            if($in)
                redirect(base_url("panel/baca_disposisi_masuk/".$id_disposisi."/".$kode_disposisi."?succ"));
            else
                redirect(base_url("panel/baca_disposisi_masuk/".$id_disposisi."/".$kode_disposisi."?err"));
            exit();
        }

        $disposisi = $this->disposisi->ambil_satu_disposisi_masuk($id_disposisi,$kode_disposisi);
        if($disposisi == null) redirect(base_url("panel/disposisi_masuk"));

        $this->disposisi->baca_disposisi($id_disposisi,$kode_disposisi);

        $judul = "Baca Disposisi";
        $menu = $this->set_menu("disposisi_masuk");

        $this->load->view("panel/frames/header",compact("judul","menu"));
        $this->load->view("panel/baca_disposisi_masuk",compact("disposisi"));
        $this->load->view("panel/frames/footer");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url("login/"));
    }

    private function upload_files($files)
    {
        $config = array(
            'upload_path'   => "assets/uploads/lampiran/",
            'allowed_types' => 'jpg|png|pdf|jpeg|bmp|gif|doc|docx|xls|xlsx|ppt|pptx',
            'overwrite'     => 1,
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $d = explode(".",$image);
            $ext = end($d);

            $fileName = uniqid() .'_'. md5($image) . "." . $ext;

            $obj = new stdClass();
            $obj->file = $fileName;
            $obj->judul = $image;
            $images[] = $obj;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }


    private function set_menu($active) {
        $menu = [
            "dashboard"=>"",
            "buat_surat"=>"",
            "surat_masuk"=>"",
            "surat_terkirim"=>"",
            "disposisi_keluar"=>"",
            "disposisi_masuk"=>"",
            "pengguna"=>"",
            "jabatan"=>"",
            "dinas"=>""
        ];
        $menu[$active] = "active";
        return $menu;
    }

}