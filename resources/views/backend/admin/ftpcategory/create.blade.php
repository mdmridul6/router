@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="card-title">
                FTP Category Create
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{route('admin.cms.ftp.category.store')}}" method="POST">
                @csrf
                <div class="col-auto">
                    <label for="name" class="visually-hidden">Catrgory name</label>
                    <input type="text" name="name" class="form-control input-sm" id="name" placeholder="Catrgory name">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
