<section id="team" class="team section-bg mt-5">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Prokem dan Artikel</h2>
            <p>Prokem terupdate dan terbaru</p>
        </div>

        <div class="row">
            <?php foreach ($promkes as $lu2) : ?>
                <div class="col-lg-12 mt-3">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div><img src="<?php echo base_url('assets/gambar/' . $lu2['gambar']); ?>" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4><a href="<?php echo base_url('landing/detail2/' . $lu2['id_promkes']); ?>"><?php echo $lu2['judul_promkes']; ?></a></h4>
                            <small class="text-muted"><i><?php echo $lu2['penulis_promkes']; ?> | <?php echo format_indo($lu2['tgl_promkes']); ?></i></small>
                            <p><?php echo $lu2['deskripsi_singkat']; ?></p>
                            <!-- <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div> -->
                            <small><a href="<?php echo base_url('landing/detail2/' . $lu2['id_promkes']); ?>">Read more...</a></small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Team Section -->