@extends('user_ui.master')
@section('title','Video Gallery')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Video Gallery" images="user_ui/assets/img/eventum-img1.jpg"/>
  <!-- event deatil html start-->
  <section class="video-gallery">
    <div class="container">
      <div class="section-head text-center col-lg-8 offset-lg-2">
        <h3 class="section-title">
          COLLECTION OF OUR LATEST VIDEOS
        </h3>
      </div>
      <div class="row">
        @foreach ($galleries as $data)
          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <iframe width="300px" height="280px" style="border-radius:4px;"
                    src="{{$data->value}}">
            </iframe>
          </div>
        @endforeach
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
