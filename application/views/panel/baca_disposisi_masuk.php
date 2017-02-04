
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="<?php echo base_url("panel/disposisi_masuk/"); ?>">Disposisi Masuk</a></li>
            <li class="active">Baca Disposisi</li>
        </ol>
    </div><!--/.row-->

    <hr/>

    <div class="row">
        <div class="col-lg-6" id="disposisi">
            <div class="panel panel-default">
                <?php if(isset($_GET["err"])): ?>
                    <div class="alert bg-danger" role="alert">
                        <svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Gagal mengirim respon! Coba lagi nanti <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                <?php elseif(isset($_GET["succ"])):?>
                    <div class="alert bg-success" role="alert">
                        <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> Respon berhasil dikirim ke tujuan! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                <?php endif; ?>
                <div class="panel-heading">
                    <h5>Detail disposisi</h5>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                    <table class="table table-responsive">
                        <tr>
                            <td><b>Pengirim</b></td>
                            <td><?php echo $disposisi->penerima->pengirim; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Kirim</b></td>
                            <td><?php echo $disposisi->waktu_kirim; ?></td>
                        </tr>
                        <tr>
                            <td><b>Instruksi</b></td>
                            <td><?php echo $disposisi->instruksi_disposisi; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Selesai</b></td>
                            <td><?php echo $disposisi->tanggal_selesai; ?></td>
                        </tr>
                        <tr>
                            <td><b>Keamanan</b></td>
                            <td><?php echo $disposisi->keamanan; ?></td>
                        </tr>
                        <tr>
                            <td><b>Kecepatan</b></td>
                            <td><?php echo $disposisi->kecepatan; ?></td>
                        </tr>
                        <tr>
                            <td><b>Isi disposisi</b></td>
                            <td><?php echo $disposisi->isi_disposisi; ?></td>
                        </tr>
                        <?php
                        $lampiran = $disposisi->lampiran;
                        if($lampiran != null):
                        $lampiran = json_decode($lampiran);
                        ?>
                        <tr>
                            <td><b>Lampiran</b></td>
                            <td>
                                <ol>
                                    <?php foreach($lampiran as $l):
                                        $ext = explode(".",$l->file);
                                        $cls = (is_doc(end($ext))) ? "attach-doc" : "attach-img";
                                        ?>
                                        <a class="<?php echo $cls; ?>" href="<?php echo base_url("assets/uploads/lampiran/".$l->file); ?>" data-judul="<?php echo $l->judul; ?>"><li><?php echo $l->judul; ?></li></a>
                                    <?php endforeach;?>
                                </ol>
                            </td>
                        </tr>
                        <?php endif;?>
                        <?php if($disposisi->penerima->selesai_ditangani != 1): ?>
                        <tr>
                            <td><b>Respon</b></td>
                            <td>
                                <textarea name="catatan_selesai" class="form-control" placeholder="Ketik respon.." required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-success" name="btnSubmit" type="submit"><i class="fa fa-send fa-lg fa-fw"></i> Selesai</button></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td><b>Respon</b></td>
                            <td><?php echo $disposisi->penerima->catatan_selesai; ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="surat">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Lampiran surat terkait</h5>
                </div>
                <div class="panel-body">
                    <b>Subjek : <?php echo $disposisi->lampiran_surat->subjek; ?></b><br />
                    <i>Waktu kirim : <?php echo $disposisi->lampiran_surat->waktu_kirim; ?></i>
                    <p><?php echo $disposisi->lampiran_surat->isi_pesan; ?></p>

                    <?php
                    $lampiran = $disposisi->lampiran_surat->lampiran;
                    if($lampiran != null):
                    $lampiran = json_decode($lampiran);
                    ?>
                    <p>Lampiran:</p>
                    <ol>
                        <?php foreach($lampiran as $l):
                            $ext = explode(".",$l->file);
                            $cls = (end($ext) == "pdf") ? "attach-doc" : "attach-img";
                            ?>
                            <a class="<?php echo $cls; ?>" href="<?php echo base_url("assets/uploads/lampiran/".$l->file); ?>" data-judul="<?php echo $l->judul; ?>"><li><?php echo $l->judul; ?></li></a>
                        <?php endforeach;?>
                    </ol>
                    <?php endif; ?>
                </div>
                <div class="panel-footer">
                    <button onclick="$.print('#disposisi')" class="btn btn-primary"><i class="fa fa-print fa-lg fa-fw"></i> Print Lembar Disposisi</button>
                    <button onclick="$.print('#surat')" class="btn btn-success"><i class="fa fa-print fa-lg fa-fw"></i> Print Lampiran Surat</button>
                </div>
            </div>
        </div>
    </div><!--/.row-->

</div>	<!--/.main-->

<script>
    $(document).ready(function(){
        $(".attach-img").magnificPopup({
            type: "image"
        });


        $(function(){
            $('.attach-doc').on('click',function(){
                var pdf_link = $(this).attr('href');
                var title = $(this).data().judul;
                var iframe = '<div class="iframe-container"><iframe src="http://docs.google.com/gview?url='+pdf_link+'&embedded=true"></iframe></div>'
                $.createModal({
                    title: title,
                    message: iframe,
                    closeButton:true,
                    scrollable:false,
                    link: pdf_link
                });
                return false;
            });
        })
    });
</script>