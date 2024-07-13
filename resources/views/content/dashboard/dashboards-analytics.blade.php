@extends('layouts/layoutMaster')

@section('title', 'Analytics')

@section('vendor-style')
  @vite([
  'resources/assets/vendor/libs/apex-charts/apex-charts.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss',
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss'
  ])
@endsection

@section('page-style')
  <!-- Page -->
  @vite(['resources/assets/vendor/scss/pages/cards-advance.scss'])
@endsection

@section('vendor-script')
  @vite([
  'resources/assets/vendor/libs/apex-charts/apexcharts.js',
  'resources/assets/vendor/libs/swiper/swiper.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
  ])
@endsection

@section('page-script')
  @vite([
  'resources/assets/js/event-list.js',
  'resources/assets/js/notice-list.js',
  'resources/assets/js/slider-list.js',
  'resources/assets/js/dashboards-analytics.js'
  ])
@endsection

@section('content')

  <div class="row">
    <!-- Website Analytics -->
    <div class="col-xl-4 mb-4 col-lg-5 col-12">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-7">
            <div class="card-body text-nowrap">
              <h5 class="card-title mb-0">Welcome to {{get_option('app_name')}} </h5>
              <p class="mb-2">{{auth()->user()->name}}! 🎉</p>
              <h4 class="text-primary mb-1">You are
                @foreach(Auth::user()->roleUsers as $role)
                  {{ $role->name }}
                @endforeach!
              </h4>
              <h4 class="text-primary mb-1">
                In this {{get_option('app_name')}} admin Panel 🎉
              </h4>
            </div>
          </div>
          <div class="col-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="{{ asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view sales">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 mb-4">
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-event table border-top">
            <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Name</th>
              <th>Image</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!--/ Website Analytics -->
    <!-- Projects table -->
    <div class="col-lg-6  col-xl-6 col-sm-6 order-1 order-lg-2 mb-4 ">
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-notice table border-top">
            <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Name</th>
              <th>Image</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!--/ Projects table -->
    <!-- Projects table -->
    <div class="col-lg-6 col-xl-6 col-sm-6 order-1 order-lg-2 mb-4 mb-lg-0">
      <div class="card">
        <div class="card-datatable table-responsive">
          <table class="datatables-slider table border-top">
            <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!--/ Projects table -->
  </div>

@endsection
