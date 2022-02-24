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
            <form action="{{route('admin.cms.store')}}" method="POST">
                <div class="row">
                    @csrf
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                        <label for="name">Company Name</label>
                        <input type="text" name="name" id="" class="form-control"
                            value="{{(isset($data->name) ? $data->name : "")}}">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="" class="form-control"
                            value="{{(isset($data->phone) ? $data->phone : "")}}">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="form-control"
                            value="{{(isset($data->email) ? $data->email : "")}}">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                        <label for="name">Address</label>
                        <input type="text" name="address" id="" class="form-control"
                            value="{{(isset($data->address) ? $data->address : "")}}">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                        <label for="title">About Title</label>
                        <input type="text" name="title" id="" class="form-control"
                            value="{{(isset($data->title) ? $data->title : "")}}">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 com-xl-6 mb-5">
                        <label for="description">About Description</label>
                        <textarea name="description" id="" cols="30" rows="10"
                            class="form-control">{{(isset($data->description) ? $data->description : "")}}</textarea>
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