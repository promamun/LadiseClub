@extends('layouts/layoutMaster')
@section('title', 'Slider Edit')
@section('content')
    <div id="app">
      <toastr-notification
        :success="{{ json_encode(session('success')) }}"
        :error="{{ json_encode(session('error')) }}"
        :warning="{{ json_encode(session('warning')) }}"
        :info="{{ json_encode(session('info')) }}"
      />
    </div>
    <div class="app-ecommerce">
      <div class="col-12 col-lg-12">
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
        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">slider Edit</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <a href="{{ route('slider-list') }}"><button type="submit" class="btn btn-primary">slider List</button></a>
            </div>
        </div>
        <div class="row">
            <!-- First column-->
                <!-- Product Information -->
                <div class="card mb-4">
                    <form action="{{ route('slider.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">slider  Information</h5>
                        </div>
                        @csrf
                        <div class="card-body">
                          <div class="col">
                            <label class="form-label" for="name">Image</label><span<span class="text-warning"> 1920*600</span>
                                class="text-danger">*</span>
                            <input type="file" class="form-control" id="image" placeholder="image Here"
                                name="image" aria-label="image">
                        </div>
                          <div class="row mb-3 mt-3">
                            <div class="col">
                                <img width="100" src="{{ asset('slider/' . $data->image) }}" alt="img">
                            </div>
                        </div>
                        </div>
                        <div class="pt-4 mb-3 float-lg-end">
                            <button class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Update slider
                                </button>
                        </div>
                    </form>
                </div>
                <!-- /Product Information -->
            </div>
            <!-- /Second column -->
        </div>
    </div>
@endsection
