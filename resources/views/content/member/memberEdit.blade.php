@extends('layouts/layoutMaster')

@section('title', 'Member Update')

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

<div id="app">
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
                <h4 class="mb-1 mt-3">Member Update</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <a href="{{ route('member-list') }}"><button type="submit" class="btn btn-primary">Member List</button></a>
            </div>
        </div>

        <div class="row">
            <!-- First column-->
            <div class="col-12 col-lg-12">
                <!-- Product Information -->
                <div class="card mb-4">
                    <form action="{{ route('member.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Member Information</h5>
                        </div>
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <!-- Multiple -->
                                <div class="col-md-6 mb-4">
                                    <label for="select2Multiple" class="form-label">Select Member Category</label><span
                                        class="text-danger">*</span>
                                    <select id="select2Multiple" name="category_id[]" class="select2 form-select" multiple
                                        required>
                                        @foreach ($memberCategory as $item)
                                            <option {{ $data->members->contains('id', $item->id) ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="name">Image</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="image" placeholder="image Here"
                                        name="image" aria-label="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="name">Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="name" placeholder="Name Here"
                                        value="{{ old('name') ?? $data->name }}" name="name" aria-label="Product title">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="designation">Designation</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" id="designation" placeholder="Designation"
                                        value="{{ old('designation') ?? $data->designation }}" name="designation"
                                        aria-label="designation title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="phone">Phone</label><span class="text-info">
                                        (optional)</span>
                                    <input type="number" class="form-control" id="phone" placeholder="Phone Here"
                                        value="{{ old('phone') ?? $data->phone }}" name="phone" aria-label="Phone">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="mobile">Mobile</label><span class="text-info">
                                        (optional)</span>
                                    <input type="number" class="form-control" id="mobile" placeholder="mobile Here"
                                        value="{{ old('mobile') ?? $data->mobile }}" name="mobile" aria-label="mobile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="fax">Fax</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="fax" placeholder="fax Here"
                                        value="{{ old('fax') ?? $data->fax }}" name="fax" aria-label="fax">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="facebook">Facebook</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="facebook"
                                        placeholder="facebook Here" value="{{ old('facebook') ?? $data->facebook }}"
                                        name="facebook" aria-label="facebook">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="twitter">Twitter</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="twitter" placeholder="twitter Here"
                                        value="{{ old('twitter') ?? $data->twitter }}" name="twitter"
                                        aria-label="twitter">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="linkedin">Linkedin</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="linkedin"
                                        placeholder="linkedin Here" value="{{ old('linkedin') ?? $data->linkedin }}"
                                        name="linkedin" aria-label="linkedin">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="instagram">Instagram</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="instagram"
                                        placeholder="instagram Here" value="{{ old('instagram') ?? $data->instagram }}"
                                        name="instagram" aria-label="instagram">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="personal_website">Personal Website</label><span
                                        class="text-info"> (optional)</span>
                                    <input type="text" class="form-control" id="personal_website"
                                        placeholder="personal_website Here"
                                        value="{{ old('personal_website') ?? $data->personal_website }}"
                                        name="personal_website" aria-label="personal_website">
                                </div>
                            </div>
                            <!-- Description -->
                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label" for="bootstrap-maxlength-example2">Textarea</label>
                                <textarea id="bootstrap-maxlength-example2" name="descripton" class="form-control bootstrap-maxlength-example"
                                    rows="3" maxlength="255" spellcheck="false"></textarea>
                            </div>
                            <div class="row mb-3 mt-3">
                              <div class="col">
                                  <img width="100" src="{{ asset('member/' . $data->image) }}" alt="img">
                              </div>
                          </div>
                          </div>
                        <div>
                            <button class="btn btn-primary">
                                Update
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
