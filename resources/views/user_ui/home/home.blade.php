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
      @foreach ($sliders as $data)
      <div class="carousel-item">
        <img src="{{ asset('slider/'.$data->image)}}" class="d-block w-100" alt="...">
      </div>
      @endforeach
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
                                {{$aboutUs->title}}
                              </h3>
                              <p class="section-paragraph">
                                {!! $aboutUs->description?? '' !!}
                              </p>
                          </div>
                      </div>
                      <div class="event-speaker-btn">
                          <a href="{{route('about.us')}}" class="button-round-primary">Know More</a>
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
            @foreach($facility as $data)
              <div class="col-lg-3 col-md-6 mb-3">
                  <a href="{{route('user.facilities',['name'=>Str::slug($data->name),'id'=>$data->id])}}">
                      <div class="card">
                        <img src="{{ asset('facilitie/' . $data->image) }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                          <h5 class="card-title">{{$data->name??''}}</h5>
                        </div>
                      </div>
                  </a>
              </div>
            @endforeach
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
            @foreach($notices as $data)
              @break($loop->index === 3 )
              <div class="routine-detail">
                  <div class="time-detail">
                      <span class="time-title">Date : {{date('d M y',strtotime($data->date))}}</span>
                  </div>
                  <div class="routine-description">
                      <h5 class="chapter-title">{{$data->name??''}}</h5>
                      <p class="ch-paragraph">
                        {{$data->details??''}}
                      </p>
                      <span class="chapter-link">
                          <a href="{{route('notice-details',['name'=>Str::slug($data->name),'id'=>$data->id])}}">View Details..</a>
                      </span>
                  </div>
                  <div class="lecture-image">
                      <figure class="author-img">
                          <img src="{{ asset('notice/' . $data->image) }}" alt="">
                      </figure>
                  </div>
              </div>
            @endforeach
          </div>
          <div class="schedule-btn">
              <a href="{{route('notice')}}" class="button-round-primary">VIEW MORE</a>
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
                @foreach($galleries as $data)
                  <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
                      <figure class="gallery-img">
                          <a href="{{ asset('gallery/' . $data->value) }}" data-fancybox="gallery">
                              <img src="{{ asset('gallery/' . $data->value) }}" alt="">
                          </a>
                      </figure>
                  </div>
                @endforeach
              </div>
          </div>
          <div class="schedule-btn text-center" style="margin-top: 20px;">
              <a href="{{route('photo.gallery')}}" class="button-round-primary">VIEW MORE IMAGES</a>
          </div>
      </div>
  </section>
  <!-- home gallery end -->
@endsection
