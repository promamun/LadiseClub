
@extends('layouts/layoutMaster')

@section('title', 'Update Event')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/quill/typography.scss', 'resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/quill/katex.scss', 'resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/dropzone/dropzone.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/tagify/tagify.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/quill/katex.js', 'resources/assets/vendor/libs/quill/quill.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/dropzone/dropzone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/tagify/tagify.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/app-ecommerce-product-add.js', 'resources/assets/js/forms-editors.js'])
@endsection

@section('content')

    <div class="app-ecommerce">

        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Update Event</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <a href="{{ route('event-list') }}"><button type="submit" class="btn btn-primary">Event List</button></a>
            </div>
        </div>
        <div class="row">
          <!-- First column-->
           <!-- First column-->
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
          <div class="col-12 col-lg-12">
              <!-- Product Information -->
              <div class="card mb-4">
                  <form action="{{ route('event.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                      <div class="card-header">
                          <h5 class="card-title mb-0">title</h5>
                      </div>
                      @csrf
                      <div class="card-body">
                          <div class="row mb-3">
                              <div class="col">
                                  <label class="form-label" for="name">Name</label><span class="text-info">(optional)</span>
                                  <input type="text" class="form-control" id="name" placeholder="Name Here" value="{{ old('name')?? $data->name }}" name="name" aria-label="Name Here">
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col">
                                  <label class="form-label" for="image">Image</label><span class="text-info">(optional)</span>
                                  <input type="file" class="form-control" id="image" placeholder="Image Here" name="image" aria-label="Image">
                              </div>
                          </div>
                          <div class="pt-4 mb-3 float-lg-end">
                              <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Update</button>
                          </div>
                      </div>
                  </form>
              </div>
              <!-- /Product Information -->
          </div>
          <!-- /Second column -->
        </div>
    </div>
@endsection

