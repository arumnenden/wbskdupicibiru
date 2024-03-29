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
            <div class="card card-primary card-outline">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">x</a>
                        <strong><?php echo strip_tags(validation_errors()); ?></strong>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-user">
                            <i class="fas fa-plus-circle"></i> Tambah User
                        </button>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover" id="table-id">
                                <thead>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email /No HP</th>
                                    <th>User</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_user as $lu) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $lu['nama']; ?></td>
                                            <td><?php echo $lu['email']; ?></td>
                                            <td><?php echo $lu['username']; ?></td>
                                            <td><?php echo $lu['level']; ?></td>
                                            <?php if ($lu['is_active'] == 1) : ?>
                                                <td>Aktif</td>
                                            <?php else : ?>
                                                <td>Tidak Aktif</td>
                                            <?php endif; ?>
                                            <td><?php echo format_indo($lu['date_created']); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/edit_user/') . $lu['id']; ?>" class="tombol-edit btn btn-primary btn-sm" data-id="<?php echo $lu['id']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-edit"></i> Edit</a>
                                                <button class="tombol-edit btn btn-warning btn-sm" data-id="<?php echo $lu['id']; ?>" data-toggle="modal" data-target="#edit-password"><i class="fas fa-redo"></i> Reset Password</button>
                                                <a href="<?php echo base_url('admin/del_user/') . $lu['id']; ?>" class="tombol-hapus btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            </td>
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


<!-- Modal -->
<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/list_user'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control form-control-sm" name="level" id="level">.
                                <option value="">- Pilih Level -</option>
                                <option value="Admin">ADMINISTRATOR</option>
                                <option value="User">USER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="nama" id="nama" required>
                            <?php echo form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control form-control-sm" name="username" id="username" value="<?php set_value('username'); ?>" required>
                            <?php echo form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password1" id="password" required>
                                    <?php echo form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password2">Ketik Ulang Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password2" id="password2" required>
                                </div>
                            </div>
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

<div class="modal fade" id="edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/proses_edit_user'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="hidden" name="id" id="idjson">
                            <input type="text" class="form-control form-control-sm" name="username" id="usernamejson" readonly>
                            <?php echo form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="nama" id="namajson" required>
                            <?php echo form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control form-control-sm" name="level" id="leveljson">.
                                <option value="">- Pilih Level -</option>
                                <option value="Admin">ADMINISTRATOR</option>
                                <option value="User">USER</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm" id="emailjson" name="email" required>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" value="1" checked>
                                <label class="form-check-label">Aktif</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" value="0">
                                <label class="form-check-label">Tidak Aktif</label>
                            </div>
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

<div class="modal fade" id="edit-password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/edit_password'); ?>" method="post" id="form_id">
                        <input type="hidden" name="id_user" id="id-user">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" id="nama-user" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control form-control-sm" name="password" value="12345" readonly>
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
        const id = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/edit_user'); ?>',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#namajson').val(data.nama);
                $('#nipjson').val(data.nip);
                $('#emailjson').val(data.email);
                $('#usernamejson').val(data.username);
                $('#leveljson').val(data.level);
                $('#idjson').val(data.id);
                $('#id-user').val(data.id);
                $('#nama-user').val(data.nama);
            }
        });
    });
</script>