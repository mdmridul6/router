@extends('backend.admin.layouts.layout')
@section('content')

    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">
        <div class="card card-shadow">
            <div class="card-header">
                <div class="card-title">
                    Home Page Content
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.cms.home.page.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="row">


                        @csrf

                        <div class="d-flex justify-content-center">`
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                 style="background-image: url('{{ asset('backend/assets/media/logos/logo-3.svg')}}');background-size:cover;">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"
                                     style="background-image: url('{{isset($data->logo) ? asset($data->logo):asset('backend/assets/media/logos/logo-3.svg')}}');background-size:cover;">
                                </div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click"
                                        title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" id="kt_image_input_example_1" name="image" accept=".jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                <!--end::Cancel button-->

                                <!--begin::Remove button-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                      data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::Image input-->
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 com-xl-12 mb-5 d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="use_logo" name="use_logo" value="1"
                                       @if(isset($data->use_logo) ?? $data->use_logo) checked @endif>
                                <label class="form-check-label" for="use_logo">Use Logo Everywhere</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="name">Site Color</label>
                            <input type="color" name="site_color" id="site_color" class="form-control"
                                   value="{{(isset($data->site_color) ? $data->site_color : "#007fc4")}}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{(isset($data->name) ? $data->name : "")}}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                   value="{{(isset($data->phone) ? $data->phone : "")}}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{(isset($data->email) ? $data->email : "")}}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   value="{{(isset($data->address) ? $data->address : "")}}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="title">About Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{(isset($data->title) ? $data->title : "")}}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <label for="description">About Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                      class="form-control">{{(isset($data->description) ? $data->description : "")}}</textarea>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                            <p>About Us Image</p>

                            <div class="d-flex justify-content-center">
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty img-fluid  w-100 h-225px"
                                     data-kt-image-input="true"
                                     style="background-image: url('{{ asset('backend/assets/media/logos/logo-3.svg')}}');background-size:cover;background-repeat:no-repeat;background-position: center center">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper img-fluid w-100 h-225px"
                                         style="background-image: url('{{isset($data->logo) ? asset($data->logo):asset('backend/assets/media/logos/logo-3.svg')}}');background-size:cover;background-repeat:no-repeat;background-position: center center;">
                                    </div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="file" id="kt_image_input_example_1" name="image"
                                               accept=".jpg, .jpeg"/>
                                        <input type="hidden" name="avatar_remove"/>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                          data-bs-dismiss="click"
                                          title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                          data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                          data-bs-dismiss="click"
                                          title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                    <!--end::Remove button-->
                                </div>
                                <!--end::Image input-->
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success w-25">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
