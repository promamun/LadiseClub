@extends('content.settings.layout')

@section('title', 'About Us')
@section('subcontent')
    <div class="tab-pane fade show active">
        <div id="app">
            <toastr-notification :success="{{ json_encode(session('success')) }}"
                :error="{{ json_encode(session('error')) }}" :warning="{{ json_encode(session('warning')) }}"
                :info="{{ json_encode(session('info')) }}" />
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
                    <div class="mb-4">
                        <form action="{{ route('aboutUs-store') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-header">
                                <h5 class="card-title mb-0">About Us</h5>
                            </div>
                            @csrf
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" placeholder="Name Here"
                                            value="{{ old('name', $aboutUs->name ?? '') }}" name="name"
                                            aria-label="Name Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="title" placeholder="Title Here"
                                            value="{{ old('title', $aboutUs->title ?? '') }}" name="title"
                                            aria-label="Title Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Enter Details</label>
                                    <div class="col-md-10">
                                        <textarea name="description" class="form-control" id="editor" cols="10" rows="10">{{ old('description', $aboutUs->description ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="row input__group mb-25">
                                    <label class="col-lg-3">{{ __('About Us Left Image') }} </label>
                                    <div class="col-lg-4">
                                        <div class="upload-img-box">
                                            @if (isset($aboutUs) && $aboutUs->image !== null)
                                                <img src="{{ asset('aboutUs/' . $aboutUs->image) }}" alt="About Us Image">
                                            @else
                                                <img src="{{ asset('aboutUs/default_about.png') }}"
                                                    alt="Default About Us Image">
                                            @endif
                                            <input type="file" name="image" id="sign_up_left_image" accept="image/*"
                                                onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                        </div>
                                        @if ($errors->has('sign_up_left_image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                {{ $errors->first('sign_up_left_image') }}</span>
                                        @endif
                                        <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, Image,Jpeg <br>
                                            <span class="text-black">{{ __('Recommend Size') }}:</span> 817 x 732 (1MB)</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-2 col-form-label">WHAT WE DO</label>
                                  <div class="col-md-10">
                                      <textarea name="what_to_do" class="form-control" cols="10" rows="5">{{ old('what_to_do', $aboutUs->what_to_do ?? '') }}</textarea>
                                  </div>
                              </div>
                              <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-2 col-form-label">WHAT WE ARE</label>
                                  <div class="col-md-10">
                                      <textarea name="what_we_are" class="form-control" cols="10" rows="5">{{ old('what_we_are', $aboutUs->what_we_are ?? '') }}</textarea>
                                  </div>
                              </div>
                              <div class="mb-3 row">
                                  <label for="html5-text-input" class="col-md-2 col-form-label">OUR AIM & MISSION</label>
                                  <div class="col-md-10">
                                      <textarea name="our_aim_mission" class="form-control" id="editor" cols="10" rows="5">{{ old('our_aim_mission', $aboutUs->our_aim_mission ?? '') }}</textarea>
                                  </div>
                              </div>
                                <div class="pt-4 mb-3 float-lg-end">
                                    <button type="submit"
                                        class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Product Information -->
                </div>
                <!-- /Second column -->
            </div>
        </div>
    </div>
@endsection
