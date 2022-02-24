@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Seller Edit
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.seller.update',['seller'=>$data['sellerInfo']->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="d-flex justify-content-center">
                        <!--begin::Image input-->
                        <div class="image-input image-input-circle" data-kt-image-input="true"
                            style="background-image: url('{{asset('backend/assets/media/avatars/blank.png')}}')">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url('{{(isset($data['sellerInfo']->image)) ? asset($data['sellerInfo']->image) : asset("
                                backend/assets/media/avatars/blank.png") }}')"></div>
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
                    <div class="separator my-10"></div>
                    <div class="row">
                
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

                            <div class="mb-10">
                                <label for="userName" class="required form-label">User Name</label>
                                <input type="text" class="form-control form-control-solid" name="userName"
                                    placeholder="Input Seller User Name"
                                    value="{{(old('userName') ? old('userName') : $data['sellerInfo']->userName )}}" />
                            </div>


                            <div class="mb-10">
                                <label for="password" class="required form-label">Password</label>
                                <input type="password" class="form-control form-control-solid" name="password"
                                    placeholder="Input Seller User Password" value="{{old('password')}}" />
                            </div>


                            <div class="mb-10">
                                <label for="fullName" class="required form-label">Full Name</label>
                                <input type="text" class="form-control form-control-solid text-capitalize"
                                    name="fullName" placeholder="Input Seller Full Name"
                                    value="{{(old('fullName') ? old('fullName') : $data['sellerInfo']->fullName )}}" />
                            </div>


                            <div class="mb-10">
                                <label for="nid" class="required form-label">NID Number</label>
                                <input type="text" class="form-control form-control-solid" name="nid"
                                    placeholder="Input NID Number"
                                    value="{{(old('nid') ? old('nid') : $data['sellerInfo']->nid )}}" />
                            </div>


                            <div class="mb-10">
                                <label for="phone" class="required form-label">Phone</label>
                                <input type="tel" class="form-control form-control-solid" name="phone"
                                    placeholder="Enter Phone Number"
                                    value="{{(old('phone') ? old('phone') : $data['sellerInfo']->phone )}}" />
                            </div>


                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="mb-10">
                                <label for="phone" class="form-label">Mobile</label>
                                <input type="tel" class="form-control form-control-solid" name="mobile"
                                    placeholder="Enter Phone Number"
                                    value="{{(old('mobile') ? old('mobile') : $data['sellerInfo']->mobile )}}" />
                            </div>
                            <div class="mb-10">
                                <label for="email" class="required form-label">Email</label>
                                <input type="email" class="form-control form-control-solid" name="email"
                                    placeholder="Enter Email"
                                    value="{{(old('email') ? old('email') : $data['sellerInfo']->email )}}" />
                            </div>

                            <div class="mb-10">
                                <label for="deactiveAfter">Deactive After</label>

                                <!--begin::Dialer-->
                                <div class="input-group w-md-100" data-kt-dialer="true" data-kt-dialer-min="0"
                                    data-kt-dialer-max="30" data-kt-dialer-step="1">

                                    <!--begin::Decrease control-->
                                    <button class=" btn btn-icon btn-outline btn-outline-secondary" type="button"
                                        data-kt-dialer-control="decrease">
                                        <i class="bi bi-dash fs-1"></i>
                                    </button>
                                    <!--end::Decrease control-->

                                    <!--begin::Input control-->
                                    <input type="text" class="form-control" name="deactiveAfter" readonly placeholder=""
                                        value="{{(old('deactive_after') ? old('deactive_after') : (int)$data['sellerInfo']->deactive_after )}}"
                                        data-kt-dialer-control="input" />
                                    <!--end::Input control-->

                                    <!--begin::Increase control-->
                                    <button class="btn btn-icon btn-outline btn-outline-secondary" type="button"
                                        data-kt-dialer-control="increase">
                                        <i class="bi bi-plus fs-1"></i>
                                    </button>
                                    <!--end::Increase control-->
                                </div>
                                <!--end::Dialer-->
                            </div>

                            <div class="mb-10">
                                <label for="address" class="required form-label">Address</label>
                                <textarea name="address" class="form-control form-control-solid" id="" cols="30"
                                    rows="10">{{(old('address') ? old('address') : $data['sellerInfo']->address )}}</textarea>
                            </div>

                        </div>


                        <div class="separator my-10"></div>


                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-success w-25 ">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
