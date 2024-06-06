@extends('layouts/layoutMaster')

@section('title', 'Add Facilitie Detail')
@section('page-script')
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            editor_config: {
                height: '500px' // Set the height as needed
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
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
                <h4 class="mb-1 mt-3">Add a new Facilitie Detail</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <a href="{{ route('facilitie-details-list') }}"><button type="submit" class="btn btn-primary">Facilitie Detail List</button></a>
            </div>
        </div>
        <div class="row">
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
                    <form action="{{ route('facilitieDetail.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Facilitie Detail</h5>
                        </div>
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="name">Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="name" placeholder="Name Here"
                                        value="{{ old('name') }}" name="name" aria-label="Name Here">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="image">Image</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="image" placeholder="Image Here"
                                        name="image" aria-label="Image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                  <label>Enter some Details</label>
                                  <textarea name="description"  class="form-control" id="editor" cols="10" rows="10">{{ old('description' )}}</textarea>
                                </div>
                            </div>
                            <div class="pt-4 mb-3 float-lg-end">
                                <button type="submit"
                                    class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Add</button>
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
