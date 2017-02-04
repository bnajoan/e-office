
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="<?php echo base_url("panel/dinas"); ?>">Manajemen Jabatan</a></li>
            <li class="active">Edit Dinas</li>
        </ol>
    </div><!--/.row-->

    <hr/>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?php if(isset($_GET["err"])): ?>
                <div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Gagal mengedit dinas baru! Coba lagi nanti <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <?php elseif(isset($_GET["succ"])):?>
                <div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> Data dinas berhasil diedit di sistem! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
                <?php endif; ?>
                <div class="panel-heading">Isi detail dinas</div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id_dinas" value="<?php echo $dinas->id_dinas;?>">
                        <div class="form-group">
                            <label for="">Nama Dinas</label>
                            <input type="text" name="nama_dinas" class="form-control" value="<?php echo $dinas->nama_dinas; ?>" required/>
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