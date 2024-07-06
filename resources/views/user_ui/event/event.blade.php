@extends('user_ui.master')
@section('title','Event')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Event" images="user_ui/assets/img/eventum-img1.jpg"/>
  <!-- event deatil html start-->
  <!-- home event speaker section html start -->
  <section class="home-aboutus">
    <div class="container">
      <div class="row">
        @foreach ($events as $data)
        <div class="col-lg-6 col-md-6 mt-5">
          <img src="{{ asset('event/' . $data->image) }}">
        </div>
        <div class="col-lg-6 col-md-6 mt-5">
          <div class="home-about-right">
            <div class="about-content">
              <div class="section-head">
                
                <span class="section-sub-title ">INTRODUCTION</span>
                <h3 class="section-title">
                  {{ $data->name }}
                </h3>
                <p class="section-paragraph">
                  {!! $data->description !!}
                </p><br>
              </div>
            </div>
          </div>
        </div>
        @endforeach


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
