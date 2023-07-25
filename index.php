<?php
    // Session Start
    session_start();
?>

<?php
    // Header
    include_once('include/header.php');
?>

<!-- Html -->
<!-- Slider Start -->
<div class="slider flex-wrap">
    <div class="carousel slide carousel-fade" id="carouselID" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button class="active" data-bs-target="#carouselID" data-bs-slide-to="0"></button>
        <button data-bs-target="#carouselID" data-bs-slide-to="1"></button>
        <button data-bs-target="#carouselID" data-bs-slide-to="2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="asset/img/main-slider-01.jpg?v=<?php echo time(); ?>" alt="img-01" class="d-block w-100 img-fluid">
          <div class="carousel-caption">
            <h2>Carousel Heading</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, ea!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="asset/img/carousel-2.jpg" alt="img-02" class="d-block w-100 img-fluid">
          <div class="carousel-caption">
            <h2>Carousel Heading</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, ea!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="asset/img/carousel-03.jpg" alt="img-03" class="d-block w-100 img-fluid">
          <div class="carousel-caption">
            <h2>Carousel Heading</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, ea!</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" data-bs-target="#carouselID" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" data-bs-target="#carouselID" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  </div>

<!-- Slider End -->


<!-- About Us Start -->
<div class="about flex-wrap" id="aboutUs">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pb-3">
                <img src="asset/img/blog-1.jpg" alt="blog-1" class="img-fluid rounded">
            </div>
            <div class="col-md-6 pt-3">
                <h2>A FEW WORDS ABOUT US</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur enim id iusto consequatur exercitationem reprehenderit similique et aliquid voluptate accusantium, dolor iste? Aliquam ad id qui rerum ducimus, similique veniam.</p>
                <a href="" class="btn btn-warning">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->

<?php
    // Footer
    include_once('include/footer.php');
?>