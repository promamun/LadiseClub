@extends('user_ui.master')
@section('title','About Us')
@section('content')
  <!-- Inner Banner html start-->
  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/img/eventum-img1.jpg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Photo Gallery</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- event deatil html start-->
  <!-- home gallery start -->
  <section class="home-gallery homo-photo-gallery">
    <div class="container">
      <div class="section-head text-center col-lg-8 offset-lg-2">
        <h3 class="section-title">
          COLLECTION OF OUR LATEST IMAGES
        </h3>
      </div>
      <div class="gallery-container">
        <div class="row grid">
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g1.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g1.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g2.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g2.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g4.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g4.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g6.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g6.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g5.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g5.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g7.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g7.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g8.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g8.jpg" alt="">
              </a>
            </figure>
          </div>
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g3.jpg" data-fancybox="gallery">
                <img src="assets/img/gallery/g3.jpg" alt="">
              </a>
            </figure>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- home gallery end -->
  <div class="post-navigation-wrap pb-100">
    <nav>
      <ul class="pagination">
        <li>
          <a href="#">
            <i class="fas fa-arrow-left"></i>
          </a>
        </li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li>
          <a href="#">
            <i class="fas fa-arrow-right"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
@endsection
