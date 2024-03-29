<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card card-primary card-outline">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger">
                            <a class="close" data-dismiss="alert">x</a>
                            <strong><?php echo strip_tags(validation_errors()); ?></strong>
                        </div>
                    <?php } ?>
                    <div class="card-header">
                        <form class="form-inline" action="<?php echo base_url('admin/filter_laporan'); ?>" method="post">
                            <label class="mb-2 mr-sm-2">Tanggal : </label>
                            <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tanggal_awal" required>
                            <label class="mb-2 mr-sm-2"> s/d </label>
                            <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="tanggal_akhir" required>
                            <button type="submit" class="btn btn-primary btn-sm mb-2">Filter</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover" id="table-table">
                                <thead>
                                    <th>#</th>
                                    <th>Ticket</th>
                                    <th>Tgl</th>
                                    <th>Nama</th>
                                    <th>Area Keluhan</th>
                                    <th>Keluhan</th>
                                    <th>Saran</th>
                                    <th>Tanggapan</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_komplain as $lk) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $lk['ticket']; ?></td>
                                            <td><?php echo format_indo($lk['date_komplain']); ?></td>
                                            <td><?php echo $lk['nama']; ?></td>
                                            <td><?php echo $lk['area_keluhan']; ?></td>
                                            <td><?php echo $lk['keluhan']; ?></td>
                                            <td><?php echo $lk['saran']; ?></td>
                                            <td><?php echo $lk['tanggapan']; ?></td>
                                            <?php if ($lk['status_komplain'] == 1) : ?>
                                                <td class="text-danger">Belum Ditanggapi</td>
                                            <?php elseif ($lk['status_komplain'] == 2) : ?>
                                                <td class="text-info">Proses</td>
                                            <?php else : ?>
                                                <td class="text-success">Sudah Ditanggapi</td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->