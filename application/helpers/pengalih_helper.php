<?php
/**
 * Created by PhpStorm.
 * User: edgar
 * Date: 1/23/2017
 * Time: 9:51 PM
 */

defined("BASEPATH") OR exit("Akses ditolak!");

if(!function_exists("proteksi_login")) {
    function proteksi_login($user) {
        if(!isset($user["id_pengguna"]))
            redirect(base_url("login/"));
    }
}

if(!function_exists("proteksi_logout")) {
    function proteksi_logout($user) {
        if(isset($user["id_pengguna"]))
            redirect(base_url("panel/"));
    }
}