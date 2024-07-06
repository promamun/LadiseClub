@extends('user_ui.master')
@section('title','Photo Gallery')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Photo Gallery" images="user_ui/assets/img/eventum-img1.jpg"/>
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
          @foreach ($galleries as $data)
          <div class="single-gallery grid-item col-lg-3 col-md-4 col-sm-6 mb-3">
            <figure class="gallery-img">
              <a href="assets/img/gallery/g1.jpg" data-fancybox="gallery">
                <img src="{{ asset('gallery/'.$data->image)}}" alt="">
              </a>
            </figure>
          </div>
          @endforeach
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
