@extends('content.settings.layout')

@section('title', 'Aplication Settings')
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
                    <div class="card-header">
                        <h5 class="card-title mb-0">Aplication Settings</h5>
                    </div>
                    <div class="mb-4">
                        <form action="{{ route('global-settings-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row input__group mb-25">
                                    <label class="col-lg-3">{{ __('App Name') }} <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="app_name" value="{{ get_option('app_name') }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('App Email') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="app_email" value="{{get_option('app_email')}}" class="form-control" required>
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('App Contact Number') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="app_contact_number" value="{{get_option('app_contact_number')}}" class="form-control" required>
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('App Location') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="app_location" value="{{get_option('app_location')}}" class="form-control" required>
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('App Copyright') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="app_copyright" value="{{get_option('app_copyright')}}" class="form-control" required>
                                  </div>
                              </div>

                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Developed By') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="app_developed" value="{{get_option('app_developed')}}" class="form-control" required>
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                <label class="col-lg-3">{{ __('App Logo') }}</label>
                                <div class="col-lg-4">
                                    <div class="upload-img-box">
                                        @if(get_option('app_logo') != '')
                                            <img src="{{getImageFile(get_option('app_logo'))}}">
                                        @else
                                            <img src="">
                                        @endif
                                        <input type="file" name="app_logo" id="app_logo" accept="image/*" onchange="previewFile(this)">
                                        <div class="upload-img-box-icon">
                                            <i class="fa fa-camera"></i>
                                            <p class="m-0">{{ __('App Logo') }}</p>
                                        </div>
                                    </div>
                                    @if ($errors->has('app_logo'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('app_logo') }}</span>
                                    @endif
                                    <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 140 x 40</p>
                                </div>
                                <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Forgot Title') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="forgot_title" value="{{get_option('forgot_title')}}" class="form-control" >
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Forgot Subtitle') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="forgot_subtitle" value="{{get_option('forgot_subtitle')}}" class="form-control" >
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Forgot Button Name') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="forgot_btn_name" value="{{get_option('forgot_btn_name')}}" class="form-control" >
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Footer Quote') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <textarea class="form-control" name="footer_quote" id="" rows="5">{{get_option('footer_quote')}}</textarea>
                                  </div>
                              </div>

                              <hr>

                              <div class="item-top mb-30"><h2>{{ __('Social Media Profile Link') }}</h2></div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Facebook URL') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="facebook_url" value="{{get_option('facebook_url')}}" class="form-control">
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Twitter URL') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="twitter_url" value="{{get_option('twitter_url')}}" class="form-control">
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('LinkedIn URL') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="linkedin_url" value="{{get_option('linkedin_url')}}" class="form-control">
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Pinterest URL') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="pinterest_url" value="{{get_option('pinterest_url')}}" class="form-control">
                                  </div>
                              </div>
                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Instagram URL') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="instagram_url" value="{{get_option('instagram_url')}}" class="form-control">
                                  </div>
                              </div>

                              <div class="row input__group mb-25">
                                  <label class="col-lg-3">{{ __('Tiktok URL') }} <span class="text-danger">*</span></label>
                                  <div class="col-lg-9">
                                      <input type="text" name="tiktok_url" value="{{get_option('tiktok_url')}}" class="form-control">
                                  </div>
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
