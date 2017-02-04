
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="<?php echo base_url("panel/disposisi_keluar/"); ?>">Disposisi Keluar</a></li>
            <li class="active">Baca Disposisi</li>
        </ol>
    </div><!--/.row-->

    <hr/>

    <div class="row">
        <div class="col-lg-6" id="disposisi">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Detail disposisi</h5>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <td><b>Waktu Kirim</b></td>
                            <td><?php echo $disposisi->waktu_kirim; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tujuan</b></td>
                            <td>
                                <?php
                                foreach($disposisi->penerima as $key=>$p) {
                                    $key += 1;
                                    if ($p->selesai_ditangani == 1)
                                        echo "<p style='cursor: pointer;' onclick=\"swal('','$p->catatan_selesai','success')\" class='alert-success'>" . $key . " . $p->nama_lengkap <i class='fa fa-check fa-lg fa-fw'></i>" . "</p>";
                                    elseif($p->dibaca == 1)
                                        echo "<p style='background-color: rgba(52, 152, 219, 0.76); color: white;'>" . $key . " . $p->nama_lengkap <i class='fa fa-eye fa-lg fa-fw'></i></p> ";
                                    else
                                        echo "<p>" . $key . " . $p->nama_lengkap </p>";
                                }
                                ?>
                            </td>
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
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="surat">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Lampiran surat terkait</h5>
                </div>
                <div class="panel-body">
                    <b><?php echo $disposisi->lampiran_surat->subjek; ?></b><br />
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