<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Newsers - Free HTML Magazine Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="View/lib/animate/animate.min.css" rel="stylesheet">
        <link href="View/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="View/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="View/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <?php include 'View/nav.php' ;?>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <button id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                            <!-- <span ><i class="fa fa-search"></i></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <ol class="breadcrumb justify-content-start mb-4">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-dark">Single Page</li>
                </ol>
                <div class="row g-4 ">
                    <div class="col-lg-8 " id="Searchresult">
                        <div class="mb-4">
                            <a href="index.php?action=affichage&id=<?php echo $wikis[5]->getId(); ?>" class="h1 display-5"><?php echo $wikis[5]->gettitle(); ?></a>
                        </div>
                        <div class="position-relative rounded overflow-hidden mb-3">
                            <img src="View/img/news-1.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                            <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">                                              
                                Busimess
                            </div>
                        </div>
                        
                        <p class=""><?php echo $wikis[5]->getcontent(); ?>
                        </p>
                        <div class="bg-light p-4 mb-4 rounded border-start border-3 border-primary">
                            <h1 href = "index.php?action=affichage&id=<?php echo $wikis[6]->getId(); ?>" class="mb-2"><?php echo $wikis[6]->gettitle(); ?></h1>
                        </div>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="rounded overflow-hidden">
                                    <img src="View/img/news-6.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rounded overflow-hidden">
                                    <img src="View/img/news-5.jpg" class="img-zoomin img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                        </div>
                        <p class="my-4"><?php echo $wikis[6]->getcontent(); ?>

                        </p>
                        <div class="tab-class">
                            <div class="d-flex justify-content-between border-bottom mb-4">
                                
                            </div>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show active">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-3">
                                            <img src="View/img/footer-4.jpg" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-9">
                                            <h3 href = "index.php?action=affichage&id=<?php echo $wikis[7]->getId(); ?>"><?php echo $wikis[7]->gettitle(); ?></h3>
                                            <p class="mb-0"><?php echo $wikis[7]->getcontent(); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane fade show">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-3">
                                            <img src="View/img/footer-5.jpg" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-9">
                                            <h3>Amelia Alex</h3>
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                             but also the leap into electronic.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane fade show">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-3">
                                            <img src="View/img/footer-6.jpg" class="img-fluid w-100 rounded" alt="">
                                        </div>
                                        <div class="col-9">
                                            <h3>Amelia Alex</h3>
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                             but also the leap into electronic.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light rounded my-4 p-4">
                            <h4 class="mb-4">You Might Also Like</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center p-3 bg-white rounded">
                                        <img src="View/img/chatGPT.jpg" class="img-fluid rounded" alt="">
                                        <div class="ms-3">
                                            <a href="index.php?action=affichage&id=<?php echo $wikis[8]->getId(); ?>" class="h5 mb-2"><?php echo $wikis[8]->gettitle(); ?></a>
                                            <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center p-3 bg-white rounded">
                                        <img src="View/img/chatGPT-1.jpg" class="img-fluid rounded" alt="">
                                        <div class="ms-3">
                                            <a href="index.php?action=affichage&id=<?php echo $wikis[9]->getId(); ?>" class="h5 mb-2"><?php echo $wikis[9]->gettitle(); ?></a>
                                            <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 minute read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="bg-light rounded p-4">
                            <h4 class="mb-4">Comments</h4>
                            <div class="p-4 bg-white rounded mb-4">
                                <div class="row g-4">
                                    <div class="col-3">
                                        <img src="View/img/footer-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <div class="col-9">
                                        <div class="d-flex justify-content-between">
                                            <h5>James Boreego</h5>
                                            <a href="#" class="link-hover text-body fs-6"><i class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                        </div>
                                        <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 bg-white rounded mb-0">
                                <div class="row g-4">
                                    <div class="col-3">
                                        <img src="View/img/footer-4.jpg" class="img-fluid rounded-circle w-100" alt="">
                                    </div>
                                    <div class="col-9">
                                        <div class="d-flex justify-content-between">
                                            <h5>James Boreego</h5>
                                            <a href="#" class="link-hover text-body fs-6"><i class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                        </div>
                                        <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light rounded p-4 my-4">
                            <h4 class="mb-4">Leave A Comment</h4>
                            <form action="#">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control py-3" placeholder="Full Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control py-3" placeholder="Email Address">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="textarea" id="" cols="30" rows="7" placeholder="Write Your Comment Here"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="form-control btn btn-primary py-3" type="button">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="p-3 rounded border">
                                    <div class="input-group w-100 mx-auto d-flex mb-4">
                                        <input type="search" id="SearchText" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                        <button id="search-icon-1-10" class="input-group-text p-3"><i class="fa fa-search"></i></button>
                                    </div>
                                    <h4 class="mb-4">Popular Categories</h4>
                                    <div class="row g-2">
                                        <?php foreach($categories as $category) : ?>
                                        <div  class="Debana-fer3at-ras-youbix col-12">
                                            <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                                <?php echo $category->getName(); ?>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                        
                                    </div>
                                    <h4 class="my-4">Stay Connected</h4>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <a href="#" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                                                <i class="fab fa-facebook-f btn btn-light btn-square rounded-circle me-3"></i>
                                                <span class="text-white">13,977 Fans</span>
                                            </a>
                                            <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                                <i class="fab fa-twitter btn btn-light btn-square rounded-circle me-3"></i>
                                                <span class="text-white">21,798 Follower</span>
                                            </a>
                                            <a href="#" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                                                <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
                                                <span class="text-white">7,999 Subscriber</span>
                                            </a>
                                            <a href="#" class="w-100 rounded btn btn-dark d-flex align-items-center p-3 mb-2">
                                                <i class="fab fa-instagram btn btn-light btn-square rounded-circle me-3"></i>
                                                <span class="text-white">19,764 Follower</span>
                                            </a>
                                            <a href="#" class="w-100 rounded btn btn-secondary d-flex align-items-center p-3 mb-2">
                                                <i class="bi-cloud btn btn-light btn-square rounded-circle me-3"></i>
                                                <span class="text-white">31,999 Subscriber</span>
                                            </a>
                                            <a href="#" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-4">
                                                <i class="fab fa-dribbble btn btn-light btn-square rounded-circle me-3"></i>
                                                <span class="text-white">37,999 Subscriber</span>
                                            </a>
                                        </div>
                                    </div>
                                    <h4 class="my-4">Popular News</h4>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="View/img/features-sports-1.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                        </div>
                                                        <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">Sports</p>
                                                        <a href="#" class="h6">
                                                            Get the best speak market, news.
                                                        </a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="View/img/features-technology.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                        </div>
                                                        <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">Technology</p>
                                                        <a href="#" class="h6">
                                                            Get the best speak market, news.
                                                        </a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="View/img/features-fashion.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                        </div>
                                                        <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">Fashion</p>
                                                        <a href="#" class="h6">
                                                            Get the best speak market, news.
                                                        </a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="View/img/features-life-style.jpg" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                        </div>
                                                        <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">Life Style</p>
                                                        <a href="#" class="h6">
                                                            Get the best speak market, news.
                                                        </a>
                                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> December 9, 2024</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="#" class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View More</a>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="border-bottom my-3 pb-3">
                                                <h4 class="mb-0">Trending Tags</h4>
                                            </div>
                                            <ul class="nav nav-pills d-inline-flex text-center mb-4">
                                                <?php foreach($tags as $tag) : ?>
                                                <li id="tag-" value="<?php echo $tag->getName(); ?>" class="Server-Dial-Da7k-LNKa nav-item mb-3">
                                                    <a class="d-flex py-2 bg-light rounded-pill me-2" href="#">
                                                        <span class="text-dark link-hover" style="width: 90px;"><?php echo $tag->getName(); ?></span>
                                                    </a>
                                                </li>
                                                <?php endforeach ; ?>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="position-relative banner-2">
                                                <img src="View/img/banner-2.jpg" class="img-fluid w-100 rounded" alt="">
                                                <div class="text-center banner-content-2">
                                                    <h6 class="mb-2">The Most Populer</h6>
                                                    <p class="text-white mb-2">News & Magazine WP Theme</p>
                                                    <a href="#" class="btn btn-primary text-white px-4">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark footer py-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(255, 255, 255, 0.2);">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#" class="d-flex flex-column flex-wrap">
                                <p class="text-white mb-0 display-6">WIKI</p>
                                <small class="text-light" style="letter-spacing: 11px; line-height: 0;">YOU CODE</small>
                            </a>
                        </div>
                        <div class="col-lg-9">
                            <div class="d-flex position-relative rounded-pill overflow-hidden">
                                <input class="form-control border-0 w-100 py-3 rounded-pill" type="email" placeholder="example@gmail.com">
                                <button type="submit" class="btn btn-primary border-0 py-3 px-5 rounded-pill text-white position-absolute" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 col-xl-3">
                        <div class="footer-item-1">
                            <h4 href = "index.php?action=admin" class="mb-4 text-white">Admin</h4>

                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-xl-3">
                        <div class="d-flex flex-column text-start footer-item-3">
                            <h4 class="mb-4 text-white">Categories</h4>
                            <?php foreach($categories as $category): ?>
                            <a class="btn-link text-white" href=""><i class="fas fa-angle-right text-white me-2"></i> <?php echo $category->getName(); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Footer End -->





        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="View/lib/easing/easing.min.js"></script>
        <script src="View/lib/waypoints/waypoints.min.js"></script>
        <script src="View/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="View/js/main.js"></script>
        <script src="View/js/Searchmanagement.js"></script>
    </body>

</html>