<style>
    .dataTables_wrapper {
        font-size: 16px
    }
</style>
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
                        <button type="button" class="btn btn-default btn-sm mr-1" data-toggle="modal" data-target="#ubah-profile"><i class="fas fa-user-edit"></i> Ubah Profile</button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#ubah-pass"><i class="fas fa-key"></i> Ubah Password</button>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card">
                    <div class="card-header">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger">
                                <a class="close" data-dismiss="alert">x</a>
                                <strong><?php echo strip_tags(validation_errors()); ?></strong>
                            </div>
                        <?php } ?>
                        <?php if ($user['activated'] == 1) : ?>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-user">* Isi data pribadi terlebih dahulu untuk menambahkan keluhan, kritik, maupun saran</button>
                        <?php else : ?>
                        <?php endif; ?>
                        <?php if ($user['activated'] == 0) : ?>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-saran">
                                <i class="fas fa-plus-circle"></i> Tambah Keluhan
                            </button>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                <thead>
                                    <th>#</th>
                                    <th>Ticket</th>
                                    <th>Photo</th>
                                    <th>Area Keluhan</th>
                                    <th>Keluhan</th>
                                    <th>Saran</th>
                                    <th>Tgl Komplain</th>
                                    <th>Tanggapan</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_komplain as $lk) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $lk['ticket']; ?></td>
                                            <td> <img src="<?php echo base_url('assets/images/' . $lk['image']); ?>" class="img-thumbnail" alt="User Image" style="width:100px;"></td>
                                            <td><?php echo $lk['area_keluhan']; ?></td>
                                            <td><?php echo $lk['keluhan']; ?></td>
                                            <td><?php echo $lk['saran']; ?></td>
                                            <td><?php echo format_indo($lk['date_komplain']); ?></td>
                                            <td><?php echo $lk['tanggapan']; ?></td>
                                            <?php if ($lk['status_komplain'] == 1) : ?>
                                                <td><span class="btn btn-block btn-danger btn-flat btn-sm">Belum Ditanggapi</span></td>
                                            <?php elseif ($lk['status_komplain'] == 2) : ?>
                                                <td><span class="btn btn-block btn-warning btn-flat btn-sm">Proses</span></td>
                                            <?php else : ?>
                                                <td><span class="btn btn-block btn-info btn-flat btn-sm">Sudah Ditanggapi</span></td>
                                            <?php endif; ?>
                                            <?php if ($lk['status_komplain'] == 1) : ?>
                                                <td><button type="button" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $lk['id_komplain']; ?>" data-toggle="modal" data-target="#edit-komp"><i class="fas fa-edit"></i> Edit</<button>
                                                </td>
                                            <?php else : ?>
                                                <td>
                                                    <span class="btn btn-block btn-outline-success btn-flat btn-sm">Closed</span>
                                                </td>
                                            <?php endif; ?>
                                            <?php if ($lk['status_komplain'] == 1) : ?>
                                                <td><a href="<?php echo base_url('user/del_komplain/') . $lk['id_komplain']; ?>" class="tombol-hapus btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a> </td>
                                            <?php else : ?>
                                                <td>
                                                    <span class="btn btn-block btn-outline-success btn-flat btn-sm">Closed</span>
                                                </td>
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

<div class="modal fade" id="ubah-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Profile</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <?php echo form_open_multipart('user/edit_profile'); ?>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bagian" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bagian" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"><label>Photo</label></div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?php echo base_url('assets/dist/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" name="image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted" style="font-size:12px;">* Format Photo JPG, JPEG, PNG, GIF dan ukuran gambar kurang dari 2 mb</span>
                    <hr style="margin-bottom:10px;margin-top:2px;">
                    <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<!-- Modal -->
<div class="modal fade" id="ubah-pass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('user/ubah_password'); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="form-group">
                            <label for="new_password1">Password Baru</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Ulang Password Baru</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Ketik ulang password baru">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pribadi</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('user/index'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="nama">E-Mail</label>
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <input type="text" class="form-control form-control-sm" name="no_telp" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat</label>
                            <input type="text" class="form-control form-control-sm" name="alamat" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activated" value="0" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Aktivasi
                            </label>
                        </div>
                        <div class="form-group">

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<div class="modal fade" id="add-saran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Komplain, Kritik, dan Saran</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <?php echo form_open_multipart('user/add_komplain'); ?>
                    <div class="form-group">
                        <label for="username">No Ticket</label>
                        <input type="text" class="form-control form-control-sm" name="ticket" value="<?php echo $ticket; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Area Keluhan</label>
                        <!-- <input type="text" class="form-control form-control-sm" name="area_keluhan" required> -->
                        <select class="form-control form-control-sm" name="area_keluhan">
                            <option value="Fasilitas">Fasilitas</option>
                            <option value="Akademik">Akademik</option>
                            <option value="Keamanan">Keamanan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Keluhan / Komplain</label>
                        <input type="text" class="form-control form-control-sm" name="keluhan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Saran</label>
                        <input type="text" class="form-control form-control-sm" name="saran" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Tanggal Komplain</label>
                                <input type="date" class="form-control form-control-sm" name="date_komplain" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload Gambar</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <span class="text-muted" style="font-size:12px;">* Format gambar JPG, JPEG, PNG, GIF dan ukuran gambar kurang dari 5 MB</span>
                        <hr>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Kirim Data</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<div class="modal fade" id="edit-komp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <?php echo form_open_multipart('user/edit_komplain'); ?>
                    <input type="hidden" name="id_komplain" id="idjson">
                    <div class="form-group">
                        <label for="username">No Ticket</label>
                        <input type="text" class="form-control form-control-sm" id="ticket" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Area Keluhan</label>
                        <input type="text" class="form-control form-control-sm" name="area_keluhan" id="area" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Keluhan / Komplain</label>
                        <input type="text" class="form-control form-control-sm" name="keluhan" id="keluhan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Saran</label>
                        <input type="text" class="form-control form-control-sm" name="saran" id="saran" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Tanggal Komplain</label>
                                <input type="date" class="form-control form-control-sm" name="date_komplain" id="tgl" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload Gambar</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <span class="text-muted" style="font-size:12px;">* Format gambar JPG, JPEG, PNG, GIF dan ukuran gambar kurang dari 5 MB</span>
                        <hr>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Simpan Perubahan</button>
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
            url: '<?php echo base_url('user/get_edit_komplain'); ?>',
            data: {
                id_komplain: id_komplain
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#ticket').val(data.ticket);
                $('#area').val(data.area_keluhan);
                $('#keluhan').val(data.keluhan);
                $('#saran').val(data.saran);
                $('#tgl').val(data.date_komplain);
                $('#idjson').val(data.id_komplain);
            }
        });
    });
</script>