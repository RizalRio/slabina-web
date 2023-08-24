<?= $this->extend('core') ?>

<?= $this->section('content') ?>
<!-- ======= Clients Section ======= -->
<section id="clients" class="clients section-bg">
    <div class="container">

        <div class="row d-flex align-items-center justify-content-center" data-aos="zoom-in">
            <?php foreach ($client as $row) : ?>
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url() ?>/uploads/tentang/<?= $row['logo'] ?>" class="img-fluid" alt="">
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section><!-- End Cliens Section -->
<!-- ======= Contact Section ======= -->
<section id="tentang" class="tentang">
    <div class="contact" id="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Tentang Kami</h2>
                <p></p>
            </div>

            <div class="row">
                <?php foreach ($client as $row) : ?>
                    <div class="col-lg-6 mb-4 d-flex align-items-stretchv h-100">
                        <div class="info">
                            <div class="text-center mb-5">
                                <img src="<?= base_url() ?>/uploads/tentang/<?= $row['logo'] ?>" alt="">
                            </div>
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p> <?= $row['address'] ?></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Kontak:</h4>
                                <p><?= $row['contact'] ?></p>
                            </div>

                            <div class="email">
                                <i class="bi bi-instagram"></i>
                                <h4>Instagram:</h4>
                                <p><?= $row['instagram'] ?></p>
                            </div>

                            <?= $row['embed_address'] ?>
                        </div>

                    </div>
                <?php endforeach; ?>

                <!-- <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Message</label>
                        <textarea class="form-control" name="message" rows="10" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div> -->
            </div>

        </div>
    </div>
</section><!-- End Contact Section -->

<!-- ======= Galery Section ======= -->
<section id="galeri" class="galeri">
    <div id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Galeri</h2>
                <p></p>
            </div>

            <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <?php foreach ($client as $row) : ?>
                    <li data-filter=".filter-<?= $row['seo'] ?>"><?= $row['name'] ?></li>
                <?php endforeach; ?>
            </ul>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($galery as $row) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $row['seo'] ?>">
                        <div class="portfolio-img"><img src="<?= base_url() ?>/uploads/galeri/<?= $row['image'] ?>" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4><?= $row['name'] ?></h4>
                            <p><?= $row['description'] ?></p>
                            <a href="<?= base_url() ?>/uploads/galeri/<?= $row['image'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
<!-- End Portfolio Section -->

<?= $this->endsection() ?>