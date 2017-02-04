<?php

defined("BASEPATH") OR exit("Akses ditolak!");

if(!function_exists("is_doc")) {
    function is_doc($ext) {
        return
            ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "bmp" && $ext != "gif")
            ? true : false;
    }
}