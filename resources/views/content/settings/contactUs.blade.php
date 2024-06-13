@extends('content.settings.layout')

@section('title', 'Contact Us')
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
                        <form action="{{ route('contactUs-store') }}" method="POST">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Contact Us</h5>
                            </div>
                            @csrf
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" placeholder="Name Here"
                                            value="{{ old('name', $contactUs->name ?? '') }}" name="name"
                                            aria-label="Name Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="title" placeholder="Title Here"
                                            value="{{ old('title', $contactUs->title ?? '') }}" name="title"
                                            aria-label="Title Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" id="email" placeholder="email Here"
                                            value="{{ old('email', $contactUs->email ?? '') }}" name="email"
                                            aria-label="email Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="phone" placeholder="phone Here"
                                            value="{{ old('phone', $contactUs->phone ?? '') }}" name="phone"
                                            aria-label="phone Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="address" placeholder="address Here"
                                            value="{{ old('address', $contactUs->address ?? '') }}" name="address"
                                            aria-label="address Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Location</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="location" placeholder="Location Here"
                                            value="{{ old('location', $contactUs->location ?? '') }}" name="location"
                                            aria-label="Location Here">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">Enter Details</label>
                                    <div class="col-md-10">
                                        <textarea name="description" class="form-control" id="editor" cols="10" rows="10">{{ old('description', $contactUs->description ?? '') }}</textarea>
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
