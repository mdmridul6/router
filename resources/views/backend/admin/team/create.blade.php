@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Team Add
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.cms.team.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!--begin::Image input-->
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true"
                            style="background-image: url('{{asset('backend/assets/media/avatars/blank.png')}}')">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url('{{asset('backend/assets/media/avatars/blank.png')}}')">
                            </div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" id="kt_image_input_example_1" name="image" accept=".jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div>

                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <label for="title">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <label for="content">Designation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" class="form-control" required>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <label for="content">Facebook <span class="text-danger">Give the link
                                        with ("https://")</span></label>
                                <input type="url" name="facebook" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <label for="content">Instagram <span class="text-danger">Give the link
                                        with ("https://")</span></label>
                                <input type="url" name="instagram" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                <label for="content">Linkedin <span class="text-danger">Give the link
                                        with ("https://")</span></label>
                                <input type="url" name="linkedin" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success w-25">Save</button>
                </div>
            </form>

            <!--end::Image input-->
        </div>
    </div>
</div>
@endsection
