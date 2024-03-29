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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover" id="table-id">
                                <thead>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Penulis</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_berita as $lu) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo format_indo($lu['tgl_berita']); ?></td>
                                            <td><?php echo $lu['penulis_berita']; ?></td>
                                            <td><?php echo $lu['judul_berita']; ?></td>
                                            <td><?php echo $lu['deskripsi_singkat']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/edit_user/') . $lu['id_berita']; ?>" class="tombol-edit btn btn-primary btn-sm" data-id="<?php echo $lu['id_berita']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-edit"></i> Edit</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('admin/hapus_berita/') . $lu['id_berita']; ?>" class="tombol-hapus btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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


<div class="modal fade" id="edit-user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <?php echo form_open_multipart('admin/list_news'); ?>
                    <input type="hidden" name="id_berita" id="id_berita">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tgl_berita" id="tgl_berita" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" class="form-control" name="penulis_berita" id="penulis_berita" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" name="judul_berita" id="judul_berita" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="deskripsi_singkat" rows="3" id="deskripsi_singkat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea class="summernote" name="berita" id="summernote1" required></textarea>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar/Foto</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
                                <small class="font-weight-bolder">* Ekstensi file jpg, jpeg, png dan ukuran file tidak lebih dari 5 MB</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="" class="img-thumbnail" alt="User Image" style="width:300px;" id="image"><br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
        const id_berita = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/get_berita'); ?>',
            data: {
                id_berita: id_berita
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $("#image").attr('src', '<?php echo base_url() ?>assets/gambar/' + data.gambar);
                $('#summernote1').summernote('code', data.berita);
                $('#deskripsi_singkat').val(data.deskripsi_singkat);
                $('#judul_berita').val(data.judul_berita);
                $('#penulis_berita').val(data.penulis_berita);
                $('#tgl_berita').val(data.tgl_berita);
                $('#id_berita').val(data.id_berita);
            }
        });
    });
</script>