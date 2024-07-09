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
        @foreach ($notices as $data)
        <div class="routine-detail">
          <div class="time-detail">
            <span class="time-title">{{date('d M Y || h.i A',strtotime($data->date))}}</span>
          </div>
          <div class="routine-description">
            <h5 class="chapter-title">{{ $data->name }}</h5>
            <p class="ch-paragraph">
              {!! $data->description !!}
            </p>
            <span class="chapter-link">
              <a href="{{route('notice-details',['name'=>Str::slug($data->name),'id'=>$data->id])}}">View Details..</a>
            </span>
          </div>
          <div class="lecture-image">
            <figure class="author-img">
              <img src="{{asset('notice/' . $data->image)}}" alt="">
            </figure>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <div class="post-navigation-wrap pb-100">
    <x-paginator :paginator="$notices"/>
  </div>
@endsection
