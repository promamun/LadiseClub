@extends('user_ui.master')
@section('title','About Us')
@section('content')
  <!-- Inner Banner html start-->
  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url({{asset('user_ui')}}/assets/img/eventum-img1.jpg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Facilities</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="home-aboutus pb-100">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg-6 col-md-6">
          <img src="{{asset('user_ui')}}/assets/img/facilitiesdetails/f1.png" style="border-radius: 20px;">
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="home-about-right">
            <div class="about-content">
              <div class="section-head">
                <h3 class="section-title">
                  Gym
                </h3>
                <p class="section-paragraph">
                  A gym is a facility equipped with exercise machines, weights, and spaces for fitness classes, promoting physical fitness and health.
                </p><br>
                <p class="section-paragraph">
                  The Gym is open from 7 a.m. to 10 p.m. daily. The Gym instructor is available every day from 2 p.m. to 10 p.m., except Mondays.
                </p><br>
              </div>
            </div>
          </div>
        </div>
        <div class="facilities-gap"></div>
        <div class="col-lg-6 col-md-6">
          <div class="home-about-right">
            <div class="about-content">
              <div class="section-head">
                <h3 class="section-title">
                  Swimming Pool
                </h3>
                <p class="section-paragraph">
                  The swimming pool is open from 7 a.m. to 10 p.m. daily for members(free of charge) and their guests (at a nominal fee). Currently, swimming lessons are conducted on every Sunday and Tuesday from 4:30 p.m. to 5:30 p.m. for kids and 5:30 p.m. to 6:30 p.m. for adults.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <img src="{{asset('user_ui')}}/assets/img/facilitiesdetails/f2.png" style="border-radius: 20px;">
        </div>
        <div class="facilities-gap"></div>
        <div class="col-lg-6 col-md-6">
          <img src="{{asset('user_ui')}}/assets/img/facilitiesdetails/f4.png" style="border-radius: 20px;">
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="home-about-right">
            <div class="about-content">
              <div class="section-head">
                <h3 class="section-title">
                  Darts
                </h3>
                <p class="section-paragraph">
                  Dartboard is available at the outside dining area. Darts can be obtained from the cashier anytime.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
