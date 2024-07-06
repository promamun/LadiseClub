@extends('user_ui.master')
@section('title','Notice')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Notice" images="user_ui/assets/img/eventum-img1.jpg"/>
  <section class="home-schedule-section" style="background: #fff;padding: 0px;">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-12">
          <div class="section-head text-center">
            <span class="section-sub-title ">Notice</span>
            <h3 class="section-title">
              Our Notice Board  !
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
              <img src="assets/img/gallery/g1.jpg" alt="">
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
              <img src="assets/img/gallery/g2.jpg" alt="">
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
              <img src="assets/img/gallery/g8.jpg" alt="">
            </figure>
          </div>
        </div>
      </div>
    </div>
  </section>
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
