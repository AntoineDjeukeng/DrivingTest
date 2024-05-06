<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/skins/color-1.css">
    <!-- Style Switcher -->
    <link rel="stylesheet" href="css/skins/color-1.css" class="alternate-style" title="color-1" disabled>
    <link rel="stylesheet" href="css/skins/color-2.css" class="alternate-style" title="color-2" disabled>
    <link rel="stylesheet" href="css/skins/color-3.css" class="alternate-style" title="color-3" disabled>
    <link rel="stylesheet" href="css/skins/color-4.css" class="alternate-style" title="color-4" disabled>
    <link rel="stylesheet" href="css/skins/color-5.css" class="alternate-style" title="color-5" disabled>
    <link rel="stylesheet" href="css/style-switcher.css">

</head>

<body>
    <!-- Main container start -->
    <div class="main-container">
        <!-- Aside start -->
        <div class="aside">
            <div class="logo">
                <a href="#"><span>A</span>DM</a>
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>

            <ul class="nav">
                <li><a href="#home" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#about"><i class="fa fa-user"></i>About</a></li>
                <li><a href="#services"><i class="fa fa-list"></i>Services</a></li>
                <li><a href="#portfolio"><i class="fa fa-envelope"></i>Portfolio</a></li>
                <li><a href="#contact"><i class="fa fa-comments"></i>Contact</a></li>
                <li><a href="{{ route('welcome') }}"><i class="fa fa-comments"></i>Driving Test</a></li>

            </ul>

        </div>
        <!-- Aside end -->
        <!-- Main start -->
        <div class="main-content">
            <!--Home Section Start-->

            <section class="home active section " id="home">
                <div class="container">
                    <div class="row">
                        <div class="home-info padd-15">
                            <h3 class="hello">
                                Hello, my name is <span class="name">Antoine Djeukeng Momo</span>
                            </h3>
                            <h3 class="my-profession">
                                I'm a <span class="typing">web developper</span>
                            </h3>
                            <p>
                                I'm a web developer with extensive experience for over 2 years. My expertise is to
                                create and website design, graphic design, and many more...
                            </p>
                            <a href="index4.html" class="btn">Download CV</a>
                        </div>
                        <div class="home-img padd-15">
                            <img src="images/adm.jpg" alt="Antoine Djeukeng Momo">
                        </div>
                    </div>
                </div>
            </section>
            <!--Home Section End-->
            <!--About Section Start-->
            <section class="about section " id="about">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>About Me</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="about-content padd-15">
                            <div class="row">
                                <div class="about-text padd-15">
                                    <h3>I'm Antoine Djeukeng Momo and <span>Web developer</span></h3>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio nostrum
                                        optio illo inventore, facere ratione? Modi cupiditate nulla temporibus similique
                                        eveniet magnam quas deleniti. Doloremque autem adipisci sunt quibusdam
                                        voluptatum.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="personal-info padd-15">
                                    <div class="row">
                                        <div class="info-item padd-15">
                                            <p>Birthday : <span>10 jun 1990 </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Age : <span> 34 </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Website : <span> Www.anthony.com </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Email : <span> antoinedjeuken@gmail.com </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Degree : <span> Ph.D. </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Phone : <span> +420 732680994 </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>City : <span> Ceske Budijovice </span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Freelance : <span> Availabe </span></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="buttons padd-15">
                                            <a href="#contact" data-section-index="1" class="btn hire-me">Hire Me</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="skills padd-15">
                                    <div class="row">
                                        <div class="skill-item padd-15">
                                            <h5>JS</h5>
                                            <div class="progress">
                                                <div class="progress-in" style="width: 86%;"></div>
                                                <div class="skill-percent">86%</div>
                                            </div>
                                        </div>
                                        <div class="skill-item padd-15">
                                            <h5>PHP</h5>
                                            <div class="progress">
                                                <div class="progress-in" style="width: 66%;"></div>
                                                <div class="skill-percent">66%</div>
                                            </div>
                                        </div>
                                        <div class="skill-item padd-15">
                                            <h5>HTML</h5>
                                            <div class="progress">
                                                <div class="progress-in" style="width: 96%;"></div>
                                                <div class="skill-percent">96%</div>
                                            </div>
                                        </div>
                                        <div class="skill-item padd-15">
                                            <h5>Bootstrap</h5>
                                            <div class="progress">
                                                <div class="progress-in" style="width: 76%;"></div>
                                                <div class="skill-percent">76%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="education">
                                    <h3 class="title padd-15">Education</h3>
                                    <div class="row">
                                        <div class="timeline-box padd-15">
                                            <div class="timeline shadow-dark">
                                                <!-- timeline item -->
                                                <div class="timeline-item">
                                                    <div class="circle-dot"></div>
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2022-...
                                                    </h3>
                                                    <h4 class="timeline-title">Ph.D. In Applied Physics</h4>
                                                    <p class="timeline-text">Being a Ph.D. student is and interesting
                                                        journey. The analytic skills are used everday to extract
                                                        meeninfull data from simulation. I have gain experien in
                                                        molacular dynamic simulation with Lammps and Gromacs. </p>
                                                </div>
                                                <!-- timeline item -->
                                                <div class="timeline-item">
                                                    <div class="circle-dot"></div>
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2010-2014
                                                    </h3>
                                                    <h4 class="timeline-title">Master in Computer Science</h4>
                                                    <p class="timeline-text">Lorem ipsum dolor sit amet consectetur,
                                                        adipisicing elit. Eligendi asperiores iusto nulla, voluptates,
                                                        in provident perspiciatis dicta quasi nihil incidunt, velit
                                                        mollitia vero sunt temporibus.</p>
                                                </div>
                                                <!-- timeline item -->
                                                <div class="timeline-item">
                                                    <div class="circle-dot"></div>
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2010-2014
                                                    </h3>
                                                    <h4 class="timeline-title">Master in Computer Science</h4>
                                                    <p class="timeline-text">Lorem ipsum dolor sit amet consectetur,
                                                        adipisicing elit. Eligendi asperiores iusto nulla, voluptates,
                                                        in provident perspiciatis dicta quasi nihil incidunt, velit
                                                        mollitia vero sunt temporibus.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="experience">
                                    <h3 class="title padd-15">Experience</h3>
                                    <div class="row">
                                        <div class="timeline-box padd-15">
                                            <div class="timeline shadow-dark">
                                                <!-- timeline item -->
                                                <div class="timeline-item">
                                                    <div class="circle-dot"></div>
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2010-2014
                                                    </h3>
                                                    <h4 class="timeline-title">Master in Computer Science</h4>
                                                    <p class="timeline-text">Lorem ipsum dolor sit amet consectetur,
                                                        adipisicing elit. Eligendi asperiores iusto nulla, voluptates,
                                                        in provident perspiciatis dicta quasi nihil incidunt, velit
                                                        mollitia vero sunt temporibus.</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <div class="circle-dot"></div>
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2010-2014
                                                    </h3>
                                                    <h4 class="timeline-title">Ph.D. in Computer Science</h4>
                                                    <p class="timeline-text"> consectetur, adipisicing elit. Eligendi
                                                        asperiores iusto nulla, voluptates, in provident perspiciatis
                                                        dicta quasi nihil incidunt, velit mollitia vero sunt temporibus.
                                                    </p>
                                                </div>

                                                <div class="timeline-item">
                                                    <div class="circle-dot"></div>
                                                    <h3 class="timeline-date">
                                                        <i class="fa fa-calendar"></i> 2010-2014
                                                    </h3>
                                                    <h4 class="timeline-title">Master in Computer Science</h4>
                                                    <p class="timeline-text">Lorem ipsum dolor sit amet consectetur,
                                                        adipisicing elit. Eligendi asperiores iusto nulla, voluptates,
                                                        in provident perspiciatis dicta quasi nihil incidunt, velit
                                                        mollitia vero sunt temporibus.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--About Section End-->
            <!--Services Section Start-->
            <section class="service section " id="services">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Services</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!--Service Item Start-->
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icon">
                                    <i class="fa fa-mobile-alt"></i>
                                </div>
                                <h4>PHP</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <!--Service Item End-->
                        <!--Service Item Start-->
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icon">
                                    <i class="fa fa-laptop-code"></i>
                                </div>
                                <h4>Responsive Design</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <!--Service Item End-->
                        <!--Service Item Start-->
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icon">
                                    <i class="fa fa-palette"></i>
                                </div>
                                <h4>Responsive Design</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <!--Service Item End-->
                        <!--Service Item Start-->
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icon">
                                    <i class="fa fa-code"></i>
                                </div>
                                <h4>Responsive Design</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <!--Service Item End-->
                        <!--Service Item Start-->
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icon">
                                    <i class="fa fa-search"></i>
                                </div>
                                <h4>Responsive Design</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <!--Service Item End-->
                        <!--Service Item Start-->
                        <div class="service-item padd-15">
                            <div class="service-item-inner">
                                <div class="icon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <h4>Responsive Design</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                        <!--Service Item End-->
                    </div>
                </div>
            </section>
            <!--Services Section End-->
            <!--Portfolio section Start-->
            <section class="portfolio section " id="portfolio">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Portfolio</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="portfolio-heading padd-15">
                            <h2>My Last Projects :</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!--Portfolio Item Start-->
                        <div class="portfolio-item padd-15">
                            <div class="portfolio-item-inner shadow-dark">
                                <div class="portfolio-img">
                                    <img src="images/portfolio/portfolio-1.jpg" alt="Portfolio Image">
                                </div>
                            </div>
                        </div>
                        <!--Portfolio Item End-->
                        <!--Portfolio Item Start-->
                        <div class="portfolio-item padd-15">
                            <div class="portfolio-item-inner shadow-dark">
                                <div class="portfolio-img">
                                    <img src="images/portfolio/portfolio-2.jpg" alt="Portfolio Image">
                                </div>
                            </div>
                        </div>
                        <!--Portfolio Item End-->
                        <!--Portfolio Item Start-->
                        <div class="portfolio-item padd-15">
                            <div class="portfolio-item-inner shadow-dark">
                                <div class="portfolio-img">
                                    <img src="images/portfolio/portfolio-3.jpg" alt="Portfolio Image">
                                </div>
                            </div>
                        </div>
                        <!--Portfolio Item End-->
                        <!--Portfolio Item Start-->
                        <div class="portfolio-item padd-15">
                            <div class="portfolio-item-inner shadow-dark">
                                <div class="portfolio-img">
                                    <img src="images/portfolio/portfolio-4.jpg" alt="Portfolio Image">
                                </div>
                            </div>
                        </div>
                        <!--Portfolio Item End-->
                        <!--Portfolio Item Start-->
                        <div class="portfolio-item padd-15">
                            <div class="portfolio-item-inner shadow-dark">
                                <div class="portfolio-img">
                                    <img src="images/portfolio/portfolio-8.jpg" alt="Portfolio Image">
                                </div>
                            </div>
                        </div>
                        <!--Portfolio Item End-->
                        <!--Portfolio Item Start-->
                        <div class="portfolio-item padd-15">
                            <div class="portfolio-item-inner shadow-dark">
                                <div class="portfolio-img">
                                    <img src="images/portfolio/portfolio-6.jpg" alt="Portfolio Image">
                                </div>
                            </div>
                        </div>
                        <!--Portfolio Item End-->
                    </div>
                </div>
            </section>
            <!--Portfolio section End-->
            <!--Contact Section Start-->
            <section class="contact section" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Contact Me</h2>
                        </div>
                    </div>
                    <h3 class="contact-title padd-15">Have You Any Questions?</h3>
                    <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
                    <div class="row">
                        <!--Contact Info item Start-->
                        <div class="contact-info-item padd-15">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <h4>Call Us On</h4>
                            <p>+237676682370</p>
                        </div>
                        <!--Contact Info item End-->
                        <!--Contact Info item Start-->
                        <div class="contact-info-item padd-15">
                            <div class="icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <h4>Office</h4>
                            <p>Ceske Budijovice</p>
                        </div>
                        <!--Contact Info item End-->
                        <!--Contact Info item Start-->
                        <div class="contact-info-item padd-15">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h4>Email</h4>
                            <p>info@gmail.com</p>
                        </div>
                        <!--Contact Info item End-->
                        <!--Contact Info item Start-->
                        <div class="contact-info-item padd-15">
                            <div class="icon">
                                <i class="fa fa-globe-africa"></i>
                            </div>
                            <h4>Website</h4>
                            <p>www.domain.com</p>
                        </div>
                        <!--Contact Info item End-->
                    </div>
                    <h3 class="contact-title padd-15">SEND ME AND EAMIL</h3>
                    <h4 class="contact-sub-title padd-15">I'M VERY RESPOSIVE TO MESSAGES</h4>
                    <!--Contact Form Start-->
                    <div class="row">
                        <div class="contact-form padd-15">
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <textarea name="" id="" placeholder="Messsage" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <button type="submit" class="btn">Send Messsage</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Contact Section End-->
        </div>
        <!-- Main end -->



    </div>
    <!-- Main container end -->
    <!-- Style Switcher Start -->
    <div class="style-switcher open">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas "></i>
        </div>
        <h4>Theme Colors</h4>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5')"></span>
        </div>
    </div>
    <!-- Style Switcher End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js"
        integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="js/script.js"></script>
    <script src="js/style-switcher.js"></script>
</body>

</html>
