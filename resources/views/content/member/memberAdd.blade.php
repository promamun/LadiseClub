@extends('layouts/layoutMaster')

@section('title', 'Add Member')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/quill/typography.scss','resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/quill/katex.scss', 'resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/dropzone/dropzone.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/tagify/tagify.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/quill/katex.js',
    'resources/assets/vendor/libs/quill/quill.js',
    'resources/assets/vendor/libs/select2/select2.js',
    'resources/assets/vendor/libs/dropzone/dropzone.js',
    'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js',
     'resources/assets/vendor/libs/flatpickr/flatpickr.js',
     'resources/assets/vendor/libs/tagify/tagify.js',
     ])
@endsection

@section('page-script')
    @vite(['resources/assets/js/app-ecommerce-product-add.js','resources/assets/js/forms-editors.js'])
@endsection

@section('content')

    <div class="app-ecommerce">

        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Add a new Member</h4>
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
                    <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <h5 class="card-tile mb-0">Member Information</h5>
                        </div>
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="name">Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="name" placeholder="Name Here"
                                        value="{{ old('name') }}" name="name" aria-label="Product title">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="designation">Designation</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" id="designation" placeholder="Designation"
                                        value="{{ old('designation') }}" name="designation" aria-label="Product title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="name">Image</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="image" placeholder="image Here"
                                       name="image" aria-label="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="phone">Phone</label><span class="text-info">
                                        (optional)</span>
                                    <input type="number" class="form-control" id="phone" placeholder="Phone Here"
                                        value="{{ old('phone') }}" name="phone" aria-label="Phone">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="mobile">Mobile</label><span class="text-info">
                                        (optional)</span>
                                    <input type="number" class="form-control" id="mobile" placeholder="mobile Here"
                                        value="{{ old('mobile') }}" name="mobile" aria-label="mobile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="fax">Fax</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="fax" placeholder="fax Here"
                                        value="{{ old('fax') }}" name="fax" aria-label="fax">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="facebook">Facebook</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="facebook" placeholder="facebook Here"
                                        value="{{ old('facebook') }}" name="facebook" aria-label="facebook">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="twitter">Twitter</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="twitter" placeholder="twitter Here"
                                        value="{{ old('twitter') }}" name="twitter" aria-label="twitter">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="linkedin">Linkedin</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="linkedin" placeholder="linkedin Here"
                                        value="{{ old('linkedin') }}" name="linkedin" aria-label="linkedin">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="instagram">Instagram</label><span class="text-info">
                                        (optional)</span>
                                    <input type="text" class="form-control" id="instagram"
                                        placeholder="instagram Here" value="{{ old('instagram') }}" name="instagram"
                                        aria-label="instagram">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="personal_website">Personal Website</label><span
                                        class="text-info"> (optional)</span>
                                    <input type="text" class="form-control" id="personal_website"
                                        placeholder="personal_website Here" value="{{ old('personal_website') }}"
                                        name="personal_website" aria-label="personal_website">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="col-12">
                              <label class="form-label" for="bootstrap-maxlength-example2">Textarea</label>
                              <textarea id="bootstrap-maxlength-example2" name="descripton" class="form-control bootstrap-maxlength-example" rows="3" maxlength="255" spellcheck="false"></textarea>
                            </div>
                        </div>
                        <div class="pt-4 mb-3 float-lg-end">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /Product Information -->
            </div>
            <!-- /Second column -->
        </div>
    </div>
@endsection
