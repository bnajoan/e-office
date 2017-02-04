
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Manajemen Pengguna</li>
    </ol>
</div><!--/.row--><br />

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php if(isset($_GET["succ"]) && $_GET["succ"] == 1): ?>
                <div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> Pengguna berhasil diblokir! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            <?php elseif(isset($_GET["succ"]) && $_GET["succ"] == 2): ?>
                <div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-checkmark"></use></svg> Pengguna berhasil dibuka! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            <?php endif;?>
            <div class="panel-heading">Daftar Pengguna</div>
            <div class="panel-body">
                <a href="<?php echo base_url("panel/tambahpengguna"); ?>" class="btn btn-success"><i class="fa fa-plus-circle fa-lg fa-fw"></i> Tambah</a>
                <table data-toggle="table" data-url="<?php //echo base_url("panel/json_inbox");?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="nama_lengkap"  data-sortable="true">Nama Lengkap</th>
                        <th data-field="jabatan"  data-sortable="true">Jabatan</th>
                        <th data-field="dinas" data-sortable="true">Dinas</th>
                        <th data-field="nip" data-sortable="true">NIP</th>
                        <th data-field="disposisi" data-sortable="true">Hak Disposisi</th>
                        <th>Pilihan</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($daftar_pengguna as $pengguna): ?>
                        <tr>
                            <td><?php echo $pengguna->nama_lengkap; ?></td>
                            <td><?php echo $pengguna->nama_jabatan; ?></td>
                            <td><?php echo $pengguna->nama_dinas; ?></td>
                            <td><?php echo $pengguna->nip; ?></td>
                            <td><?php echo ($pengguna->disposisi == 1) ? "<b>Y</b>" : "<b>N</b>"; ?></td>
                            <td>
                                <a href="<?php echo base_url("panel/editpengguna/".$pengguna->id_pengguna); ?>" class="btn btn-primary">Edit</a>
                                <?php if($pengguna->blokir == 0): ?>
                                    <a href="<?php echo base_url("panel/blokirpengguna/".$pengguna->id_pengguna); ?>" class="btn btn-warning">Blokir</a>
                                <?php else: ?>
                                    <a href="<?php echo base_url("panel/bukapengguna/".$pengguna->id_pengguna); ?>" class="btn btn-success">Buka Blokir</a>
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.row-->

</div><!--/.main-->
