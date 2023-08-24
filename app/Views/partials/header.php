<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <!-- <h1 class="logo me-auto"><a href="index.html">Slabina Group</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo me-auto"><img src="assets/img/icon.png" alt="" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li> -->
                <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#galeri">Galeri</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<!-- <section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Selamat Datang Slabina Group</h1>
                <h2></h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#contact" class="btn-get-started scrollto">Tentang Kami</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/welcome.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section> -->
<!-- End Hero -->
<section id="hero" style="padding: 0px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">

            <?php foreach ($slide as $row) : ?>
                <div class="carousel-item">
                    <img src="<?= base_url() ?>/uploads/slide/<?= $row['image'] ?>" class="d-block w-100 h-100" alt="...">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>