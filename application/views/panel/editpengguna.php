
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="<?php echo base_url("panel/pengguna"); ?>">Manajemen Pengguna</a></li>
            <li class="active">Edit Pengguna</li>
        </ol>
    </div><!--/.row-->

    <hr/>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?php if(isset($_GET["err"])): ?>
                <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Gagal mengedit pengguna! Coba lagi nanti <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <?php elseif(isset($_GET["succ"])):?>
                <div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> Data pengguna berhasil diedit di sistem! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <?php endif; ?>
                <div class="panel-heading">Ubah detail pengguna</div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $pengguna->id_pengguna; ?>" name="id_pengguna">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $pengguna->nama_lengkap ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $pengguna->username ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Induk Pegawai</label>
                            <input type="number" name="nip" class="form-control" value="<?php echo $pengguna->nip ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="id_jabatan" id="jabatan" class="form-control" required>
                                <option value=""></option>
                                <?php foreach($daftar_jabatan as $jabatan):?>
                                    <option value="<?php echo $jabatan->id_jabatan; ?>" <?php echo ($pengguna->id_jabatan == $jabatan->id_jabatan) ? "selected" : ""; ?>><?php echo $jabatan->nama_jabatan; ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dinas</label>
                            <select name="id_dinas" id="dinas" class="form-control" required>
                                <option value=""></option>
                                <?php foreach($daftar_dinas as $dinas): ?>
                                    <option value="<?php echo $dinas->id_dinas; ?>" <?php echo ($pengguna->id_dinas == $dinas->id_dinas) ? "selected" : ""; ?>><?php echo $dinas->nama_dinas; ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cek">Pemberi Disposisi (centang bila benar)</label>
                            <input id="cek" type="checkbox" name="disposisi" <?php echo ($pengguna->disposisi == 1) ? "checked" : ""; ?>>
                        </div>
                        <input type="submit" name="btnSubmit" class="btn btn-success" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->

</div>	<!--/.main-->

<script>
    $(document).ready(function(){
        $("#msg").froalaEditor({
            height: 300
        });
        $("#penerima").select2();
        $("#jabatan").select2({
            placeholder: "Pilih jabatan",
            allowClear: true
        });
        $("#dinas").select2({
            placeholder: "Pilih dinas",
            allowClear: true
        });
    })
</script>