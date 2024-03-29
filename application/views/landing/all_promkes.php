<section id="team" class="team section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Semua promkes</h2>
            <p>promkes dan info terkini</p>
        </div>

        <div class="row">
            <?php foreach ($promkes as $lu2) : ?>
                <div class="col-lg-12 mt-3">
                    <div class="col-md-12">

                    </div>
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member-info">
                            <center><img src="<?php echo base_url('assets/gambar/' . $lu2['gambar']); ?>" class="img-fluid"></center>
                            <hr>
                            <h4><a href="<?php echo base_url('landing/detail/' . $lu2['id_promkes']); ?>"><?php echo $lu2['judul_promkes']; ?></a></h4>
                            <small class="text-muted"><i><?php echo $lu2['penulis_promkes']; ?> | <?php echo format_indo($lu2['tgl_promkes']); ?></i></small>
                            <p class=" text-justify"><?php echo $lu2['deskripsi_singkat']; ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <small><a href="<?php echo base_url('landing/detail/' . $lu2['id_promkes']); ?>">Read more...</a></small>
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