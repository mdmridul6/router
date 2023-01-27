@extends('backend.admin.layouts.layout')
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">
        <div class="card card-shadow">
            <div class="card-header">
                <div class="card-title">
                    Cms Package List
                </div>
                <div class="card-toolbar">
                    <a class="btn btn-secondary btn-sm" href="{{ route('admin.cms.cms-package.create') }}">Add</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Package Price</th>
                        <th>Status</th>
                        <th>Facility</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data['packages'] as $packages)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $packages->name }}</td>
                                <td>{{ $packages->price }}</td>
                                <td>{{ $packages->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    @for ($i = 0; $i < count($packages->benifit); $i++)
                                        <span class="badge badge-primary">{{ $packages->benifit[$i] }}</span>
                                    @endfor
                                </td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('admin.cms.cms-package.edit', ['cms_package' => $packages->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form
                                        action="{{ route('admin.cms.cms-package.destroy', ['cms_package' => $packages->id]) }}"
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
