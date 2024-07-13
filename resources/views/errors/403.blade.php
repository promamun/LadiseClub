@extends('layouts/layoutMaster')

@section('title', '403 Unauthorized User Action.')

@section('page-style')
  <!-- Page -->
  @vite(['resources/assets/vendor/scss/pages/page-misc.scss'])
@endsection


@section('content')
  <!-- Error -->
  <div class="container-xxl container-p-y">
    <div class="misc-wrapper">
      <h2 class="mb-1 mt-4">Unauthorized User Action.</h2>
      <p class="mb-4 mx-2">Oops! 😖 The requested URL was Unauthorized to Access.</p>
      <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">Back</a>
      <div class="mt-4">
        <img src="{{ asset('assets/img/illustrations/page-misc-error.png') }}" alt="page-misc-error" width="225" class="img-fluid">
      </div>
    </div>
  </div>
  <!-- /Error -->
@endsection
