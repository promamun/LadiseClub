@extends('user_ui.master')
@section('title','About Us')
@section('content')
  <!-- Inner Banner html start-->
  <!--breadcrumb section start-->
  <x-breadcrumb title="About Us" images="user_ui/assets/img/eventum-img1.jpg"/>
  <!--breadcrumb section end-->
  <!-- event deatil html start-->
  <!-- home event speaker section html start -->
  <section class="home-aboutus">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-6">
          <img src="{{ asset($aboutUs->image?? '') }}" alt="about-us">
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
          </div>
        </div>


      </div>
    </div>
  </section>

  <!---about section------>
  <section class="about-section">
    <div class="container">
      <div class="iconbox-container-bg">
        <div class="iconbox-item-bg">
          <div class="iconbox-content-bg">
            <i aria-hidden="true" class="icon icon-idea_generate"></i>
            <h5>WHAT WE DO?</h5>
            <p>Habitant porta viverra voluptatum facilisi. Dolor mi sit! Recusandae, nisl, habitasse justo architecto viverra volupt.</p>
          </div>
        </div>
        <div class="iconbox-item-bg">
          <div class="iconbox-content-bg">
            <i aria-hidden="true" class="icon icon-users"></i>
            <h5>WHAT WE ARE?</h5>
            <p>Habitant porta viverra voluptatum facilisi. Dolor mi sit! Recusandae, nisl, habitasse justo architecto viverra volupt.</p>
          </div>
        </div>
        <div class="iconbox-item-bg item-3">
          <div class="iconbox-content-bg ">
            <i aria-hidden="true" class="icon icon-rocket"></i>
            <h5>OUR AIM &amp; MISSION</h5>
            <p>Habitant porta viverra voluptatum facilisi. Dolor mi sit! Recusandae, nisl, habitasse justo architecto viverra volupt.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--- about section end----->
@endsection
