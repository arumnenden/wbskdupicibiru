<section id="portfolio-details" class="portfolio-details mt-5">
      <div class="container">
          <div class="portfolio-details-container">
              <div class="owl-carousel portfolio-details-carousel">
                  <img src="<?php echo base_url('assets/gambar/' . $promkes['gambar']); ?>" class="img-fluid" alt="">
              </div>
          </div>
          <div class="portfolio-description">
              <h4><?php echo $promkes['judul_promkes']; ?></h4>
              <small class="text-muted"><i><?php echo $promkes['penulis_promkes']; ?> | <?php echo format_indo($promkes['tgl_promkes']); ?></i></small>
              <p class="text-justify">
                  <?php echo $promkes['promkes']; ?>
              </p>
              <div class="sharethis-inline-share-buttons"></div>
          </div>
      </div>
  </section><!-- End Portfolio Details Section -->