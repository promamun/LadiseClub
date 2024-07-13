@extends('layouts/layoutMaster')

@section('title', 'Update gallery')
@section('page-style')
  <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
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
  <div class="app-ecommerce">
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
        <h4 class="mb-1 mt-3">Update Gallery</h4>
      </div>
      <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('gallery-list') }}">
          <button type="submit" class="btn btn-primary">Gallery List</button>
        </a>
      </div>
    </div>
    <div class="row">
      <!-- First column-->
      <!-- First column-->
      <div class="col-12 col-lg-12">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-12">
              @if (session('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif
            </div>
          </div>
        </div>
        <!-- Product Information -->
        <div class="card mb-4">
          <form action="{{ route('gallery.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-header">
              <h5 class="card-title mb-0">Gallery</h5>
            </div>
            @csrf
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-12 mb-4">
                  <label for="select2Multiple" class="form-label">Select Gallery</label><span class="text-danger">*</span>
                  <select id="select2Multiple" name="key" class="select2 form-select" required>
                    <option value="Photo" {{ $data->key == 'Photo' ? 'selected' : '' }}>Photo Gallery</option>
                    <option value="Video" {{ $data->key == 'Video' ? 'selected' : '' }}>Video Gallery</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3" id="imageInputContainer" style="display: none;">
                <div class="row input__group mb-25">
                  <label class="col-lg-3">{{ __('Image') }}</label>
                  <div class="col-lg-4">
                    <div class="upload-img-box">
                      <img height="100" width="100" src="{{asset('gallery/' . $data->value)}}">
                      <input type="file" name="value" id="image" accept="image/*" onchange="previewFile(this)">
                      <div class="upload-img-box-icon">
                        <i class="fa fa-camera"></i>
                        <p class="m-0">{{ __('value') }}</p>
                      </div>
                    </div>
                    @if ($errors->has('value'))
                      <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('value') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row mb-3" id="videoInputContainer" style="display: none;">
                <div class="col">
                  <label class="form-label" for="video">YouTube Video Link</label><span
                    class="text-danger">*</span><span class="text-info"> Example ( https://www.youtube.com/embed/tgbNymZ7vqY ) </span>
                  <input type="text" value="{{$data->value??''}}" class="form-control" id="video" placeholder="YouTube embed URL Here" name="value">
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
@section('page-script')
  <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const selectGallery = document.getElementById('select2Multiple');
      const imageInputContainer = document.getElementById('imageInputContainer');
      const videoInputContainer = document.getElementById('videoInputContainer');
      const imageInput = document.getElementById('image');
      const videoInput = document.getElementById('video');

      const updateVisibility = () => {
        if (selectGallery.value === 'Photo') {
          imageInputContainer.style.display = 'block';
          videoInputContainer.style.display = 'none';
          videoInput.value = ''; // Reset video input
        } else if (selectGallery.value === 'Video') {
          videoInputContainer.style.display = 'block';
          imageInputContainer.style.display = 'none';
          imageInput.value = ''; // Reset image input
        }
      };

      selectGallery.addEventListener('change', updateVisibility);

      // Trigger change event on page load to set the initial state
      updateVisibility();
    });
  </script>
@endsection
