@extends('user_ui.master')
@section('title')
  Home
@endsection
@section('content')
  <!----Banner Slider Start--------->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('user_ui') }}/assets/img/banner/banner1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('user_ui') }}/assets/img/banner/banner1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('user_ui') }}/assets/img/banner/banner1.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!----Banner Slider end--------->

  <!-- home about us section Start -->
  <section class="home-aboutus pt-100">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6">
                  <img src="{{ asset('user_ui') }}/assets/img/about/about.png">
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="home-about-right">
                      <div class="about-content">
                          <div class="section-head">
                              <span class="section-sub-title ">INTRODUCTION</span>
                              <h3 class="section-title">
                                  KNOW MORE ABOUT OUR GRAND EVENT
                              </h3>
                              <p class="section-paragraph">
                                  Step into our world at the Ladies Club, where sophistication intertwines with empowerment. We're more than a club; we're a sanctuary for women seeking connection, growth, and inspiration.
                              </p><br>
                              <p class="section-paragraph">
                                  Through a blend of engaging workshops, enriching discussions, and vibrant social gatherings, we create an environment where every woman can flourish. From fostering lifelong friendships to nurturing personal development, our community is dedicated to celebrating the diverse strengths and talents of women from all walks of life.
                              </p><br>
                              <p class="section-paragraph">
                                  Join us on this empowering journey as we redefine what it means to be a modern woman, united in sisterhood and limitless potential.
                              </p>
                          </div>
                      </div>
                      <div class="event-speaker-btn">
                          <a href="about-us.html" class="button-round-primary">Know More</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- home about us section end -->

  <!---------Facilities Start------>
  <section class="ptb-100 custom-facilities">
      <div class="container-fluid">
          <div class="section-head text-center col-lg-8 offset-lg-2">
              <span class="section-sub-title ">Opportunities</span>
              <h3 class="section-title">
                  Our Club Facilities
              </h3>
          </div>
          <div class="row">
              <div class="col-lg-3 col-md-6 mb-3">
                  <a href="facilities.html">
                      <div class="card">
                        <img src="{{ asset('user_ui') }}/assets/img/facilities/health.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title">Sports and Health</h5>
                        </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                  <a href="facilities.html">
                      <div class="card">
                        <img src="{{ asset('user_ui') }}/assets/img/facilities/kid.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title">Kid Zone</h5>
                        </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                  <a href="acilities.html">
                      <div class="card">
                        <img src="{{ asset('user_ui') }}/assets/img/facilities/restaurant.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title">Restaurant</h5>
                        </div>
                      </div>
                  </a>
              </div>
              <div class="col-lg-3 col-md-6 mb-3">
                  <a href="acilities.html">
                      <div class="card">
                        <img src="{{ asset('user_ui') }}/assets/img/facilities/entertainment.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title">Entertainment</h5>
                        </div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
  </section>
  <!---------Facilities End------>

  <!-- home schedule or Notice and Event Satart  -->
  <section class="home-schedule-section">
      <div class="container">
          <div class="row align-items-start">
              <div class="col-lg-12">
                  <div class="section-head text-center">
                      <span class="section-sub-title ">Notice</span>
                      <h3 class="section-title">
                      Our Notice Board !
                      </h3>
                  </div>
              </div>
          </div>
          <div class="routine-content">
              <div class="routine-detail">
                  <div class="time-detail">
                      <span class="time-title">Date : 01 May 2024</span>
                  </div>
                  <div class="routine-description">
                      <h5 class="chapter-title">Notice Title Will Be Here</h5>
                      <p class="ch-paragraph">
                          Quam amet tristique adipisicing incididunt arcu, excepturi molestie turpis deserunt ducimus malesuada minus mauris veniam.
                      </p>
                      <span class="chapter-link">
                          <a href="notice-details.html">View Details..</a>
                      </span>
                  </div>
                  <div class="lecture-image">
                      <figure class="author-img">
                          <img src="{{ asset('user_ui') }}/assets/img/gallery/g1.jpg" alt="">
                      </figure>
                  </div>
              </div>
              <div class="routine-detail">
                  <div class="time-detail">
                      <span class="time-title">Date : 03 May 2024</span>
                  </div>
                  <div class="routine-description">
                      <h5 class="chapter-title">Notice Title Will Be Here</h5>
                      <p class="ch-paragraph">
                          Quam amet tristique adipisicing incididunt arcu, excepturi molestie turpis deserunt ducimus malesuada minus mauris veniam.
                      </p>
                      <span class="chapter-link">
                          <a href="notice-details.html">View Details..</a>
                      </span>
                  </div>
                  <div class="lecture-image">
                      <figure class="author-img">
                          <img src="{{ asset('user_ui') }}/assets/img/gallery/g2.jpg" alt="">
                      </figure>
                  </div>
              </div>
              <div class="routine-detail">
                  <div class="time-detail">
                      <span class="time-title">Date : 05 May 2024</span>
                  </div>
                  <div class="routine-description">
                      <h5 class="chapter-title">Notice Title Will Be Here</h5>
                      <p class="ch-paragraph">
                          Quam amet tristique adipisicing incididunt arcu, excepturi molestie turpis deserunt ducimus malesuada minus mauris veniam.
                      </p>
                      <span class="chapter-link">
                          <a href="notice-details.html">View Details..</a>
                      </span>
                  </div>
                  <div class="lecture-image">
                      <figure class="author-img">
                          <img src="{{ asset('user_ui') }}/assets/img/gallery/g8.jpg" alt="">
                      </figure>
                  </div>
              </div>
          </div>
          <div class="schedule-btn">
              <a href="notice.html" class="button-round-primary">VIEW MORE</a>
          </div>
      </div>
  </section>
  <!-- home schedule or Notice and Event End  -->

  <!-- home gallery start -->
  <section class="home-gallery homo-photo-gallery">
      <div class="container">
          <div class="section-head text-center col-lg-8 offset-lg-2">
              <span class="section-sub-title ">IMAGE GALLERY</span>
              <h3 class="section-title">
                  COLLECTION OF OUR LATEST IMAGES
              </h3>
          </div>
          <div class="gallery-container">
              <div class="row grid">
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g1.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g1.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g2.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g2.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g4.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g4.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g6.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g6.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g5.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g5.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g7.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g7.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g8.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g8.jpg" alt="">
                          </a>
                      </figure>
                  </div>
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('user_ui') }}/assets/img/gallery/g3.jpg" data-fancybox="gallery">
                              <img src="{{ asset('user_ui') }}/assets/img/gallery/g3.jpg" alt="">
                          </a>
                      </figure>
                  </div>
              </div>
          </div>
          <div class="schedule-btn text-center" style="margin-top: 20px;">
              <a href="photo-gallery.html" class="button-round-primary">VIEW MORE IMAGES</a>
          </div>
      </div>
  </section>
  <!-- home gallery end -->
@endsection
