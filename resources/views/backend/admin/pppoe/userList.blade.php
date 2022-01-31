@extends('backend.admin.layouts.layout')
@section('css')
@endsection
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                PPPoE Users
            </div>
            <div class="card-toolbar">
                <a href="{{route('admin.pppoe.create')}}" class="btn btn-sm btn-secondary">
                    Add Users
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center font-weight-bold">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Service</th>
                        <th>User Entry Date</th>
                        <th>User Active Date</th>
                        <th>Next Expired Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['pppoe'] as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->service }}</td>
                        <td>{{ (isset($item->active_date) ? date('d-M-Y',strtotime($item->active_date)) : "") }}</td>
                        <td>{{ (isset($item->package_active_date) ? date('d-M-Y',strtotime($item->package_active_date))
                            : "") }}</td>
                        <td>{{ (isset($item->package_expire_date) ? date('d-M-Y',strtotime($item->package_expire_date))
                            : "") }}</td>
                        <td>
                            @if ($item->status == true)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Deactived</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-around">
                            @if ($item->status == true)
                            <form action="{{route('admin.pppoe.deactive',['id'=>$item->id])}}" method="POST">
                                @csrf
                                <button class="btn btn-icon btn-bg-light btn-color-danger btn-sm me-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Deactive">
                                    <span class="svg-icon svg-icon-3"><i class="fas fa-stop-circle"></i></span>
                                </button>
                            </form>
                            @else
                            <form action="{{route('admin.pppoe.active',['id'=>$item->id])}}" method="POST">
                                @csrf
                                <button class="btn btn-icon btn-bg-light btn-color-success btn-sm me-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Active">
                                    <span class="svg-icon svg-icon-3"><i class="fas fa-play-circle"></i></span>
                                </button>
                            </form>

                            @endif

                            <a class="btn btn-icon btn-bg-light btn-color-primary btn-sm me-1"
                                href="{{route('admin.pppoe.view',['id'=>$item->id])}}" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Show"><span class="svg-icon svg-icon-3"><i
                                        class="fas fa-eye"></i></span></a>

                            <a class="btn btn-icon btn-bg-light btn-color-info btn-sm me-1" href="#"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span
                                    class="svg-icon svg-icon-3"><i class="fas fa-edit"></i></span></a>

                            <form action="{{route('admin.pppoe.delete',['id'=>$item->id])}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-icon btn-bg-light btn-color-danger btn-sm me-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                    <span class="svg-icon svg-icon-3"><i class="fas fa-trash"></i></span>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
