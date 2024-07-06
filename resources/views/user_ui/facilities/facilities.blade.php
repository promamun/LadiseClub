@extends('user_ui.master')
@php(
    $title = $facility->name . ' Facilities'
)
@section('title',$title)
@section('content')
  <!-- Inner Banner html start-->  
  <x-breadcrumb title="{{ $title }}" images="user_ui/assets/img/eventum-img1.jpg"/>
  <section class="home-aboutus pb-100">
    <div class="container">
      <div class="row align-items-center">
        @if($data->isEmpty())
          <div class="col-lg-12 col-md-12">
            <div class="home-about-right">
              <div class="about-content">
                <div class="section-head">
                  <h3 class="section-title text-center">
                    Data Not Available
                  </h3>
                </div>
              </div>
            </div>
          </div>
        @else
          @foreach($data as $index => $item)
            @if($index % 1 == 0)
              <!-- Even index: Image first, text second -->
              <div class="col-lg-6 col-md-6">
                <img src="{{ asset('facilitie/' . $item->image) }}" style="border-radius: 20px;">
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="home-about-right">
                  <div class="about-content">
                    <div class="section-head">
                      <h3 class="section-title">{{ $item->name }}</h3>
                      <p class="section-paragraph">{!! $item->description !!} </p>
                    </div>
                  </div>
                </div>
              </div>
            @else
              <!-- Odd index: Text first, image second -->
              <div class="col-lg-6 col-md-6">
                <div class="home-about-right">
                  <div class="about-content">
                    <div class="section-head">
                      <h3 class="section-title">{{ $item->name }}</h3>
                      <p class="section-paragraph">{!! $item->description !!} </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <img src="{{ asset('facilitie/' . $item->image) }}" style="border-radius: 20px;">
              </div>
            @endif
            <div class="facilities-gap"></div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endsection
