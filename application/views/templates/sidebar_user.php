<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/'); ?>dist/img/upi.png" alt="simawar Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">WBSUPICibiru</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/dist/img/profile/' . $user['image']); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $user['nama']; ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MEMBER</li>


                 <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Pelayanan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('user/ssktp'); ?>" class="nav-link">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>Pengaduan</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('user/sspindah'); ?>" class="nav-link">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>Surat Pindah</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('user/ssktm'); ?>" class="nav-link">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>Surat Ket. Tidak Mampu</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('user/sskbd'); ?>" class="nav-link">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>Surat Ket. Bersih Diri</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a href="<?php echo base_url('user/ssdispensasi'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Surat Pengaduan</p>
                            </a>
                        </li> 
                        <!--<li class="nav-item">-->
                        <!--    <a href="<?php echo base_url('user/ssktp'); ?>" class="nav-link">-->
                        <!--        <i class="far fa-circle nav-icon"></i>-->
                        <!--        <p>Perekaman E-KTP</p>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>
                </li> 




                <li class="nav-item">
                    <a href="<?php echo base_url('user/index'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p class="text">Daftar Keluhan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('user/laporan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p class="text">Laporan</p>
                    </a>
                </li>

                <li class="nav-header">END</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('auth/logout'); ?>" id="tombol-logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>