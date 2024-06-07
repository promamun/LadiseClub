@extends('layouts/layoutMaster')

@section('title', 'Event')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss',
  'resources/assets/vendor/libs/animate-css/animate.scss',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'
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
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'
  ])
@endsection

@section('page-script')
@vite([
  'resources/assets/js/gallery-list.js',
  'resources/assets/js/extended-ui-sweetalert2.js'
])
@endsection

@section('content')
<div id="app">
  <toastr-notification
    :success="{{ json_encode(session('success')) }}"
    :error="{{ json_encode(session('error')) }}"
    :warning="{{ json_encode(session('warning')) }}"
    :info="{{ json_encode(session('info')) }}"
  />
</div>
<div class="row">
  <!-- Projects table -->
  <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-6 mb-lg-0">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-gallery table border-top">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>Name</th>
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
