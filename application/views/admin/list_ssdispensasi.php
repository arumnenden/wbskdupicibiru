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
                                    
                                    <th>Nama Pemohon</th>
                                    <th>No HP</th>
                                    <th>Tgl</th>
                                    <th>Tanggapan</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Hapus</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_ssdispensasi as $lsp) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            
                                            <td><?php echo $lsp['nama']; ?></td>
                                            <td><?php echo $lsp['email']; ?></td>
                                            <td><?php echo format_indo($lsp['date_ssdispensasi']); ?></td>
                                            <td><?php echo $lsp['tanggapan']; ?></td>
                                            <?php if ($lsp['status_ssdispensasi'] == 1) : ?>
                                                <td><span class="btn btn-block btn-danger btn-flat btn-sm"><i class="fas fa-pause"></i> Waiting</span></td>
                                            <?php elseif ($lsp['status_ssdispensasi'] == 2) : ?>
                                                <td><span class="btn btn-block btn-warning btn-flat btn-sm"><i class="fas fa-running"></i> Proses</span></td>
                                            <?php elseif ($lsp['status_ssdispensasi'] == 3) : ?>
                                                <td><span class="btn btn-block btn-danger btn-flat btn-sm"><i class="fas fa-running"></i> Ditolak</span></td>
                                            <?php else : ?>
                                                <td><span class="btn btn-block btn-info btn-flat btn-sm"><i class="fas fa-check-circle"></i>Selesai</span></td>
                                            <?php endif; ?>
                                            <td> <button type="button" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $lsp['id_ssdispensasi']; ?>" data-toggle="modal" data-target="#edit-komp"><i class="fas fa-info-circle"></i> Lihat</button></td>
                                            <td><a href="<?php echo base_url('admin/del_ssdispensasi/') . $lsp['id_ssdispensasi']; ?>" class="tombol-hapus btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a> </td>
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
                <h4 class="modal-title">View Data</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <?php echo form_open_multipart('admin/edit_ssdispensasi'); ?>

                    <div>
                            <div class="form-group">
                                <label for="nama">KTP/KTM</label>
                                <img src="<?php echo base_url('assets/images/' . $lsp['image']); ?>" class="img-thumbnail" alt="User Image" style="width:100%;" id="image"><br>
                            </div>
                            <div class="form-group">
                                <label for="nama">Surat Pengaduan</label>
                                <object data="<?php echo base_url('assets/images/' . $lsp['file2']); ?>" class="img-thumbnail" alt="User Image" style="width:100%;" id="image"></object><br>
                                <a class="btn btn-primary" href="<?= base_url('assets/images/'. $lsp['file2']);?>" target="_blank">Lihat Detail</a>
                            </div>
                            <!-- <div class="form-group">
                                <label for="nama">Surat Pengantar Dari Desa</label>
                                <img src="<?php echo base_url('assets/images/' . $lsp['file3']); ?>" class="img-thumbnail" alt="User Image" style="width:100%;" id="image"><br>
                            </div> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id_ssdispensasi" id="idjson">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="nama">Tanggapan</label>
                                <textarea class="form-control" rows="3" name="tanggapan"></textarea>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Surat Tanggapan</label>
                            <input type="file" class="form-control-file" name="filebalas">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ssdispensasi" id="status_ssdispensasi" value="2" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Proses
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ssdispensasi" id="status_ssdispensasi" value="0">
                            <label class="form-check-label" for="exampleRadios2">
                                Selesai
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ssdispensasi" id="status_ssdispensasi" value="1">
                            <label class="form-check-label" for="exampleRadios3">
                                Belum Ditanggapi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_ssdispensasi" id="status_ssdispensasi" value="3">
                            <label class="form-check-label" for="exampleRadios3">
                                Ditolak
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
        const id_ssdispensasi = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/get_edit_ssdispensasi'); ?>',
            data: {
                id_ssdispensasi: id_ssdispensasi
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#area').val(data.area_keluhan);
                $('#keluhan').val(data.keluhan);
                $('#saran').val(data.saran);
                $('#tgl').val(data.date_ssdispensasi);
                $("#image").attr('src', '<?php echo base_url() ?>assets/images/' + data.image);
                $('#idjson').val(data.id_ssdispensasi);
            }
        });
    });
</script>