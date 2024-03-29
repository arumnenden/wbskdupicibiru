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
                        <?php echo form_open_multipart('admin/prks'); ?>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control col-md-2" name="tgl_promkes" required>
                        </div>
                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text" class="form-control" name="penulis_promkes" value="<?php echo $user['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Judul PROKEM</label>
                            <input type="text" class="form-control" name="judul_promkes" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Singkat</label>
                            <textarea class="form-control" name="deskripsi_singkat" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Isi PROKEM</label>
                            <textarea class="summernote" name="promkes" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gambar/Foto</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar" required>
                            <small class="font-weight-bolder">* Ekstensi file jpg, jpeg, png dan ukuran file tidak lebih dari 5 MB</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->