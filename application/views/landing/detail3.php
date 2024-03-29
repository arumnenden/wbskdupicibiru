<section id="portfolio-details" class="portfolio-details mt-5">
      <div class="container">
          <div class="portfolio-details-container">
              <div class="owl-carousel portfolio-details-carousel">
                  <img src="<?php echo base_url('assets/gambar/' . $pkk['gambar']); ?>" class="img-fluid" alt="">
              </div>
          </div>
          <div class="portfolio-description">
              <h4><?php echo $pkk['judul_pkk']; ?></h4>
              <small class="text-muted"><i><?php echo $pkk['penulis_pkk']; ?> | <?php echo format_indo($pkk['tgl_pkk']); ?></i></small>
              <p class="text-justify">
                  <?php echo $pkk['pkk']; ?>
              </p>
              <div class="sharethis-inline-share-buttons"></div>
          </div>
      </div>
  </section><!-- End Portfolio Details Section -->