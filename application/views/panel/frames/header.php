<?php
$unread = $this->db->where("dibaca",0)->where("ke_user",$this->session->userdata("id_pengguna"))->get("relasi_pesan")->num_rows();
$unread2 = $this->db->where("dibaca",0)->where("ke_user",$this->session->userdata("id_pengguna"))->get("relasi_disposisi")->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($judul)) ? $judul : ""; ?></title>

    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/bootstrap-table.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/datepicker3.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/styles.css");?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.6/css/fileinput.min.css">

    <!-- Include Editor style. -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.0/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.4.0/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!--Icons-->
    <script src="<?php echo base_url("assets/js/lumino.glyphs.js");?>"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo base_url("assets/js/html5shiv.js");?>"></script>
    <script src="<?php echo base_url("assets/js/respond.min.js");?>"></script>
    <![endif]-->

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.6/js/fileinput.min.js"></script>


    <link rel="stylesheet" href="<?php echo base_url("assets/css/magnific-popup.css"); ?>">

    <script src="<?php echo base_url("assets/js/jquery.magnific-popup.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jQuery.print.js"); ?>"></script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>E-OFFICE</span>Manado</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata("nama_lengkap"); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profil</a></li>
                        <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Pengaturan</a></li>
                        <li><a href="<?php echo base_url("panel/logout/"); ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <hr/>
<!--    <form role="search">-->
<!--        <div class="form-group">-->
<!--            <input type="text" class="form-control" placeholder="Search">-->
<!--        </div>-->
<!--    </form>-->
    <ul class="nav menu">
        <li class="<?php echo $menu["dashboard"] ?>"><a href="<?php echo base_url("panel/"); ?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
        <li class="<?php echo $menu["buat_surat"] ?>"><a href="<?php echo base_url("panel/compose/"); ?>"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"></use></svg> Buat Surat</a></li>
        <li role="presentation" class="divider"></li>
        <li class="<?php echo $menu["surat_masuk"] ?>"><a href="<?php echo base_url("panel/inbox/"); ?>"><svg class="glyph stroked folder"><use xlink:href="#stroked-folder"></use></svg> <?php echo ($unread > 0) ? "<b>Surat Masuk ($unread)</b>": "Surat Masuk"; ?></a></li>
        <li class="<?php echo $menu["surat_terkirim"] ?>"><a href="<?php echo base_url("panel/outbox/"); ?>"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Surat Terkirim</a></li>
        <li role="presentation" class="divider"></li>
        <li class="<?php echo $menu["disposisi_masuk"]; ?>"><a href="<?php echo base_url("panel/disposisi_masuk"); ?>"><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg> <?php echo ($unread2 > 0) ? "<b>Disposisi Masuk ($unread2)</b>": "Disposisi Masuk"; ?></a></li>
        <?php if($this->session->userdata("disposisi") == 1): ?>
        <li class="<?php echo $menu["disposisi_keluar"]; ?>"><a href="<?php echo base_url("panel/disposisi_keluar"); ?>"><svg class="glyph stroked upload"><use xlink:href="#stroked-upload"/></svg> Disposisi Keluar</a></li>
        <?php endif;?>
        <li role="presentation" class="divider"></li>
        <?php if($this->session->userdata("id_jabatan") == 1): ?>
        <li class="<?php echo $menu["pengguna"] ?>"><a href="<?php echo base_url("panel/pengguna/"); ?>"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg> Manajemen Pengguna</a></li>
        <li class="<?php echo $menu["jabatan"] ?>"><a href="<?php echo base_url("panel/jabatan/"); ?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Manajemen Jabatan</a></li>
        <li class="<?php echo $menu["dinas"] ?>"><a href="<?php echo base_url("panel/dinas/"); ?>"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"></use></svg> Manajemen Dinas</a></li>
        <?php endif;?>
    </ul>

</div><!--/.sidebar-->