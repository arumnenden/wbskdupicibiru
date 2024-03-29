  <section id="portfolio-details" class="portfolio-details mt-5">
      <div class="container">
          <div class="portfolio-details-container">
              <div class="owl-carousel portfolio-details-carousel">
                  <img src="<?php echo base_url('assets/gambar/' . $berita['gambar']); ?>" class="img-fluid" alt="">
              </div>
          </div>
          <div class="portfolio-description">
              <h4><?php echo $berita['judul_berita']; ?></h4>
              <small class="text-muted"><i><?php echo $berita['penulis_berita']; ?> | <?php echo format_indo($berita['tgl_berita']); ?></i></small>
              <p class="text-justify">
                  <?php echo $berita['berita']; ?>
              </p>
              <div class="sharethis-inline-share-buttons"></div>
          </div>
      </div>
  </section><!-- End Portfolio Details Section -->