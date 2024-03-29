<section id="team" class="team section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Semua Berita</h2>
            <p>Berita dan info terkini</p>
        </div>

        <div class="row">
            <?php foreach ($berita as $lu) : ?>
                <div class="col-lg-12 mt-3">
                    <div class="col-md-12">

                    </div>
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member-info">
                            <center><img src="<?php echo base_url('assets/gambar/' . $lu['gambar']); ?>" class="img-fluid"></center>
                            <hr>
                            <h4><a href="<?php echo base_url('landing/detail/' . $lu['id_berita']); ?>"><?php echo $lu['judul_berita']; ?></a></h4>
                            <small class="text-muted"><i><?php echo $lu['penulis_berita']; ?> | <?php echo format_indo($lu['tgl_berita']); ?></i></small>
                            <p class=" text-justify"><?php echo $lu['deskripsi_singkat']; ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <small><a href="<?php echo base_url('landing/detail/' . $lu['id_berita']); ?>">Read more...</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-12 mt-2">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</section><!-- End Team Section -->