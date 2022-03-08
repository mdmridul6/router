@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="card-title">
                FTP Create
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{route('admin.ftp.store')}}" method="POST">
                @csrf
                <div class="col-auto">
                    <label for="name" class="visually-hidden">Ftp name</label>
                    <input type="text" name="name" class="form-control input-sm" id="name" placeholder="Ftp name">
                </div>

                <div class="col-auto">
                    <label for="url" class="visually-hidden">Ftp URL</label>
                    <input type="text" name="url" class="form-control input-sm" id="name"
                        placeholder="URL Please add Http://">
                </div>

                <div class="col-auto">
                    <label for="name" class="visually-hidden">Catrgory</label>
                    <select name="category" id="" class="form-control">
                        <option value="0" selected disabled>Select Category</option>
                        @foreach ($data['ftpCategory'] as $ftpCategory)
                        <option value="{{$ftpCategory->id}}">{{$ftpCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
