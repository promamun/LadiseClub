@extends('layouts/layoutMaster')
@section('page-style')
<link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
<style>
  .ck-editor__editable_inline {
      min-height: 300px;
  }
</style>
@endsection
@section('page-script')
<script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endsection
@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Application Settings</span></h4>
<!-- Tabs -->
<div class="row">
  <div class="col-xl-12">
    <div class="nav-align-left mb-4">
      @include('content.settings.settingsSidebar')
      <div class="tab-content">
        @yield('subcontent')
      </div>

    </div>
  </div>
</div>
<!-- Pills -->
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
