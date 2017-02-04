
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Manajemen Dinas</li>
    </ol>
</div><!--/.row--><br />

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Dinas</div>
            <div class="panel-body">
                <a href="<?php echo base_url("panel/tambahdinas"); ?>" class="btn btn-success"><i class="fa fa-plus-circle fa-lg fa-fw"></i> Tambah</a>
                <table data-toggle="table" data-url="<?php //echo base_url("panel/json_inbox");?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="nama_lengkap"  data-sortable="true">Nama Dinas</th>
                        <th>Pilihan</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($daftar_dinas as $dinas): ?>
                        <tr>
                            <td><?php echo $dinas->nama_dinas; ?></td>
                            <td>
                                <a href="<?php echo base_url("panel/editdinas/".$dinas->id_dinas); ?>" class="btn btn-primary">Edit</a>
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
