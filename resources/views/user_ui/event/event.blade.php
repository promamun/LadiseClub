@extends('user_ui.master')
@section('title','Event')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Event" images="user_ui/assets/img/eventum-img1.jpg"/>
  <!-- event deatil html start-->
  <section class="home-gallery">
    <div class="container">
      <div class="section-head text-center col-lg-8 offset-lg-2">
        <h3 class="section-title">
          Upcoming Events
        </h3>
      </div>
      <div class="gallery-container">
        <div class="row grid">
          @foreach ($events as $data)
            <div class="single-gallery grid-item col-lg-4 col-md-6 col-sm-6 mb-3">
              <figure class="gallery-img">
                <a href="{{asset('event/' . $data->image)}}" data-fancybox="gallery">
                  <img src="{{asset('event/' . $data->image)}}" alt="">
                  <div class="event-content">
                    <h4>{{$data->name}}</h4>
                    <p>Date : {{date('d M Y || h.i A',strtotime($data->date))}}</p>
                  </div>
                </a>
              </figure>
            </div>
          @endforeach
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
