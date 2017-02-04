
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="<?php echo base_url("panel/inbox/"); ?>">Surat Masuk</a></li>
            <li class="active"><?php echo $pesan->subjek; ?></li>
        </ol>
    </div><!--/.row-->

    <hr/>

    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-info">
                <?php if(isset($_GET["err"])): ?>
                    <div class="alert bg-danger" role="alert">
                        <svg class="glyph stroked cancel"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-cancel"></use></svg> Gagal mengirim disposisi! Coba lagi nanti <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                <?php elseif(isset($_GET["succ"])):?>
                    <div class="alert bg-success" role="alert">
                        <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> Disposisi berhasil dikirim ke tujuan! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                <?php endif; ?>
                <div class="panel-heading">
                    Subjek : <?php echo $pesan->subjek; ?>
                </div>
                <div class="panel-body">
                    <i>Oleh <?php echo $pesan->pengirim; ?> pada <?php echo $pesan->waktu_kirim;?></i><hr style="margin: 5px;" />
                    <?php echo $pesan->isi_pesan; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Tindakan
                </div>
                <ul class="list-group">
                    <?php if($this->session->userdata("disposisi") == 1): ?>
                        <li class="list-group-item"><a href="<?php echo base_url("panel/buatdisposisi/".$pesan->id_pesan); ?>"><i class="fa fa-paperclip fa-lg fa-fw"></i>&nbsp;Buat Disposisi</a></li>
                    <?php endif; ?>
                    <li class="list-group-item"><a href="<?php echo base_url("panel/compose/?sub=Re : ".$pesan->subjek."&pn=".$pesan->dari_user); ?>"><i class="fa fa-reply fa-lg fa-fw"></i> Balas</a></li>
                </ul>
            </div>
            <?php
            if($pesan->lampiran != null):
            $lampiran = json_decode($pesan->lampiran);
            ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Lampiran File
                </div>
                <ul class="list-group">
                    <?php foreach($lampiran as $item):
                        $ext = explode(".",$item->file);
                        $cls = (is_doc(end($ext))) ? "attach-doc" : "attach-img";
                        ?>
                        <li class="list-group-item"><a href="<?php echo base_url("assets/uploads/lampiran/".$item->file); ?>" class="<?php echo $cls; ?>" data-judul="<?php echo $item->judul; ?>"><?php echo $item->judul; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif;?>
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
    })
</script>