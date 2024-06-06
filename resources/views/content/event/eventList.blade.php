@extends('layouts/layoutMaster')

@section('title', 'Event List')

@section('vendor-style')
    @vite([
      'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
      'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
      'resources/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.scss',
      'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
    ])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
    'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
    ])
@endsection

@section('page-script')
    @vite(['resources/assets/js/event-list.js',
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
      <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
      </div>
        <!-- Projects table -->
        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-6 mb-lg-0">
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
        <!--/ Projects table -->
    </div>
@endsection
