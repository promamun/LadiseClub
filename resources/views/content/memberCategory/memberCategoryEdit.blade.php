@extends('layouts/layoutMaster')
@section('title', 'Member Edit')
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/quill/typography.scss', 'resources/assets/vendor/libs/quill/katex.scss', 'resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/dropzone/dropzone.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/tagify/tagify.scss'])
@endsection
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/quill/katex.js', 'resources/assets/vendor/libs/quill/quill.js', 'resources/assets/vendor/libs/select2/select2.js', 'resources/assets/vendor/libs/dropzone/dropzone.js', 'resources/assets/vendor/libs/jquery-repeater/jquery-repeater.js', 'resources/assets/vendor/libs/flatpickr/flatpickr.js', 'resources/assets/vendor/libs/tagify/tagify.js'])
@endsection
@section('page-script')
    @vite(['resources/assets/js/app-ecommerce-product-add.js'])
@endsection
@section('content')
    <div class="app-ecommerce">
        <!-- Add Product -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Member Edit</h4>
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
                                        aria-label="Product title">
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
                                    <input type="text" class="form-control" id="facebook" placeholder="facebook Here"
                                        value="{{ old('facebook') ?? $data->facebook }}" name="facebook"
                                        aria-label="facebook">
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
                            <div>
                                <label class="form-label">Description (Optional)</label>
                                <div class="form-control p-0 pt-1">
                                    <div class="comment-toolbar border-0 border-bottom">
                                        <div class="d-flex justify-content-start">
                                            <span class="ql-formats me-0">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline">/button>
                                                    <button class="ql-list" value="ordered"></button>
                                                    <button class="ql-list" value="bullet"></button>
                                                    <button class="ql-link"></button>
                                                    <button class="ql-image"></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>
                    </form>
                    <!-- Media -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Media</h5>
                            <a href="javascript:void(0);" class="fw-medium">Add media from URL</a>
                        </div>
                        <div class="card-body">
                            <form action="/upload" class="dropzone needsclick" id="dropzone-basic">
                                <div class="dz-message needsclick">
                                    <p class="fs-4 note needsclick pt-3 mb-1">Drag and drop your image here</p>
                                    <p class="text-muted d-block fw-normal mb-2">or</p>
                                    <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Browse

                                        image</span>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Media -->
                </div>
                <!-- /Product Information -->
            </div>
            <!-- /Second column -->
        </div>
    </div>

@endsection
