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
                            <label class="col-lg-3">{{__('App Name')}} <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="app_name" value="{{get_option('app_name')}}" class="form-control" required>
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
