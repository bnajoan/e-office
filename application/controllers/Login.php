<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/23/2017
 * Time: 9:16 PM
 */
defined("BASEPATH") OR exit("Akses ditolak!");

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper("pengalih");
        proteksi_logout($this->session->userdata());
        $this->load->model("Pengguna_model","pengguna");
    }


    public function index() {
        $post = $this->input->post();
        if(isset($post["btnSubmit"])) {
            $user = $this->cek_login($post);
            if($user != false) {
                $this->session->set_userdata($user);
                redirect(base_url("panel/"));
            } else {
                redirect(base_url("login/?err"));
            }
        }
        $this->load->view("login/login");
    }

    private function cek_login($post) {
        if(isset($post["username"]) && isset($post["password"])) {
            $data = $this->pengguna->login($post["username"],$post["password"]);
            return $data;
        }
    }


}