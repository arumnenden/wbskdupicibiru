<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center pt-5">
    <div class="container">
            <div class="row">
                <div class="col-lg d-flex flex-column justify-content-center " data-aos="fade-up" data-aos-delay="200">
        <h1 class="text-center">WBS-kd.upicibiru</h1>
        <h2 class="text-center">Merupakan aplikasi pengaduan online yang dibuat untuk masyarakat di UPI Cibiru dengan tujuan menciptakan perubahan yang lebih baik.</h2>
        <div class="d-lg-flex justify-content-center">
            <a href="#contact" class="btn-get-started scrollto">Daftar Sekarang</a>
        </div>
    </div>
            <!-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?php echo base_url('vendor/'); ?>assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div> -->
        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <br>
<div class="container">        
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
               <div class="col-lg-6">
                  <h2>Sambutan</h2>
                  <p>WBS-kd.upicibiru merupakan aplikasi yang dipersembahkan oleh universitas UPI Cibiru. Jika Anda memiliki informasi dan ingin melaporkan tindakan yang menunjukkan pelanggaran, maupun ketidak nyamanan atau ketidakpuasan atas pelayanan di lingkungan kampus, anda dapat memanfaatkan situs web ini.</p>
                  <p>Anda tak perlu cemas tentang pengungkapan identitas diri Anda karena kami akan menjaga kerahasiaan pelapor. Kami menghormati informasi yang Anda laporkan, dan fokus utama kami adalah pada materi informasi yang Anda berikan.</p>
				 <br> 
				  <h5>Direktur UPI Kampus Cibiru</h5>
				  <p>Prof. Dr. Deni Darmawan, S. Pd., M. Si. M. Kom., MCE.</p>
                  <!-- <ul>
                     <li>Sed at tellus eu quam posuere mattis.</li>
                     <li>Phasellus quis erat et enim laoreet posuere ac porttitor ipsum.</li>
                     <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>                     
                  </ul> -->
               </div>
               <div class="col-lg-6">
                  <img class="img-fluid rounded" src="<?php echo base_url('vendor/'); ?>assets/img/deni-darmawan.jpg" alt="" />
               </div>
            </div>
            <!-- /.row -->
        </div>
	</div>
