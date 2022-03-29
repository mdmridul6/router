@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="card-title">
                FTP Category List
            </div>
            <div class="card-toolbar">
                <a class="btn btn-secondary btn-sm" href="{{route('admin.cms.ftp.category.create')}}">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <th>#</th>
                    <th>Category Name</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @foreach ($data['ftpCategory'] as $ftpCategory)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ftpCategory->name}}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('admin.cms.ftp.category.edit',['category'=>$ftpCategory->id])}}"
                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{route('admin.cms.ftp.category.destroy',['category'=>$ftpCategory->id])}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
