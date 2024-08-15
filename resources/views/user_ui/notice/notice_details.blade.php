@extends('user_ui.master')
@section('title','Notice Details')
@section('content')
  <!-- Inner Banner html start-->
  <x-breadcrumb title="Notice Details" images="user_ui/assets/img/eventum-img1.jpg"/>
  <div class="single-page-section" style="padding: 0 0 100px 0;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12 px-3">
          <figure class="single-feature-img figure-round-border">
            <img src="{{asset('notice/' . $notice_details->image)}}" alt="" style="border-radius:4px;">
          </figure>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <div class="page-content">
            <p style="font-weight: 700;">{{$notice_details->name}}</p>
            <p style="text-align: justify;line-height: 1.8;">{!! $notice_details->description !!}</p>
          </div>
        </div>
      </div>


    </div>
  </div>
@endsection
