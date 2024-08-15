@extends('user_ui.master')
@php
  $title = $facility->name . ' Facilities';
  $bg_facilities =  getImageFile(get_option('bg_facilities'));
@endphp

@section('title',$title)
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="{{ $title }}" :images="$bg_facilities"/>
  <section class="home-aboutus pb-100">
    <div class="container">
      <div class="row align-items-center">
        @if($facility->facilitiesDetails->isEmpty())
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
          @foreach($facility->facilitiesDetails as $index => $item)
            @if($index % 2 == 0)
              <!-- Even index: Image first, text second -->
              <div class="col-lg-6 col-md-6">
                <img src="{{ asset('facilitieDetail/' . $item->image) }}" style="border-radius: 20px;">
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
              <div class="facilities-gap"></div>
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
                <img src="{{ asset('facilitieDetail/' . $item->image) }}" style="border-radius: 20px;">
              </div>
              <div class="facilities-gap"></div>
            @endif
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endsection
