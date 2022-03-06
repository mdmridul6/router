@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="card-title">
                FTP Update
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{route('admin.ftp.update',['ftp'=>$data['ftp']->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-auto">
                    <label for="name" class="visually-hidden">Ftp name</label>
                    <input type="text" name="name" class="form-control input-sm" id="name" placeholder="Ftp name"
                        value="{{$data['ftp']->title}}">
                </div>

                <div class="col-auto">
                    <label for="url" class="visually-hidden">Ftp URL</label>
                    <input type="url" name="url" class="form-control input-sm" id="name"
                        placeholder="URL Please add Http://" value="{{$data['ftp']->url}}">
                </div>

                <div class="col-auto">
                    <label for="name" class="visually-hidden">Catrgory</label>
                    <select name="category" id="" class="form-control">
                        <option value="0" disabled>Select Category</option>
                        @foreach ($data['ftpCategory'] as $ftpCategory)
                        <option value="{{$ftpCategory->id}}" @if($data['ftp']->category_id === $ftpCategory->id)
                            selected
                            @endif>{{$ftpCategory->name}}</option>
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
