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
                        <form action="<?php echo base_url('admin/setting'); ?>" method="post">
                            <input type="hidden" name="id_profile" value="<?php echo $profile['id_profile']; ?>">
                            <div class="form-group">
                                <label>Nama Website</label>
                                <input type="text" class="form-control" name="nama_website" value="<?php echo $profile['nama_website']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat_profile" rows="3"><?php echo $profile['alamat_profile']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email_profile" value="<?php echo $profile['email_profile']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="text" class="form-control" name="telp_profile" value="<?php echo $profile['telp_profile']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Peta Area</label>
                                <textarea class="form-control" name="map_profile" rows="3"><?php echo $profile['map_profile']; ?></textarea>
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