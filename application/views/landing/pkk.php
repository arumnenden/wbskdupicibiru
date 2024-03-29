<section id="team" class="team section-bg mt-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>PKK</h2>
            <p>PKK terupdate dan terbaru</p>
        </div>

        <div class="row">
            <?php foreach ($pkk as $lu3) : ?>
                <div class="col-lg-12 mt-3">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div><img src="<?php echo base_url('assets/gambar/' . $lu3['gambar']); ?>" class="img-fluid" alt="" width="550" height="400"></div>
                        <div class="member-info">
                            <h4><a href="<?php echo base_url('landing/detail3/' . $lu3['id_pkk']); ?>"><?php echo $lu3['judul_pkk']; ?></a></h4>
                            <small class="text-muted"><i><?php echo $lu3['penulis_pkk']; ?> | <?php echo format_indo($lu3['tgl_pkk']); ?></i></small>
                            <p><?php echo $lu3['deskripsi_singkat']; ?></p>
                            <!-- <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div> -->
                            <small><a href="<?php echo base_url('landing/detail3/' . $lu3['id_pkk']); ?>">Read more...</a></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Team Section -->