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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover" id="table-id">
                                <thead>
                                    <th>#</th>
                                    <th>Ticket</th>
                                    <th>Nama</th>
                                    <th>Area Keluhan</th>
                                    <th>Keluhan</th>
                                    <th>Saran</th>
                                    <th>Tgl Komplain</th>
                                    <th>Tanggapan</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Hapus</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_komplain as $lk) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $lk['ticket']; ?></td>
                                            <td><?php echo $lk['nama']; ?></td>
                                            <td><?php echo $lk['area_keluhan']; ?></td>
                                            <td><?php echo $lk['keluhan']; ?></td>
                                            <td><?php echo $lk['saran']; ?></td>
                                            <td><?php echo format_indo($lk['date_komplain']); ?></td>
                                            <td><?php echo $lk['tanggapan']; ?></td>
                                            <?php if ($lk['status_komplain'] == 1) : ?>
                                                <td><span class="btn btn-block btn-danger btn-flat btn-sm"><i class="fas fa-pause"></i> Waiting</span></td>
                                            <?php elseif ($lk['status_komplain'] == 2) : ?>
                                                <td><span class="btn btn-block btn-warning btn-flat btn-sm"><i class="fas fa-running"></i> Proses</span></td>
                                            <?php else : ?>
                                                <td><span class="btn btn-block btn-info btn-flat btn-sm"><i class="fas fa-check-circle"></i>Selesai</span></td>
                                            <?php endif; ?>
                                            <td> <button type="button" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $lk['id_komplain']; ?>" data-toggle="modal" data-target="#edit-komp"><i class="fas fa-info-circle"></i> Lihat</button></td>
                                            <td><a href="<?php echo base_url('admin/del_komplain/') . $lk['id_komplain']; ?>" class="tombol-hapus btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a> </td>
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

<div class="modal fade" id="edit-komp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <?php echo form_open_multipart('admin/edit_komplain'); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Area Keluhan</label>
                                <input type="hidden" name="id_komplain" id="idjson">
                                <input type="text" class="form-control form-control-sm" id="area" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Keluhan / Komplain</label>
                                <input type="text" class="form-control form-control-sm" id="keluhan" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Saran</label>
                                <input type="text" class="form-control form-control-sm" id="saran" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal Komplain</label>
                                <input type="date" class="form-control form-control-sm" id="tgl" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggapan</label>
                                <textarea class="form-control" rows="3" name="tanggapan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Foto Upload</label>
                                <img src="" class="img-thumbnail" alt="User Image" style="width:400px;" id="image"><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-md-6">
                        <!-- <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Gambar Tanggapan</label>
                            <input type="file" class="form-control-file" name="image">
                            </div>
                        </div> -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_komplain" id="status_komplain" value="2" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Proses
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_komplain" id="status_komplain" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                Sudah Ditanggapi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_komplain" id="status_komplain" value="1">
                            <label class="form-check-label" for="exampleRadios3">
                                Belum Ditanggapi
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<script>
    $('.tombol-edit').on('click', function() {
        const id_komplain = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/get_edit_komplain'); ?>',
            data: {
                id_komplain: id_komplain
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#area').val(data.area_keluhan);
                $('#keluhan').val(data.keluhan);
                $('#saran').val(data.saran);
                $('#tgl').val(data.date_komplain);
                $("#image").attr('src', '<?php echo base_url() ?>assets/images/' + data.image);
                $('#idjson').val(data.id_komplain);
            }
        });
    });
</script>