</br>

    <!-- ======= Services Section ======= -->
    <section id="about" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <h6 class="text-center text-danger">
                <?php echo form_error('email'); ?>
                <?php echo form_error('nama'); ?>
                <?php echo form_error('username'); ?>
                <?php echo form_error('password1'); ?>
            </h6>
            <div class=" section-title">
                <h2>Pelayanan Terintegrasi</h2>
                <p>Beberapa Jenis Layanan Yang Ada Pada Wbs-kd.upicibiru</p>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="">Sistem Umpan Balik</a></h4>
                        <p>Pengguna dapat memberikan umpan balik terhadap penanganan pengaduan mereka, dan sistem dapat menggunakan umpan balik tersebut untuk terus meningkatkan proses dan respons.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Formulir Pengaduan online</a></h4>
                        <p>Pengguna dapat mengisi formulir pengaduan secara online, yang mencakup informasi seperti jenis pengaduan, deskripsi masalah, dan detail kontak.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Lampiran File</a></h4>
                        <p>Pengguna dapat melampirkan bukti atau dokumentasi terkait pengaduan.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Free atau Gratis</a></h4>
                        <p>Daftar dan register gratis tanpa ada tambahan biaya serta fleksibel.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Artikel dan Berita</h2>
                <p>Berita terbaru dan terupdate</p>
            </div>
            <div class="row">
                <?php foreach ($berita as $lu2) : ?>
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <h4><a href="<?php echo base_url('landing/detail/' . $lu2['id_berita']); ?>"><?php echo $lu2['judul_berita']; ?></a></h4>
                            <h4><img src="<?php echo base_url('assets/gambar/' . $lu2['gambar']); ?>" class="img-fluid"></h4>
                            <hr>
                            <p><?php echo $lu2['deskripsi_singkat']; ?></p>
                            <a href="<?php echo base_url('landing/detail/' . $lu2['id_berita']); ?>">Read more...</a>
                            <small class="float-right"><a href="<?php echo base_url('landing/all_berita'); ?>" class="badge badge-primary" style="font-size:12px;">Lihat Semua</a></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>End Services Section -->




    <!-- <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Prokem</h2>
                <p>Promosi Usaha Mikro Kecil Menengah</p>
            </div>
            <div class="row">
                <?php foreach ($promkes as $lu) : ?>
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <h4><a href="<?php echo base_url('landing/detail2/' . $lu['id_promkes']); ?>"><?php echo $lu['judul_promkes']; ?></a></h4>
                            <h4><img src="<?php echo base_url('assets/gambar/' . $lu['gambar']); ?>" class="img-fluid"></h4>
                            <hr>
                            <p><?php echo $lu['deskripsi_singkat']; ?></p>
                            <a href="<?php echo base_url('landing/detail2/' . $lu['id_promkes']); ?>">Read more...</a>
                            <small class="float-right"><a href="<?php echo base_url('landing/all_promkes'); ?>" class="badge badge-primary" style="font-size:12px;">Lihat Semua</a></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div> -->
        <!-- <small class="justify"><a href="<?php echo base_url('landing/all_promkes'); ?>" class="badge badge-success" style="font-size:16px;">Lihat Semua</a></small> -->
    <!-- </section>End Services Section -->







    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>FAQ</h2>
                <p>Frequently Ask Questions</p>
            </div>
            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Apa itu pengaduan online? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                            <p>
                                Fasilitas pengaduan dan komplain atas pelayanan yang dirasa tidak puas oleh pelanggan tanpa batas waktu dan tempat
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Bagaimana cara mengadukan keluhan atau komplain saya ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                            <p>
                                Silahkan mendaftarkan diri anda untuk dapat mengajukan komplain beserta dengan data data yang ada.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Bagaimana dengan hasil pengaduan saya? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                            <p>
                                Hasil komplain dapat dilihat dengan masuk ke member area menggunakan akun Anda.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Apakah data yang saya kirimkan aman? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                            <p>
                                Kami akan memberikan privasi dan keamanan data kepada setiap akun pelanggan yang melakukan komplain.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="500">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Apakah saya bisa menghapus atau merevisi komplain? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                            <p>
                                Anda dapat melakukan edit dan hapus apabila komplain Anda belum direspon oleh Admin kami.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Kontak & Daftar</h2>
                <p>Silahkan kontak kami jika butuh bantuan lebih lanjut</p>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Alamat Kami :</h4>
                            <p><?php echo $profile['alamat_profile']; ?></p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p><?php echo $profile['email_profile']; ?></p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telp:</h4>
                            <p>+<?php echo $profile['telp_profile']; ?></p>
                        </div>
                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telp:</h4>
                            <p>+628156063380</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form action="<?php echo base_url('landing/add_user'); ?>" method="post" class="bg-white rounded pb_form_v1">
                                <h2 class="mb-1">Daftar Sekarang</h2>
                                <span style="font-size:11px;color:black;padding-bottom:5px;">* Mohon Diingat NIK dan Password yang sudah Anda Buat. Nik Adalah Username Anda.
                                    <br>
                                    * Jika lupa password silahkan hubungi Admin kami di +<?php echo $profile['telp_profile']; ?></span>
                                <div class="form-group mt-1">
                                    <input type="text" class="form-control pb_height-40 reverse" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>" required>
                                    <?php echo form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class=" form-group">
                                    <input type="number" class="form-control pb_height-40 reverse" name="username" placeholder="NIP/KTM" value="<?php echo set_value('username'); ?>" required>
                                    <?php echo form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control pb_height-40 reverse" name="email" placeholder="No HP" value="<?php echo set_value('email'); ?>" required>
                                    <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <div class=" row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control pb_height-40 reverse" name="password1" placeholder="Password" required>
                                            <?php echo form_error('password1', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control pb_height-40 reverse" name="password2" placeholder="Ulang Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Daftar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <iframe src="<?php echo $profile['map_profile']; ?>" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->